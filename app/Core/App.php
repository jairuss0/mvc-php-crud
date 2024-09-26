<?php

namespace Core;


class App{

    private $routes = [
        '/mvc-crud/Public/' => ['UserController', 'index'],
        '/mvc-crud/Public/home' => ['UserController', 'index'],
        '/mvc-crud/Public/users/load' => ['UserController', 'viewUsers'],
        '/mvc-crud/Public/users/add' => ['UserController', 'createUser'],
        '/mvc-crud/Public/users/show' => ['UserController', 'userInfo'],
        '/mvc-crud/Public/users/edit' => ['UserController', 'update'],
        '/mvc-crud/Public/users/delete' => ['UserController', 'removeUser'],
    ];

    function __construct()
    {
       
        // get the sanitized url 
        $request = trim($_SERVER['REQUEST_URI']);
        
        
        // check if request url exist in the array of routes key
        if (array_key_exists($request, $this->routes)) {
           
            // get the controller key array value 
            $controller = $this->routes[$request][0];
            // get the method key array value
            $method = $this->routes[$request][1];

            // check if the controller file exist
            if (file_exists(  '../app/Controller/' . $controller . '.php')) {
                // require so instantiation is valid
                require  '../app/Controller/' . $controller . '.php';
                // instantiate a class from the controller variable 
                //since it is a valid controller file
                $class = new $controller();
                // check if the controller class method is valid
                if (method_exists($controller, $method)) {
                    
                    $class->$method();
                    exit;
                }
            }
            
           
        }

        
    }

}

?>