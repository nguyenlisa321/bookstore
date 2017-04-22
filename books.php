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
     
$query = "SELECT Title, Author, Price, PicturePath, Genre FROM Books"; #Define query
$result= $db->query($query) or die ("Invalid select " . $db->error);
           #Eval and store result
while ($row = $result->fetch_assoc()) {
  //echo var_dump($row);
  array_push($return_arr,$row);
}



echo json_encode($return_arr);
?>
