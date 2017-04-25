<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<script src="js/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="js/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<title>DELK's Books A Ecommerce Category Flat Bootstarp Resposive Website Template | single :: w3layouts</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

</head>

<body> 
<!--header-->
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="index.php">DELK's Books</a></h1>					
				</div>
			 <!---->		 
			 <div class="top-nav">
				<ul class="memenu skyblue" style="width: 120%""><li class="active"><a href="index.php">Home</a></li>
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
			 <!--</div> -->
			<div class="clearfix"> </div>
</div>
<!--header//-->
<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
				   <?php
$return_arr = array();
$servername = "stardock.cs.virginia.edu";
  $username = "cs4750s17elk2fw";
  $serverpassword ="cs4750";
  $dbname = "cs4750s17elk2fw";
$db = new mysqli($servername, $username, $serverpassword, $dbname);
        if ($db->connect_error):
        die ("Could not connect to db: " . $db->connect_error);
        endif;
     
$query = "SELECT * FROM Books WHERE ISBN = " . $_GET['book']; #Define query

$result= $db->query($query) or die ("Invalid select " . $db->error);
           #Eval and store result
$row = $result->fetch_assoc();

$query = "SELECT Author.* FROM `Author` NATURAL JOIN Books WHERE ISBN = '" . $_GET['book'] . "' AND Author.Name = Books.Author";
$result= $db->query($query) or die ("Invalid select " . $db->error);
           #Eval and store result
$arr = $result->fetch_assoc();


$picturepath = $row['PicturePath'];
$title = $row['Title'];
$author = $row['Author'];
$price = $row['Price'];
$description = $row['Description'];
$binding = $row['Binding'];
$publisher = $row['Publisher'];
$date = $row['Date'];
$genre = $row['Genre'];
$quantity = $row["Quantity"];


?>

					 <div class="flexslider">
							  <ul class="slides">
								<li data-thumb=<?php echo $picturepath?>>
									<div class="thumb-image"> <img src=<?php echo $picturepath?> data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								
								
							  </ul>
						</div>					 					 
					 <script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h2><?php echo $title?> </h2>			
						 <h4><?php echo $author?>	</h4>			
							<h5 class="item_price">$ <?php echo $price ?></h5>

							<p class="para"><?php echo $description ?> </p>
							<div class="prdt-info-grid">
								 <ul>
									 <li>- Binding : <?php echo $binding ?></li>
									 <li>- Publisher : <?php echo $publisher ?></li>
									 <li>- Date : <?php echo $date ?></li>
									 <li>- Genre : <?php echo $genre ?></li>
								 </ul>
							</div>
							<!--
							<div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery &amp; availability</p>
							 <form class="navbar-form">
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="Enter Pin code">
								  </div>
								  <button type="submit" class="btn btn-default">Verify</button>
							 </form>
						    </div>-->
						    <?php
						    	$formstring = "single.php?=" . $_GET['book']; 
						    ?>
						    <script>
$(document).ready(function() {
		$( "#buybutton" ).click(function() {
			$.ajax({
				url: 'buy.php',
				data: {bookID: "<?php echo $_GET['book']?>",
					   emailID: "<?php echo $_SESSION['email']?>",
					   quantityBought: $("#quantity").val(),
					   bookPrice: "<?php echo $price ?>" },
				success: function(data){
					$('#messages').html(data);

				}
			});
		});

	});
</script>
						    <div id = "messages">
						    </div>
						    <div id = "buy">
						    Quantity: <input type = "number" min="0" max="<?php echo $quantity?>" id = "quantity">
						    <br></br>
						    <button id= "buybutton" class="add-cart item_add"> Buy </button>
							</div>							
					 </div>
				 </div>
				 <div class="clearfix"> </div>
				 </br>
				 <h2> Author Biography </h2>
	  	<hr COLOR="black" NOSHADE></hr>
	  	<div class="container">
	  	<h4>Name: <?php echo $arr['Name'] ?></h4> 
	  	<h4>Phone: <?php echo "(".substr($arr['Phone'], 0, 3).") ".substr($arr['Phone'], 3, 3)."-".substr($arr['Phone'],6) ?></h4> 
	  	<h4>Email: <?php echo $arr['Email'] ?></h4> 
	  	</br> 
	  	<p><?php echo $arr['Bio'] ?>
	  	</div>
	  	</br> </br>
	  	<h2> Reviews </h2>
	  	<hr COLOR="black" NOSHADE></hr>
			 </div>

	     </div>
		 <!--
		 <div class="bottom-prdt">
			 <div class="btm-grid-sec">
				 <div class="col-md-2 btm-grid">
					 <a href="product.html">
						<img src="images/p3.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$1200</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					 <a href="product.html">
						<img src="images/p10.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$700</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p5.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$1300</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p4.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$9000</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p2.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$450</span></a>
				 </div>
				  <div class="clearfix"></div>
			 </div>			
		 </div> -->
	 </div>
</div>
<!---->
<!--
<div class="subscribe">
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