<?php

namespace XiagTest\app\config;

use XiagTest\core\config\Configure;

/**
 * any user's configuration and settings should be set in this file
 */

// set debug to 1 during debugging and to 0 in production mode
Configure::write('debug', 0);

require_once 'routes.php';