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

if(isset($_POST["edit"])){
		 $email = $_POST["employeeEmail"];
		 $sql = "Select * FROM Employee";
		 $result = $db->query($sql) or die($db->error);
     $row = $result->fetch_array();
     $newsalary = intval($_POST['editsalary']);
     $sql = "Update Employee SET salary = '$newsalary' where Employee.email = '$email' ";
     if ($db->query($sql) === TRUE) {
        $successmessage = "New Salary for " . $_POST["employeeEmail"] . " is '$newsalary'";
     } else {
        $errormessage = "Unsuccesful Increase";
     }
}else if(isset($_POST["delete"])){
	   $email = $_POST["employeeEmail"];
     $sql = "Delete FROM Employee Where email = '$email' " ;
     if ($db->query($sql) === TRUE) {
        $successmessage = "Deleted '$email' ";
     } else {
        $errormessage = "Unsuccesful Delete";
     }
}else{
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
			<br></br>
			<h1><u>Employee Information Page</u></h1>
			<br></br>
			<div id = "employeetable">
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
					  $stmt->prepare("select * from Employee");
					  $stmt->execute();
			          $stmt->bind_result($fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email, $password, $position, $salary);
			          echo '<table class = "table1">';
			          echo '<th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th><th>Email</th><th>Password</th><th>Position</th><th>Salary</th>';
			          while($stmt->fetch()) {
			                    echo "<tr><td>$fname</td><td>$lname</td><td>$address</td><td>$city</td><td>$state</td><td>$zipcode</td><td>$phonenumber</td><td>$email</td><td>$password</td><td>$position</td><td>$salary</td></tr>";
			          }
			         echo '</table>';
		    		$conn->close();
			    ?>
				</div>
				<br><br>
				<hr COLOR="black" NOSHADE></hr>
				<br><br>
				<div id = "newdelete">
		  		<h4>Delete an Employee</h4>
				  	<?php
				  	echo '<b> ' . $errormessage .'</b>';
			        echo '<b> ' . $successmessage . '</b>';
			        if(isset($errormessage) || isset($successmessage)){
			          echo '<br></br>';
			        }?>
				  		Email:
		  				<form action=employee.php method = post>
		  					<select name = "employeeEmail">
					        <?php
					        $servername = "stardock.cs.virginia.edu";
									$username = "cs4750s17elk2fw";
									$serverpassword ="cs4750";
									$dbname = "cs4750s17elk2fw";

									$conn = new mysqli($servername, $username, $serverpassword, $dbname);
									if($conn->connect_error){
										die("Connection failed: ". $conn->connect_error);
									}
									$sql = "Select email, fname From Employee" ;

									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()){
										echo '<option value = "' . $row['email']  . '"/>' . $row['fname'] . '</option>';
									}
									$conn->close();
					        		?>
	        		</select>
	        		<br></br>
					  	<button name="delete" value = "delete">Delete</button>
					  	</form>

				    <hr COLOR="black" NOSHADE></hr>
				    <br><br>

					<h4>Edit Employee Salary</h4>
						<?php
						echo '<b> ' . $errormessage .'</b>';
							echo '<b> ' . $successmessage . '</b>';
							if(isset($errormessage) || isset($successmessage)){
								echo '<br></br>';
							}?>
							Email:
							<form action=employee.php method = post>
								<select name = "employeeEmail">
									<?php
									$servername = "stardock.cs.virginia.edu";
									$username = "cs4750s17elk2fw";
									$serverpassword ="cs4750";
									$dbname = "cs4750s17elk2fw";

									$conn = new mysqli($servername, $username, $serverpassword, $dbname);
									if($conn->connect_error){
										die("Connection failed: ". $conn->connect_error);
									}
									$sql = "Select email, fname, salary From Employee" ;

									$result = $conn->query($sql);

									while($row = $result->fetch_assoc()){
										echo '<option value = "' . $row['email']  . '"/>' . $row['fname'] . '</option>';
									}
									$conn->close();
									?>
							</select>
							<br></br>
							Salary:
							<input type="number" name="editsalary" placeholder="0" min="0" max="100000" required/>
							<br><br>
							<button name="edit" value="edit">Update</button>
							</form>

							<hr COLOR="black" NOSHADE></hr>
							<br><br>
									<?php
									echo '<b> ' . $errormessage .'</b>';
										echo '<b> ' . $successmessage . '</b>';
										if(isset($errormessage) || isset($successmessage)){
											echo '<br></br>';
										}?>
										<form action="addemployee.php" method="post">
						            <fieldset>
						                <legend>Add New Employee</legend>
						                First Name:
						                <div>
						                <input type="text" name="fname" value="" required/>
						                </div>
						                Last Name:
						                <div>
						                    <input type="text" name="lname" value="" required/>
						                </div>
						                Address:
						                <div>
						                <input type="text" name="address" value="" required/>
						                </div>
						                City:
						                <div>
						                    <input type="text" name="city" value="" required/>
						                </div>
						                <br>
						                <div>
												State:
												<br>
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
						                Zip Code:
						                <div>
						                    <input type="text" name="zipcode" value="" required/>
						                </div>
														Phone number:
							                <div>
							                    <input type="text" name="phonenumber" value="" required/>
							                </div>
														Email:
								               <div>
								                  <input type="text" name="email" value="" required/>
								               </div>
														Password:
		 						                <div>
		 						                    <input type="text" name="password" value="" required/>
		 						                </div>
																Salary:
					 						             <div>
					 						                <input type="text" name="salary" value="" required/>
					 						             </div>
														Position:
															<br>
															<div>
															<select name = "position">
																<option value="General">General</option>
																<option value="Manager">Manager</option>
																<option value="Owner">Owner</option>
															</select>
														</div>
						            </fieldset>
							<br><br>
							<button name="add" value="add">Add New Employee</button>
						</form>
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
