<?php

namespace App\Actions;

use App\Contracts\Action;
use App\Client;

class Who implements Action
{
	public static function synonyms(): array
	{
		return ['кто', 'who'];
	}

	public static function ok(Client $client)
	{
		return true;
	}

	public static function run(Client $client, $cmd, $arg)
	{
		foreach ($client->getServer()->getClients() as $c) {
			$client->message('[some info...] ' . $c->user->name);
		}
	}
}
