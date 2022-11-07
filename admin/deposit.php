<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_POST['proceed'])){ 
	
	//Checking if the account number exist
    $accounts = 0;
	$info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' "); 
       while($row = mysqli_fetch_array($info)){ 
	   $accounts++;
     }
	
	if($accounts == 1){ 
	//getting the old balance and the grade
    $info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' "); 
       while($row = mysqli_fetch_array($info)){ 
       	$balance = $row['balance'];
           $grade = $row['grade'];
       }
    $balance = $balance + $amount;
    

    //Getting the average
    $total_deposit_records = 1;
    $total_deposit_balance = $grade_value;
    $info = mysqli_query($db, "SELECT * FROM txns WHERE username='$username' AND txn_type ='deposit' "); 
       while($row = mysqli_fetch_array($info)){ 
       	$total_deposit_records++;
   
       }
    //checking possible money laundering
   $ml_checker = $deposit_average*3;
   $ml_possibility = "";
    if($amount > $ml_checker){
    	$ml_possibility = "yes";
    }
    else{
    	$ml_possibility = "no";
    }
    
    //updating new balance
    $query = "UPDATE users SET balance='$balance' WHERE username='$username' ";
    mysqli_query($db, $query);
	
	//record the txn
	$query = "INSERT INTO txns (username, txn_type, txn_date, amount, balance, ml_possibility)
	VALUES ( '$username', '$txn_type', '$txn_date', '$amount', '$balance', '$ml_possibility')";
	mysqli_query($db, $query);
	$_SESSION['succeed'] = "The deposit was successful !";
	header('location: dashboard.php');
	}
	else{
		$_SESSION['fail'] = "Account Number does not exist ";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Banking System | Deposit
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
      	    Deposit
      	</div>
          <form method="post" action="deposit.php" class="admin_form"> 
          	<?php include('../includes/success_fail.php'); ?>
             <label>Account Number</label>
             <input type="text" name="username"> 
             <label>Amount</label>
             <input type="number" name="amount">  
             <button type="submit" name="proceed"> 
                Proceed
             </button>
         </form>
       </div> 
   </div> <!--main class -->
       
</body>
</html>