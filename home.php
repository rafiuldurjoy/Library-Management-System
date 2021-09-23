<?php 
session_start();
if (!isset($_SESSION['id'])) {
    	header("Location: index.php");
}
if ($_SESSION['type'] == 1){
    header("Location: admin_home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
        <nav>
            <label class="logo">LMS - Student</label>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="book_list.php">Books</a></li>
                <li><a href="myprofile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <section >
            <div class="card">
            <h1 class="name">WELCOME</h1>
         <div class="desc">
            <h2>A library is a collection of materials,<br> books or media that are easily accessible for use and not just for display purposes.<br>
            It is responsible for housing updated information in order to meet the user's needs on a daily basis.</h2>
         </div>
         </div>
         </section> 
</body>
</html>