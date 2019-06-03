<?php 
if ($_POST){
	
	$db_config = "../config/database.php";
	if (!file_exists($db_config)){
		//create the file database.php
		$handler = fopen($db_config,"w");
		$code = "
<?php 
/*
 * @Author : Dhananjay Vaidya
 * @document : database config
 * You can change database setting here which effect to entire app
*/

define(\"_DNS_\",\"mysql:host=localhost;dbname=".$_POST['db_name']."\"); //Database name and driver info
define(\"_USER_\",\"".$_POST['db_user']."\"); 					     //database username
define(\"_PASS_\",\"".$_POST['db_pass']."\");					     //database password

?>
		";
		
		//write to the file
		if (fwrite($handler,"".$code."")){
			$message = "Sucessfully Created DB config.<script>window.location='?r=site';</script>";
			$_SESSION['step'] = 2;
		}else{
			$message = "Problem occur while creating DB config.";
		}
	}else{
		$message = "You have done with setup.. Please remove install folder. ";
	}
}
?>
<h4>Database Configuration</h4>
<?php 
if ($message){
	echo "<div class='alert alert-info'>".$message."</div>";
}
?>
<form action="" method="post">
	<label>Database Name</label>
	<input type="text" name="db_name" placeholder="Enter Database Name" style='width:100%;padding:5px;height:auto'/>
	<label>Database Username</label>
	<input type="text" name="db_user" placeholder="Enter Database Username" style='width:100%;padding:5px;height:auto'/>
	<label>Database Password</label>
	<input type="text" name="db_pass" placeholder="Enter Database Password" style='width:100%;padding:5px;height:auto'/>
	
	
	<div style="margin: 10px;text-align: right;"><input type="submit" class='btn btn-primary' value=" Next " /></div>
</form>