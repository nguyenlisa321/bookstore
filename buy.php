<?php
        $servername = "stardock.cs.virginia.edu";
        $username = "cs4750s17elk2fw";
        $serverpassword ="cs4750";
        $dbname = "cs4750s17elk2fw";

        $db = new mysqli($servername, $username, $serverpassword, $dbname);
        if($db->connect_error){
                die("Connection failed: ". $conn->connect_error);
        }
       

       $bookID = $_GET['bookID'];
       $emailID = $_GET['emailID'];
       $quantityBought = intval($_GET['quantityBought']);
       $bookPrice = doubleval($_GET['bookPrice']);
       $totalPrice = doubleval($quantityBought * $bookPrice); 
       $errormessage = "";

        $sql = "Select Quantity From Books where ISBN = " . $bookID;
        $results = $db->query($sql);
        $row = $results->fetch_assoc();
        $actualQuantity = $row['Quantity'];

       if($quantityBought > $actualQuantity || $quantityBought <= 0 ) {
        $errormessage = "Please buy between 0 and " . $actualQuantity . " copies of this book";
        echo $errormessage;
        $db->close();
       }else{
        $difference = $actualQuantity - $quantityBought; 
        $sql = "Update Books Set Quantity = " . $difference . " Where ISBN = " . $bookID;

        if ($db->query($sql) === TRUE) {
            //echo "Books bought";
            date_default_timezone_set('EST');
            $date = date("Y-m-d");

            $sql = "Select count(*) AS `count` from Buys";
            $results =  $db->query($sql);
            $row = $results->fetch_assoc();
            $transactionid = intval($row['count']) + 1;

            $sql = "Insert into Buys (email, ISBN, transaction_id, dateTransaction, quantityBought, bookPrice, totalPrice) Values ('$emailID', '$bookID', '$transactionid', '$date', '$quantityBought', '$bookPrice', '$totalPrice' ) ";
             
             if ($db->query($sql) === TRUE) {
                echo "Succesfully bought " . $quantityBought . " copies";
                $db->close();
             }else{
                echo "Couldn't buy book: " . $db->error;
                $db->close();
             }

        } else {
            echo "Couldn't buy book: " . $db->error;
            $db->close();
        }




       }


?>