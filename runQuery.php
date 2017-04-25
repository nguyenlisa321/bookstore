<?php

        $servername = "stardock.cs.virginia.edu";
        $username =  $_GET['serverName'];
        $serverpassword ="cs4750";
        $dbname = "cs4750s17elk2fw";

        $conn = new mysqli($servername, $username, $serverpassword, $dbname);
		if($conn->connect_error){
			die("Connection failed: ". $conn->connect_error);
		}
		$sql = $_GET['textQuery'] ;
		if ($conn->query($sql) === TRUE) {
   			 echo "muahaa";
		} else {
			echo "Error: " . $conn->error;
		}
?>