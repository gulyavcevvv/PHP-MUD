<?php

namespace App\Contracts;

use App\Client;

interface Action
{
    public static function synonyms();
    public static function ok(Client $client);
    public static function run(Client $client, $cmd, $arg);
}
