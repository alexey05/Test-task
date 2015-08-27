<?php

namespace XiagTest\core\views;

/**
 * Interface IView
 * Interface for all views. 'V' part in MVC
 *
 * @package XiagTest\core\views
 */
interface IView {

    /**
     * @param string $file_path
     */
    public function render($file_path);
}