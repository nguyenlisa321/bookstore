<?php
        $servername = "stardock.cs.virginia.edu";
        $username = "cs4750s17elk2fw";
        $serverpassword ="cs4750";
        $dbname = "cs4750s17elk2fw";

        $db = new mysqli($servername, $username, $serverpassword, $dbname);
        if($db->connect_error){
                die("Connection failed: ". $conn->connect_error);
}
        ///$stmt = $db->stmt_init();
        $searchString = $_GET['searchBook'];

        $sql = "select ISBN, Title, Author, Genre, Date, Binding, Price, Quantity, Publisher, Publisher_Price from Books Order By " . $searchString . " ASC";
        $result = $db->query($sql);

        echo '<table class= "table1">';
        echo '<th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Date</th><th>Binding</th><th>Price</th><th>Quantity</th><th>Publisher</th><th>Publisher Price</th>';

        while($row = $result->fetch_assoc()) {
        echo '<tr> <td> '. $row['ISBN'] . ' </td> <td>' . $row['Title'] . ' </td> <td> ' . $row['Author'] . '</td> <td> '. $row['Genre'] . ' </td> <td> ' . $row['Date'] . '</td><td>'. $row['Binding'] . '</td> <td>' . $row['Price'] . '</td><td> '. $row['Quantity'] . ' </td> <td>' . $row['Publisher'] . ' </td> <td> ' . $row['Publisher_Price'] . '</td></tr>';
        }                       
        echo '</table>';
       
        /*if($stmt->prepare("select ISBN, Title, Author, Genre, Date, Binding, Price, Quantity, Publisher, Publisher_Price from Books Order By ? DESC") or die(mysqli_error($db))) {
                $stmt->bind_param('s', $searchString);
                $stmt->execute();
                $stmt->bind_result($isbn, $title, $author, $genre, $date, $binding, $price, $quantity, $publisher, $publisherprice);
                echo '<table class= "table1">';
                echo '<th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Date</th><th>Binding</th><th>Price</th><th>Quantity</th><th>Publisher</th><th>Publisher Price</th>';
                while($stmt->fetch()) {
                        echo "<tr><td>$isbn</td><td>$title</td><td>$author</td><td>$genre</td><td>$date</td><td>$binding</td><td>$price</td><td>$quantity</td><td>$publisher</td><td>$publisherprice</td></tr>";
                }
                echo "</table>";

                $stmt->close(); 
        }else{
                echo "Die";
        }*/
        
        $db->close(); 
?>
