<?php $this->section("header");?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->section("menu");?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Create Course 
                </div>
                <div class="card-body">
                    <?php 
                        if ($this->message){
                            echo "<div class='alert alert-info'>".$this->message."</div>";
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Course Name</label>
                            <input type="text" name="course_name" placeholder="Course name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Course Description</label>
                            <textarea name="course_desc" placeholder="Course Description" class="form-control" ></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary" value=" Submit " />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->section("footer");?>