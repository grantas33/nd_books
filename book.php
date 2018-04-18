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

$bookId = $_GET['id'];
$sql = "SELECT Books.Authors.name, title, `year` FROM Books.Books 
LEFT JOIN Books.Authors ON Books.Authors.authorId = Books.Books.authorId
WHERE Books.Books.bookId = ".$bookId;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Author</th><th>Title</th><th>Year</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["name"]."</td> 
                <td>".$row["title"]."</td>
                <td>".$row["year"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();