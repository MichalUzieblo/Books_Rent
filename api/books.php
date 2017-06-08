<?php

require_once 'src/conect.php';
require_once 'src/Book.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $sql_id = "SELECT id FROM books ORDER BY author, name";
    $result = $conn->query($sql_id);
    $books = [];
    while ($row = $result->fetch_assoc()) {
        $book = new Book();
        $book->loadFromDB($row['id']);
        $books[] = $book;
    }
    echo json_encode($books);
}