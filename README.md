# CommentSold Code Test

## Requirements

-   PHP 8.x
-   composer
-   npm
-   Docker Desktop (to run the development version)

## Local Development

This project uses [Laravel Sail](https://laravel.com/docs/8.x/sail) for local development.

To get started after cloning the project:

-   Copy `.env.example` to `.env`, using the following for database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=commentsold_test
DB_USERNAME=sail
DB_PASSWORD=password
```

-   Run `composer install`
-   Run `npm install`
-   Run `npm run dev`
-   Run `./vendor/bin/sail up`
-   Run `sail artisan migrate`
-   Run `sail artisan db:seed` (This loads the CSV data into the database.)

Once sail is finished booting, you can access the site at http://localhost/
