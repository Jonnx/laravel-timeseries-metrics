<?php

return [

	/**
	 * the timestamp before which no metric_interval records will be created for
	 * this is used as a backstop when running the initial metrics:createInterval
	 */
	'interval_backfill' => '2018-01-01 00:00:00',
	
];