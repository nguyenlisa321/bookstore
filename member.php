<?php
session_start();
if(!isset($_SESSION['firstName'])){
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>DELK's Books: The best online shop to find your books</title>
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
      	auto: true,
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
<div class="contact">
	  <div class="container">
		<?php 
		echo '<h2 class> Hello <span>' . $_SESSION["firstName"] . '</span> </h2>  ' ;
		?>
		<p>Below, you may look at your purchase history or edit your personal information.</p>					
	</div>
</div>


<!---->
<!---->
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
