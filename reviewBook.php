<?php

session_start();
if(!isset($_SESSION['firstName'])){
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
}

if(!isset($_POST["reviewtext"])){
$servername = "stardock.cs.virginia.edu";
$username = "cs4750s17elk2fw";
$serverpassword ="cs4750";
$dbname = "cs4750s17elk2fw";

$conn = new mysqli($servername, $username, $serverpassword, $dbname);
if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
$email = $_SESSION['email'];
$sql = "SELECT ISBN FROM PlacesOrder where ISBN NOT IN(SELECT ISBN FROM Reviews where email = '$email') AND email = '$email'" ;

$result = $conn->query($sql);
if($result->num_rows==0){
	$conn->close();
	header('Location: member.php');
	exit;
}else{
	$conn->close();
}

}else{
	$servername = "stardock.cs.virginia.edu";
	$username = "cs4750s17elk2fw";
	$serverpassword ="cs4750";
	$dbname = "cs4750s17elk2fw";

	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	date_default_timezone_set('EST');
	$date = date("Y-m-d");

	$smt = $conn->prepare("INSERT INTO Reviews (email, ISBN, review_text, rating, review_date) VALUES (?,?,?,?,?) " );
    $smt->bind_param("sssis", $_SESSION["email"], $_POST["bookISBN"], $_POST["reviewtext"], $_POST["rating"], $date);
    $smt->execute();
    $smt->close();
    $conn->close();
    header( 'Location: member.php' ) ;
    exit;
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
        <form action="reviewBook.php" method="post">
            <fieldset>
                <legend>Write a Review </legend>
                <br>
                <div>
				Book Title: 
				<select name = "bookISBN">
                <?php 
                $servername = "stardock.cs.virginia.edu";
				$username = "cs4750s17elk2fw";
				$serverpassword ="cs4750";
				$dbname = "cs4750s17elk2fw";

				$conn = new mysqli($servername, $username, $serverpassword, $dbname);
				if($conn->connect_error){
					die("Connection failed: ". $conn->connect_error);
				}
				$email = $_SESSION['email'];
				$sql = "Select DISTINCT ISBN, Title FROM Books NATURAL JOIN (SELECT * FROM PlacesOrder where ISBN NOT IN(SELECT ISBN FROM Reviews where email = '$email') AND email = '$email') AS table_2" ;

				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()){
					echo '<option value = " ' . $row['ISBN']  . '"/>'  . $row['Title'] . '</option>';
				}
				$conn->close();
                ?>
                </select>
				</div>
				</br>
			    Rating(0-5): 
			    <div>
                    <input type="number" name="rating" placeholder="0" min="0" max="5" required/>
                </div>
               	Review Thoughts:
               	<div>
                    <div class="small"></div>
                    <textarea name="reviewtext" placeholder="Message" required></textarea>
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