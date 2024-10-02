<?php

namespace App;

use App\Contracts\Action as ActionContract;
use App\Client;

class Actions {

	private static $actions = array();

	public static function perform(Client $client, $input) {
		$input = trim($input);
		if (!$input) {
			return;
		}

		$cmd = strstr($input, ' ', true) ? : $input;
		foreach (self::$actions as $name => $action) {
			if (mb_strpos($name, $cmd) === 0  && $action::ok($client)) {
				$arg = trim(strstr($input, ' '));
				$action::run($client, $cmd, $arg);
				return;
			}
		}

		$client->message('Unknown command :(' . $input);
	}

	public static function register() {

		$pathToFolder = './app/Actions';

		// Получаем список файлов в папке
		$files = glob($pathToFolder . '/*.php');

		// Включаем каждый файл
		foreach ($files as $file) {
			include $file;

			 // Получаем имя класса из имени файла
			$className = 'App\\Actions\\' . basename($file, '.php');

			if (! class_exists($className)) {
				throw new \Exception("class " . $className . " not exists", 1);
			}
			$action = new $className;
			if (! ($action instanceof ActionContract)) {
				throw new \Exception("class " . $className . " not instanceof Action", 1);
			}

			foreach ($action::synonyms() as $synonyms) { 
				self::$actions[$synonyms] = $action;
			}
			
		}
	}

}

