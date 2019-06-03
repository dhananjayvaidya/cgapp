
<?php
//development 
define("_DEV_",false);
/*
 * @Load Database config 
*/
require "config/database.php";

define("_PATH_",base_url());	     //Global Path
define("_COMPANY_NAME_","CGApp ");		 //company name 
//setting time zone
date_default_timezone_set("Asia/Kolkata");		     //default time zone
define("_ADMIN_PATH_",_PATH_."admin");

/*
 * @URL & SEO
*/
require "config/routes.php";
?>
