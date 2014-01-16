## Laravel Backbone - based in-place pagination demo Store application

See demo at: http://laravel-shop-pagination.gopagoda.com
Tutorial at: http://maxoffsky.com/code-blog/in-place-pagination-using-backbone-js-laravel-shop-tutorial

This application demonstrates usage of [Backbone Paginator](http://backbone-paginator.github.io/backbone.paginator/) Backbone.js plugin to provide the user with nice seamless pagination without a page refresh:
![pagination in action](https://raw.github.com/msurguy/laravel-backbone-pagination/master/pagination.gif)

The pagination API controller is in app/controllers/Api/ProductsController.php
The page using Backbone and pagination is in app/views/index.blade.php

### Installation instructions:
- Download this repo
- Set up a MySQL DB named 'shop-pagination' and import install.sql file into it, make sure you edit credentials in app/config/database.php to match yours
- Open up terminal and CD into the folder of this repo
- Run "php artisan serve" to run the application
- Open up the browser and navigate to "localhost:8000" to see it in action

### Star this repo!

The more people star my repos - the more I will give back to the community.

### Read more on my blog and follow on Twitter

I post tutorials all the time on my blog : http://maxoffsky.com, stay updated on my Twitter: http://twitter.com/msurguy

### License

The Laravel backbone pagination is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
