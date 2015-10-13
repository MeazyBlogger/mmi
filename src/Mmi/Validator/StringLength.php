<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2015 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Mmi\Validator;

/**
 * Walidator długość ciągu pomiędzy
 * 
 * @method self setFrom($from) ustawia od
 * @method integer getFrom() pobiera od
 * @method self setTo($to) ustawia do
 * @method integer getTo() pobiera do
 */
class StringLength extends ValidatorAbstract {

	/**
	 * Komunikat niedostatecznej długości
	 */
	const SHORT = 'Tekst jest zbyt krótki';

	/**
	 * Komunikat nadmiernej długości
	 */
	const LONG = 'Tekst jest zbyt długi';

	/**
	 * Ustawia opcje
	 * @param array $options
	 * @return self
	 */
	public function setOptions(array $options = [], $reset = false) {
		return $this->setFrom(current($options))
			->setTo(next($options));
	}

	/**
	 * Waliduje długość ciągu, długość zadana jest w opcjach (przy konstruktorze)
	 * w tabeli postaci array(minimum, maksimum)
	 * @param string $value
	 * @return boolean
	 */
	public function isValid($value) {
		//za krótki
		if (mb_strlen($value) < $this->getFrom()) {
			return $this->_error(self::SHORT);
		}
		//za długi
		if (mb_strlen($value) > $this->getTo()) {
			return $this->_error(self::LONG);
		}
		return true;
	}

}
