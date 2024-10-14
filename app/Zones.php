<?php

namespace App;

use App\Contracts\Action as ActionContract;
use App\Client;
use App\World\Zone;
use App\World\Room;
use App\Enums\Direction;

class Zones
{

	private static $pathToFolder = '/var/www/html/data/world/';

	private static $zones = array();


	public static function perform(Client $client, $input)
	{
		$input = trim($input);
		if (!$input) {
			return;
		}

		$cmd = strstr($input, ' ', true) ?: $input;
		foreach (self::$zones as $name => $action) {
			if (mb_strpos($name, $cmd) === 0  && $action::ok($client)) {
				$arg = trim(strstr($input, ' '));
				$action::run($client, $cmd, $arg);
				return;
			}
		}
	}

	public static function register()
	{

		$values = file_get_contents('/var/www/html/data/world/index');

		$id = 0;
		foreach (explode("\n", $values) as $value) {
			$value = preg_replace('/\s+/', ' ', $value);

			if (strpos($value, ';') === 0) {
				continue;
			}

			$matches = explode(' ', $value, 7);

			if ($matches[0] === 'ОБЛАСТЬ') {
				$zone = new Zone(
					++$id,
					$matches[1],
					intval($matches[2]),
					intval($matches[3]),
					intval($matches[4]),
					intval($matches[5]),
					trim($matches[6])
				);
				self::$zones[$id] = $zone;
			}
		}
		foreach (self::$zones as $zone) {
			self::loadRomes($zone);
		}
	}

	public static function loadRomes(Zone $zone)
	{

		$rooms = array();
		$current_room = null;

		$num = str_pad($zone->getVnum(), 3, '0', STR_PAD_LEFT);

		$file = fopen(static::$pathToFolder . $num . '/' . $num . '.wlx', 'r');
		$current_room = new Room();
		while ($line = fgets($file)) {
			$line = trim($line);

			if (strpos($line, ';') === 0) {
				continue;
			}

			if (preg_match('/КОМНАТА (\d+)/', $line, $match)) {
				$room_id = (int)$match[1];
				$current_room = new Room();
				$current_room->setId($room_id);
				$rooms[] = $current_room;
			} elseif (preg_match('/НАЗВАНИЕ "(.*)"/', $line, $match)) {
				$current_room->setName($match[1]);
			} elseif (preg_match('/ОПИСАНИЕ "(.*)"/', $line, $match)) {
				$current_room->setDescription($match[1]);
			} elseif (preg_match('/МЕСТНОСТЬ (.*)/', $line, $match)) {
				$current_room->setLocation($match[1]);
			} elseif (preg_match('/СЕВЕР (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::NORTH);
			} elseif (preg_match('/ВОСТОК (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::WEST);
			} elseif (preg_match('/ЮГ (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::SOUTH);
			} elseif (preg_match('/ЗАПАД (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::WEST);
			} elseif (preg_match('/ВВЕРХ (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::UP);
			} elseif (preg_match('/ВНИЗ (\d+)/', $line, $match)) {
				$current_room->setExits($match[1], Direction::DOWN);
			} elseif (preg_match('/ПРЕДМЕТЫ (.*)/', $line, $match)) {
				$object_ids = explode(' ', $match[1]);
				foreach ($object_ids as $object) {
					$objects = explode('=', $object);
					if (count($objects) === 1) {
						$current_room->addItems($objects[0]);
					} else {
						$object_id = $objects[0];
						$count = $objects[1];
						for ($i = 0; $i < $count; $i++) {
							$current_room->addItems($object_id);
						}
					}
				}
			}
		}
		fclose($file);

		return $rooms;
	}
}
