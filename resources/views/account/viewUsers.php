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
				if (count($this->data) >= 1){
				echo "<table class='table'>";
				echo "<tr>";
				echo "<th>";
				echo "Uid";
				echo "</th>";
				echo "<th>";
				echo "Username";
				echo "</th>";
				echo "<th>";
				echo "Full Name";
				echo "</th>";
				echo "<th>";
				echo "Email id";
				echo "</th>";
				echo "<th>";
				echo "Phone Number";
				echo "</th>";
				
				echo "<th>";
				echo "Created Date";
				echo "</th>";
				echo "</tr>";
				foreach($this->data as $d){
					echo "<tr>";
						echo "<td>";
						echo $d['id'];
						echo "</td>";
						echo "<td>";
						echo $d['username'].' ('.$d['user_type'].')';
						echo "</td>";
						echo "<td>";
						echo $d['first_name']." ".$d['middle_name']." ".$d['last_name'];
						echo "</td>";
						echo "<td>";
						echo $d['email_id'];
						echo "</td>";
						echo "<td>";
						echo $d['phone_number'];
						echo "</td>";
						
						echo "<td>";
						echo date("d-m-y h:i:s",$d['mod_timestamp']);
						echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
				}else{
					echo "<div class='alert alert-info'>No Records found</div>";
				}
			?>
		</div>
	</div>
</div>
<?php
	require "views/footer.php";
?>
                            
                            
                            
                            
                            