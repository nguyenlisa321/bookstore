<?php
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

        ///$stmt = $db->stmt_init();
        if(isset($_GET["delete"])){
         $sql = "Delete FROM Books Where ISBN = " . $_GET["ISBN"] ;
         if ($db->query($sql) === TRUE) {
            $successmessage = "Deleted " . $_GET["ISBN"];
         } else {
            $errormessage = "Unsuccesful Delete";
         }
        }else if(isset($_GET["Quantity"]) && isset($_GET["ISBN"])){
         $sql = "Update Books SET Quantity = " . $_GET["Quantity"] . " Where ISBN = " . $_GET["ISBN"] ;
         if ($db->query($sql) === TRUE) {
            $successmessage = "Increased " . $_GET["ISBN"] . " by " . $_GET["Quantity"];
         } else {
            $errormessage = "Unsuccesful Increase";
         }   
        }else{
             $errormessage = "Please select a valid quantity in which to increase the book by";
        }

        $sql = "Select ISBN, Title From Books" ;
        $result = $db->query($sql);

        echo '<h4> Order/delete more books </h4>';
        echo $errormessage;
        echo $successmessage;
        if(isset($errormessage) || isset($successmessage)){
          echo '<br></br>';
        }
        echo 'Title:';
        echo '<select id = "bookISBN"> <option value = banana> banana </option></select>';
        /*while($row = $result->fetch_assoc()){
                echo '<option value = " ' . $row['ISBN']  . '"/>'  . $row['Title'] . '</option>';
         } 
        </select>';*/
        echo '<br></br>';
        echo 'Quantity:';
        echo '<input type="number" id="addquantity" placeholder="0" min="0" max="5" required/>';
        echo '<br></br>';
        echo '<button id="add">Increase</button>';
        echo '<button id="delete">Delete</button>';
        $db->close();
?>
