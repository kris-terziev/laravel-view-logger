<?php

namespace Kris\LaravelViewCounter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    protected $table = 'views';
    protected $fillable = ['ip'];

    /**
     * Retrieves the count of the unique hits on the site
     * @return integer
     */
    public function unique() {
        $views =  DB::table('views')->select('id', 'ip')->groupBy('ip')->get();
        return count($views);
    }

}
