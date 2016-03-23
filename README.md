# dev-test

## Installation

First execute below commands

```
git clone https://github.com/ErikvdVen/dev-test.git
cd dev-test
composer install
bower install
```

## Setup Database
First create a database and update the database credentials in `app/bootstrap.php`

## Create Schema
Execute below command inside the `dev-test` folder

```
php vendor/bin/doctrine orm:schema-tool:create
```

###That's all folks
Important: Make sure the Document Root is set to the `public` folder before you navigate to your Mamp/Wamp server, e.g. `http://dev-test:8888`
