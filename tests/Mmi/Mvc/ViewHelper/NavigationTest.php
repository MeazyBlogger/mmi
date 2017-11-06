<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2017 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://en.wikipedia.org/wiki/BSD_licenses New BSD License
 */

namespace Mmi\Test\Mvc\ViewHelper;

use Mmi\Mvc\ViewHelper\Navigation;

class NavigationTest extends \PHPUnit\Framework\TestCase
{

    public function testClass()
    {
        $nav = new Navigation;
        $this->assertEquals('', $nav->breadcrumbs());
        Navigation::setNavigation(new \Mmi\Navigation\Navigation(new \Mmi\Navigation\NavigationConfig));
        $this->assertEquals('', $nav->breadcrumbs());
        $nav->appendBreadcrumb('test', 'testu', 'testt', 'testd');
        $nav->appendBreadcrumb('test', 'testu', 'testt', 'testd');
        $nav->createBreadcrumb('test', 'testu', 'testt', 'testd', true);
        $this->assertEquals('<span>test</span>', $nav->breadcrumbs());
    }

}
