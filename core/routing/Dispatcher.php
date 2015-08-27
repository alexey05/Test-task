<?php

namespace XiagTest\core\routing;

use XiagTest\core\error\exceptions,
    XiagTest\app\controllers,
    XiagTest\core\views\View;

/**
 * Class Dispatcher
 */
class Dispatcher {

    /**
     * invokes controllers and renders view
     */
    public function dispatch() {
        Router::parse();
        $http_params = Router::getHttpParams();
        $controller_class_name = 'XiagTest\app\controllers\\' . $http_params['controller'] . 'Controller';
        if(!class_exists($controller_class_name)) {
            throw new exceptions\MissingControllerException();
        }
        $reflection_class = new \ReflectionClass($controller_class_name);
        // all methods that are included into Controller class can not be accessed through URL
        $parent_controller_reflection = new \ReflectionClass('XiagTest\core\controllers\Controller');
        if(!$reflection_class->hasMethod($http_params['action']) || $parent_controller_reflection->hasMethod($http_params['action'])) {
            throw new exceptions\MissingActionException();
        }
        $controller = new $controller_class_name($http_params);
        $controller->{$http_params['action']}();
        $view = new View($controller->getViewVars());
        $render_file_path = false;
        if(!empty($controller->autoRender)) {
            $render_file_path = $http_params['requested_controller'] . DS . $http_params['action'];
        }
        $view->render($render_file_path);
        $this->stop();
    }

    /**
     * stops the application
     */
    private function stop() {
        die();
    }
}