<?php

session_start();
if(!isset($_SESSION['employeefirstName'])){
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
}

$servername = "stardock.cs.virginia.edu";
$username = "cs4750s17elk2fw";
$serverpassword ="cs4750";
$dbname = "cs4750s17elk2fw";

$db = new mysqli($servername, $username, $serverpassword, $dbname);
if($db->connect_error){
        die("Connection failed: ". $conn->connect_error);
}

$errormessage="";
$successmessage="";

if(isset($_POST["delete"])){
     $sql = "Delete FROM Books Where ISBN = " . $_POST["bookISBN"] ;
     if ($db->query($sql) === TRUE) {
        $successmessage = "Deleted " . $_POST["bookISBN"];
     } else {
        $errormessage = "Unsuccesful Delete";
     }
}else if(isset($_POST["add"])){
     $sql = "Select Quantity FROM Books where ISBN = " . $_POST['bookISBN'];
     $result = $db->query($sql);
     $row = $result->fetch_assoc();
     $currentquantity = $row["Quantity"];
     $newquantity = intval($currentquantity) + intval($_POST['addquantity']);
     $sql = "Update Books SET Quantity = " . $newquantity . " Where ISBN = " . $_POST['bookISBN'] . "";
     if ($db->query($sql) === TRUE) {
        $successmessage = "Increased " . $_POST["bookISBN"] . " by " . $_POST["addquantity"];
     } else {
        $errormessage = "Unsuccesful Increase";
     }   
}else{
}

?>

<!DOCTYPE html>
<html>
<head>
<script src="js/js/jquery-1.6.2.min.js" type="text/javascript"></script> 
<script src="js/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$( "#title" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Title"},
				success: function(data){
					$('#booktable').html(data);	
				
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#author" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Author"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#genre" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Genre"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#date" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Date"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#price" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Price"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#quantity" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Quantity"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#publisher" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Publisher"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#publisherprice" ).click(function() {
			$.ajax({
				url: 'searchBook.php', 
				data: {searchBook: "Publisher_Price"},
				success: function(data){
					$('#booktable').html(data);	
				}
			});
		});
		
	});
	/*
	$(document).ready(function() {
		$( "#add" ).click(function() {
			$.ajax({
				url: 'adddeletebook.php', 
				data: { ISBN: $("#bookISBN").val(),
				Quantity: $( "#addquantity" ).val()},
				success: function(data){
					$('#adddelete').html(data);	
				}
			});
		});
		
	});
	$(document).ready(function() {
		$( "#delete" ).click(function() {
			$.ajax({
				url: 'adddeletebook.php', 
				data: {delete: "true", 
				ISBN: $("#bookISBN").val() },
				success: function(data){
					$('#adddelete').html(data);	
				}
			});
		});
		
	});*/
</script>

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
				<ul class="memenu skyblue" style="width: 140%"">
					<li class="grid"><a href="customer.php">Customers</a>
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
					<li class="grid"><a href="book.php">Books</a>
						<!--<div class="mepanel" style="width: 115px; margin-left: 160px;">
							<!--
							<div class="row">
								<div class="col1 me-one">
								<!--	
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
					<!--		</div>
						</div>
					</li> -->
					<li class="grid"><a href="employee.php">Employees</a></li>
					<li class="grid"><a href="publisher.php">Publishers</a>
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
				 	<li class="grid"><a style="width: 130px; height: 97px;" href="employeedash.php">Employee Dashboard </a> </li>
				    <?php echo'<div style="margin-top: 4%; margin-left: 50%"> Welcome Employee ' . $_SESSION["employeefirstName"] . ' ' . $_SESSION["employeelastName"] . '   (<a href="login.php?logout=true">Logout</a>) </div>' ; ?>
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
<div class="contact">
	  <div class="container">
	  	<h1><u>Book Information Page</u></h1>
	  	<br></br>
	  	<div id = "adddelete">
	  	<h4> Order/delete more books </h4>
	  	<?php
	  	echo '<b> ' . $errormessage .'</b>';
        echo '<b> ' . $successmessage . '</b>';
        if(isset($errormessage) || isset($successmessage)){
          echo '<br></br>';
        }?>
	  	Title:
	  	<form action=book.php method = post>
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
				$sql = "Select ISBN, Title From BookInfo" ;

				$result = $conn->query($sql);

				while($row = $result->fetch_assoc()){
					echo '<option value = " ' . $row['ISBN']  . '"/>'  . $row['Title'] . '</option>';
				}
				$conn->close();
        		?>
        </select>
        <br></br>
        Quantity:
        <input type="number" name="addquantity" placeholder="0" min="0" max="1000" required/>
        <br></br>
	  	<!--<button id="add">Increase</button>
	  	<button id="delete">Delete</button>-->
	  	<button name="add" value="add">Increase</button>
	  	<button name="delete" value = "delete">Delete</button>
	  	</form>
	  	</div>
	  	<br></br>
	  	<hr COLOR="black" NOSHADE></hr>
	  	<br></br>
		<button id="title">Order by Title</button> <button id="author">Order by Author</button> <button id="genre">Order by Genre</button> <button id="date">Order by Date</button> <button id="price">Order by Book Price</button> <button id="quantity">Order by Quantity</button> <button id="publisher">Order by Publisher</button> <button id="publisherprice">Order by Publisher Price</button>
		<br></br>
		<br></br>
		<div id = "booktable">
		<?php
			$servername = "stardock.cs.virginia.edu";
			$username = "cs4750s17elk2fw";
			$serverpassword ="cs4750";
			$dbname = "cs4750s17elk2fw";

			$conn = new mysqli($servername, $username, $serverpassword, $dbname);
			if($conn->connect_error){
				die("Connection failed: ". $conn->connect_error);
			}
			 $stmt = $conn->stmt_init();
			  $stmt->prepare("select * from BookInfo");
			  $stmt->execute();
	          $stmt->bind_result($isbn, $title, $author, $genre, $date, $binding, $price, $quantity, $publisher, $publisherprice);
	          echo '<table class = "table1">';
	          echo '<th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Date</th><th>Binding</th><th>Price</th><th>Quantity</th><th>Publisher</th><th>Publisher Price</th>';
	          while($stmt->fetch()) {
	                    echo "<tr><td>$isbn</td><td>$title</td><td>$author</td><td>$genre</td><td>$date</td><td>$binding</td><td>$price</td><td>$quantity</td><td>$publisher</td><td>$publisherprice</td></tr>";
	          }
	         echo '</table>';
    		$conn->close(); 
	    ?>
		</div>

	</div>
</div>
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