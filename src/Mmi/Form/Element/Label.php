<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2017 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Mmi\Form\Element;

/**
 * Element label
 */
class Label extends ElementAbstract
{

    /**
     * Konstruktor usuwa labelpostfix
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->setLabelPostfix('');
    }

    /**
     * Buduje pole
     * @return string
     */
    public function fetchField()
    {
        return '';
    }

}
