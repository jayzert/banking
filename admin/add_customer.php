<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_POST['proceed'])){ 
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$grade = mysqli_real_escape_string($db, $_POST['grade']);
	$password = "pass";
	$user_type = "member";
	$balance = "0";
	$status = "inactive";
	
	//Checking if the account number already exist
    $duplicates = 0;
	$info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' "); 
       while($row = mysqli_fetch_array($info)){ 
	   $duplicates++;
     }
	
	if($duplicates == 0){ 
	$query = "INSERT INTO users (username, firstname, lastname, password, user_type, balance, grade, status)
	VALUES ( '$username', '$firstname', '$lastname', '$password', '$user_type', '$balance', '$grade', '$status')";
	mysqli_query($db, $query);
	$_SESSION['succeed'] = "User added successfully!";
	header('location: dashboard.php');
	}
	else{
		$_SESSION['fail'] = "Account Number already exist please suggest try another one";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Banking System | Add Customer
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
      	    Add Project
      	</div>
          <form method="post" action="add_project.php" class="admin_form" enctype="multipart/form-data"> 
          	<?php include('../includes/success_fail.php'); ?>
             <label>Project Name</label>
             <input type="text" name="project_name"> 
             <label>Website</label>
             <input type="text" name="website"> 
             <label>Product Cover</label> 
             <input type="file" name="image" required> 
             <button type="submit" name="proceed"> 
                Add Project
             </button>
         </form>
       </div> 
   </div> <!--main class -->
       
</body>
</html>