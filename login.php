<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
$generalError = "";
$loggedOut = "";

if(isset($_GET['logout'])){
	session_unset();
	session_destroy();
	$loggedOut = "You have succesfully been logged out.";
}

if(isset($_POST["email"])){
	$email = strtolower($_POST["email"]);
	$passwordHashed = hash("md5", $_POST["password"]);
	$servername = "stardock.cs.virginia.edu";
	$username = "cs4750s17elk2fw";
	$serverpassword ="cs4750";
	$dbname = "cs4750s17elk2fw";

	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	if(preg_match("/@delk.com/", $email)){
		$smt = $conn->prepare("Select fname, lname, position from Employee where email=? and password=?");
	    $smt->bind_param("ss", $email, $passwordHashed);
		$smt->execute();
		$smt->store_result();
		if($smt->num_rows > 0){
			$smt->bind_result($fname, $lname, $position);
			$smt->fetch();
			$smt->close();
	    	$conn->close();
		    $_SESSION['employeefirstName'] = $fname;
			$_SESSION['employeelastName'] = $lname;
			$_SESSION['employeeEmail'] = $email;
			$_SESSION['employeePosition'] = $position;
	    	header('Location: employeedash.php');
	    	exit;
		}else{
			$generalError = "Invalid email/password.";
			$smt->close();
	    	$conn->close();
		}
	}else{
		$smt = $conn->prepare("Select fname, lname from Customer where email=? and password=?");
	    $smt->bind_param("ss", $email, $passwordHashed);
		$smt->execute();
		$smt->store_result();
		if($smt->num_rows > 0){
			$smt->bind_result($fname, $lname);
			$smt->fetch();
			$smt->close();
	    	$conn->close();
	    	$_SESSION['firstName'] = $fname;
	    	$_SESSION['lastName'] = $lname;
	    	$_SESSION['email'] = $email;
	    	header('Location: member.php');
	    	exit;
		}else{
			$generalError = "Invalid email/password.";
			$smt->close();
	    	$conn->close();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>DELK's Books A Ecommerce Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="js/jquery.min.js"></script>

<!--//theme style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->
</head>
<body> 
<!--header-->	
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: false,
      });
    });
  </script>
  
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="index.php">DELK's Books</a></h1>
				</div>
			 <!---->		 
			 <div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href="index.php">Home</a></li>
					<li class="grid"><a href="product.php">Books</a>
						<!--div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="product.html">New Arrivals</a></li>
										<li><a href="product.html">Home</a></li>
									
										<li><a href="product.html">Decorates</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Kids</a></li>
										<li><a href="product.html">Login</a></li>
										<li><a href="product.html">Brands</a></li>
										<li><a href="product.html">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Type</h4>
									<ul>
										<li><a href="product.html">Diwali Lights</a></li>
										<li><a href="product.html">Tube Lights</a></li>
										<li><a href="product.html">Bulbs</a></li>
										<li><a href="product.html">Ceiling Lights</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Lanterns</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="product.html">Everyday</a></li>
										<li><a href="product.html">Philips</a></li>
										<li><a href="product.html">Havells</a></li>
										<li><a href="product.html">Wipro</a></li>
										<li><a href="product.html">Jaguar</a></li>
										<li><a href="product.html">Ave</a></li>
										<li><a href="product.html">Gold Medal</a></li>
										<li><a href="product.html">Anchor</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li-->
					<li class="grid"><a href="#">Genres</a>
						<div class="mepanel" style="width: 115px; margin-left: 160px;">
							<div class="row">
								<div class="col1 me-one">
									
									<ul>
										<li><a href="product.php?genre=Fiction">Fiction</a></li>
										<li><a href="product.php?genre=Non-Fiction">Non-Fiction</a></li>
										<li><a href="product.php?genre=Children">Children</a></li>
										<li><a href="product.php?genre=Lifestyle">Lifestyle</a></li>
										<li><a href="product.php?genre=Textbook">Textbook</a></li>
									</ul>
								</div>
								<!--div class="col1 me-one">
									<h4>Type</h4>
									<ul>
										<li><a href="product.html">Diwali Lights</a></li>
										<li><a href="product.html">Tube Lights</a></li>
										<li><a href="product.html">Bulbs</a></li>
										<li><a href="product.html">Ceiling Lights</a></li>
										<li><a href="product.html">Accessories</a></li>
										<li><a href="product.html">Lanterns</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="product.html">Everyday</a></li>
										<li><a href="product.html">Philips</a></li>
										<li><a href="product.html">Havells</a></li>
										<li><a href="product.html">Wipro</a></li>
										<li><a href="product.html">Jaguar</a></li>
										<li><a href="product.html">Ave</a></li>
										<li><a href="product.html">Gold Medal</a></li>
										<li><a href="product.html">Anchor</a></li>										
									</ul>	
								</div-->
							</div>
						</div>
					</li>
					<!--li class="grid"><a href="typo.html">Typo</a></li-->
					<li class="grid"><a href="about.php">About</a>
					<!--
					<div class="mepanel" style="width: 115px; margin-left: 265px;">
							<div class="row">
								<div class="col1 me-one">	
									<ul>
										<li><a href="product.html">Contact</a></li>
										<li><a href="product.html">About Us</a></li>
									</ul>
								</div>
								</div>
								</div>-->
					</li>
					<div style="margin-top: 7%; margin-left: 80%;"> <a href="account.php">Sign Up</a>	or  <a href="login.php">Log In</a></div>
					<!--<li class="grid"><a href="account.php">Sign Up</a>
					</li>
					<li class="grid"><a href="login.html">Log In</a>
					</li>-->
				</ul>				
			 </div>
			 <!---->
			 <!--
			 <div class="cart box_1">
				 <a href="checkout.html">
					<div class="total">
					<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div>
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				</a>
				<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
			 	<div class="clearfix"> </div>
			 </div>
			 <div class="clearfix"> </div>
			 <!---->			 
			 <!-- </div> -->
			<div class="clearfix"> </div>
