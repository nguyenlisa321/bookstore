<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
session_start();

$fname="";
$lname="";
$address="";
$city= "";
$state= "";
$zipcode="";
$phonenumber="";
$email="";
$password="";

$fnameError="";
$lnameError="";
$addressError="";
$cityError= "";
$zipcodeError="";
$phonenumberError="";
$emailError= "";
$generalError="";

if(isset($_POST["fname"])){

//first name check
$tempfname = $_POST["fname"];
if(preg_match("/^[a-zA-Z-]+$/", $tempfname)){
	$fname = strtoupper($tempfname);
}else{
	$fnameError = "Should only contain letters or dashes<br />";
}

//last name check
$templname = $_POST["lname"];
if(preg_match("/^[a-zA-Z-]+$/", $templname)){
	$lname = strtoupper($templname);
}else{
	$lnameError= "Should only contain letters or dashes<br />";
}

//street address check
$tempaddress = $_POST["address"];
if(preg_match("/^[a-zA-Z0-9. ]+$/", $tempaddress)){
	$address = strtoupper($tempaddress);
}else{
	$addressError = "Please enter a valid street address <br />";
}

//city check
$tempcity = $_POST["city"];
if(preg_match("/^[a-zA-Z-]+$/", $tempcity)){
	$city = strtoupper($tempcity);
}else{
	$cityError= "Should only contain letters <br />";
} 

//state check
$state = $_POST["state"];

//zipcode check
$tempzipcode = $_POST["zipcode"];
if(ctype_digit($tempzipcode) && strlen($tempzipcode)==5){
	$zipcode = intval($tempzipcode);
}else{
	$zipcodeError = "Please enter a valid 5 digit zip code <br />";
}

//phonenumber check
$tempphonenumber = $_POST["phonenumber"];
if(preg_match("/^[0-9-]+$/", $tempphonenumber)){
	if(!(strpos($tempphonenumber, "-")===false)){
		$tempphonenumber = str_replace("-", "", $tempphonenumber);
		if(strlen($tempphonenumber)==10){
			$phonenumber = $tempphonenumber;
		}else{
			$phonenumberError = "Should only include 10 digit phone number with or without dashes <br />";
		}
	}else{
		if(strlen($tempphonenumber)==10){
			$phonenumber = $tempphonenumber;
		}else{	
			$phonenumberError = "Should only include 10 digit phone number with or without dashes <br />";
		}
	}
}else{
	$phonenumberError = "Should only include 10 digit phone number with or without dashes <br />";
}

//email check
$tempemail = strtolower($_POST["email"]);
if(preg_match("/@delk.com/", $tempemail)){
	$emailError = "Cannot use a BELK email to sign up";
}else{
	$email = $tempemail;
}

//no check needed for password
$password = $_POST['password'];
$passwordHashed = hash("md5", $password);

if(strlen($fnameError)==0 && strlen($lnameError)==0 && strlen($addressError)==0 && strlen($cityError)==0 && strlen($zipcodeError)==0 && strlen($phonenumberError)==0 && strlen($emailError)==0){
	$servername = "stardock.cs.virginia.edu";
	$username = "cs4750s17elk2fw";
	$serverpassword ="cs4750";
	$dbname = "cs4750s17elk2fw";

	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	$smt = $conn->prepare("Insert into Customer (fname, lname, address, city, state, zipcode, phonenumber, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $smt->bind_param("sssssiiss", $fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email, $passwordHashed);

    if(!$smt->execute()){
    	$generalError = "The current email is already used with an account. Please enter another email.";
    	$smt->close();
    }else{
    	$smt->close();
    	$conn->close();
	    $_SESSION["login"] = "You have successfully registered! Please log in to access your new account.";
		header( 'Location: login.php' ) ;
		exit;
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>DELK's Books A Ecommerce Category Flat Bootstarp Resposive Website Template | Account :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
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
					<li class="grid"><a href="#">Books</a>
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
										<li><a href="product.html">Fiction</a></li>
										<li><a href="product.html">Non-Fiction</a></li>
										<li><a href="product.html">Children</a></li>
										<li><a href="product.html">Lifestyle</a></li>
										<li><a href="product.html">Textbook</a></li>
										
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
			 </div>
			<div class="clearfix"> </div>
</div>
<!---->	
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Account</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>new user? <span> create an account </span></h2>
			 <?php echo '<span style="color: red;">'.$generalError.'</span>'; ?>
			 <!-- [if IE] 
				< link rel='stylesheet' type='text/css' href='ie.css'/>  
			 [endif] -->  
			  
			 <!-- [if lt IE 7]>  
				< link rel='stylesheet' type='text/css' href='ie6.css'/>  
			 <! [endif] -->  
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 <div class="registration_form">
			 <!-- Form -->
				<form action = "account.php" method = "post">
					<div>
						First Name: <?php echo '<span style="color: red;">'.$fnameError.'</span>'; ?>
						<label>
							<input placeholder="first name" name="fname" type="text" value="<?php echo $fname ?>"required>
						</label>
					</div>
					<div>
						Last Name: <?php echo '<span style="color: red;">'.$lnameError.'</span>'; ?>
						<label>
							<input placeholder="last name" type="text" name="lname" value="<?php echo $lname ?>"required>
						</label>
					</div>
					<div>
						Address: <?php echo '<span style="color: red;">'.$addressError.'</span>'; ?>
						<label>
							<input placeholder="address" type="text" name="address" value="<?php echo $address ?>" required>
						</label>
					</div>
					<div>
						City: <?php echo '<span style="color: red;">'.$cityError.'</span>'; ?>
						<label>
							<input placeholder="city" type="text" name="city" value="<?php echo $city ?>" required>
						</label>
					</div>
					<div>
						State:
						<br><select name = "state">
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select></br>
					</div>
					<div>
						Zip Code: <?php echo '<span style="color: red;">'.$zipcodeError.'</span>'; ?>
						<label>
							<input placeholder="zip code (5 digits)" type="text" name="zipcode" value="<?php echo $zipcode ?>" size="5" required>
						</label>
					</div>
					<div>
						Phone Number: <?php echo '<span style="color: red;">'.$phonenumberError.'</span>'; ?> 
						<label>
							<input placeholder="mobile" type="text" name="phonenumber" value="<?php echo $phonenumber ?>" required>
						</label>
					</div>
					<div>
						Email: <?php echo '<span style="color: red;">'.$emailError.'</span>'; ?>
						<label>
							<input placeholder="email address" type="email" name="email" value="<?php echo $email ?>" required>
						</label>
					</div>
					<div>
						Password:
						<label>
							<input placeholder="password" type="password" name="password" value="<?php echo $password ?>" required>
						</label>
					</div>					
					<div>
						<input type="submit" value="create an account" id="register-submit">
					</div>
				</form>
				<!-- /Form -->
			 </div>
		 </div>
		 <!--<div class="registration_left">
			 <h2>existing user</h2>
			 <div class="registration_form">
			 <!-- Form -->
			<!--	<form>
					<div>
						<label>
							<input placeholder="email" type="email" tabindex="3" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="password" type="password" tabindex="4" required>
						</label>
					</div>						
					<div>
						<input type="submit" value="sign in">
					</div>
					<div class="forget">
						<a href="#">forgot your password</a>
					</div>
				</form>
			 <!-- /Form -->
		<!--	 </div>
		 </div> -->
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
						<li><a href="#">Track Order</a></li>
						<li><a href="#">New Products</a></li>
						<li><a href="#">Our Stores</a></li>
						<li><a href="#">Best Reviewed</a></li>	
					</ul>					
			 </div>
			<div class="col-md-3 ftr-grid">
					<h3>More Info</h3>
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
						<li><a href="#">Fiction</a></li>
						<li><a href="#">Non-Fiction</a></li>
						<li><a href="#">Children</a></li>
						<li><a href="#">Lifestyle</a></li>
						<li><a href="#">Textbook</a></li>	
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