<?php

// entry point

require_once '../app/Controller/UserController.php';

// instantiate controller
$controller = new UserController();

// if action is set - value itself otherwise index for default
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

echo 'route: ' . $action;

// basic routing

switch($action){
    default:
        $controller->viewList();
        break;
}

?>