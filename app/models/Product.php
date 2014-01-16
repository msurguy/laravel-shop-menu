<?php

class Product extends Eloquent
{
	// Relationships 
	public function reviews()
	{
	    return $this->hasMany('Review');
	}

	public function categories()
	{
		return $this->belongsToMany('Category');
	}

	public function seo()
	{
	    return $this->morphMany('Seo', 'seoble');
	}

	// Getters
	public function getIconAttribute()
	{
		return $this->attributes['icon'] ? url($this->attributes['icon']) : 'http://placehold.it/20x20';
	}

	public function getBannerAttribute()
	{
		return $this->attributes['banner'] ? url($this->attributes['banner']) : 'http://placehold.it/300x240';
	}

	// Scopes

	public function scopePublished($query)
	{
	   	return $query->where('published', true);
	}

	public function scopePopular($query)
	{
	   	return $query->published()->orderBy('rating_cache','desc');
	}

	public function scopeNewest($query)
	{
	   	return $query->published()->orderBy('created_at','desc');
	}

	public function scopeByname($query)
	{
	   	return $query->published()->orderBy('name','asc');
	}

	// The way average rating is calculated (and stored) is by getting an average of all ratings, 
	// storing the calculated value in the rating_cache column (so that we don't have to do calculations later)
	// and incrementing the rating_count column by 1

    public function recalculateRating($rating)
    {
    	$reviews = $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
    	$this->save();
    }
}