</div>
<!---->	
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <h2>Login</h2>
		 <?php
			if(isset($_SESSION["login"])){			
			echo '<p> <span style="color: red;">'.$_SESSION['login'].'</span> </p>'; 
			unset($_SESSION["login"]);
			}
			echo '<p> <span style="color: red;">'.$loggedOut.'</span> </p>';
		?>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the following to continue.</p>
				 <?php echo '<span style="color: red;">'.$generalError.'</span>'?>
				 <form action = "login.php" method = "post"> 
					 <h5>Email</h5>	
					 <input type="email" name="email" value="" required>
					 <h5>Password</h5>
					 <input type="password" name="password" value="" required>					
					 <input type="submit" value="Login">	
						<a class="acount-btn" href="account.php">Create an Account</a>
				 </form>
				 <!--<a href="#">Forgot Password ?</a> -->
					
		 </div>	
				
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
<!--<div class="subscribe">
	 <div class="container">
		 <h3>Newsletter</h3>
		 <form>
			 <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
			 <input type="submit" value="Subscribe">
		 </form>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-3 about-us">
				 <h3>About Us</h3>
				 <p>We sell books. You buy our books. Everyone is happy.</p>
			 </div>
			<div class="col-md-3 ftr-grid">
					<h3>Information</h3>
					<ul class="nav-bottom">
					  <?php
				if(isset($_SESSION['employeefirstName']) || isset($_SESSION['firstName'])){
				}else{	
				echo	'<li><a href="login.php">Login</a></li>';
			 }
			 ?>
						<li><a href="about.php">About</a></li>
					</ul>					
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Categories</h3>
					<ul class="nav-bottom">
						<li><a href="product.php?genre=Fiction">Fiction</a></li>
						<li><a href="product.php?genre=Non-Fiction">Non-Fiction</a></li>
						<li><a href="product.php?genre=Children">Children</a></li>
						<li><a href="product.php?genre=Lifestyle">Lifestyle</a></li>
						<li><a href="product.php?genre=Textbook">Textbook</a></li>	
					</ul>					
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<div class="copywrite">
	 <div class="container">
		 <div class="copy">
			 <p>© 2015 DELK's Books. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
		 <div class="social">							
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>	
				<a href="#"><i class="google"></i></a>	
				<a href="#"><i class="youtube"></i></a>	
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
</body>
</html>