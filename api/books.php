<?php

require_once 'src/connect.php';
require_once 'src/Book.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (isset($_GET['id'])) {
        
        if (!empty($_GET['id'])) {
            $book = Book::loadFromDB($_GET['id']);
            echo json_encode($book);
        } else {
            $data['isOk'] = "Empty fields";
            $data['isOk'] = false;
            echo json_encode($data);
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

    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['description'])) {

        $author = $_POST['author'];
        $name = $_POST['title'];
        $book_desc = $_POST['description']; 

        $newBook = Book::create($name, $author);
        if ($newBook) {
            $newBook->setBook_desc($book_desc);
            $data['isOk'] = true;
        } else {
            $data['isOk'] = false;
        }
        echo json_encode($data);
    } else {
        $data['isOk'] = "Empty fields";
        $data['isOk'] = false;
        echo json_encode($data);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $del_vars);
    if (isset($del_vars['id'])) {
        $id = $del_vars['id'];
        $book = Book::loadFromDB($id);
        Book::deleteFromDB($book);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $data = [];
    $id = $put_vars['id'];
    $newBook = Book::loadFromDB($id);
    
    if (!empty($put_vars['author'])) {        
        $newBook->setAuthor($put_vars['author']);
    }

    if (!empty($put_vars['title'])) {
        $newBook->setName($put_vars['title']);
    }

    if (!empty($put_vars['description'])) {
        $newBook->setBook_desc($put_vars['description']);
    }

    if ($newBook->update() == true) {
        $data['isOk'] = true;
    } else {
        $data['isOK'] = false;
    }
    echo json_encode($data);
}