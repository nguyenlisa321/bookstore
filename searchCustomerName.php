<?php
        $servername = "stardock.cs.virginia.edu";
        $username = "cs4750s17elk2fw";
        $serverpassword ="cs4750";
        $dbname = "cs4750s17elk2fw";

        $db = new mysqli($servername, $username, $serverpassword, $dbname);
        if($db->connect_error){
                die("Connection failed: ". $conn->connect_error);
}
        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from CustomerInfo where lname like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchCustomerName'] . '%';
                $stmt->bind_param("s", $searchString);
	        $stmt->execute();
                $stmt->bind_result($fname, $lname, $address, $city, $state, $zipcode, $phonenumber, $email);
                echo '<table class= "table1">';
                echo '<th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th><th>Email</th>';
                while($stmt->fetch()) {
                        echo "<tr><td>$fname</td><td>$lname</td><td>$address</td><td>$city</td><td>$state</td><td>$zipcode</td><td>$phonenumber</td><td>$email</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }else{
                echo "Die";
        }

        $db->close();
?>
