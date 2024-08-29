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

echo 'route: ' . $action;

// basic routing

switch($action){
    case 'create':
         echo 'add test'; 
        break;
    default:
        $controller->viewList();
        break;
}


/*
<td><?= $user['UserID'] ?></td>
                            <td><?= $user['FirstName'] ?></td>
                            <td><?= $user['LastName'] ?></td>
                            <td><?= $user['Email'] ?></td>
                            <td><?= $user['DateOfBirth'] ?></td>
                            <td><button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
*/
?>