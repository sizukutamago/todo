<?php

if (! function_exists('random_date')) {
	/**
	 * @param string $start_date
	 * @param string $end_date
	 * @return false|string
	 */
	function random_date(string $start_date,string $end_date) {
		$min = strtotime($start_date);
		$max = strtotime($end_date);

		$date = rand($min, $max);
		return date('Y-m-d', $date);
	}
}