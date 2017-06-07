<?php

class Book {
    static private $conn;
    
    private $id;
    private $name;
    private $author;
    private $book_desc;
    
    public static function SetConnection($newConnection){
        User::$conn = $newConnection;
    }
    
    public function __construct() {
        $this->id = -1;
        $this->name = "";
        $this->author = "";
        $this->book_desc = "";
    }
    
    public static function loadFromDB($id){
        $sqlStatement = "Select * from Book where id = '$id'";
        $result = Book::$conn->query($sqlStatement);
        if ($result->num_rows == 1) {
            $bookData = $result->fetch_assoc();
            return new Book($bookData['id'], $bookData['name'], $bookData['author'], $bookData['book_desc']);
        }
        //there is user with this name in db
        return -1;
    }
    
    public static function create($name, $author){
        $sqlStatement = "Select * from Book where email = '$userMail'";
        $result = Book::$conn->query($sqlStatement);
        if ($result->num_rows == 0) {
            //inserting user to db
            
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
            $sqlStatement = "INSERT INTO Users(name, email, password, info) values ('', '$userMail', '$hashed_password', '')";
            if (User::$conn->query($sqlStatement) === TRUE) {
                //entery was added to DB so we can return new object
                return new User(User::$conn->insert_id, 'jakies', $userMail, 'glupoty', $hashed_password);
            }
        }
        //there is user with this name in db
        return null;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getBook_desc() {
        return $this->book_desc;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setBook_desc($book_desc) {
        $this->book_desc = $book_desc;
    }
    
    

}
