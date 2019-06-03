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
			
			<?php
				if (@$this->message){
					echo "<div class='alert alert-info'>".$this->message."</div>";
				}
			?>
			<!-- form begins-->
			<div class="well">
				<form action="" method="post" >
					<div class="row-fluid">
					<div class="span4">
						<label>First Name</label>
						<input type="text" id="first_name" name="first_name" placeholder="Enter first name" style="width:100%;padding:5px;height:auto;" />	
					</div>
					<div class="span4">
						<label>Middle Name</label>
						<input type="text" id="middle_name" name="middle_name" placeholder="Enter middle name" style="width:100%;padding:5px;height:auto;" />
					</div>
					<div class="span4">
						<label>Last Name</label>
						<input type="text" id="last_name" name="last_name" placeholder="Enter last name" style="width:100%;padding:5px;height:auto;" />
					</div>
					</div>
					<label>Phone Number</label>
					<div class='row-fluid'>
						<div class='span2'>
							<input type="text" name='phone_code' id="phone_code" style="width:100%;padding:5px;height:auto;" placeholder="Enter country code" />
						</div>
						<div class='span10'>
							<input type="text" name='phone_number' id="phone_number" placeholder="Enter phone number" style="width:100%;padding:5px;height:auto;"/>
						</div>
					</div>
					<label>Email id</label>
					<input type="email" name='email_id' id="email_id" style="width:100%;padding:5px;height:auto;" placeholder="Enter email id" />
					<label>Username</label>
					<input type="text" name="username" id="username" style="width:100%;padding:5px;height:auto;" placeholder="Enter username" />
					<label>User type</label>
					<select name="user_type" id="user_type">
						<option value="">Select User type</option>
						<option value="manager">Manager</option>
                                                <option value="productManager">Product Manager</option>
						<option value="leadManager">Lead Manager</option>
						<option value="inventory">Inventory</option>
						<option value="sales">Sales</option>
					</select>
					<br>
					<input type="submit" value=" Add User " class="btn btn-primary" />
				</form>
			</div>
			<!-- form ends -->
		</div>
	</div>
</div>
<?php
	require "views/footer.php";
?>
<script>
	$("#phone_number").keyup(function(){
		$('#username').val($(this).val());
	});
</script>                
                            
                            
                            