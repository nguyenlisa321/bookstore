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
        die("Connection failed: ". $db->connect_error);
}

$errormessage1="";
$successmessage1="";

$errormessage2="";
$successmessage2="";


$errormessage3="";
$successmessage3="";

$fnameError="";
$lnameError="";
$addressError="";
$cityError= "";
$zipcodeError="";
$phonenumberError="";
$emailError="";
$passwordError="";
$positionError="";
$salaryError="";
$fname="";
$lname="";
$address="";
$city= "";
$state= "";
$zipcode="";
$phonenumber="";
$email="";
$password="";
$position="";
$salary="";

if(isset($_POST["edit"])){
	 $email = $_POST["employeeEmail"];
	 $sql = "Select * FROM Employee";
	 $result = $db->query($sql) or die($db->error);
 	 $row = $result->fetch_array();
     $newsalary = intval($_POST['editsalary']);
     $sql = "Update Employee SET salary = '$newsalary' where Employee.email = '$email' ";
     if ($db->query($sql) === TRUE) {
        $successmessage2 = "New Salary for " . $_POST["employeeEmail"] . " is '$newsalary'";
     } else {
        $errormessage2 = "Unsuccesful Change Of Salary";
     }
      $db->close();

}else if(isset($_POST["delete"])){
	
	 $email = $_POST["employeeEmail"];
     $sql = "Delete FROM Employee Where email = '$email' " ;
     if ($db->query($sql) === TRUE) {
        $successmessage1 = "Deleted '$email' ";
     } else {
        $errormessage1 = "Unsuccesful Delete";
     }
      $db->close();
	

}else if(isset($_POST["add"])){
		
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

	//salary check
	$tempsalary = $_POST["salary"];
	if(ctype_digit($tempsalary)){
		$salary = intval($tempsalary);
	}else{
		$salaryError = "Please enter a valid salary <br />";
	}

	//position check
	$position = $_POST["position"];

	//email check
	$tempemail = strtolower($_POST["email"]);
	if(preg_match("/@delk.com/", $tempemail)){
		$email = $tempemail;
	}else{
		$emailError = "Email must have @delk.com";
	}

	//no check needed for password
	$password = $_POST['password'];
	$passwordHashed = hash("md5", $password);

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

	if(strlen($fnameError)==0 && strlen($lnameError)==0 && strlen($addressError)==0  && strlen($cityError)==0 && strlen($zipcodeError)==0 && strlen($phonenumberError)==0 && strlen($emailError)==0){
		$smt = $db->prepare("INSERT INTO Employee (fname, lname, address, city, state, zipcode, phonenumber, email, password, position, salary) VALUES (?,?,?,?,?,?,?,?,?,?,?)" );
	    $smt->bind_param("sssssiisssd", $fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email, $passwordHashed, $position, $salary);
		if ($smt->execute()) { 
			$successmessage3 = "Inserted '$email' ";
		} else {
			$errormessage3 = "Email already in use";
		}
	    $smt->close();
	    $db->close();
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
					  $stmt->prepare("select fname, lname, address, city, state, zipcode, phonenumber, email, position, salary from Employee");
					  $stmt->execute();
			          $stmt->bind_result($fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email, $position, $salary);
			          echo '<table class = "table1">';
			          echo '<th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th><th>Email</th><th>Position</th><th>Salary</th>';
			          while($stmt->fetch()) {
			                    echo "<tr><td>$fname</td><td>$lname</td><td>$address</td><td>$city</td><td>$state</td><td>$zipcode</td><td>$phonenumber</td><td>$email</td><td>$position</td><td>$salary</td></tr>";
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
				  	echo '<b> ' . $errormessage1 .'</b>';
			        echo '<b> ' . $successmessage1 . '</b>';
			        if(isset($errormessage1) || isset($successmessage1)){
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
										echo '<option value = "' . $row['email']  . '"/>' . $row['email'] . '</option>';
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
						echo '<b> ' . $errormessage2 .'</b>';
							echo '<b> ' . $successmessage2 . '</b>';
							if(isset($errormessage2) || isset($successmessage2)){
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
									echo '<b> ' . $errormessage3 .'</b>';
										echo '<b> ' . $successmessage3 . '</b>';
										if(isset($errormessage3) || isset($successmessage3)){
											echo '<br></br>';
									}?>
										<form action="employee.php" method="post">
						            <fieldset>
						                <legend>Add New Employee</legend>
						                First Name: <?php echo '<span style="color: red;">'.$fnameError.'</span>'; ?>
						                <div>
						                <input type="text" name="fname" value="" required/>
						                </div>
						                Last Name: <?php echo '<span style="color: red;">'.$lnameError.'</span>'; ?>
						                <div>
						                    <input type="text" name="lname" value="" required/>
						                </div>
						                Address: <?php echo '<span style="color: red;">'.$addressError.'</span>'; ?>
						                <div>
						                <input type="text" name="address" value="" required/>
						                </div>
						                City:  <?php echo '<span style="color: red;">'.$cityError.'</span>'; ?>
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
						                Zip Code: <?php echo '<span style="color: red;">'.$zipcodeError.'</span>'; ?>
						                <div>
						                    <input type="text" name="zipcode" value="" required/>
						                </div>
														Phone number: <?php echo '<span style="color: red;">'.$phonenumberError.'</span>'; ?> 
							                <div>
							                    <input type="text" name="phonenumber" value="" required/>
							                </div>
														Email: <?php echo '<span style="color: red;">'.$emailError.'</span>'; ?>
								               <div>
								                  <input type="email" name="email" value="" required/>
								               </div>
														Password:
		 						                <div>
		 						                    <input type="password" name="password" value="" required/>
		 						                </div>
																Salary:
					 						             <div>
					 						                <input type="number" min="0" name="salary" value="" required/>
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
