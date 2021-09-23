<?php
include 'config.php';
session_start();

if(!isset($_SESSION['id'])){
  header("location: index.php");
}

if ($_SESSION['type'] == 1){
    header("Location: books.php");
}




$sql_user = "SELECT book_id, unresolved_fine FROM user_details where user_id='{$_SESSION['id']}' limit 1";
$sql_book = "SELECT book_id, book_name, author, subject, total, issued, (total-issued) as available  FROM books ";

$user = $conn->query($sql_user);
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
        <label class="logo">LMS - Student</label>
        <ul>
            <li><a href="admin_home.php">Home</a></li>
            <li><a href="book_list.php">Books</a></li>
            <li><a href="myprofile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
    <h1 class="name">AVAILABLE BOOKS</h1>
    <?php
            if ($user->num_rows > 0){
                while($users =$user->fetch_assoc()){
        
?>
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>Name</th>
        <th>Author</th>
        <th>Total</th>
        <th>Avalaible</th>
        <th>Action</th>
        <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
    
        if ($book->num_rows > 0){
          while($books =$book->fetch_assoc()){
            if($books['available'] > 1){
            ?>
            <tr>
              <td><?php echo $books['book_name'];?></td>
              <td><?php echo $books['author'];?></td>
              <td><?php echo $books['total'];?></td>
              <td><?php echo $books['available'];?></td>
              <?php  
                if (! isset($users['book_id'])){
              ?>
              <td><a  class="act" href="select_book.php/?id=<?php echo $books['book_id']; ?> ">Select</a> </td>
              <?php
                }
                else{
                    if ($users['unresolved_fine']<= 0){
                        ?>
                        <td>Return book</td>
                        <?php
                    }
                    else{
                        ?>
                    <td>Contact with Accounts</td>
                    <?php
                    }

                }
            }}
              ?>

            </tr>
            <?php }

        }}
        else{
            ?>
<h2 class="test">Please update your profile details<h2>
    <a class="clr" href="edit_profile.php">Edit Profile</a>
            <?php         


        }
        ?>
      </tbody>
    </table>
  </div></body>
</html>