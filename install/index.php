<?php 
error_reporting(0);
session_start();
?>
<html>
<head>
	<title>CW Framework 2.1 Installer</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<style type="text/css" >
	.card{
		border:1px solid #f1f1f1;
		background:#fff;
	}
	</style>
	
</head>
<body style='background:#f1f1f1;'>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CWFramework Installer v2.3</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://cwframework.com/about-cwf">About CWF</a></li>
        <li><a href="http://cwframework.com/docs">Documentation</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked">
			  <li <?php echo ($_GET['r'] == 'index' || $_GET['r'] == '' ? "class='active'" : '' );?>><a href="?r=index">Database Config</a></li>
			  <li <?php echo ($_GET['r'] == 'site' ? "class='active'" : '' );?>><a href="<?php echo ($_SESSION['step'] > 1 ? '?r=site' : '#');?>">Site Config</a></li>
			  <li <?php echo ($_GET['r'] == 'final' ? "class='active'" : '' );?>><a href="<?php echo ($_SESSION['step'] > 2 ? '?r=final' : '#');?>">Finalize Install</a></li>
			</ul>
		</div>
		<div class="col-md-9 card">
			<?php 
				if ($_GET['r']){
					$file = "inc/".$_GET['r'].".php";
					if (file_exists($file)){
						require $file;
					}else{
						require "errors/404.php";
					}
				}else{
					require "./inc/index.php";
				}
			?>
		</div>
	</div>
</div>


<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>