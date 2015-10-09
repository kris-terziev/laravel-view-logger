<?php

namespace Kris\LaravelViewLogger;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Logger
{
    /**
     * Retrieves the unique hits on the site.
     * @return array
     */
    public static function unique()
    {
        $hits = DB::table('views')->select('id', 'ip', 'created_at')->groupBy('ip')->get();
        return count($hits);
    }

    /**
     * Returns the unique hits for the given date interval.
     *
     * @param $startDate
     * @param $endDate
     * @return int
     */
    public static function interval($startDate, $endDate){

        $hits = DB::table('views')->select('id', 'ip', 'created_at')->whereBetween('created_at', [$startDate, $endDate])->groupBy('ip')->get();

        return count($hits);
    }

    /**
     * Return the hits for the last Month
     *
     * @return int
     */
    public static function lastMonth() {

        $hits_count = self::interval(Carbon::now()->subMonth()->firstOfMonth(), Carbon::now()->subMonth()->lastOfMonth());

        return $hits_count;
    }

    /**
     * Returns an associative array the keys are the names of the months and the
     * values are the number of hits during this month. If no parameter is
     * provided then the function returns the hits for the last month.
     *
     * @param int $months
     * @return array
     */
    public static function perMonth($months = 1, $date_format = "Y-m") {
        
        $hits_per_month = array();

        for ($i = 1; $i <= $months; $i++) {
            $hits_count = self::interval(Carbon::now()->subMonths($i)->firstOfMonth(), Carbon::now()->subMonths($i)->lastOfMonth());

            $hits_per_month[Carbon::now()->subMonths($i)->format($date_format)] = $hits_count;
        }

        return $hits_per_month;

    }



}
