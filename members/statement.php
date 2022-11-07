<?php
session_start();

include('../includes/connect.php');
include('values.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>
	    Banking System | Statement
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
       <div class="note_head">
       	Bank statement
       </div>
       <table>
       	<tr>
       		<th>Date</th>
       		<th>Txn type</th>
       		<th>Amount</th>
       		<th>Balance</th>
       	</tr>
       	<?php
       	$info = mysqli_query($db, "SELECT * FROM txns WHERE username='$member' ORDER BY id DESC "); 
          while($row = mysqli_fetch_array($info)){?>
          	<tr>
       		  <td><?php echo $row['txn_date']; ?></td>
       		  <td><?php echo $row['txn_type']; ?></td>
       		  <td><?php echo $row['amount']; ?></td>
       		  <td><?php echo $row['balance']; ?></td>
       	  </tr>
          <?php
           }
           ?>
       </table>
   </div> <!--main class -->
       
</body>
</html>