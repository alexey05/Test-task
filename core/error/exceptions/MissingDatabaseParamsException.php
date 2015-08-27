<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class MissingDatabaseParamsException
 *
 * @package XiagTest\core\error\exceptions
 */
class MissingDatabaseParamsException extends XiagTestException {

    protected $messageTemplate = 'Parameters for database connection could not be found.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 500) {
        parent::__construct($message, $code);
    }
}