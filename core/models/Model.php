<?php

namespace XiagTest\core\models;

use XiagTest\core\models\pdo\PdoSource;

/**
 * Class Model
 * Base functionality for models, such as DB connetions, 'find' methods etc.
 *
 * @package XiagTest\core\models
 */
class Model implements IModel {

    public $dbConfig = 'default';

    /**
     * @var object PDO
     */
    protected $connection;

    /**
     * __construct
     */
    public function __construct() {
        $pdo = $this->getPdo();
        $this->connection = $pdo::getConnection();
    }

    /**
     * executes sql query like SELECT
     *
     * @param string $query  query string
     * @param array  $params
     * @return mixed
     */
    public function find($query, $params = array()) {
        $pdo_statement = $this->connection->prepare($query);
        $pdo_statement->execute($params);
        $result = $pdo_statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * creates a row in database table
     *
     * @param string $query
     * @param array  $params
     * @return boolean
     */
    public function create($query, $params = array()) {
        $pdo_statement = $this->connection->prepare($query);
        $result = $pdo_statement->execute($params);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * gets PDO object
     */
    public function getPdo() {
        return PdoSource::getInstance($this->dbConfig);
    }
}