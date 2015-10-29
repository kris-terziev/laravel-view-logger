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
    Logger::unique();                          
    //Returns the count of the unique hits on the website.
    
    Logger::interval($startDate, $endDate);    
    //Returns the count of the unique hits for the given interval. You can use Carbon.
    
    Logger::perMonth();                        
    //Returns the count of the unique hits fot the last month. Same as Logger::lastMonth()
    
    Logger::perMonth(3);                       
    //Returns an array with the hits for the last 3 months.
    //Example: ['Jan 2014' => '23', 'Feb 2014' => '43']
    //If you want to change the date format you can pass it as a second parameter
    //Example: Logger::perMonth(2, "Y M");
    //This will return something like this ['2015 Jan' => '20', '2015 Feb' => '31']
     
     Logger::perDay(3);
     //Functions the same way as perMonth() but with days.
```

## Artisan Commands

```sh
    php artisan logger:report
```

Outputs to the console a report on the hits for the last 12 months and the total unique hits.


