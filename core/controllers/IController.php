<?php

namespace XiagTest\core\controllers;

/**
 * Interface IController
 * Interface for all controllers. 'C' part in MVC
 *
 * @package XiagTest\core\controllers
 */
interface IController {

    /**
     * @param string $url
     */
    public function redirect($url);
}