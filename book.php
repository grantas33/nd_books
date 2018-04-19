<?php

include 'BookRepository.php';

$bookId = $_GET['id'];
$bookRepository = new BookRepository();
$book = $bookRepository->getBook($bookId);

    echo "<table><tr><th>Author</th><th>Title</th><th>Year</th></tr>";

        echo "<tr>
                <td>".$book->getAuthorId()."</td> 
                <td>".$book->getTitle()."</td>
                <td>".$book->getYear()."</td>
              </tr>";

    echo "</table>";

$bookRepository->close();