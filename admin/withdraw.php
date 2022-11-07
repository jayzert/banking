<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_POST['proceed'])){ 
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$amount = mysqli_real_escape_string($db, $_POST['amount']);
	$txn_date = date('Y-m-d');
	$txn_type = "withdraw";
	
	//Checking if the account number exist
    $accounts = 0;
	$info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' "); 
       while($row = mysqli_fetch_array($info)){ 
	   $accounts++;
     }
	
	if($accounts == 1){ 
	//getting the old balance
    $info = mysqli_query($db, "SELECT * FROM users WHERE username='$username' "); 
       while($row = mysqli_fetch_array($info)){ 
       	$balance = $row['balance'];
       }
    $balance = $balance - $amount;
    
    //checking if funds are sufficient
    if($balance >= 0){
    //updating new balance
    $query = "UPDATE users SET balance='$balance' WHERE username='$username' ";
    mysqli_query($db, $query);
    
	//record the txn
	$query = "INSERT INTO txns (username, txn_type, txn_date, amount, balance)
	VALUES ( '$username', '$txn_type', '$txn_date', '$amount', '$balance')";
	mysqli_query($db, $query);
	$_SESSION['succeed'] = "The Withdrawal was successful !";
	header('location: dashboard.php');
	}
	else{ 
		$_SESSION['fail'] = "There is insufficient funds for withdrawal ";
	}
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
	    Banking System | Withdraw
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
      	    Withdraw
      	</div>
          <form method="post" action="withdraw.php" class="admin_form"> 
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