<?php

namespace App;

class Database
{

	private static $instance;

	private function __construct()
	{
		if (self::$instance === NULL)
			self::$instance = new \MySQLi(DBHOST, DBUSER, DBPASS, DBNAME);
	}

	public static function instance()
	{
		if (self::$instance === NULL)
			new Database;

		return self::$instance;
	}
}
