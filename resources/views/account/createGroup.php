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
				if ($this->message){
					echo "<div class='alert alert-info'>".$this->message."</div>";
				}
			?>
			<!-- form begins-->
			<div class='well'>
			<form action="" method="POST">
				<label>Group Name</label>
				<input type="text" name="group_name" id="group_name" placeholder="Enter group name" style="width:100%;padding:5px;height:auto;" />
				<label>Group Description</label>
				<textarea name="group_desc" style="width:100%;padding:5px;height:100px;" placeholder="Enter group description"></textarea>
				<label>Add Users</label>
				<?php
					if (count($this->users) >= 1){
					foreach($this->users as $user){
						echo "<div class='span3'><input type='checkbox' name='user[]' value='".$user['uid']."'/><a href='#myModal' onclick=\"loadUserDetails('".$user['uid']."')\" role='button' data-toggle='modal'>".$user['first_name']." ".$user['last_name']."</a> (".ucwords($user['user_type']).")</div>";
					}
					}else{
						echo "<p>You didnot have any user yet, please <a href='"._PATH_."account/addUser'>add user</a> to create group</p>";
					}
				?>
				<div style='clear:both'></div>
				<input type="submit" value=" Create Group " class="btn btn-primary" />
			</form>
			</div>
			<!-- form ends -->
		</div>
	</div>
</div>
<?php
	require "views/footer.php";
?>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">User details</h3>
  </div>
  <div id='loadUserDetails' class="modal-body">
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<script>
function loadUserDetails(uid){
$("#loadUserDetails").html("Loading data....");
	$.ajax({
		url    : _PATH_+"account/getUserDetails/"+uid,
		method : 'GET',
		return : 'text/json'
	}).success(function(output){
		var out = output.trim();
		out = JSON.parse(out);
		out = out[0];
		var markUp = "<table class='table'>";
		markUp += "<tr><td><b>Full Name</b></td><td>"+out.first_name+" "+out.middle_name+" "+out.last_name+"</td></tr>";
		markUp += "<tr><td><b>Username</b></td><td>"+(out.username ? out.username:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>Phone Number</b></td><td>"+(out.phone_number ? out.phone_number:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>Email Id</b></td><td>"+(out.email_id ? out.email_id:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>Address </b></td><td>"+(out.address1 && out.address2 ? out.address1 + out.address2:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>City</b></td><td>"+(out.city ? out.city:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>State</b></td><td>"+(out.state ? out.state:'Not Mentioned')+"</tD></tr>";
		markUp += "<tr><td><b>Country</b></td><td>"+(out.country ? out.country:'Not Mentioned')+"</tD></tr>";
		markUp += "</table>";
		$("#loadUserDetails").html(markUp);
	})
}
</script>
                            
                            
                            
                            
                            