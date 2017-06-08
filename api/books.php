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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [];
//    var_dump($_POST);
    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['description'])) {

        $author = $_POST['author'];
        $name = $_POST['title'];
        $book_desc = $_POST['description']; 

        $newBook = Book::create($name, $author);
        if ($newBook) {
            $newBook->setBook_desc($book_desc);
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        echo json_encode($data);
    } else {
        $data['message'] = "Niekompletne informacje";
        $data['success'] = false;
        echo json_encode($data);
    }
}