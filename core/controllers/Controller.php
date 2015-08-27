<?php

namespace XiagTest\core\controllers;

use XiagTest\core\models;

/**
 * Class Controller
 * Base functionality for controllers
 *
 * @package XiagTest\core\controllers
 */
class Controller implements IController {

    /**
     * @var array request params
     */
    public $request;

    /**
     * @var
     */
    public $autoRender = true;

    /**
     * @var array variables for view
     */
    protected $viewVars = array();

    /**
     * __construct
     *
     * @param array $request http parameters
     */
    public function __construct($request) {
        $this->request = $request;
        // load model as a class property
        $model_class_name = 'XiagTest\app\models\\' . $request['controller'] . 'Model';
        if(class_exists($model_class_name)) {
            $this->{$request['controller']} = new $model_class_name();
        }
    }

    /**
     * gets variables for view
     */
    public function getViewVars() {
        return $this->viewVars;
    }

    /**
     * sets variables that will be used in view
     *
     * @param string $var_name name of variable to be set
     * @param mixed  $value    value of variable to be set
     */
    protected function set($var_name, $value) {
        $this->viewVars[$var_name] = $value;
    }

    /**
     * redirects a user to a specific url
     *
     * @param string $url url where to redirect
     */
    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}