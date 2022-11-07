<?php
session_start();

include('../includes/connect.php');

if(!isset($_SESSION['member'])){
    header('location:../includes/login.php');
}
else{ 
    $member = $_SESSION['member'];
}

if(isset($_POST['proceed'])){ 
	$pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
	$pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
	
	if($pass1 == $pass2){ 
		$query = "UPDATE users SET password='$pass1' WHERE username='$member' ";
		mysqli_query($db, $query);
		$query = "UPDATE users SET status='active' WHERE username='$member' ";
		mysqli_query($db, $query);
		$_SESSION['succeed'] = "Password changed successfully";
		header('location: dashboard.php');
	}
	else{
		$_SESSION['fail'] = "The two passwords do not match";
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Banking System | Change Password
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/favicon/jconnect.ico">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>  

    <div class="inner_main"> 	
        <div class="portal_nav">
        	<div id="mobile_links">
       	    <i class="fa fa-bars" id="thebars" onclick="document.getElementById('overlay').style.width='80%'"></i>
            </div>
       </div>    	
       <?php include('../includes/success_fail.php'); ?>	
       <div class="form_holder">  
      	<div class="form_heading">
      	    Change Password
      	</div>
          <form method="post" action="change_password.php" class="admin_form"> 
          	<?php include('../includes/success_fail.php'); ?>
             <label>New Password</label>
             <input type="password" name="pass1"> 
             <label>Confirm Password</label>
             <input type="password" name="pass2">  
             <button type="submit" name="proceed"> 
                Proceed
             </button>
         </form>
       </div> 
   </div> <!--main class -->
       
</body>
</html>