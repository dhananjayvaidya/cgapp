<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CourseModel extends DB {
    public $TableName = "courses";
    public $Schema = array(
        'id'            => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "primary_key" => true,
            'auto_increment' => true
        ),
        "course_name"      => array(
            "dataType"=>"string", 
            "dataSize"=>255, 
            "not_null"=>true
        ),
        "course_desc"      => array(
            "dataType"=>"string", 
            "dataSize"=>255, 
            "not_null"=>true
        ),
        "status"     => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "start_date"     => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "end_date" => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "timestamp" => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "mod_timestamp" => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        ),
        "etms"          => array(
            "dataType"=>"int", 
            "dataSize"=>11, 
            "not_null"=>true,
            "default" => 0
        )
    );
    function __construct() {
    	//@session_start();
        parent::__construct($this);
    }
    public function add($data){
        $state = "INSERT INTO `courses`( 
                        `course_name`, 
                        `course_desc`, 
                        `status`, 
                        `start_date`, 
                        `end_date`,
                        `timestamp`, 
                        `mod_timestamp`
                    ) VALUES (
                        '".$data['course_name']."', 
                        '".$data['course_desc']."', 
                        '".$data['status']."', 
                        '".$data['start_date']."', 
                        '".$data['end_date']."',
                        '".time()."', 
                        '".time()."'
                    )";
        //echo $state;
        $query = $this->prepare($state);
        return $query->execute();
    } 
    public function remove($id){
        $state = "DELETE FROM `courses` WHERE `id` = '".$id."'";
        $query = $this->prepare($state);
        return $query->execute();
    }
    public function update($data){
        $state = "UPDATE `courses` SET 
                    `course_name`   = '".$data['course_name']."',
                    `course_desc`   = '".$data['course_desc']."',
                    `status`        = '".$data['status']."',
                    `start_date`    = '".$data['start_date']."',
                    `end_date`      = '".$data['end_date']."',
                    `timestamp`     = '".time()."',
                    `mod_timestamp` = '".time()."' 
                WHERE 
                    `id` = '".$data['id']."'
                ";
        $query = $this->prepare($state);
        return $query->execute();
    } 
    public function getById($id){
        $state = "SELECT * FROM `courses` WHERE `id` = '".$id."'";
        $query = $this->prepare($state);
        return $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll(){
        $state = "SELECT * FROM `courses`";
        $query = $this->prepare($state);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>