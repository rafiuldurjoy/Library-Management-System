<?php

session_start();
include 'config.php';


if(!isset($_SESSION['id'])){
  header("location: index.php");
}

if ($_SESSION['type'] == 1){
  header("Location: admin_home.php");
}




$sql ="SELECT * FROM user_details LEFT JOIN books ON user_details.book_id = books.book_id WHERE user_id='{$_SESSION['id']}'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    
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
   <img src="images/profile-picture.jpg" alt="" class="img">
   <h1 class="name">My Profile</h1>
<div class="desc">
<?php
      if($result->num_rows>0) {
        while($row =$result->fetch_assoc()){
          ?>
<table width="100%">
	<col style="width:30%">
	<col style="width:60%">

  <tr>
    <td>Name:</td>
     <td><?php echo $row['name'];?></td>
  </tr>
    <tr>
    <td>Student Id:</td>
    <td><?php echo $row['student_id'];?></td>
	</tr>
  <tr>
	<td>Phone:</td>
	<td><?php echo $row['phone'];?></td>
	</tr>
  <tr>
	<td>Department:</td>
	<td><?php echo $row['department'];?></td>
	</tr>
  <tr>
	<td>Total Fine:</td>
	<td><?php echo $row['fine'];?></td>
	</tr>
    
    <tr>
	<td>Unresolved Fine:</td>
	<td><?php echo $row['unresolved_fine'];?></td>
	</tr>
<?php
if($row['book_id'] == NULL){
?>

  <tr>
  <td>
No book issued      </td>
</tr>
<?php

}
else{
?>
  <tr>
	<td>Issued Book:</td>
	<td><?php echo $row['book_name'];?></td>
        </tr>
  <tr>
    <td>
      Subject:
        </td>
        <td><?php echo $row['subject'];?></td>
  </tr>
  <tr>
    <td>
      Author:
        </td>
        <td><?php echo $row['author'];?></td>
	</tr>
  <?php
}
?>

</table>
   <?php
            }
          }
        else{
        ?>
</div>

<p class="test">Please update your details</p> 
<a class="clr" href="edit_profile.php" class="btn">Edit Profile</a></div>
<?php
}      
?>
</section> 
</body>
</html>