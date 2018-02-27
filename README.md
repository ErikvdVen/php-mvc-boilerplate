# PHP MVC Boilerplate

## Installation

First execute below commands

```
git clone https://github.com/ErikvdVen/php-mvc-boilerplate.git
cd php-mvc-boilerplate
composer install
bower install
```

## Setup Database
First create a database and update the database credentials in `app/service.php`

## Create Schema
Execute below command inside the project folder

```
php vendor/bin/doctrine orm:schema-tool:create
```

## That's all folks

Important: Make sure the Document Root is set to the `public` folder before you navigate to your Mamp/Wamp server, e.g. `http://php-mvc.local:8888`

If you haven't installed Mamp/Wamp server, you might want to use PHP's built-in web server using the following command:

```
php -S localhost:8888 -t public
```

If you get warnings like `Warning: date(): It is not safe to rely on the system's timezone settings.`, you might want to set the timezone in `public/index.php`, e.g.:

```
<?php
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
...
```
