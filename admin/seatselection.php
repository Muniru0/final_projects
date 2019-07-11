
<?php

require_once("../functions/functions.php");


// if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true || !isset($_SESSION["id"]) || !isset($_SESSION["login_status"])){

// }



  
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Book My Ticket a Mobile App Flat Bootstrap Responsive Website Template | Seat selection :: W3layouts</title>
		<link rel="stylesheet" href="css/style.css">
		<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!-- For-Mobile-Apps-and-Meta-Tags -->
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="keywords" content="Book My Ticket Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //For-Mobile-Apps-and-Meta-Tags -->
	</head>
	<body class="inner">
	<a class="back" href="main.php">BACK TO HOME</a>
	<ul class="total">
		<ul class="set">
    
		
<?php get_seats_info(); ?>
			<br><br>
		</ul>
		<li><a href="#"><img  src="images/buttonA_off.jpg" class="img-responsive" alt=""></a></li>:AVAILABLE SEATS<br>
		<li><a href="#"><img  src="images/seat2.jpg" class="img-responsive" alt=""></a></li>:UN-AVAILABLE SEATS<br />
		<li><a href="#"><img  src="images/buttonA_on.jpg" class="img-responsive" alt=""></a></li>:Seats that you selected
		<div class="clearfix"></div>
		<a href="main.php" class="next">NEXT</a>
	</ul>
	<script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    function changeImg(img, newimg) {
    img.src = newimg;
    }


    </script>
	  <script type="text/javascript">
	   $("a").click(function(e){
		   e.preventDefault();
	   });

	   function ticketReservation(requestType = "",seatID = 0){
   $.ajax({
   url: "../functions/neutral_ajax.php",
   type : "POST",
   data: {request_type : requestType,seat_id : seatID},
   dataType: "html"
   }).done(function(response){

console.log(response);

   });

	   }
			function changeImg(img) {
		    var seatID = $(img).attr("id");
			if ( img.src.indexOf("_on") > 0 ) {
				img.src = img.src.replace("_on","_off");
				ticketReservation("dereserve_seat",seatID);
			}
			else {
				img.src = img.src.replace("_off","_on");
				ticketReservation("reserve_seat",seatID);
			}
		} 
		</script>


	</body>
</html>