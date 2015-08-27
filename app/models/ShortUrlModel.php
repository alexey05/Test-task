<?php

namespace XiagTest\app\models;

use XiagTest\core\models\Model;

/**
 * Class ShortUrlModel
 *
 * @package XiagTest\app\models
 */
class ShortUrlModel extends Model {

    /**
     * validates a long URL from user's input
     *
     * @param $long_url
     * @return boolean
     */
    public function validateEntry($long_url) {
        if(!preg_match('/https?:\/\/.+/i', $long_url)) {
            return false;
        }
        return true;
    }
}