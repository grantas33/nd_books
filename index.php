<?php

include 'BookRepository.php';

$bookRepository = new BookRepository();
$books = $bookRepository->getAll();

echo "<table><tr><th>ID</th><th>Title</th></tr>";
foreach ($books as $book){
    echo "<tr>
               <td><a href=\"book.php?id=".$book->getId()."\">".$book->getId()."</td>
                <td>".$book->getTitle()."</td>
              </tr>";
}
echo "</table>";

$bookRepository->close();