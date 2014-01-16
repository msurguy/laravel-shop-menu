<?php

class ApiProductsController extends \BaseController {

    public function getIndex()
    {
        // Get the number of items to show per page (defaults to 6 items)
        $perPage = e(Input::get('per_page','6'));

        // Get the index of the current page (defaults to the first page)
        $page = e(Input::get('page','1'));

        // Get the sorting parameter (defaults to popular)
        $sort = e(Input::get('sort','popular'));

        // Calculate the offset of the items
        $offset = $page*$perPage-$perPage;

        // The count of items will be updated from the query
        $count = 0;

        switch ($sort) {
          case 'date':
            $sortedProducts = Product::newest();
            break;
          case 'name':
            $sortedProducts = Product::byname();
            break;
          default:
            $sortedProducts = Product::popular();
            break;
        }

        // Get the count
        $count = $sortedProducts->count();

        // Retrieve the products using Laravel's Eloquent ORM methods
        $products = $sortedProducts->take($perPage)->offset($offset)->get(array('slug','rating_cache','name','short_description','icon','banner','pricing'));

        // Return the results as JSON data
        return Response::json(array(
          'data'=>$products->toArray(),
          'total' => $count
        ));
    }
}