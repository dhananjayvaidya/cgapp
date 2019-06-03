<?php require 'views/header.php'; ?>
<div class="jumbotron" style="background:url('http://youtube-booster.com/public/img/slides/youtube.png');color:#fff;">
    <div class="container">
        <h1>Create an Account Youtube Booster </h1>
    </div>
</div>
<div class='container'>
    <div class='row-fluid'>
        <div class='col-md-12'>
            <div class='row'>
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
                <div class='col-md-4'>
                   <?php 
                    if ($this->message){
                        echo "<div class='alert alert-info'>".$this->message."</div>";
                    }
                   ?>
                    <h3>Create a Account</h3>
                    <form id="serviceSignupForm"  method="POST" action="<?php echo _PATH_; ?>/account/register" >
                        <input id="full_name" type="text" name="full_name" placeholder="Full Name" style='padding:5px; height:auto;width:100%;' />
                        <input id="email" type="email" name="email" placeholder="Email Address" style='padding:5px; height:auto;width:100%;' />
                        <input id="password" type="password" name="password" placeholder="Password" style='padding:5px; height:auto;width:100%;' />
                        <input id="re_password" type="password" name="re_password" placeholder="Re-Enter your password" style='padding:5px; height:auto;width:100%;' />
                        <input id="phone_number" type="text" name="phone_number" placeholder="Phone number" maxlength="10" style='padding:5px; height:auto;width:100%;' />
                        
                        <div class='row' style='margin-top:20px;'>
                            <div class='col-md-8'>
                                <label style='display:block;font-weight:100'><input type="checkbox" value='1' name='agree'/> I Accept & Agree <a href=''>Terms & Conditions</a>,<a href=''>Privacy Policy</a></label>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" id="submitBtn" value=" Create Account " class='btn btn-success pull-right'/>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php require 'views/footer.php'; ?>