<p class="lead">Shop Categories</p>

<div class="list-group">
	@foreach($categories as $category)
		<a href="{{ url('categories/'.$category->slug) }}" class="list-group-item {{$category->id == $current ? 'active' : '' }}">{{{ $category->name }}}</a>
	@endforeach
</div>