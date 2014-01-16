<?php

/**
 * ApiSearchController is used for the "smart" search throughout the site.
 * it returns and array of items (with type and icon specified) so that the selectize.js plugin can render the search results properly
 **/

class ApiSearchController extends \BaseController {

	public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}
		
	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			$item['url'] = url($prefix.'/'.$item['slug']);
		}
		return $data;		
	}

	public function index()
	{
		$query = e(Input::get('q',''));

		if(!$query && $query == '') return Response::json(array(), 400);

		$products = Product::where('published', true)
			->where('name','like','%'.$query.'%')
			->orderBy('name','asc')
			->take(5)
			->get(array('slug','name','icon'))->toArray();

		$categories = Category::where('name','like','%'.$query.'%')
			->has('products')
			->take(5)
			->get(array('slug', 'name'))
			->toArray();

		// Data normalization
		$categories = $this->appendValue($categories, url('img/icons/category-icon.png'),'icon');

		$products 	= $this->appendURL($products, 'products');
		$categories  = $this->appendURL($categories, 'categories');

		// Add type of data to each item of each set of results
		$products = $this->appendValue($products, 'product', 'class');
		$categories = $this->appendValue($categories, 'category', 'class');

		// Merge all data into one array
		$data = array_merge($products, $categories);

		return Response::json(array(
			'data'=>$data
		));
	}
}