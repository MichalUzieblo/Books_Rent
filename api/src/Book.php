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
    
    public function __construct($newId, $newName, $newAuthor, $newDesc) {
        $this->id = $newId;
        $this->name = $newName;
        $this->author = $newAuthor;
        $this->book_desc = $newDesc;
    }
    
    public static function loadFromDB($id){
        $sqlStatement = "Select * from Book where id = '$id'";
        $result = Book::$conn->query($sqlStatement);
        
        if ($result->num_rows == 1) {
            
            $bookData = $result->fetch_assoc();
            return new Book($bookData['id'], $bookData['name'], $bookData['author'], $bookData['book_desc']);
        }
        return NULL;
    }
    
    public static function create($name, $author){
        $sqlStatement = "Select * from Book where name = '$name'";
        $result = Book::$conn->query($sqlStatement);
        
        if ($result->num_rows == 0) {
            
            $sqlStatement = "INSERT INTO Book(name, author, book_desc) values ('$name', '$author', 'description')";
            if (Book::$conn->query($sqlStatement) === TRUE) {
                return new Book(Book::$conn->insert_id, $name, $author, 'description');
            }
        } 
        return null;
    }
    
    public function udate(){
        $sql = "UPDATE Book SET name='{$this->name}', author='{$this->author}', book_desc='{$this->book_desc}' WHERE id={$this->id}";
        return Book::$conn->query($sql);
    }
    
    public static function deleteFromDB(Book $toDelete){        
        $sql = "DELETE FROM Book WHERE id=" . $toDelete->getId();
        
        if (Book::$conn->query($sql) === TRUE) {
            return true;
        }        
        return false;
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
