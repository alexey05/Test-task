<?php

namespace XiagTest\core\models;

/**
 * Interface IModel
 * Interface for all models. 'M' part in MVC
 *
 * @package XiagTest\core\models
 */
interface IModel {

    /**
     * @param string $query
     * @param array  $params
     * @return mixed
     */
    public function find($query, $params);

    /**
     * @param string $query
     * @param array  $params
     * @return mixed
     */
    public function create($query, $params);

    /**
     * @return mixed
     */
    public function getPdo();
}