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
echo var_dump($row);
//echo $row['ISBN'];
//while ($row = $result->fetch_assoc()) {
  //echo var_dump($row);
  //array_push($return_arr,$row);
//}



//echo json_encode($return_arr);
?>
