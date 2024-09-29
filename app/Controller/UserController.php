<?php


use Model\UserModel;
use Core\Controller;


class UserController extends Controller{

    private $userModel;

    function __construct()
    {
        // instantiate model class
        $this->userModel = new UserModel();
    }

    public function index(){
        
        $this->loadView('home');
        
    }

    public function viewUsers(){
        $users = $this->userModel->getUserList();
        echo json_encode($users);
        exit(); 
    }

    public function createUser(){
        $fname = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST,'dateBirth',FILTER_SANITIZE_SPECIAL_CHARS);

        if($this->userModel->insertUser($fname,$lname,$email,$dob)){
           
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
        
        if($this->userModel->updateUser($id,$fname,$lname,$email,$dob)){
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
        
        if($this->userModel->deleteUser($id)){
            
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
        $id = $_POST['id'];
        
        if($this->userModel->getUserById($id)){
            $user = $this->userModel->getUserById($id);
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