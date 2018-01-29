# Larvel Timeseries Metrics

A simple package to generate a base table of timestamps daily to simplify the creating and maintaining of timeseries metrics and usage graphs over time. The base table should be maintained automatically which is the entire purpose of this package. The generated table will look as follows:

```
mysql> select * from metric_intervals;
+----+---------------------+---------------------+---------------------+
| id | timestamp           | created_at          | updated_at          |
+----+---------------------+---------------------+---------------------+
|  1 | 2018-01-29 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  2 | 2018-01-28 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  3 | 2018-01-27 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  4 | 2018-01-26 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  5 | 2018-01-25 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  6 | 2018-01-24 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  7 | 2018-01-23 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
|  8 | 2018-01-22 00:00:00 | 2018-01-29 15:44:33 | 2018-01-29 15:44:33 |
+----+---------------------+---------------------+---------------------+
8 rows in set (0.00 sec)
```

## Getting Started

#### Add the reposistory
```
jonnx/laravel-timeseries-metrics
```

#### Add the Service Provider in ```/config/app.php```
```php
/*
 * Package Service Providers...
 */
Jonnx\LaravelTimeseriesMetrics\LaravelTimeseriesMetricsServiceProvider::class,

```

#### Publish Vendor Files for Laravel Timeseries Metrics
```
php artisan vendor:publish --provider Jonnx\LaravelTimeseriesMetrics\LaravelTimeseriesMetricsServiceProvider
```

#### Run Migrations
```
php artisan migrate
```

#### Update Backfill Config ```config/metrics.php```
change the interval_backfill config to the date you need to go back to. This depends on when you launched your project and how far back your data goes.

```
<?php

return [

	/**
	 * the timestamp before which no metric_interval records will be created for
	 * this is used as a backstop when running the initial metrics:createInterval
	 */
	'interval_backfill' => '2018-01-01 00:00:00',
	
];
```

#### Schedule Command ```php artisan metrics:createInterval```
the command will generate a full backfill of records the first time its run and if called in the scheduler, will generate additional records as needed (ie. when a day has passed). To do this automatically, add the following to your ```app/Console/Kernel.php```:

```
$schedule->command('metrics:createInterval')->daily();
```

## Contributing

Thank you for considering contributing to this package! Since this package is used with Laravel, please follow these guidelines: [https://laravel.com/docs/5.5/contributions](https://laravel.com/docs/5.5/contributions)


## Security Vulnerabilities
If you discover a security vulnerability within this package, please contact [Jonas Weigert](https://www.twitter.com/JonasWeigert). All security vulnerabilities will be promptly addressed.

## License
The Larvel Timeseries Metrics package is licensed under the MIT license.