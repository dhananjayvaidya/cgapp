<div class="row-fluid">
				<div class="span6 well">
					<h3>Products</h3>
					<h1><?php echo $this->productCount;?></h1>
					<a href="<?php echo _PATH_;?>products/viewReport" class="btn btn-primary">View report</a>
				</div>
				<div class="span6 well">
					<h3>Leads</h3>
					<h1><?php echo $this->leadCount;?></h1>
                                        <a href="<?php echo _PATH_;?>lead" class="btn btn-primary">View report</a> | <a href='<?php echo _PATH_;?>lead/addLead' class='btn'>Create Lead</a>
				</div>
				
			</div>
			<div class="row-fluid">
				<div class="span6 well">
					<h3>Clients</h3>
					<h1><?php echo $this->clientCount;?></h1>
					<a href="" class="btn btn-primary">View report</a>
				</div>
			</div>                                
                            