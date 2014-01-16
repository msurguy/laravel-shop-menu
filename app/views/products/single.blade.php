@extends('layout')

@section('title')
{{{ $seo->title or 'Viewing Product '.$product->name }}}
@endsection

@section('description')
{{{ $seo->description or 'My great product'}}}
@endsection

@section('keywords')
{{{ $seo->keywords or 'default, keywords, for, my, product' }}}
@endsection

@section('scripts')
  {{HTML::script('js/expanding.js')}}
  {{HTML::script('js/starrr.js')}}

  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
@stop

@section('styles')
  <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }
  </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
          @include('partials.sidebar.categories', array('categories' => $categories,'current' => 0))
        </div>
        <div class="col-md-9">
            <div class="thumbnail">
              <img src="http://placehold.it/820x320" alt="">
              <div class="caption-full">
                  <h4 class="pull-right">${{ number_format($product->pricing, 2);}}</h4>
                  <h4><a href="{{url('products/'.$product->slug)}}">{{$product->name}}</a></h4>
                  <p>{{$product->short_description}}</p>
                  <p>{{$product->long_description}}</p>

                  <p>
                    @foreach($product->categories as $category)
                      <span class="glyphicon glyphicon-tag"></span> <a href="{{ url('categories/'.$category->slug) }}">{{{ $category->name }}} </a>
                    @endforeach
                  </p>
              </div>
              <div class="ratings">
                  <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
                  <p>
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($product->rating_cache, 1);}} stars
                  </p>
              </div>
            </div>
            <div class="well" id="reviews-anchor">
              <div class="row">
                <div class="col-md-12">
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>There were errors while submitting this review:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been posted!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been removed!</h5>
                    </div>
                  @endif
                </div>
              </div>
              <div class="text-right">
                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                  {{Form::open()}}
                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                  {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'))}}
                  <div class="text-right">
                    <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                  </div>
                {{Form::close()}}
                </div>
              </div>

              @foreach($reviews as $review)
              <hr>
                <div class="row">
                  <div class="col-md-12">
                    @for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor

                    {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 
                    
                    <p>{{{$review->comment}}}</p>
                  </div>
                </div>
              @endforeach
              {{ $reviews->links(); }}
            </div>
        </div>

    </div>
@stop