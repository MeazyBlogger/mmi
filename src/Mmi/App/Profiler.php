<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2015 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Mmi\App;
use \Mmi\Log\LoggerHelper;
use \Monolog\Logger;

/**
 * Klasa profilera aplikacji
 */
class Profiler {

	/**
	 * Dane profilera
	 * @var array
	 */
	protected static $_data = [];

	/**
	 * Licznik
	 * @var int
	 */
	protected static $_counter = 0;

	/**
	 * Licznik czasu
	 * @var int
	 */
	protected static $_elapsed = 0;
	
	/**
	 * Odcisk wywołania
	 * @var string
	 */
	protected static $_runtimeStamp;

	/**
	 * Dodaje zdarzenie
	 * @param string $name nazwa
	 * @param string $elapsed opcjonalnie czas operacji
	 */
	public static function event($name, $elapsed = null) {
		//profiler wyłączony
		if (LoggerHelper::getLevel() != Logger::DEBUG) {
			return;
		}
		//znacznik czasu
		$time = microtime(true);
		//obliczanie timestampu uruchomienia
		self::$_runtimeStamp = !self::$_runtimeStamp ? substr(md5($time . rand(0, 10000)), 6, 6) : self::$_runtimeStamp;
		if ($elapsed === null && static::$_counter > 0) {
			$elapsed = $time - static::$_data[static::$_counter - 1]['time'];
		} elseif ($elapsed === null) {
			$elapsed = 0;
		}
		static::$_data[static::$_counter] = [
			'name' => $name,
			'time' => $time,
			'elapsed' => $elapsed,
		];
		LoggerHelper::getLogger()->addDebug('{' . self::$_runtimeStamp . '} (' . number_format($elapsed, 6) . 's) ' . $name);
		static::$_elapsed += $elapsed;
		static::$_counter++;
	}

	/**
	 * Pobiera dane z profilera
	 * @return array
	 */
	public static final function get() {
		//iteracja po danych
		foreach (static::$_data as $key => $item) {
			if (static::$_elapsed == 0) {
				static::$_data[$key]['percent'] = 0;
				continue;
			}
			static::$_data[$key]['percent'] = 100 * $item['elapsed'] / static::$_elapsed;
		}
		return static::$_data;
	}
	
	/**
	 * Zwraca ilość zdarzeń w profilerze
	 * @return int
	 */
	public static final function count() {
		return static::$_counter;
	}

	/**
	 * Pobiera sumaryczny czas wszystkich zdarzeń
	 * @return int
	 */
	public static final function elapsed() {
		return static::$_elapsed;
	}

}
