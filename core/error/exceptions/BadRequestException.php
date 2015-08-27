<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class BadRequestException
 */
class BadRequestException extends XiagTestException {

    protected $messageTemplate = 'Request can not be handled.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 500) {
        parent::__construct($message, $code);
    }
}