<?php

require_once './Config/database.php';


class UserModel{
    private $db_connection;
    
    public function __construct()
    {
        $this->db_connection = new Database();
    }


}


?>