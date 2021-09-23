<?php
include 'config.php';
session_start();

if(!isset($_SESSION['id'])){
  header("location: index.php");
}

if ($_SESSION['type'] == 0){
  header("Location: book_list.php");
}




$sql_book = "SELECT book_id, book_name, author, subject, total, issued, (total-issued) as available  FROM books ";

$book = $conn->query($sql_book);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="student_info.css">

</head>
<body>
    <nav>
        <label class="logo">LMS - Admin</label>
        <ul>
            <li><a href="admin_home.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
    <h1 class="name">BOOKS</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>Name</th>
        <th>Author</th>
        <th>Total</th>
        <th>Avalaible</th>
        <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($book->num_rows > 0){
          while($books =$book->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $books['book_name'];?></td>
              <td><?php echo $books['author'];?></td>
              <td><?php echo $books['total'];?></td>
              <td><?php echo $books['available'];?></td>
            </tr>
            <?php 
          }
        }
        ?>
      </tbody>
    </table>
  </div></body>
</html>