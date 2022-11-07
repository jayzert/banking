<?php 
if(!isset($_SESSION['admin'])){
    header('location:../includes/login.php');
}
else{ 
    $admin = $_SESSION['admin'];
}
$users = 0;
$info = mysqli_query($db, "SELECT * FROM users"); 
while($row = mysqli_fetch_array($info)){ 
	$users++;
}
?>