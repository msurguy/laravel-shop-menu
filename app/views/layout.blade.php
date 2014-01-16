<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>@yield('title','My shop')</title>
  <meta name="description" content="@yield('description','Amazing cupcake wrappers, printable goods')">
  <meta name="keywords" content="@yield('keywords','printable, cupcake wrappers, party supplies')">
  <meta name="viewport" content="width=device-width">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('css/styles.css') }}" rel="stylesheet">
  <link href="{{ url('vendor/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
  @yield('styles')
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}">My shop</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <form class="navbar-form" role="search">
                      <div class="form-group" style="width: 240px;">
                        <select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
                      </div>
                    </form>
                  </li>
                  <li><a href="http://maxoffsky.com/code-blog/in-place-pagination-using-backbone-js-laravel-shop-tutorial" target="_blank">Tutorial</a></li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ url('admin/menu') }}">Menu builder</a></li>
                      <li><a href="{{ url('admin/seo') }}">SEO</a></li>
                    </ul>
                  </li>
                </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>

    <div class="container">
      @yield('content')

      <footer>
        <div class="row">
          <div class="col-md-12">
            Created by <a href="http://maxoffsky.com" target="_blank">Maks</a> | <a href="http://maxoffsky.com/code-blog/in-place-pagination-using-backbone-js-laravel-shop-tutorial" target="_blank">Tutorial</a>
          </div>
        </div>
      </footer>

    </div>
    
    <script type="text/javascript">
        var root = '{{url("/")}}';
    </script>
    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src='{{ url("vendor/selectize/js/standalone/selectize.min.js") }}'></script>
    <script type="text/javascript" src='{{ url("js/main.js") }}'></script>
    @yield('scripts')


</body>
</html>
