<?php

require_once CONFIG_PATH . 'config.php';
require_once MODEL_PATH . '/UserModel.php';


class UserController extends UserModel{


    public function viewList(){
        $stmt = $this->getUserList();
        $message = "";
        require VIEW_PATH . 'UserList.view.php';
    }

    public function createUser(){
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $dob = $_POST['dateBirth'];

        if($this->insertUser($fname,$lname,$email,$dob)){
           
            echo json_encode(['result' => true, 'message' => 'Successfully Created User!','icon' => 'success', 'title' => 'Success!']);
        }
        else{

            echo json_encode(['result' => false, 'message' => 'Failed to create User!','icon' => 'error', 'title' => 'Something went wrong!']);
            
        }
        exit(); // stops executing any further code.
    }

    public function findUserbyId(){

    }

    public function removeUser(){
        $id = $_POST['id'];
        
        if($this->deleteUser($id)){
            
            $delete_response = array('result' => true, 'message' => 'Successfully Deleted User!','icon' => 'success', 'title' => 'Success!');
            echo json_encode($delete_response);
        }
        else{
            $delete_response = array('result' => false, 'message' => 'Failed to delete User!','icon' => 'error', 'title' => 'Something went wrong!');
            echo json_encode($delete_response);
        }
        exit(); // stops executing any further code.
        
    }
}

?>