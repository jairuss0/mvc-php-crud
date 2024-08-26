<?php

require_once './Config/database.php';


class UserModel extends Database{
    
    

    //fetch users
    protected function getUserList(){
        try{
            $sql = "SELECT * from user_tb";
            $stmt = $this->connection()->prepare($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }

    // get user by id
    protected function getUserById($id){
        try{
            $sql = "SELECT * from user_tb WHERE UserID = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
       
    }


    // insert user
    protected function insertUser($name,$username,$email,$password){
        try{
            $hash_password = password_hash($password,PASSWORD_DEFAULT);

            $sql = "INSERT INTO user_tb (Username,Email,Password) VALUES(?,?,?)";
            $stmt = $this->connection()->prepare($sql);
            return $stmt->execute([$name,$username,$email,$hash_password]);

        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }

    // update user
    protected function updateUser($id,$username,$email,$password){
        try{
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $sql = "UPDATE user_tb SET Username=?,Email=?,Password=? WHERE UserID = ?";
            $stmt = $this->connection()->prepare($sql);
            return $stmt->execute([$username,$email,$hash_password,$id]);
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
        
    }

    // delete user
    protected function deleteUser($id){
        try{
            $sql ="DELETE from user_tb WHERE UserID = ?";
            $stmt = $this->connection()->prepare($sql);
            return $stmt->execute([$id]);
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }



    


}


?>