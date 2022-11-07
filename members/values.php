<?php 
if(!isset($_SESSION['member'])){
    header('location:../includes/login.php');
}
else{ 
    $member = $_SESSION['member'];
}

$status = "";
$info = mysqli_query($db, "SELECT * FROM users WHERE username='$member' "); 
while($row = mysqli_fetch_array($info)){ 
	$status = $row['status'];
}

if($status == "inactive"){
    header('location: change_password.php');
}

$balance = 0;
$info = mysqli_query($db, "SELECT * FROM users WHERE username='$member' "); 
while($row = mysqli_fetch_array($info)){ 
    $balance = $row['balance'];
}

$grade = "";
$info = mysqli_query($db, "SELECT * FROM users WHERE username='$member' "); 
while($row = mysqli_fetch_array($info)){ 
    $grade = $row['grade'];
}

?>