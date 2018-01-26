<?php

namespace Jonnx\LaravelTimeseriesMetrics\Console\Commands;

use Illuminate\Console\Command;

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
        $this->info('To be implemented');
    }
}
