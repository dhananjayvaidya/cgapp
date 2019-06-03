<?php
ob_start();
error_reporting(0);
require "tools/Tools.php";
require "libs/DB.php";
require "http/models/account.php";
require 'libs/Controller.php';
require "libs/View.php";
require "libs/Route.php";
require 'config/app.php';
$App = new Route();


ob_flush();
?>