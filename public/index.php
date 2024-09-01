<?php

// entry point
define('ROOT', dirname(__DIR__));  // This sets ROOT to the parent directory of 'public'
define('CONFIG_PATH', ROOT . '/Config/');  // This sets CONFIG_PATH to the 'Config' folder

// Include the config file
require_once CONFIG_PATH . 'config.php';
require_once CONTROLLER_PATH . 'UserController.php';


// instantiate controller
$controller = new UserController();

// if action is set - value itself otherwise index for default
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$requestMethod  = $_SERVER['REQUEST_METHOD'];


// basic routing

switch($action){
    
    case 'create':
         $controller->createUser();
        break;
    case 'edit':
        $controller->userInfo();
        break;
    case 'update':
        $controller->update();
        break;        
    case 'delete':
        $controller->removeUser();   
    case 'view':
        $controller->viewUsers();     
    default:
        $controller->index();
        break;
}



?>