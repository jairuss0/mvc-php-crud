<?php

namespace Model;

use Core\Model;
use \PDO;
use \PDOException;

class UserModel extends Model{
    
    //fetch users
    public function getUserList(){
        try{
            $sql = "SELECT * from user_tb";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }

    // get user by id
    public function getUserById($id){
        try{
            $sql = "SELECT * from user_tb WHERE UserID = ? limit 1";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
           
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
       
    }

    // insert user
    public function insertUser($firstName,$lastName,$email,$dob){
        try{
            $sql = "INSERT INTO user_tb (FirstName,LastName,Email,DateOfBirth) VALUES(?,?,?,?)";
            $stmt = $this->connection()->prepare($sql);
            return $stmt->execute([$firstName,$lastName,$email,$dob]);
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }

    // update user
    public function updateUser($id,$firstName,$lastName,$email,$dob){
        try{
           
            $sql = "UPDATE user_tb SET FirstName=?,LastName=?,Email=?,DateOfBirth=? WHERE UserID = ?";
            $stmt = $this->connection()->prepare($sql);
            return $stmt->execute([$firstName,$lastName,$email,$dob,$id]);
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
        
    }

    // delete user
    public function deleteUser($id){
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