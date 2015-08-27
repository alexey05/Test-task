<?php

namespace XiagTest\app\config;

use XiagTest\core\routing\Router;

// set our routes here
Router::connect('/', array('controller' => 'ShortUrl', 'action' => 'index'));
Router::connect('r', array('controller' => 'ShortUrl', 'action' => 'r'));