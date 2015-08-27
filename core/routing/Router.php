<?php

namespace XiagTest\core\routing;

use XiagTest\core\error\exceptions\BadRequestException;

/**
 * Class Router
 * Parses URL into controller and action
 *
 * @package XiagTest\core\routing
 */
class Router {

    /**
     * @var array
     */
    public static $routes = array();

    /**
     * @var array route parameters
     */
    public static $httpParams = array();

    /**
     * connects a route in the router, for ex.
     * Router::connect('/', array('controller' => 'pages', 'action' => 'index'))
     *
     * @param string $route      URL
     * @param array  $parameters parameters such as controller, action
     */
    public static function connect($route, $parameters) {
        self::$routes[$route] = $parameters;
    }

    /**
     * parses URL
     *
     * @throws BadRequestException
     */
    public static function parse() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri_length = strlen($uri);
        if(!$uri_length || $uri_length === 1) {
            self::fillParams('/');
        } else {
            $parts = array_filter(explode('/', $uri));
            if($parts) {
                $route_key = array_shift($parts);
                self::fillParams($route_key, $parts);
            } else {
                throw new BadRequestException();
            }
        }
    }

    /**
     * gets route parameters
     * @return array
     */
    public static function getHttpParams() {
        return self::$httpParams;
    }

    /**
     * converts underscored string to a string with camelCase
     *
     * @param string $scored
     * @return string
     */
    public static function camelize($scored) {
        return implode('', array_map('ucfirst', array_map('strtolower', explode('_', $scored))));
    }

    /**
     * converts camelCase string to underscored
     *
     * @param $cameled
     * @return string
     */
    public static function underscore($cameled) {
        return implode('_', array_map('strtolower', preg_split('/([A-Z]{1}[^A-Z]*)/', $cameled, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY)));
    }

    /**
     * fills route parameters with keys: controller, action and passed
     *
     * @param string $controller_key
     * @param array  $passed
     * @throws BadRequestException
     */
    private static function fillParams($controller_key, $passed = array()) {
        $camelized_key = self::camelize($controller_key);
        if(array_key_exists($controller_key, self::$routes)) {
            self::$httpParams['controller'] = self::$routes[$controller_key]['controller'];
            self::$httpParams['action'] = self::$routes[$controller_key]['action'];
            self::$httpParams['passed'] = $passed;
        } elseif($controller_key != '/') {
            self::$httpParams['controller'] = $camelized_key;
            $action = array_shift($passed);
            self::$httpParams['action'] = empty($action) ? 'index' : $action;
            self::$httpParams['passed'] = $passed;
        } else {
            throw new BadRequestException();
        }
        if(!isset(self::$httpParams['method'])) {
            self::$httpParams['method'] = $_SERVER['REQUEST_METHOD'];
        }
        if(!isset(self::$httpParams['data'])) {
            self::$httpParams['data'] = $_REQUEST;
        }
        self::$httpParams['requested_controller'] = self::underscore(self::$httpParams['controller']);
    }
}