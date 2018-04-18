<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bookId, title FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Title</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><a href=\"book.php?id=".$row["bookId"]."\">".$row["bookId"]."</td> 
                <td>".$row["title"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();