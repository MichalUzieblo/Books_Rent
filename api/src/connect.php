<?php
require_once("Book.php");

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "coderslab";
$DB_DBNAME = "books_rent";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DBNAME);
if ($conn->connect_error) {
    die("Polaczenie z products_ex nieudane. Blad: " .
    $conn->connect_error);
} 

Book::SetConnection($conn);