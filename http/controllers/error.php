<?php
class Error extends Controller{

    function __construct() {
        parent::__construct();
        $this->view->title="404 Not found";
        $this->view->render("error/index");
    }
    
}
?>
