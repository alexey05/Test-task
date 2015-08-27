<?php

namespace XiagTest\core\models\pdo;

use XiagTest\app\config\database,
    XiagTest\core\error\exceptions;

/**
 * Class PdoSource
 * Connection to database
 *
 * @package XiagTest\core\models\pdo
 */
final class PdoSource {

    private static $instance;

    /**
     * @var array parameters for database connection
     */
    private static $dbParams;

    /**
     * @var string database config name
     */
    private static $dbConfig;

    /**
     * @var object PDO connection
     */
    private static $connection;

    /**
     * __construct
     *
     * @param $dbConfig
     */
    private function __construct($dbConfig) {
        self::$dbConfig = $dbConfig;
        self::setDbParams();
        self::setConnection();
    }

    /**
     * forbid all actions with this object
     */
    private function __clone() {
    }

    private function __sleep() {
    }

    private function __wakeup() {
    }

    /**
     * gets an instance of PdoSource
     *
     * @param string $dbConfig config name
     * @return PdoSource
     */
    public static function getInstance($dbConfig) {
        if(!(self::$instance instanceof self)) {
            self::$instance = new self($dbConfig);
        }
        return self::$instance;
    }

    /**
     * gets PDO connection object
     */
    public static function getConnection() {
        return self::$connection;
    }

    /**
     * sets parameters for database connection
     */
    private function setDbParams() {
        $config_name = self::$dbConfig;
        if(!isset(database::$$config_name)) {
            throw new exceptions\MissingDatabaseParamsException();
        }
        self::$dbParams = database::$$config_name;
    }

    private function setConnection() {
        $dsn = 'mysql:dbname=' . self::$dbParams['database'] . ';host=' . self::$dbParams['host'];
        try {
            self::$connection = new \PDO($dsn, self::$dbParams['login'], self::$dbParams['password']);
        } catch(\Exception $e) {
            throw new exceptions\MissingDatabaseException();
        }
    }
}