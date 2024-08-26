<?php

class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "users_database";
    private $conn;

    protected function connection(){
        try{
            // data source name
            $db = "mysql:host=".$this->host.";dbname=".$this->dbname;
            // create pdo instance
            $this->conn = new PDO($db,$this->user,$this->password);
            // pdo query
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

            

        }catch(PDOException $e){
            echo "Database connection Error! ".$e->getMessage();
        }

        return $this->conn;
    }
}


?>