<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class account extends Controller {

    function __construct() {
        
        parent::__construct();
        
    }
    public function modifyPassword(){
        if ($_POST){
            $Obj = new accountModel();
            if ($Obj->modifyPassword($_POST)){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo json_encode(array("code"=>0,"message"=>"Problem Occur"));
        }
    }
    public function getUserDetails($e){
    $object  = new accountModel();
    	echo json_encode($object->getUsers($e[2]));
    }
    public function viewUsers(){
    	$object  = new accountModel();
    	$this->view->title = "View Users | "._COMPANY_NAME_;
    	$this->view->data  = $object->getUsers();
    	$this->view->stag  = "viewUsers";
    	$this->view->render('account/viewUsers');
    }
    public function viewGroups(){
    	$object  = new accountModel();
    	$this->view->title = "View Groups | "._COMPANY_NAME_;
    	$this->view->data  = $object->getGroups();
    	$this->view->stag  = "viewGroups";
    	$this->view->render('account/viewGroups');
    }
    
    public function addUser(){
    	if ($_POST){
    		$object = new accountModel();
    		$call = $object->addUser($_POST);
    		if ($call == true){
    			$this->view->message = "Successfully created the user";
    			$object->sendEmail($call,$_POST);
    		}else{
    			$this->view->message = "Problem Occur while creating user";
    		}
    	}
    	$this->view->title = "Add User | "._COMPANY_NAME_;
    	$this->view->stag = "addUser";
    	$this->view->render("account/addUser");
    }
    public function createGroup(){
    	$object = new accountModel();
    	if ($_POST){
    		//print_r($_POST);
    		$call = $object->createGroup($_POST);
    		if ($call == true){
    			$this->view->message = "Successfully created the Group";
    		}else{
    			$this->view->message = "Problem Occur while creating Group";
    		}
    	}
    	$this->view->users = $object->getUsers();
    	$this->view->title = "Add Group | "._COMPANY_NAME_;
    	$this->view->stag = "createGroup";
    	$this->view->render("account/createGroup");
    }
    public function viewUG(){
    	$object = new accountModel();
    	$this->view->title = "View Users & Groups | "._COMPANY_NAME_;
    	$this->view->tag   = "viewUG"; 
    	$this->view->userCount = $object->usersCount();
    	$this->view->groupCount = $object->groupCount();
    	//$this->view->data  = $object->getUsersGroups();
    	$this->view->render("account/viewUG");
    }	
    public function login() {
        if ($_POST){
            $Obj = new accountModel();
            $call = $Obj->doLogin($_POST);
            if (count($call[0]) >= 1){
                //set session
                $_SESSION['uid'] = $call[0]['uid'];
                $_SESSION['fullName'] = $call[0]['full_name'];
                $_SESSION['email'] = $call[0]['email_id'];
                $this->view->message = "Successfully login <script>window.location = '"._PATH_."';</script>";
            }
        }
        $this->view->title = "Login | "._COMPANY_NAME_;
        $this->view->tag = "login";
        $this->view->render("account/serviceLogin");
    }

    public function register() {
        if ($_POST){
            //process signup
            $Obj = new accountModel();
            if ($_POST['password'] == $_POST['re_password']){
                if ($Obj->register($_POST)){
                    $this->view->message = "Successfully Created Account. <script>window.location = '"._PATH_."account/login';</script> ";
                    
                }else{
                    $this->view->message = "Problem Occur while creating account.";
                }
            }else{
                $this->view->message = "Please Check the Re-typed Password and try again. ";
            }
        }
        $this->view->title = "Create an Account | "._COMPANY_NAME_;
        $this->view->tag = "login";
        $this->view->render("account/serviceSignup");
    }

   
    public function doLogin() {
       // @session_start();
        $output = array();
        $data = array();
        
        $data['email'] = $_POST['email'];
        $data['pass'] = sha1($_POST['password']);
        
        $actionDb = $this->getModel();
        $query = $actionDb->doLogin($data);
        
        if ($query == true) {
            if (@$query[0]['userImage']){
                @$userImage = $query[0]['userImage'];
            }else{
                if (@$query[0]['gender'] == 'm'){
                    $userImage = _PATH_."public/img/male.png";
                }else if (@$query[0]['gender'] == 'f'){
                    $userImage = _PATH_."public/img/female.png";
                }else{
                    $userImage = _PATH_."public/img/other.png";
                }
            }
            $userFullName   = $query[0]['first_name']." ".$query[0]['middle_name']." ".$query[0]['last_name'];
            @$userEmail      = $query[0]['email'];
            //set the sessions
            $_SESSION['user_status']        = 1;
            $_SESSION['userImage']          = $userImage;
            $_SESSION['userFullName']       = $userFullName;
            $_SESSION['userEmail']          = $userEmail;
            $_SESSION['uid']		    = $query[0]['uid'];
            $_SESSION['user_type']	    = $query[0]['user_type'];
            $output["code"] = 1;
            $output['message'] = "Successfully Login";
        } else {
            $output["result"] = "#ERROR";
            $output['code'] = 0;
            $output['message'] = 'Problem Occurs';
        }
        //header("Content-type: text/json");
        //print the out to the page
        echo json_encode($output);
        //print_r($_SESSION);
    }

    public function getModel() {
        return new accountModel();
    }
    public function logout(){
        //destroy 
        //@session_start();
        session_destroy();
       echo "Session Successfully Cleared. <br> Account Successfully Logout <br> Redirecting.. <script>window.location = '"._PATH_."';</script>";
       // header("Location: "._PATH_);
    }
    public function editProfile(){
        $this->view->title= "Edit Profile | PotpieTransport";
        $this->view->render("profile/edit");
    }
    
    }

?>