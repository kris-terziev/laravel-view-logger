<?php

namespace  Kris\LaravelViewLogger\Console\Commands;

use Illuminate\Console\Command;
use Kris\LaravelViewLogger\Logger;

class LoggerReport extends Command
{
    /*
     * The logger implementation
     */
    protected $logger;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logger:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Outputs a report for the views.';

    /**
     * Create a new command instance.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        parent::__construct();
        $this->logger = $logger;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $unique_hits = $this->logger->unique();
        $headers = ['Date', 'Hits'];
        $hits_per_months = $this->getPerMonth(12);

        $this->table($headers, $hits_per_months);
        $this->info('Unique hits: ' . $unique_hits);
    }

    /**
     * Retrieves the hits per month for given months back
     * and saves them in array of arrays to be used in
     * console table.
     *
     * @param $months
     * @return array
     */
    private function getPerMonth($months)
    {
        $per_month = [];

        $log = $this->logger->perMonth($months);

        foreach($log as $date => $hits) {
            array_push($per_month, [$date, $hits]);
        }

        return $per_month;
    }
}
