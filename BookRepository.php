<?php
/**
 * Created by PhpStorm.
 * User: grantas
 * Date: 18.4.19
 * Time: 21.45
 */

include 'Book.php';

class BookRepository
{

    private $conn;

    function __construct()
    {
        $this->conn = $this->connect();
    }

    function connect(){
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

        return $conn;
    }

    function getAll(){

        $sql = "SELECT bookId, title FROM Books";
        $result = $this->conn->query($sql);
        $books = array();
        while($row = $result->fetch_assoc()){
            $book = new Book();
            $book->setId($row['bookId']);
            $book->setTitle($row['title']);
            array_push($books, $book);
        }

        return $books;
    }

    function getBook($id){
        $sql = "SELECT authorId, title, `year` FROM Books.Books
WHERE Books.Books.bookId = ".$id;
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $book = new Book();
        $book->setId($id);
        $book->setAuthorId($row['authorId']);
        $book->setTitle($row['title']);
        $book->setYear($row['year']);

        return $book;

    }

    function close(){
       $this->conn->close();
    }
}