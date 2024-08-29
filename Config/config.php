<?php

// define path constants


if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__));  // Define ROOT if not already defined
}

define('APP_PATH', ROOT . '/app/');
define('CONTROLLER_PATH', APP_PATH . 'Controller/');
define('MODEL_PATH', APP_PATH . 'Model/');
define('VIEW_PATH', APP_PATH . 'Views/');
define('PUBLIC_PATH', ROOT . '/public/');





?>