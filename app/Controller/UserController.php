<?php

require_once '../app/Model/UserModel.php';


class UserController extends UserModel{

    public function viewList(){
        
        include '../app/Views/UserList.view.php';
    }
}

?>