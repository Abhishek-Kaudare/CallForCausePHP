<?php
// Load Config

require_once 'config/config.php';
// require_once 'config/gpConfig.php';

// Load Helpers
require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';


require_once 'libraries/Core.php';
require_once 'libraries/Database.php';
require_once 'libraries/Controller.php';


// Autoload Core Classes
// spl_autoload_register(function ($className) {
//     require_once 'libraries/' . $className . '.php';
// });
