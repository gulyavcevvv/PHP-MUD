<?php

namespace App\Actions;

use App\Contracts\Action;
use App\Client;
use App\Log;

class Reload implements Action
{

	public static function synonyms(): array
	{
		return ['перезагрузить'];
	}


	public static function ok(Client $client)
	{
		return true;
	}

	public static function run(Client $client, $cmd, $arg)
	{
		if (strtolower($cmd) != 'reload' || strtolower($arg) != 'now') {
			$client->message('Reload must be run as "reload now"');
			return;
		}
		if (!function_exists('runkit_import')) {
			$client->message('The server must have the {1runkit{0 extension installed.');
			return;
		}
		if (!class_exists('ReflectionClass')) {
			$client->message('The server must have the {1Reflection{0 extesion installed.');
			return;
		}
		Log::info("Reload performed by {$client->user->name}.");

		// Todo: переделать
		$list = include './app/Actions/List';
		foreach ($list['files'] as $file) {
			try {
				runkit_import($file, RUNKIT_IMPORT_FUNCTIONS | RUNKIT_IMPORT_CLASSES | RUNKIT_IMPORT_OVERRIDE);
			} catch (\ErrorException $e) {
				// Ignore - runkit can't import itself
			}
		}

		// end TODO

		$RC = new \ReflectionClass('Actions');
		$a = $RC->getProperty('actions');
		$a->setAccessible(true);
		$a->setValue($list['actions']);
		$a->setAccessible(false);
		unset($RC);
		$client->message('Reload complete!');
	}
}
