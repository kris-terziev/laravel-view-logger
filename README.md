# Products Admin

## Install

Via Composer

``` bash
    "kris-terziev/productsadmin": "0.1.*"
```

## Usage

``` php
    php artisan vendor:publish
    php artisan migrate
```

Add this to the $middleware array in the Karnel.php file.

```php
    \Kris\LaravelViewCounter\Http\ViewLogger::class,
```