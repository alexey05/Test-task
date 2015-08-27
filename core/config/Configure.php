<?php

namespace XiagTest\core\config;

/**
 * Class Configure
 * reading and writing information that cab be used while script is running
 *
 * @package XiagTest\core\config
 */
class Configure {

    protected static $values = array(
        'debug' => 0
    );

    /**
     * writes information that cab be used while script is running
     *
     * @param $var   string key to write
     * @param $value string value of a parameter
     */
    public static function write($var, $value) {
        self::$values[$var] = $value;
        // it shouldn't be here, but for simplicity's sake I won't write any custom error handlers just for this line
        if(!self::$values['debug']) {
            error_reporting(0);
        }
    }

    /**
     * reads info that was saved before
     *
     * @param string $var variable that should be obtained
     * @return mixed
     */
    public static function read($var = null) {
        if($var === null) {
            return self::$values;
        } elseif(!isset(self::$values[$var])) {
            return null;
        }
        return self::$values[$var];
    }
}