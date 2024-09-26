<?php

namespace Core;

class Controller{
    

    protected function loadView($view,$data = []){
        include_once "../app/Views/{$view}.php";
      
    }

}



?>