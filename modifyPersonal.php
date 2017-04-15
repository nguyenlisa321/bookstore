<?php

session_start();
if(!isset($_SESSION['firstName'])){
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
}

$fnameError="";
$lnameError="";
$addressError="";
$cityError= "";
$zipcodeError="";
$phonenumberError="";


if(!isset($_POST["fname"])){
$servername = "stardock.cs.virginia.edu";
$username = "cs4750s17elk2fw";
$serverpassword ="cs4750";
$dbname = "cs4750s17elk2fw";

$conn = new mysqli($servername, $username, $serverpassword, $dbname);
if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
$email = $_SESSION['email'];
$sql = "Select fname, lname, address, city, state, zipcode, phonenumber from Customer where email = '$email'" ;
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

$fname = $row["fname"];
$lname = $row["lname"];
$address = $row["address"];
$city = $row["city"];
$zipcode = $row["zipcode"];
$state = $row["state"];
$phonenumber= $row["phonenumber"];

}else{

$fname="";
$lname="";
$address="";
$city= "";
$state= "";
$zipcode="";
$phonenumber="";
$email="";
$password="";

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

if(strlen($fnameError)==0 && strlen($lnameError)==0 && strlen($addressError)==0 && strlen($cityError)==0 && strlen($zipcodeError)==0 && strlen($phonenumberError)==0){
	$servername = "stardock.cs.virginia.edu";
	$username = "cs4750s17elk2fw";
	$serverpassword ="cs4750";
	$dbname = "cs4750s17elk2fw";

	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	$smt = $conn->prepare("Update Customer SET fname=?, lname=?, address=?, city=?, state=?, zipcode=?, phonenumber=? WHERE email=?" );
    $smt->bind_param("sssssiis", $fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $_SESSION["email"]);
    $smt->execute();
    $smt->close();
    $conn->close();
    $_SESSION["firstName"] = $fname;
    $_SESSION["lastName"] = $lname;
    header( 'Location: member.php' ) ;
    exit();
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
				<ul class="memenu skyblue" style="width: 120%""><li class="active"><a href="index.php">Home</a></li>
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
					<?php 
					if(isset($_SESSION["firstName"])){
						echo '<li class="grid"><a href="member.php">Account</a> </li>';
						echo '<div style="margin-top: 3%; margin-left: 80%;"> Welcome Customer ' . $_SESSION["firstName"] . ' ' . $_SESSION["lastName"] . '   (<a href="login.php?logout=true">Logout</a>) </div>' ;
					}else if(isset($_SESSION["employeefirstName"])){
						echo '<li class="grid"><a style="width: 130px; height: 97px;" href="member.php">Employee Dashboard </a> </li>';
						echo '<div style="margin-top: 3%; margin-left: 80%;"> Welcome Employee ' . $_SESSION["employeefirstName"] . ' ' . $_SESSION["employeelastName"] . '   (<a href="login.php?logout=true">Logout</a>) </div>' ; 
					}else{
						echo '<div style="margin-top: 5.5%; margin-left: 50%;"> <a href="account.php">Sign Up</a>	or  <a href="login.php">Log In</a></div>';
					}
					?>
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
<style type="text/css">
    #wrapper {
        width:450px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
    }
    legend {
        color:#FF851B;
        font-size:16px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff; 
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
        -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type="text"],
    input[type="password"]{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;
        
        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type="submit"]{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
</style>
<br></br>
<div class="contact">
<div class="container">
<body>
    <div id="wrapper">
        <form action="modifyPersonal.php" method="post">
            <fieldset>
                <legend>Edit Personal Info</legend>
                First Name: <?php echo '<span style="color: red;">'.$fnameError.'</span>'; ?>
                <div>
                <input type="text" name="fname" value="<?php echo $fname ?>" required/>
                </div>
                Last Name: <?php echo '<span style="color: red;">'.$lnameError.'</span>'; ?>
                <div>
                    <input type="text" name="lname" value="<?php echo $lname ?>" required/>
                </div>
                Address: <?php echo '<span style="color: red;">'.$addressError.'</span>'; ?>
                <div>
                <input type="text" name="address" value="<?php echo $address ?>" required/>
                </div>
                City: <?php echo '<span style="color: red;">'.$cityError.'</span>'; ?>
                <div>
                    <input type="text" name="city" value="<?php echo $city ?>" required/>
                </div>
                <br>
                <div>
						State:
						<select name = "state">
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
						</select>
				</div>
				</br>
                Zip Code: <?php echo '<span style="color: red;">'.$zipcodeError.'</span>'; ?>
                <div>
                    <input type="text" name="zipcode" placeholder="Zip Code" value="<?php echo $zipcode ?>" required/>
                </div>
	            Phone number: <?php echo '<span style="color: red;">'.$phonenumberError.'</span>'; ?>
                <div>
                    <input type="text" name="phonenumber" value="<?php echo $phonenumber ?>" placeholder="Phone number" required/>
                </div>
                <input type="submit" name="submit" value="Confirm"/>
            </fieldset>    
        </form>
    </div>
</body>
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