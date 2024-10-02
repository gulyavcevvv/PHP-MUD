<?php

namespace App;

register_tick_function(array('App\\Tick', 'tock'));

declare(ticks=1); // The Loop runs pretty darn often, let's not overload things

class Tick
{

	const DAY    = 0;
	const HOUR   = 1;
	const MINUTE = 2;
	const SECOND = 3;

	private static $cb_day    = []; // Daily events
	private static $cb_hour   = []; // Hourly events
	private static $cb_minute = []; // Minutely events
	private static $cb_second = []; // Secondly events
	private static $second;              // Last tick second

	public static function callback($frequency, $callback)
	{
		switch ($frequency) {
			case self::DAY:
				self::$cb_day[]    = $callback;
				break;
			case self::HOUR:
				self::$cb_hour[]   = $callback;
				break;
			case self::MINUTE:
				self::$cb_minute[] = $callback;
				break;
			case self::SECOND:
				self::$cb_second[] = $callback;
				break;
		}
	}

	public static function day()
	{
		foreach (self::$cb_day as $cb) {
			call_user_func_array($cb, []);
		}
	}

	public static function hour()
	{
		foreach (self::$cb_hour as $cb) {
			call_user_func_array($cb, []);
		}

		if (self::$second % 86400 == 0) {
			Tick::day();
		}
	}

	public static function minute()
	{
		foreach (self::$cb_minute as $cb) {
			call_user_func_array($cb, []);
		}

		if (self::$second % 3600 == 0) {
			Tick::hour();
		}
	}

	public static function second()
	{
		foreach (self::$cb_second as $cb) {
			call_user_func_array($cb, []);
		}

		if (self::$second % 60 == 0) {
			Tick::minute();
		}
	}

	public static function tock()
	{
		if (self::$second < $new = time()) {
			self::$second = $new;
			Tick::second();
		}
	}
}
