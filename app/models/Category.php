<?php

class Category extends Eloquent
{
	public function products()
	{
	    return $this->belongsToMany('Product');
	}

	public function seo()
	{
	    return $this->morphMany('Seo', 'seoble');
	}
}