
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
			        <h4>My Subscribers</h4>
			        <h1><?php echo $this->youtubeSubscriberCount;?></h1>
			        <div class="">
			               <a href='<?php echo _PATH_;?>youtube/subscribers' class='btn btn-primary'>View</a></div>
			        </div>
			    </div>
			    <div class="col-md-6">
			        <div class='card'>
			        <h4>Website Visitors</h4>
			        <h1><?php echo $this->websiteVisitorCount;?></h1>
			        <div class="">
			               <a href='<?php echo _PATH_;?>youtube/subscribers' class='btn btn-primary'>View</a></div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php
	$this->section("footer");
?>
                            
                            
                            