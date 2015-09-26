<?php

/**
 * Mmi Framework (https://code.google.com/p/mmicms/)
 * 
 * @link       https://code.google.com/p/mmicms/
 * @copyright  Copyright (c) 2010-2014 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Mmi\Mvc;

use Monolog\Logger;

/**
 * Klasa wyjątku nieodnalezionego kontrolera
 */
class NotFoundException extends Exception {

	/**
	 * Poziom logowania
	 * @var integer
	 */
	protected $code = Logger::INFO;

}
