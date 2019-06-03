<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class accountModel extends DB {

    function __construct() {
    	//@session_start();
        parent::__construct(_DNS_, _USER_, _PASS_);
    }
    public function modifyPassword($data){
        $state = "UPDATE `login` SET `password` = :password , `pre_password_change` = 1 WHERE `id` = :uid AND `etms` = 0";
        $query = $this->prepare($state);
        return $query->execute(array(
            ":uid" => $data['uid'],
            ":password" => sha1($data['newPassword'])
        ));
    }
    public function isPasswordChanged(){
    	$state = "SELECT `pre_password_change` FROM `login` WHERE `id` = '".$_SESSION['uid']."'";
    	$query = $this->prepare($state);
    	$query->execute();
    	$d =  $query->fetchAll(PDO::FETCH_ASSOC);
    	//print_r($_SESSION);
        return @$d[0]['pre_password_change'];
    }
    public function usersCount(){
    	$state = "SELECT COUNT(`login`.`id`) AS `c` FROM `login`,`profile` WHERE `login`.`user_type` <> 'SUADMIN' AND `login`.`id`=`profile`.`uid` AND `login`.`etms` = 0";
    	$query = $this->prepare($state);
    	$query->execute();
    	$d = $query->fetchAll(PDO::FETCH_ASSOC);
    	return ($d[0]['c'] ? $d[0]['c']:0);
    }
    public function groupCount(){
    	$state = "SELECT COUNT(`users_groups`.`id`) AS `c` FROM `users_groups` WHERE `etms` = 0";
    	$query = $this->prepare($state);
    	$query->execute();
    	$d = $query->fetchAll(PDO::FETCH_ASSOC);
    	return ($d[0]['c'] ? $d[0]['c'] : 0);
    }
    public function createGroup($data){
    	$state =  "INSERT INTO `users_groups` (
    		`group_name`,
    		`group_desc`,
    		`group_admin_id`,
    		`timestamp`,
    		`mod_timestamp`
    	) VALUES (
    		:group_name,
    		:group_desc,
    		:group_admin_id,
    		:timestamp,
    		:mod_timestamp
    	)";
    	$query = $this->prepare($state);
    	$query->execute(array(
    		":group_name"       => $data['group_name'],
    		":group_desc"       => $data['group_desc'],
    		":group_admin_id"   => $_SESSION['uid'],
    		":timestamp"        => time(),
    		":mod_timestamp"    => time()
    	));
    	$gid =  $this->lastInsertId();
    	foreach($data['user'] as $uid){
	    	$state1 = "INSERT INTO `users_groups_members` (
	    		`uid`,
	    		`gid`,
	    		`timestamp`,
	    		`mod_timestamp`
	    	) VALUES (
	    		:uid,
	    		:gid,
	    		:timestamp,
	    		:mod_timestamp
	    	)";
	    	$query1 = $this->prepare($state1);
	    	$query1->execute(array(
	    		":uid" => $uid,
	    		":gid" => $gid,
	    		":timestamp" => time(),
	    		":mod_timestamp"=>time()
	    	));
    	}
    	return $gid;
    }
    public function getUsers($uid = false){
    if ($uid){
    	$state = "SELECT * FROM `login`,`profile` WHERE `login`.`id` = `profile`.`uid` AND `login`.`id` = '".$uid."' AND `login`.`user_type` <> 'SUADMIN' AND `login`.`etms` = 0";
    }else{
    	$state = "SELECT * FROM `login`,`profile` WHERE `login`.`id` = `profile`.`uid` AND `login`.`user_type` <> 'SUADMIN' AND `login`.`etms` = 0 ORDER BY `login`.`mod_timestamp` DESC";
    }
    	$query = $this->prepare($state);
    	$query->execute();
    	return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGroups($gid = false){
    if ($gid){
    	$state = "SELECT * FROM `users_groups` WHERE `id` = '".$gid."' AND `etms` = 0";
    }else{
    	$state = "SELECT * FROM `users_groups` WHERE `etms` = 0 ORDER BY `mod_timestamp` DESC";
    }
    	$query = $this->prepare($state);
    	$query->execute();
    	return $query->fetchAll(PDO::FETCH_ASSOC);
    
    }
    public function addUser($d){
    //print_r($d);
    	$state = "INSERT INTO `login` (
    		`login`.`username` ,
    		`login`.`password`,
    		`login`.`user_type`,
    		`login`.`parent_id`,
    		`login`.`timestamp`,
    		`login`.`mod_timestamp`
    	) VALUES (
    		:username,
    		:password,
    		:user_type,
    		:parent_id,
    		:timestamp,
    		:mod_timestamp
    	)";
    	$query = $this->prepare($state);
    	$p = rand();
    	$query->execute(array(
    		":username" 	=> $d['username'],
    		":password"	=> sha1($p),
    		":user_type"	=> $d['user_type'],
    		":timestamp"	=> time(),
    		":mod_timestamp"=> time(),
    		":parent_id"	=> $_SESSION['uid']
    	));
    	$uid = $this->lastInsertId();
    	//profile insert 
    	$state1 = "INSERT INTO `profile` (
    		`profile`.`uid`,
    		`profile`.`first_name`,
    		`profile`.`middle_name`,
    		`profile`.`last_name`,
    		`profile`.`email_id`,
    		`profile`.`phone_number`,
    		`profile`.`timestamp`,
    		`profile`.`mod_timestamp`
    	) VALUES (
    		:uid,
    		:first_name,
    		:middle_name,
    		:last_name,
    		:email_id,
    		:phone_number,
    		:timestamp,
    		:mod_timestamp
    	)";
    	$query1 = $this->prepare($state1);
    	
    	$query1->execute(array(
    		":uid"			=> $uid,
    		":first_name"		=> $d['first_name'],
    		":middle_name"		=> $d['middle_name'],
    		":last_name"		=> $d['last_name'],
    		":email_id"		=> $d['email_id'],
    		":phone_number"		=> $d['phone_number'],
    		":timestamp"		=> time(),
    		":mod_timestamp"	=> time()
    	));
    	
    	//return the result
    	return $p;
    }
    public function register($data) {

        //set up the data 
        $email         = strtolower($data['email']);
        $password      = sha1($data['password']);
        $userType      = "WEBUSER";
        $accountStatus = 0;
        $fullName      = ucwords($data['full_name']);
        $phoneNumber   = $data['phone_number'];
        
        $state  = "INSERT INTO `login`(
                        `username`, 
                        `password`, 
                        `user_type`, 
                        `account_status`, 
                        `timestamp`, 
                        `mod_timestamp`
                     ) VALUES (
                        '".$email."',
                        '".$password."',
                        '".$userType."',
                        '".$accountStatus."',
                        '".time()."',
                        '".time()."'
                     )";
        $query = $this->prepare($state);
        $query->execute();
        
        $uid =  $this->lastInsertId();
    
        //profile
        $state = "INSERT INTO `profile`(
                            `uid`, 
                            `full_name`,
                            `email_id`, 
                            `phone_number`, 
                            `timestamp`, 
                            `mod_timestamp`
                        ) VALUES (
                            '".$uid."',
                            '".$fullName."',
                            '".$email."',
                            '".$phoneNumber."',
                            '".time()."',
                            '".time()."'
                        )";
        $query = $this->prepare($state);
        if ($query->execute() == true ){
            return true;
        }else{
            return false;
        }
        
        
    }

    /*
     * This function will send an verification email,
     */

    public function sendEmail($password,$d) {
        //@session_start();
        $rand = rand(0, 999999);
        $URL = _PATH_."account/verification/".$rand;
        
        // multiple recipients
        $to = $d['email_id']; // note the comma
        
        // subject
        $subject = 'Account Details- '._COMPANY_NAME_;

        // message
        $message = '
                <html>
                <head>
                  <title>Account Details - '._COMPANY_NAME_.'</title>
                </head>
                <body>
                    <h1>Welcome to '._COMPANY_NAME_.'</h1>
                    <p>Dear '.$d['first_name'].',</p>
                    <p>
                        Account Details as follows 
                    </p>
                    <b>Username </b>: '.$d['username'].' <br>
                    <b>Password </b> : '.$password.'
                    <p><b>Note : </b>We highly recommend to change password on first login.. </p>
                </body>
                </html>
                ';

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: '.$d['first_name'].' <'.$to.'>' . "\r\n";
        $headers .= 'From: '._COMPANY_NAME_.' <noreply@potpie.in>' . "\r\n";
        
        // Mail it
        if (mail($to, $subject, $message, $headers) == true){
            return true;
        }else{
            return false;
        }
    }
    /*
     * doLogin function will simply check the email and password 
     */
    public function doLogin($data){
       $state = "SELECT * FROM `login`,`profile` WHERE `login`.`username` = '".strtolower($data['email'])."' AND `login`.`password` = '".sha1($data['password'])."' AND `login`.`user_type` = 'WEBUSER' AND `profile`.`uid` = `login`.`id`";
       $query = $this->prepare($state);
       $query->execute();
       return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>