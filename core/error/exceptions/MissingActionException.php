<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class MissingActionException
 */
class MissingActionException extends XiagTestException {

    protected $messageTemplate = 'Action could not be found.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 404) {
        parent::__construct($message, $code);
    }
}