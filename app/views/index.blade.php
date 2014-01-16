@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
          @include('partials.sidebar.categories', array('categories' => $categories,'current' => 0))
        </div>
        <div class="col-md-9">
            <div class="row" style="margin-bottom:30px;">
                <div class="col-md-12">                                              
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img alt="First slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                          <div class="item">
                            <img alt="Second slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                          <div class="item">
                            <img alt="Third slide" src="http://placehold.it/800x200" style="width: 100%;">
                          </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        
            <div id="sorting"></div>

            <hr>

            <div class="row" id="products-area">
              <div id="paginated-content"></div>
            </div>

            <div class="row">
              <div class="text-center" id="pagination"></div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
  <script src="{{ asset('js/vendor/underscore-min.js') }}"></script>
  <script src="{{ asset('js/vendor/backbone-min.js') }}"></script>
  <script src="{{ asset('js/vendor/backbone.paginator.min.js') }}"></script>
  <script src="{{ asset('js/vendor/spin.min.js') }}"></script>

  <script type="text/html" id="ProductItemTemplate">
    <div class="thumbnail">
      <img src="<%= banner %>" alt="">
      <div class="caption">
          <h4 class="pull-right">$ <%= pricing %></h4>
          <h4><a href="{{url('products')}}/<%= slug %>"><%= name %></a></h4>
          <p><%= short_description %></p>
      </div>
      <div class="ratings">
          <p>
            <% for (var i = 1; i <= 5; i++) { %>
              <span class="glyphicon glyphicon-star<%= i <= rating_cache ? '' : '-empty' %>"></span>
            <% }; %>
          </p>
      </div>
    </div>
   </script>

  <script type="text/html" id="paginationTemplate">
   <% if (currentPage != 1) { %>
     <button class="prev btn-default btn">Prev</button>
   <% } %>
   <div class="btn-group">
     <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Page <%= currentPage %> <span class="caret"></span></button>
     <ul class="dropdown-menu">
       <% for(p=1;p<=totalPages;p++){ %>
         <% if (currentPage == p) { %>
           <li class="active"><a href="#" class="page"><%= p %></a></li>
         <% } else { %>
           <li><a href="#" class="page"><%= p %></a></li>
         <% } %>
       <% }%>
     </ul>
   </div>
   <% if (lastPage != currentPage && lastPage != 0) { %>
    <button class="btn btn-default next">Next</button>
   <% } %>
  </script>

  <script type="text/html" id="sortingTemplate">
     <div class="btn-group">
       <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">Sort by <strong><span id="sortByText">popularity</span></strong> <span class="caret"></span></button>
       <ul class="dropdown-menu" id="sortByField">
         <li><a href="date">Date</a></li>
         <li><a href="name">Name</a></li>
         <li><a href="popularity">Popularity</a></li>
       </ul>
     </div>
  </script>

  <script type="text/javascript">
    window.app = {};
    app.collections = {};
    app.models = {};
    app.views = {};
    app.serverURL = '{{url("/")}}';

    app.models.Item = Backbone.Model.extend({});

    app.collections.PaginatedCollection = Backbone.Paginator.requestPager.extend({
      model: app.models.Item,
      paginator_core: {
        dataType: 'json',
        url: app.serverURL + '/api/products'
      },
      
      paginator_ui: {
        firstPage: 1,
        currentPage: 1,
        perPage: 6,
        totalPages: 10
      },
      
      server_api: {
        'per_page': function() { return this.perPage },
        'page': function() { return this.currentPage },
        'sort': function() {
          if(this.sortField === undefined)
            return 'popular';
          return this.sortField;
        }
      },

      parse: function (response) {
        $('#products-area').spin(false);
        this.totalRecords = response.total;
        this.totalPages = Math.ceil(response.total / this.perPage);

        return response.data;
      }

    });

    app.views.ItemView = Backbone.View.extend({
      tagName: 'div',
      className: 'col-sm-4 col-lg-4 col-md-4',
      template: _.template($('#ProductItemTemplate').html()),

      initialize: function() {
        this.model.bind('change', this.render, this);
        this.model.bind('remove', this.remove, this);
      },

      render : function () {
        this.$el.html(this.template(this.model.toJSON()));
        return this;
      }
    });

    app.views.SortedView = Backbone.View.extend({

      events: {
        'click #sortByField a': 'updateSortBy'
      },

      template: _.template($('#sortingTemplate').html()),

      initialize: function () {
        this.collection.on('reset', this.render, this);
        this.collection.on('sync', this.render, this);
        this.$el.appendTo('#sorting');
      },

      render: function () {
        var html = this.template(this.collection.info());
        this.$el.html(html);

        if (this.collection.sortField == undefined){
          var sortText = this.$el.find('#sortByText').text();
        }else{
          var sortText = this.collection.sortField;
        }
        $('#sortByText').text(sortText);
      },

      updateSortBy: function (e) {
        e.preventDefault();
        var currentSort = $(e.target).attr('href');
        this.collection.updateOrder(currentSort);
        $('#products-area').spin();
      }

    });

    app.views.PaginatedView = Backbone.View.extend({

      events: {
        'click button.prev': 'gotoPrev',
        'click button.next': 'gotoNext',
        'click a.page': 'gotoPage'
      },

      template: _.template($('#paginationTemplate').html()),

      initialize: function () {
        this.collection.on('reset', this.render, this);
        this.collection.on('sync', this.render, this);
        this.$el.appendTo('#pagination');
      },

      render: function () {
        var html = this.template(this.collection.info());
        this.$el.html(html);
      },

      gotoPrev: function (e) {
        e.preventDefault();
        $('#products-area').spin();
        this.collection.requestPreviousPage();
      },

      gotoNext: function (e) {
        e.preventDefault();
        $('#products-area').spin();
        this.collection.requestNextPage();
      },

      gotoPage: function (e) {
        e.preventDefault();
        $('#products-area').spin();
        var page = $(e.target).text();
        this.collection.goTo(page);
      }

    });

    app.views.AppView = Backbone.View.extend({
      el : '#paginated-content',

      initialize : function () {
        $('#products-area').spin();

        var items = this.collection;

        items.on('add', this.addOne, this);
        items.on('all', this.render, this);

        items.pager();

      },

      addOne : function ( item ) {
        var view = new app.views.ItemView({model:item});
        $('#paginated-content').append(view.render().el);
      }
    });

    $(function(){
        app.collections.paginatedItems = new app.collections.PaginatedCollection();
        app.views.app = new app.views.AppView({collection: app.collections.paginatedItems});
        app.views.pagination = new app.views.PaginatedView({collection:app.collections.paginatedItems});
        app.views.sorting = new app.views.SortedView({collection:app.collections.paginatedItems});
    });

  </script>
@stop
