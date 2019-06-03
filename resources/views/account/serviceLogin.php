<?php $this->section('header'); ?>
<div class="jumbotron" style="background:url('http://youtube-booster.com/public/img/slides/youtube.png');color:#fff;">
    <div class="container">
        <h1>Youtube Booster Login </h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-2"><img src='<?php echo _PATH_; ?>public/img/youtube-subs.png' class='img-rounded'/></div>

                <div class='col-md-10'>
                    <h3 class=''>Get free Youtube Subscribers</h3>
                    <p>Get real youtube subscribers for free, just an login away from getting 1000 subscribers</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2"><img src='<?php echo _PATH_; ?>public/img/visitors.png' class='img-rounded'/></div>

                <div class='col-md-10'>

                    <h3 class=''>Get free Website Visitors</h3>

                    <p>Just an login away to explore the great deals. </p>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-2"><img src='<?php echo _PATH_; ?>public/img/visitors.png' class='img-rounded'/></div>

                <div class='col-md-10'>

                    <h3 class=''>Get Free Youtube Views</h3>

                    <p>Just an login away from getting 1Million views </p>

                </div>

            </div>

        </div>

        <div class="col-md-4">
            <?php 
                if ($this->message){
                        echo "<div class='alert alert-info'>".$this->message."</div>";
                }
            ?>
           <form action="" method="post">
               <label>Username / Email Id</label>
               <input type="text" name="email" placeholder="Username / Email Id" style="width:100%;height:auto;padding:5px;"/>
               <label>Password</label>
               <input type="password" name="password" placeholder="Password" style="width:100%;padding:5px;height:auto;" />
               <div class="row" style='margin-top:10px;'>
                <div class="col-md-6"><a href=''>Forgot Password</a></div>
                <div class='col-md-6' style='text-align:right'><input type="submit" class="btn btn-primary" value=" LOGIN " /></div>
               </div>
           </form>
            <hr>
            <h4>New to Youtube Booster, Create an Account</h4>
            <p>It`s FREE & will remain FREE.</p>
            
            <a href='<?php echo _PATH_;?>account/register' class='btn btn-default'> Create Account </a>
        </div>

    </div>

</div>

<?php $this->section('footer'); ?>