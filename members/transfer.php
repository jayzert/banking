<?php
session_start();

include('../includes/connect.php');
include('values.php');

if(isset($_POST['proceed'])){ 
	
	//Checking if the account number exist
    $accounts = 0;
	$info = mysqli_query($db, "SELECT * FROM users WHERE username='$receiver' "); 
       while($row = mysqli_fetch_array($info)){ 
	   $accounts++;
     }
	
	if($accounts == 1){ 
	//getting the sender account balance
    $info = mysqli_query($db, "SELECT * FROM users WHERE username='$member' "); 
       while($row = mysqli_fetch_array($info)){ 
       	$sender_balance = $row['balance'];
       }
    $sender_balance = $sender_balance - $amount;
	
	//record the txn for the sender
	$query = "INSERT INTO txns (username, txn_type, txn_date, amount, balance, ml_possibility)
	VALUES ( '$member', 'send', '$txn_date', '$amount', '$sender_balance', '$ml_possibility')";
	mysqli_query($db, $query);
	//record the txn for the receiver
	$query = "INSERT INTO txns (username, txn_type, txn_date, amount, balance, ml_possibility)
	VALUES ( '$receiver', 'receipt', '$txn_date', '$amount', '$receiver_balance', '$ml_possibility')";
	mysqli_query($db, $query);
	$_SESSION['succeed'] = "The transfer was successful !";
	header('location: dashboard.php');
	}
	else{ 
		$_SESSION['fail'] = "There is insufficient funds for the transfer";
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
	    Banking System | Transfer
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
      	    Funds Transfer
      	</div>
          <form method="post" action="transfer.php" class="admin_form"> 
          	<?php include('../includes/success_fail.php'); ?>
             <label>Beneficiary Account Number</label>
             <input type="text" name="receiver"> 
             <label>Amount to transfer</label>
             <input type="number" name="amount">  
             <button type="submit" name="proceed"> 
                Proceed
             </button>
         </form>
       </div> 
   </div> <!--main class -->
       
</body>
</html>