<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_GET['logout'])){
    unset($_SESSION['admin']);
    $_SESSION['mild'] = "You are now logged out";
    header('location:../includes/login.php');
}
if(isset($_GET['transfer'])){ 
	header('location: transfer.php'); 
}
if(isset($_GET['statement'])){ 
	header('location: statement.php'); 
}
if(isset($_GET['make_withdrawal'])){ 
	header('location: withdraw.php'); 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Dashboard | Banking
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/favicon/jconnect.ico">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>  
    <div class="sidebar">
        <a href="dashboard.php?transfer" id="block_link">
             <i class="fa fa-plus" id="general_icon" ></i>
             Transfer Funds
        </a>
        <a href="dashboard.php?statement" id="block_link">
            <i class="fa fa-plus" id="general_icon" ></i>
            Bank Statement
        </a>
        <a href="dashboard.php?logout" id="block_link">
            <i class="fa fa-sign-out" id="general_icon" ></i>
             Logout
        </a>
    </div>
    <div class="main"> 	
        <div class="portal_nav">
        	<div id="mobile_links">
       	    <i class="fa fa-bars" id="thebars" onclick="document.getElementById('overlay').style.width='80%'"></i>
            </div>
       </div>    	
       
     <?php include('../includes/success_fail.php'); ?>
     
      <div class="row"> 
                <div class="home_info_holder"> 
       	        <div class="home_info">  
       	              <div class="home_info_large_text">
                             <?php echo $balance; ?>
       	              </div>
                         <div class="home_info_small_text"> 
                         	Balance
       	              </div>
       	        </div>
       	    </div> 
               <div class="home_info_holder"> 
       	        <div class="home_info">  
       	              <div class="home_info_large_text">
                            <?php echo 0; ?>
       	              </div>
                         <div class="home_info_small_text"> 
                         	Documents
       	              </div>
       	        </div>
       	    </div>
       	</div> <!--row class-->
   </div> <!--main class -->
       
   <div id="overlay">
      <div class="close_overlay">
          <i class="fa fa-close" id="closeicon" onclick="document.getElementById('overlay').style.width='0%'"></i>
      </div>
     <a href="dashboard.php?transfer" id="block_link">
             <i class="fa fa-plus" id="general_icon" ></i>
             Transfer Funds
        </a>
        <a href="dashboard.php?statement" id="block_link">
            <i class="fa fa-pencil" id="general_icon" ></i>
            Bank Statement
        </a>
        <a href="dashboard.php?logout" id="block_link">
            <i class="fa fa-pencil" id="general_icon" ></i>
             Logout
        </a>
   </div>
   
</body>
</html>

<script> 
 	function myFunction(){ 
 	 var x = document.getElementsByClassName('upload_profile_modal'); 
      var i; 
      for(i=0; i<x.length; i++){ 
      	x[i].style.display="block"; 
      } 
      var y = document.getElementById('overlay'); 
      y.style.width="0%";
 	}
 </script>