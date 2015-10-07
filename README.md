# Laravel View Logger

Laravel View Logger is a small package for Laravel 5+ that logs the hits on your web site.

## Install via Composer

```bash
    composer require kris-terziev/laravel-view-logger
```

Now add the service provider to the providers array.

```php
    Kris\LaravelViewLogger\LaravelViewLoggerServiceProvider::class,
```

And add the Facade to the aliases array.

```php
    'Logger'    => Kris\LaravelViewLogger\Facades\ViewLogger::class,
```

## Usage

Run vendor:publish to publish the migration and the config file. Then run the migrations.
``` php
    php artisan vendor:publish
    php artisan migrate
```

Add this to the $middleware array in the Karnel.php file.

```php
    \Kris\LaravelViewLogger\Http\Middleware\ViewLogger::class,
```

```php
    Logger::unique();                          //Returns the count of the unique hits on the website.
    Logger::interval($startDate, $endDate);    //Returns the count of the unique hits for the given interval. You can use Carbon.
    Logger::perMonth();                        //Returns the count of the unique hits fot the last month. Same as Logger::lastMonth()
    Logger::perMonth(3);                       //Returns an array with the hits for the last 3 months.
                                               //Example: ['Jan 2014' => '23', 'Feb 2014' => '43']
```


