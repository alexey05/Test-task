<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class MissingDatabaseException
 */
class MissingDatabaseException extends XiagTestException {

    protected $messageTemplate = 'Database connection could not be found.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 500) {
        parent::__construct($message, $code);
    }
}