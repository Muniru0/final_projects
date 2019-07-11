<?php

require_once("../functions/functions.php");
$_SESSION["message"] = "";
 $client_side_logged_in_flag = "";
if(isset($_GET["logout"])){

unset($_SESSION);
session_destroy();
}


if(isset($_POST["signup"])){
	

if(signup_user("admin_details")){

	$_SESSION["logged_in"] = true;
  
}

}elseif(isset($_POST["login"])){
	
  $_SESSION["test"] = "test";

	if(login_user("admin_details")){
		$_SESSION["login_status"] = "admin";
		
		$_SESSION["logged_in"] = true;
		
	}  

}

if((isset($_SESSION) && isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true)){
	$client_side_logged_in_flag = "logged_in";
	$activation_seatflag =   "seatselection.php";
	
}else{

	$activation_seatflag =   "#";
}
  
?>






<!DOCTYPE html>
<html>
	<head>
		<title>sarta</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- <link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'> -->
		<!-- For-Mobile-Apps-and-Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps-and-Meta-Tags -->
	</head>
	<body style="background-image: url(images/bu.jpg)" class="inner">
	<input  id="logged_in_flag" type="hidden" value="<?php echo  $client_side_logged_in_flag; ?>" />
		<!----- tabs-box ---->
		<div class="tabs-box">
		<div id="login_alert" class='alert alert-warning' style="display:none;">Please login before you choose a seat.</div>
		<?php
		 if(isset($_SESSION['message']) && trim($_SESSION['message']) != ""){
			echo	"<div class='alert alert-danger'>".$_SESSION["message"]."</div>"; 
		 }
		?>
			<ul class="tabs-menu">
				<li><a href="#tab1">HOME</a></li>
				<li><a href="#tab2">MOVIES</a></li>
				<li><a href="#tab3">SHOWTIMES</a></li>
				
		<?php
		if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
			echo"	<li><a id='logout' href='main.php?logout' class='special'>Log Out</a></li>";
		}else{
echo "<li><a href='#tab4'>LOGIN</a></li>";
		}
		?>
				<div class="clearfix"></div>
			</ul>
			<div class="clearfix"> </div>
			<div class="tab-grids">
				<div id="tab1" class="tab-grid">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="images/1.jpg" alt="Chania">
							</div>
							<div class="item">
								<img src="images/0.jpg" alt="Flower">
							</div>
							<div class="item">
								<img src="images/2.jpg" alt="Chania" >
							</div>
							<div class="item">
								<img src="images/3.jpg" alt="Flower">
							</div>
						</div>
					</div>
					<div class="latest">
					<h3>UPCOMING MOVIES</h3>
					<div class="lm1">
						<img src="images/7.jpg">
					</div>
					<div class="lm2">
					<img src="images/14.jpg">
					</div>
					<div class="lm3">
					<img src="images/15.jpg">
					</div>
                        
					<div class="clearfix"></div>
					</div>
				</div>
				<div id="tab2" class="tab-grid">
					<div class="movie1">
						<a href="bigimage.html"><img src="images/j.jpg"></a>
						<h3>Coraline</h3>
					</div>
					<div class="movie2">
						<a href="bigimage2.html"><img src="images/5.jpg"></a>
						<h3>Brave</h3>
					</div>
					<div class="movie3">
						<a href="bigimage3.html"><img src="images/6.jpg"></a>
						<h3>Hercules & Xena</h3>
					</div>
					<div class="movie4">
						<a href="bigimage4.html"><img src="images/8.jpg"></a>
						<h3>Ki & Ka</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="tab3" class="tab-grid">
					<table>
						<tr>
							<th>MOVIE</th>
							<th>CINEMA</th>		
							<th>SHOWTIME</th>
						</tr>
						<tr>
							<td>CORALINE</td>
							<td>SCREEN1</td>		
							<td><a href="<?php echo $activation_seatflag; ?>">11:00 AM</a><a href="<?php echo $activation_seatflag; ?>">02:00 PM</a><a href="<?php echo $activation_seatflag; ?>">07:00 PM</a></td>
						</tr>
						<tr>
							<td>BRAVE</td>
							<td>SCREEN2</td>		
							<td><a href="<?php echo $activation_seatflag; ?>">02:00 PM</a><a href="<?php echo $activation_seatflag; ?>">07:00 PM</a></td>
						</tr>
						<tr>
							<td>HERCULES</td>
							<td>SCREEN3</td>		
							<td><a href="<?php echo $activation_seatflag; ?>">11:00 AM</a><a href="<?php echo $activation_seatflag; ?>">07:00 PM</a><a href="<?php echo $activation_seatflag; ?>">11:00 PM</a></td>
						</tr>
					
						<tr>
							<td>KI&KA</td>
							<td>SCREEN2</td>		
							<td><a href="<?php echo $activation_seatflag; ?>">07:30 AM</a><a href="<?php echo $activation_seatflag; ?>">11:00 AM</a><a href="<?php echo $activation_seatflag; ?>">11:00 PM</a></td>
						</tr>
					
					</table>
			
				
				</div>
					<div id="tab4" class="tab-grid">
						<h4>LOGIN INTO YOUR ACCOUNT</h4>
						 <form action="main.php" method="POST">
									<h3> E-MAIL</h3>
									<input type="text" name="login_email" class="name"  required=""style="background: snow;">
									<h3>PASSWORD</h3>
									<input type="password" name="login_password" class="password"  required=""style="background: snow;"><br>
									<input type="submit" name="login" value="SIGN IN"><br>
									<ul>
										<li>
											<input type="checkbox" id="brand1" value="">
											<label for="brand1"><span></span>Remember me</label>
										</li>
									</ul>

								  </form>
								  <h3>DONT HAVE AN ACCOUNT?</h3>
									<a href="#" data-toggle="modal" data-target="#myModal2">SIGNUP NOW</a>
										<div id="myModal2" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">SIGNUP DETAILS</h4>
								</div>
								<div class="modal-body">
								 <form action="main.php" method="POST">
								 <h3>Firstname</h3>
									<input type="text" name="firstname" class="name" value="<?php $firstname;?>" required=""><br>
									<h3>Lastname</h3>
									<input type="text" name="lastname" class="name" value="<?php $lastname;?>" required=""><br>
									<h3> E-MAIL</h3>
									<input type="text" name="email" class="name" value="<?php $email;?>" required=""><br>
									<h3>PASSWORD</h3>
									<input type="password"name="password" value="<?php $password;?>" class="password" required="">
									<h3>RE-ENTER PASSWORD</h3>
									<input type="password" name="confirm_password" value="<?php $password;?>" class="password" value="<?php $confirm_password;?>" required=""><br>
									<h3>MOBILE NO</h3>
									<input type="text" name="mobile" class="name" value="<?php $password;?>" required=""><br>
									<input id="signup" name="signup" type="submit"  value="SIGN UP"><br>
								  </form>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div id="tab5" class="tab-grid">
					<div class="contact">
		

			<h3>CONTACT</h3>
			
		<div class="cbottom">
			<div class="cbl">
				<h4>OUR ADDRESS:</h4>
				<h5>Block no:5, <br>Mensah jomo Rd, <br>Accra.</h5>
				<h4> Phone:</h4>
				<h5>+233 554456147</h5>
				<h4>E-mail:</h4>
				<h5><a href="mailto:yellowsarta@gmail.com">yellowsart@gmail.com</a></h5>
            </div>
			<div class="cbr">
				<form>
                        <input type="text" placeholder="your Name" required="">
						<input type="text" placeholder="your Phone" required="">
						<input type="text" placeholder="your Email" required="">
						<textarea rows="5" cols="50" placeholder="Write Your Comment Here"></textarea><br>
						<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	
	</div>
					</div>
			</div>
		</div>
		<!----- tabs-box ---->
		<!----- Comman-js-files ----->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script>
		$("td a").click(function(e){
   // e.preventDefault();
  
	var loggedInStateValue = 	$("#logged_in_flag").val();
	   if($.trim(loggedInStateValue) !== "logged_in"){
   $("#login_alert").show();
		 }


		});


			$(document).ready(function() {
				$("#tab2").hide();
				$("#tab3").hide();
				$("#tab4").hide();
				$("#tab5").hide();
				$(".tabs-menu a").not("#logout").click(function(event){
					event.preventDefault();
					var tab = $(this).attr("href");
				
						$(".tab-grid").not(tab).css("display","none");
					$(tab).fadeIn("slow");
					
				
				});
			});
		</script>
		<!----- Comman-js-files ----->
	</body>
</html>

