# Laravel View Logger

Laravel View Logger is a small package for Laravel 5+ that logs the hits on your web site.

## Install

Add this to your composer.json file and the run composer update.
``` bash
    "kris-terziev/productsadmin": "0.1.*"
```

Now add the service provider to the providers array.
```php
    Kris\LaravelViewCounter\LaravelViewCounterServiceProvider::class,
```

## Usage

Run vendor:publish to publish the migration and the config file. Then run the migrations.
``` php
    php artisan vendor:publish
    php artisan migrate
```

Add this to the $middleware array in the Karnel.php file.

```php
    \Kris\LaravelViewCounter\Http\ViewLogger::class,
```
To retrieve the data in your controller simply import the Log class.

```php
    use Kris\LaravelViewCounter\Log;
```

## Examples

Retrieving the number of unique hits on the website.

```php
    $hits = Log::unique();
```


