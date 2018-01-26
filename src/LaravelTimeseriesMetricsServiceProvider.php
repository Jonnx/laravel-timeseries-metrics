<?php

namespace Jonnx\LaravelTimeseriesMetrics;

use Illuminate\Support\ServiceProvider;
use Jonnx\LaravelTimeseriesMetrics\Console\Commands\MetricsCreateInterval;

class LaravelTimeseriesMetricsServiceProvider extends ServiceProvider {
    
	public function boot() {
		$this->publishes([__DIR__.'/../config/metrics.php' => config_path('metrics.php')], 'config');
		$this->publishes([__DIR__.'/../database/migrations/' => database_path('migrations')], 'migrations');
		
		if ($this->app->runningInConsole()) {
            $this->commands([MetricsCreateInterval::class]);
        }
	}
	
    public function register() {
		$this->mergeConfigFrom( __DIR__.'/../config/metrics.php', 'metrics');
    }
    
    public function provides() {
        return [];
    }
}