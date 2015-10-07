<?php

namespace Kris\LaravelViewLogger;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{

    protected $table = 'views';
    protected $fillable = ['ip'];

}
