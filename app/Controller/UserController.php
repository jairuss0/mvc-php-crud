<?php

require_once CONFIG_PATH . 'config.php';
require_once MODEL_PATH . '/UserModel.php';


class UserController extends UserModel{


    public function viewList(){
        $stmt = $this->getUserList();
        $message = "";
        require VIEW_PATH . 'UserList.view.php';
    }

    public function addUser(){

    }
}

?>