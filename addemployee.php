<?php

session_start();
if(!isset($_SESSION['employeefirstName'])){
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
$emailError="";
$passwordError="";
$positionError="";
$salaryError="";

if(!isset($_POST["add"])){

  $servername = "stardock.cs.virginia.edu";
  $username = "cs4750s17elk2fw";
  $serverpassword ="cs4750";
  $dbname = "cs4750s17elk2fw";

  $conn = new mysqli($servername, $username, $serverpassword, $dbname);
  if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $zipcode = $_POST["zipcode"];
  $state = $_POST["state"];
  $phonenumber= $_POST["phonenumber"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $position = $_POST["position"];
  $salary = $_POST["salary"];

  $sql = "INSERT INTO Employee (fname, lname, address, city, state, zipcode, phonenumber, email, password, position, salary) VALUES ('$fname', '$lname', '$address', '$city', '$state', '$zipcode', '$phonenumber', '$email', '$password', '$position', '$salary');" ;
  $result = $conn->query($sql);

  $row = mysqli_fetch_assoc($result);

  $conn->close();

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
$position="";
$salary="";

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
$tempemail = $_POST["email"];

//password check
$temppassword = $_POST["password"];


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

if(strlen($fnameError)==0 && strlen($lnameError)==0 && strlen($addressError)==0  && strlen($cityError)==0 && strlen($zipcodeError)==0 && strlen($phonenumberError)==0){
	$servername = "stardock.cs.virginia.edu";
	$username = "cs4750s17elk2fw";
	$serverpassword ="cs4750";
	$dbname = "cs4750s17elk2fw";

	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
	}

	$smt = $conn->prepare("INSERT INTO Employee (fname, lname, address, city, state, zipcode, phonenumber, email, password, position, salary) VALUES ('$fname', '$lname', '$address', '$city', '$state', '$zipcode', '$phonenumber', '$email', '$password', '$position', '$salary');" );
    $smt->bind_param("sssssiis", $fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email, $password, $position, $salary);
    $smt->execute();
    $smt->close();
    $conn->close();
    header( 'Location: employee.php' ) ;
    exit();
}
}

?>
