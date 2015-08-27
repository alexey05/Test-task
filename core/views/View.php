<?php

namespace XiagTest\core\views;

/**
 * Class View
 * Base functionality for views
 *
 * @package XiagTest\core\views
 */
class View implements IView {

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $viewVars = array();

    public function __construct($viewVars) {
        $this->viewVars = $viewVars;
    }

    /**
     * renders view
     *
     * @param string $file_path
     */
    public function render($file_path) {
        if($file_path) {
            $this->path = $file_path;
            $this->getContent('../' . APP . '/views/layouts/default.tpl');
        } else {
            echo json_encode($this->viewVars);
        }
    }

    /**
     * gets content for particular controller's action that will be included into layout
     */
    public function fetchContent() {
        $this->getContent('../' . APP . '/views/' . $this->path . '.tpl');
    }

    /**
     * outputs html files
     *
     * @param string $path
     */
    protected function getContent($path) {
        extract($this->viewVars);
        ob_start();

        include $path;

        echo ob_get_clean();
    }
}