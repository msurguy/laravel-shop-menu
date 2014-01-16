## Menu manager like Wordpress using Laravel and Nestable

See demo at: http://laravel-menu-builder.gopagoda.com/admin/menu
Tutorial coming up at: http://maxoffsky.com

This application demonstrates usage of [Nestable plugin](https://github.com/dbushell/Nestable) jQuery plugin to provide the user with nice menu ordering experience without a page refresh:
![menu ordering in action](https://raw.github.com/msurguy/laravel-shop-menu/master/menumanager.gif)

The menu controller is in app/controllers/Admin/MenuController.php
The menu model is in app/models/Menu.php

### A note on the data structure for the menu

The important columns of the "menus" table are:
- id
- parent_id
- order

With these 3 fields we can build nested menus as many levels deep as you want.
The Nestable plugin helps modify the values of these fields for the appropriate rows of data.

### Use of recursion

The hard part that took me a looong time to build is a very small function inside of app/models/Menu.php:
```
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

```

This function uses recursion to display the menu to the user even if the menu is many many levels deep. This function alone can save you a bunch of time.

### Installation instructions:
- Download this repo
- Set up a MySQL DB named 'shop-menu' and import install.sql file into it, make sure you edit credentials in app/config/database.php to match yours
- Open up terminal and CD into the folder of this repo
- Run "php artisan serve" to run the application
- Open up the browser and navigate to "localhost:8000" to see it in action

### Star this repo!

The more people star my repos - the more I will give back to the community.

### Read more on my blog and follow on Twitter

I post tutorials all the time on my blog : http://maxoffsky.com, stay updated on my Twitter: http://twitter.com/msurguy

### License

The Laravel menu manager is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
