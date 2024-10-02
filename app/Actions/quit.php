<?php

namespace App\Actions;

use App\Contracts\Action;
use App\Client;

class Quit implements Action
{

	public static function synonyms(): array
	{
		return ['выйти'];
	}

	public static function ok(Client $client)
	{
		return true;
	}

	public static function run(Client $client, $cmd, $arg)
	{
		$client->quit();
	}
}
