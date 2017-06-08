<?php

require_once 'src/connect.php';
require_once 'src/Book.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (isset($_GET['id'])) {
        
        if (!empty($_GET['id'])) {
            $book = Book::loadFromDB($_GET['id']);
            echo json_encode($book);
        } else {
            echo 'empty';
        }
    } else {
        $sql_id = "SELECT id FROM Book ORDER BY author, name";
        $result = $conn->query($sql_id);
        $books = [];
        while ($row = $result->fetch_assoc()) {
            $book = Book::loadFromDB($row['id']);
            $bookEncode = json_encode($book);
            $books[] = $bookEncode;
        }
        echo json_encode($books);
    }
}