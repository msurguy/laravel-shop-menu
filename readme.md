## Menu manager like Wordpress using Laravel and Nestable

See demo at: http://laravel-menu-builder.gopagoda.com/admin/menu
Tutorial coming up at: http://maxoffsky.com

This application demonstrates usage of [Nestable plugin](https://github.com/dbushell/Nestable) jQuery plugin to provide the user with nice menu ordering experience without a page refresh:
![menu ordering in action](https://raw.github.com/msurguy/laravel-shop-menu/master/menumanager.gif)

The menu controller is in app/controllers/Admin/MenuController.php
The menu model is in app/models/Menu.php

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

The Laravel backbone pagination is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
