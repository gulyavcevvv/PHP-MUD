<?php

namespace App;

use App\Contracts\Action as ActionContract;
use App\Client;
use App\World\Zone;
use App\World\Room;
use App\Enums\Direction;
use App\Enums\PassageSigns;
use App\Enums\PassageType;
use App\Enums\RoomProperty;
use App\Enums\Terrain;

class Zones
{

	private static $pathToFolder = '/var/www/html/data/world/';

	private static $zones = array();
	private static $rooms = array();
	private static $mobs = array();
	private static $objs = array();


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

		if (! file_exists(PATH_TO_FOLDER_DATA . 'universe')) {
			return;
		}
		$values = file_get_contents(PATH_TO_FOLDER_DATA . 'universe');

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

		//print_r(self::$zones);
	}

	public static function loadRomes(Zone $zone)
	{

		$current_room = null;

		$num = str_pad($zone->getVnum(), 3, '0', STR_PAD_LEFT);

		if (! file_exists(PATH_TO_FOLDER_DATA . $num . '/' . $num . '.wlx')) {
			return;
		}

		$file = fopen(PATH_TO_FOLDER_DATA . $num . '/' . $num . '.wlx', 'r');
		$current_room = new Room();
		$is_description = false;
		while ($line = fgets($file)) {
			$line = trim($line);

			if (strpos($line, ';') === 0) {
				continue;
			}

			if (strlen($line) === 0) {
				continue;
			}

			$matches = explode(' ', $line, 2);
			if (count($matches) == 2) {
				$matches[1] = trim($matches[1], '"');
				$matches[1] = str_replace('""', '"', $matches[1]);	
			}

			switch ($matches[0]) {
				case 'КОМНАТА':
					$room_id = (int)$matches[1];
					$current_room = new Room();
					$current_room->setId($room_id);
					$current_room->setLocation(Terrain::ROOM);
					self::$rooms[] = $current_room;
					$zone->addRoom($current_room);
					$is_description = false;
					break;

				case 'НАЗВАНИЕ':
					$current_room->setName($matches[1]);
					$is_description = false;
					break;

				case 'ОПИСАНИЕ':
					$current_room->setDescription($matches[1]);
					$is_description = true;
					break;
	
				case 'МЕСТНОСТЬ':
					foreach (Terrain::cases() as $value) {
						if ($value->label() == $matches[1]) {
							$current_room->setLocation($value);
							continue;
						}
					}
					$is_description = false;
					break;

				case 'КСВОЙСТВА':
					$object_ids = explode(' ', $matches[1]);
					foreach ($object_ids as $object) {
						foreach (RoomProperty::cases() as $value) {
							if ($value->label() == $object) {
								$current_room->addProperties($value);
								continue;
							}
						}
					}
					$is_description = false;
					break;

				case 'СЕВЕР':
					$current_room->setExits((int)$matches[1], Direction::NORTH);
					$is_description = false;
					break;
	
				case 'ВОСТОК':
					$current_room->setExits((int)$matches[1], Direction::EAST);
					$is_description = false;
					break;
	
				case 'ЮГ':
					$current_room->setExits((int)$matches[1], Direction::SOUTH);
					$is_description = false;
					break;

				case 'ЗАПАД':
					$current_room->setExits((int)$matches[1], Direction::WEST);
					$is_description = false;
					break;

				case 'ВВЕРХ':
					$current_room->setExits((int)$matches[1], Direction::UP);
					$is_description = false;
					break;

				case 'ВНИЗ':
					$current_room->setExits((int)$matches[1], Direction::DOWN);
					$is_description = false;
					break;

				case 'ОСЕВЕР':
					$current_room->setDescriptionExits($matches[1], Direction::NORTH);
					$is_description = false;
					break;
	
				case 'ОВОСТОК':
					$current_room->setDescriptionExits($matches[1], Direction::EAST);
					$is_description = false;
					break;
	
				case 'ОЮГ':
					$current_room->setDescriptionExits($matches[1], Direction::SOUTH);
					$is_description = false;
					break;

				case 'ОЗАПАД':
					$current_room->setDescriptionExits($matches[1], Direction::WEST);
					$is_description = false;
					break;

				case 'ОВВЕРХ':
					$current_room->setDescriptionExits($matches[1], Direction::UP);
					$is_description = false;
					break;

				case 'ОВНИЗ':
					$current_room->setDescriptionExits($matches[1], Direction::DOWN);
					$is_description = false;
					break;

				case 'ПРОХОД':
					$str_prohod = $matches[1];
					while (strpos($str_prohod, ')') === false) {
						$line = fgets($file);
						$str_prohod .= ':' . trim($line);
					}

					$str_prohod = trim($str_prohod, "(");
					$str_prohod = trim($str_prohod, ")");
					$str_prohod = trim($str_prohod);

					$values_prohod = explode(':', $str_prohod);

					foreach ($values_prohod as $value_prohod) {
						$matches_prohod = explode(' ', trim($value_prohod), 2);
						
						switch (trim($matches_prohod[0])) {
							case 'НАПРАВЛЕНИЕ':
								$direction = Direction::findLabel($matches_prohod[1]);
								break;
							
							case 'ТИП':
								if (isset($direction)) {
									$current_room->setTypeExits(PassageType::findLabel($matches_prohod[1]), $direction);
								}
								else {
									Log::error("Попутка установить тип прохода для неизвестного направления");
								}
								break;

							case 'ПРИЗНАКИ':
								if (isset($direction)) {

									$sings_prohod = explode(' ', $matches_prohod[1]);
									foreach ($sings_prohod as $value) {
										$current_room->addSignsExits(PassageSigns::findLabel($value), $direction);	
									}
									
								}
								else {
									Log::error("Попутка установить признаки прохода для неизвестного направления");
								}
								break;
						}

					}
						
					$is_description = false;
					break;
	
				case 'ПРЕДМЕТЫ':
					$object_ids = explode(' ', $matches[1]);
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
					$is_description = false;
					break;
	

				case 'МОНСТРЫ':
					$object_ids = explode(' ', $matches[1]);
					foreach ($object_ids as $object) {
						$objects = explode('=', $object);
						if (count($objects) === 1) {
							$current_room->addMobs($objects[0]);
						} else {
							$object_id = $objects[0];
							$count = $objects[1];
							for ($i = 0; $i < $count; $i++) {
								$current_room->addMobs($object_id);
							}
						}
					}
					$is_description = false;
					break;
	
				default:
					if ($is_description) {
						$current_room->setDescription($current_room->getDescription() . ' ' . $matches[0] . ' ' . ($matches[1] ?? ''));
					}
					else {
						Log::error("Неизвестное свойство комнаты: " . $line);
					}
					break;
			}
		}
		fclose($file);
	}
}
