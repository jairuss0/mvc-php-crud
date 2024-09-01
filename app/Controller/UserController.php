<?php

require_once CONFIG_PATH . 'config.php';
require_once MODEL_PATH . '/UserModel.php';


class UserController extends UserModel{

    public function index(){
        require_once VIEW_PATH . 'UserList.view.php';
    }

    public function viewUsers(){
        $users = $this->getUserList();
        echo json_encode($users);
        exit(); 
    }

    public function createUser(){
        $fname = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST,'dateBirth',FILTER_SANITIZE_SPECIAL_CHARS);

        if($this->insertUser($fname,$lname,$email,$dob)){
           
            echo json_encode(['result' => true, 'message' => 'Successfully Created User!','icon' => 'success', 'title' => 'Success!']);
        }
        else{

            echo json_encode(['result' => false, 'message' => 'Failed to create User!','icon' => 'error', 'title' => 'Something went wrong!']);
            
        }
        exit(); // stops executing any further code.
    }

    public function update(){
        $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST,'dateBirth',FILTER_SANITIZE_SPECIAL_CHARS);
        
        if($this->updateUser($id,$fname,$lname,$email,$dob)){
            $delete_response = array('result' => true, 'message' => 'Successfully Updated User!','icon' => 'success', 'title' => 'Success!');
            echo json_encode($delete_response);
        }
        else{
            $delete_response = array('result' => false, 'message' => 'Failed to update User!','icon' => 'error', 'title' => 'Something went wrong!');
            echo json_encode($delete_response);
        }
        exit();
    }

    public function removeUser(){
        $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS);
        
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

    public function userInfo(){
        $id = $_GET['id'];
        
        if($this->getUserById($id)){
            $user = $this->getUserById($id);
            $user['status'] = true;
        }
        else{
            $user['status'] = false;
        }
        echo json_encode($user);
        exit();
    }
}

?>