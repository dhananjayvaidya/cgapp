<?php 
require "http/models/Course.php";
class course extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function add(){
        if ($_POST){
            $CourseObj = new CourseModel();
            if ($CourseObj->add($_POST)){
                $this->view->message = "Successfully Created";
            }else{
                $this->view->message = "Problem Occur";
            }
        }
        $this->view->title = "Add Course | "._COMPANY_NAME_;
        $this->view->render("admin/course/add");
    }
    public function update(){
        echo "update function ";
    }
    public function delete(){
        echo "remove function";
    }
    public function view(){
        echo "View Function";
    }
}
?>