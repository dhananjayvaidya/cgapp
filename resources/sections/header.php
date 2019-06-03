<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title><?php echo $this->title; ?></title>
    <meta name="description" content="<?php echo $this->meta->desc;?>">
    <meta name="keywords" content="<?php echo $this->meta->keywords;?>">
    <meta name="author" content="Whatsapp Marketing">
    <link rel="shortcut icon" href="<?php echo _PATH_; ?>resources/public/img/tm.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo _PATH_;?>resources/public/css/bootstrap-datepicker.min.css" /> 
    <script> var _PATH_ = "<?php echo _PATH_; ?>";</script>
</head>

<body>
    <div class='ui-top-bar' style=''>
        <div class="container">
            <div class="row">
               
                <div class="col-md-6 pull-right text-right">
                    <?php 
                    if ($_SESSION['uid']){
                        //print_r($_SESSION);
                        ?>
                        
                        <div class="btn-group ">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['fullName']?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="<?php echo _PATH_;?>account/profile">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo _PATH_;?>logout.html">Logout</a></li>
                        </ul>
                        </div>
                        <?php 
                    }else{
                        ?>
                        <a href='<?php echo _PATH_;?>login' class='ui-login-btn' style="position: relative;background: #6d7a8e;padding: 7px;color: #fff;text-decoration: none;">LOGIN/REGISTER</a>
                        <?php 
                    }
                    ?>
                </div>
                 
            </div>
        </div>
    </div>
    <div style='background:#fff;'>
    <div class="container">
        <div class="row" >
            
            <div class="col-md-12">
                <div class='ui-logo'><a href="/"><img src='<?php echo _PATH_;?>resources/public/img/cwframework-logo.png' /></a></div>
            </div>
        </div>
    </div>
    </div>
    <div style='background:#6d7a8e;'>
    <div class="container">
    <nav class="navbar navbar-default" style="margin-bottom:0px;">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" style="font-family: 'BebasNeue', sans-serif;font-weight: lighter;letter-spacing: 0.05em;font-size: 19px;">
            <li class="<?php echo ($this->tag == "" ? "active" : "");?>"><a href="<?php echo _PATH_;?>">HOME <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo ($this->tag == "menutag" ? "active" : "");?>"><a href="<?php echo _PATH_;?>whatsapp">MENU 2</a></li>
            <li class="<?php echo ($this->tag == "menutag" ? "active" : "");?>"><a href="<?php echo _PATH_;?>sms">MENU 3</a></li>
            <li class="<?php echo ($this->tag == "menutag" ? "active" : "");?>"><a href="<?php echo _PATH_;?>email">MENU 4</a></li>
            <li class="<?php echo ($this->tag == "menutag" ? "active" : "");?>"><a href="<?php echo _PATH_;?>pricing">MENU 5</a></li>
            <li class="<?php echo ($this->tag == "contactus" ? "active" : "");?>"><a href="<?php echo _PATH_;?>contact-us.html">CONTACT US</a></li>
            
          </ul>
           
         
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>
</div>