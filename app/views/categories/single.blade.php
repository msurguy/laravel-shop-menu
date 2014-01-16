@extends('layout')

@section('title')
{{{ $seo->title or 'Viewing Category '.$category->name }}}
@endsection

@section('description')
{{{ $seo->description or 'My great category'}}}
@endsection

@section('keywords')
{{{ $seo->keywords or 'default, keywords, for, my, category' }}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar.categories', array('categories' => $categories,'current' => $category->id))
        </div>
        <div class="col-md-9">
           @foreach($category->products as $product)
               <div class="col-sm-4 col-lg-4 col-md-4">
                 <div class="thumbnail">
                   <img src="http://placehold.it/320x120" alt="">
                   <div class="caption">
                       <h4 class="pull-right">${{ number_format($product->pricing, 2);}}</h4>
                       <h4><a href="{{url('products/'.$product->slug)}}">{{$product->name}}</a></h4>
                       <p>{{$product->short_description}}</p>
                   </div>
                   <div class="ratings">
                       <p class="pull-right">{{$product->rating_count}} {{ Str::plural('review', $product->rating_count);}}</p>
                       <p>
                           @for ($i=1; $i <= 5 ; $i++)
                               <span class="glyphicon glyphicon-star{{ ($i <= $product->rating_cache) ? '' : '-empty'}}"></span>
                           @endfor
                       </p>
                   </div>
                 </div>
               </div>
           @endforeach
        </div>
    </div>
@stop