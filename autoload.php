<?php

namespace XiagTest;

/**
 * Class Autoloader
 * simple implementation of autoloading with namespaces
 *
 * @package XiagTest
 */
class Autoloader {

    /**
     * loads classes
     *
     * @param string $class class being loaded
     */
    public static function autoload($class) {
        $folders = explode('\\', $class);
        unset($folders[0]);
        $file_name = implode('/', $folders) . '.php';
        if(file_exists(ROOT . DS . $file_name)) {
            require_once ROOT . DS . $file_name;
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\Autoloader::autoload');