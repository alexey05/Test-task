<?php

namespace XiagTest\core\error\exceptions;

/**
 * Class XiagTestException
 * This is a base class for all internal exceptions
 */
class XiagTestException extends \Exception {

    protected $messageTemplate = '';

    /**
     * @param string $message error message
     * @param int    $code    error code
     */
    public function __construct($message = '', $code = 500) {
        if(empty($message)) {
            $message = $this->messageTemplate;
        }
        parent::__construct($message, $code);
    }
}