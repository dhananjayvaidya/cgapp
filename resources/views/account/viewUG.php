                                                                                                <?php
	require "views/header.php";
?>

<div class='container'>
	<div class="row-fluid">
		<div class='span3'>
			<?php require "views/menu.php"; ?>
		</div>
		<div class='span9'>
			<?php require "views/menus/usersGroupSubMenu.php";?>
			<div class='row-fluid'>
				<div class='well span6'>
					<h3>Users</h3>
					<h1><?php echo $this->userCount; ?></h1>	
				</div>
				<div class='well span6'>
					<h3>Groups</h3>
					<h1><?php echo $this->groupCount; ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	require "views/footer.php";
?>
                            
                            
                            
                            
                            