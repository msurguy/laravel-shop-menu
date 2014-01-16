<?php

class Menu extends Eloquent
{

	// Recursive function that builds the menu from an array or object of items
	// In a perfect world some parts of this function would be in a custom Macro or a View
	public function buildMenu($menu, $parentid = 0) 
	{ 
	  $result = null;
	  foreach ($menu as $item) 
	    if ($item->parent_id == $parentid) { 
	      $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
	      <div class='dd-handle nested-list-handle'>
	        <span class='glyphicon glyphicon-move'></span>
	      </div>
	      <div class='nested-list-content'>{$item->label}
	        <div class='pull-right'>
	          <a href='".url("admin/menu/edit/{$item->id}")."'>Edit</a> |
	          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
	        </div>
	      </div>".$this->buildMenu($menu, $item->id) . "</li>"; 
	    } 
	  return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null; 
	} 

	// Getter for the HTML menu builder
	public function getHTML($items)
	{
		return $this->buildMenu($items);
	}

}
