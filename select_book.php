<?php

session_start();
include 'config.php';


if(!isset($_SESSION['id'])){
  header("location: index.php");
}


$book_id = $_GET['id'];
$sql_book = "UPDATE books SET issued = issued + 1 WHERE book_id = '$book_id'";

$sql = "UPDATE user_details SET book_id='$book_id' WHERE user_id='{$_SESSION['id']}' limit 1";

if (mysqli_query($conn, $sql_book)) {
    if (mysqli_query($conn, $sql)) {
        header("location: http://127.0.0.1/Library/book_list.php");

    }
}
  



?>