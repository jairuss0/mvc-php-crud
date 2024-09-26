<?php

namespace Core;


class App{

    private $routes = [
        '/mvc-crud/Public/' => ['UserController', 'index'],
        '/mvc-crud/Public/home' => ['UserController', 'index'],
        '/mvc-crud/Public/users/load' => ['UserController', 'viewUsers'],
        '/mvc-crud/Public/users/add' => ['UserController', 'createUser'],
        '/mvc-crud/Public/users/show' => ['UserController', 'userInfo'],
        '/mvc-crud/Public/users/edit' => ['UserController', 'removeUser'],
        '/mvc-crud/Public/users/delete' => ['UserController', 'index'],
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

            if (file_exists(  '../app/Controller/' . $controller . '.php')) {
                require  '../app/Controller/' . $controller . '.php';
                
                $class = new $controller();
                if (method_exists($controller, $method)) {
                    
                    $class->$method();
                    exit;
                }
            }
            
           
        }

        
    }

}

?>