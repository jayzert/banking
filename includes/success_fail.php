<?php 
if(isset($_SESSION['succeed'])){ ?> 
	<div class="note_def" id="green_note">
	<?php
	 echo $_SESSION['succeed']; 
	 unset($_SESSION['succeed']); 
	?>
	</div> 
<?php
} 
if(isset($_SESSION['fail'])){ ?> 
	<div class="note_def" id="red_note">
    <?php
	echo $_SESSION['fail']; 
	unset($_SESSION['fail']); 
	?>
	</div> 
<?php
} 
?>

<?php
if(isset($_SESSION['mild'])){ ?> 
	<div class="note_def" id="yellow_note">
    <?php
	echo $_SESSION['mild']; 
	unset($_SESSION['mild']); 
	?>
	</div> 
<?php
} 
?>
	