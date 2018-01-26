<?php

namespace Jonnx\LaravelTimeseriesMetrics;

use Illuminate\Support\ServiceProvider;

class LaravelTimeseriesMetricsServiceProvider extends ServiceProvider {
    
	public function boot() {
		$this->publishes([
			__DIR__.'/../config/metrics.php' => config_path('metrics.php'),
		], 'metrics');
	}
	
    public function register() {
		$this->mergeConfigFrom( __DIR__.'/../config/metrics.php', 'metrics');
    }
    
    public function provides() {
        return ['metrics'];
    }
}