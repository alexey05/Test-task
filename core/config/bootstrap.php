<?php
/**
 * some common configuration for the application is set here
 */

namespace XiagTest\core\config;

// error reporting by default
error_reporting(E_ALL & ~E_DEPRECATED);

// set our own exception handler
set_exception_handler('XiagTest\core\error\ExceptionHandler::handleException');

require_once ROOT . DS . APP . DS . 'config' . DS . 'bootstrap.php';