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
				echo "GID";
				echo "</th>";
				echo "<th>";
				echo "Group Name";
				echo "</th>";
				echo "<th>";
				echo "Group Description";
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
						echo $d['group_name'];
						echo "</td>";
						echo "<td>";
						echo $d['group_desc'];
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
                            
                            
                            
                            
                            
                            