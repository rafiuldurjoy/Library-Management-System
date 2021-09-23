<?php

session_start();
include 'config.php';


if(!isset($_SESSION['id'])){
  header("location: index.php");
}

if ($_SESSION['type'] == 1){
    header("Location: admin_home.php");
}





if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$student_id = $_POST['student_id'];
	$phone = $_POST['phone'];
	$department = $_POST['department'];
    $user_id = $_SESSION['id'];
			$sql = "INSERT INTO user_details (name, student_id, phone, department, user_id)
            			VALUES ('$name', '$student_id', '$phone', '$department', '$user_id')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
				echo "<script>alert('Wow! Inserted.')</script>";
				header("location: myprofile.php");
            } else {
				echo "$res <script>alert('Woops! asdfasdfsd Wrong Went.')</script>";
			}
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Profile</title>
    <link rel="stylesheet" href="edit_profile.css">
    
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
            <h1 class="name">Edit Profile</h1>
            <div class="container">
		<form action="" method="POST" class="login-email">
			<div class="input-group">
				<input type="text" placeholder="name" name="name" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="student_id" name="student_id" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="phone" name="phone" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="department" name="department" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Edit Profile</button>
			</div>
		</form>
	</div>         </div>
</section> 
</body>
</html>