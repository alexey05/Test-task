<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class MissingControllerException
 */
class MissingControllerException extends XiagTestException {

    protected $messageTemplate = 'Controller class could not be found.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 404) {
        parent::__construct($message, $code);
    }
}