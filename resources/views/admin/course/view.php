<?php $this->section("header");?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->section("menu");?>
        </div>
        <div class="col-md-9">
            <?php 
                //print_r($this->data);
                if (count($this->data) >= 1){
                    ?>
                    <table class="table">
                        <tr>
                            <th style="width:10%">#Id</th>
                            <th>Course Name</th>
                            <th style="width:45%">Course Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created On</th>

                        </tr>
                    <?php 
                    foreach($this->data as $d){
                        ?>
                            <tr>
                                <td><?php echo $d['id'];?></td>
                                <td><?php echo $d['course_name'];?></td>
                                <td><?php echo substr(strip_tags($d['course_desc']),0,255);?></td>
                                <td><?php echo date("d-M-Y",$d['start_date']);?></td>
                                <td><?php echo date("d-M-Y",$d['end_date']);?></td>
                                <td><?php echo date("d-M-Y",$d['mod_timestamp']);?></td>
                            </tr>
                        <?php
                    }
                    ?>
                    </table>
                    <?php
                }else{
                    echo "<div class='alert alert-info'>No Courses found</div>";
                }
            ?>
        </div>
    </div>
</div>
<?php $this->section("footer");?>