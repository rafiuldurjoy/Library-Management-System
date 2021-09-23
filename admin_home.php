<?php 
include 'config.php';

session_start();


if (!isset($_SESSION['id'])) {
	header("Location: index.php");
}

if ($_SESSION['type'] == 0){
    header("Location: home.php");
}




if (isset($_POST['submit'])) {
	$book_name = $_POST['book_name'];
	$author = $_POST['author'];
	$subject = $_POST['subject'];
	$total = $_POST['total'];

			$sql = "INSERT INTO books (book_name, author, subject, total)
			VALUES ('$book_name', '$author', '$subject', '$total')";

			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Insert Completed.')</script>";
				$book_name = "";
				$author = "";
				$subject="";
				$total ="";
			} else {
				echo "$result <script>alert('Woops! Wrong Went.')</script>";
			}
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin</title>
    <link rel="stylesheet" href="admin_home.css">
    
</head>
<body>
        <nav>
            <label class="logo">LMS - Admin</label>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <section >
            <div class="card">
            <h1 class="name">Add New book</h1>
            <div class="container">
		<form action="" method="POST" class="login-email">
			<div class="input-group">
				<input type="text" placeholder="Book Name" name="book_name" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Author" name="author" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Subject" name="subject" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Total" name="total" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Insert</button>
			</div>
	</div>         </div>
         </section> 
</body>
</html>