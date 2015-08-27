<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class NotFoundException
 */
class NotFoundException extends XiagTestException {

    protected $messageTemplate = 'Page not found.';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 404) {
        parent::__construct($message, $code);
    }
}