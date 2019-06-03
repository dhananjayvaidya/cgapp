<div class='ui-footer'>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul>
				<li><a href=''>About</a></li>
				<li><a href=''>Terms & Conditions</a></li>
				<li><a href=''>Privacy Policy</a></li>
				<li><a href=''>Contact Us</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<ul>
				<li><a href=''>Item 1</a></li>
				<li><a href=''>Item 2</a></li>
				<li><a href=''>Item 3</a></li>
				<li><a href=''>Item 4</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<ul>
				<li><a href=''>Item 5</a></li>
				<li><a href=''>Item 6</a></li>
				<li><a href=''>Item 7</a></li>
				<li><a href=''>Item 8</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<ul>
				<li><a href=''>Item 9</a></li>
				<li><a href=''>Item 10</a></li>
				<li><a href=''>Item 11</a></li>
				<li><a href=''>Item 12</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="container mass-tag">
	
	Powered By <a href='http://cwframework.com'>CWFramework v2.1</a>
</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103575366-1', 'auto');
  ga('send', 'pageview');

</script>
<<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo _PATH_;?>resources/public/js/main.js"></script>
<script type="text/javascript" src="<?php echo _PATH_;?>resources/public/js/bootstrap-datepicker.min.js" ></script>
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script>
$(".slide-effect").mousemove(function(){
   var offset = $(this).offset();
  var X = (event.pageX - offset.left)-100;
  var Y = (event.pageY - offset.top)-100;
	$(this).css("background-position",X+"px ,"+ Y + "px" );
});
$('a').tooltip();
$("#new_password").keyup(function(){

	console.log(1);	

	var pass = $(this).val();	

	if (pass.length >= 6){		

		if (checkChars(pass)){

			text = "Great!";

		}else{

			text = "Please use some special chars.";

		}

	}else {		

		text = "Password should be greater than 6 char.";	

	}	

	$("#pb1").html(text).css("width","100%");

});



//Dh@nu123

function checkChars(e){

	sf = 0; caf = 0; ssf = 0; Sf = 0;

   for(var z=0;z<e.length;z++){

    if (e.charCodeAt(z) <= 64){

      sf++;

    }

    if (e.charCodeAt(z) <= 90){

     caf++;

    }

    if (e.charCodeAt(z) <= 95){

      ssf++;

    }

    if (e.charCodeAt(z) <= 127){

      Sf++;

    }

  }

  if (sf != 0 && ssf != 0 ){

  	return true;

  }else{

  	return false;

  }

}

function savePassword(){

	if ($("#new_password").val() !== $("#again_password").val()){

		makeToast("New Password & Confirm Password are different.");

		$("#again_password").select();

	}else{

            //save it

            $.ajax({

                url : _PATH_+"account/modifyPassword",

                data : {uid : '<?php echo $_SESSION['uid'];?>',newPassword : $('#new_password').val()},

                method : 'POST'

            }).success(function(o){

                var t = o.trim();

                if (t == 1){

                    window.location="";

                }else{

                    alert("Problem Occur while changing the password");

                }

            });

        }

}



function makeToast(str){

	var d = document.body;

	$('.native-toast').fadeIn();

	d.innerHTML += "<div class='native-toast'>"+str+"</div>";

	left = Math.floor($(document).width()/2)-(parseInt($('.native-toast').css('width'))/2);

	$('.native-toast').css("left",left+"px");

	$('.native-toast').fadeOut(5000);

}

</script>

</body>

</html>
