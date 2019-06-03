<?php

class home extends Controller{
    function __construct() {
        //@session_start();
	parent::__construct();
    }
    function first(){
    //print_r($_SESSION);
        if (@$_SESSION['uid']){
        		
			$this->view->title = "Dashboard | "._COMPANY_NAME_;
			$this->view->render("index/dashboard");
			
		}else{
			$this->view->title="123Welcome to "._COMPANY_NAME_;
			$this->view->render("index/index");
			
		}
	}
}
?>