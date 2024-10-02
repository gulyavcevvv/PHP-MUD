<?php

namespace App;
class Log {

	public static function debug($text) {
		if (DEBUG) self::write('DBG', $text);
	}

	public static function error($text) {
		self::write('ERR', $text);
	}

	public static function info($text) {
		self::write('NFO', $text);
	}
	
	public function warning($text) {
		if (VERBOSE) self::write('WRN', $text);
	}
	
	private static function write($prefix, $text) {
		if (!QUIET) echo date('Y-m-d H:i:s') . " [$prefix] $text\n";
	}

}
