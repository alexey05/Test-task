<?php
if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if(!defined('ROOT')) {
    define('ROOT', dirname(dirname(__FILE__)));
}

if(!defined('APP')) {
    define('APP', 'app');
}

require_once '../autoload.php';
require_once '../core/config/bootstrap.php';

$Dispatcher = new \XiagTest\core\routing\Dispatcher();
$Dispatcher->dispatch();