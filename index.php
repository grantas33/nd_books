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

$sql = "SELECT bookId, authorId, title, `year` FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Author</th><th>Title</th><th>Year</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["bookId"]."</td> 
                <td>".$row["authorId"]."</td>
                <td>".$row["title"]."</td>
                <td>".$row["year"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();