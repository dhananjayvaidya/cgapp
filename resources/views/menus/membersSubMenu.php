<ul class="nav nav-pills">
<li <?php echo (@$this->stag == 'view' ? 'class="active"':'');?>><a href="<?php echo _PATH_;?>members/view">View All Members</a></li>
<li <?php echo (@$this->stag == 'viewRiders' ? 'class="active"':'');?>><a href="<?php echo _PATH_;?>members/viewRiders">View Riders</a></li>
<li <?php echo (@$this->stag == 'viewPillions' ? 'class="active"':'');?>><a href="<?php echo _PATH_;?>members/viewPillions">View Pillions</a></li>

<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
     Pull Report <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href='<?php echo _PATH_; ?>members/viewReport/members' target="_blank">All Members</a></li>
      <li><a href="<?php echo _PATH_; ?>members/viewReport/riders"  target="_blank">Riders</a></li>
      <li><a href="<?php echo _PATH_; ?>members/viewReport/pillions" target="_blank">Pillons</a></li>
    </ul>
  </li>

</ul>
                            