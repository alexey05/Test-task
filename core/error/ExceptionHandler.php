<?php

namespace XiagTest\core\error;

/**
 * Class ExceptionHandler
 * base class for handling exceptions
 *
 * @package XiagTest\core\error
 */
class ExceptionHandler {

    /**
     * handles all thrown exceptions
     *
     * @param \Exception $exception
     */
    public static function handleException(\Exception $exception) {
        echo $exception->getMessage();
        die();
    }
}