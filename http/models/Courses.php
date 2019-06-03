<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class CourseModel extends DB {

    function __construct() {
    	//@session_start();
        parent::__construct(_DNS_, _USER_, _PASS_);
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