<?php

namespace Jonnx\LaravelTimeseriesMetrics\Console\Commands;

use Jonnx\LaravelTimeseriesMetrics\MetricInterval;
use Illuminate\Console\Command;
use Carbon\Carbon;

class MetricsCreateInterval extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metrics:createInterval';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generates the intervals for your metrics';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // GET CURRENT TIMESTAMP
        $timestamp = Carbon::today();
        $limit = new Carbon(config('metrics.interval_backfill'));
        
        $generated_count = 0;
        while(is_null($this->getMetricIntervalFromTimestamp($timestamp)) && $timestamp->gte($limit)) {

            $metricInterval = new MetricsInterval;
            $metricInterval->timestamp = $timestamp;
            $metricInterval->save();
            
            $generated_count ++;
            $timestamp = $timestamp->copy()->subHours(24);
            
        }
        
        $this->info("Generated {$generated_count} interval records");
    }
    
    protected function getMetricIntervalFromTimestamp(Carbon $timestamp)
    {
        return  MetricInterval::where('timestamp', $timestamp->toDateString())->first();
    }
}
