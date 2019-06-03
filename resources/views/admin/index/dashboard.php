
<?php
	$this->section("header");
?>

<div class="container" style="margin-top: 10px;">
	<div class='row'>
		<div class="col-md-3" style='padding-right:0px;'>
			<?php 	$this->section("menu");?>
		</div>
		<div class="col-md-9">
			<div class="row">
			    <div class="col-md-6" style='padding-right:0px;'>
			        <div class='card'>
			        <div class="card-body">
					<h4>Users</h4>
			        <h1>10,000</h1>
					</div>
			        <div class="card-footer">
			            <a href='<?php echo _ADMIN_PATH_;?>/youtube/subscribers' class='btn btn-primary'>View</a>
						<a href='<?php echo _ADMIN_PATH_;?>/youtube/subscribers' class='btn btn-warning'>Add</a>
					</div>
			        </div>
			    </div>
				<div class="col-md-6" style='padding-right:0px;'>
			        <div class='card'>
						<div class="card-body">
							<h4>Courses</h4>
							<h1>10,000</h1>
						</div>
						<div class="card-footer">
							<a href='<?php echo _ADMIN_PATH_;?>/course/view' class='btn btn-primary'>View</a>
							<a href='<?php echo _ADMIN_PATH_;?>/course/add' class='btn btn-warning'>Add</a>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php
	$this->section("footer");
?>
                            
                            
                            