<div class="profile_holder"> 
	<div class="profile_name"> 
		Wanai
	</div> 
	<div class="profile_txt_holder"> 
		<div class="profile_txt"> 
            W
		</div>
	</div> 
</div>
   
<a href="dashboard.php?add_item" id="block_link">
     <i class="fa fa-plus" id="general_icon" ></i>
     New Item
</a>
<a href="dashboard.php?manage_items" id="block_link">
      <i class="fa fa-pencil" id="general_icon" ></i>
      Manage Items
</a>
<a href="dashboard.php?earnings" id="block_link">
      <i class="fa fa-pencil" id="general_icon" ></i>
      View Earnings
</a>
<a href="dashboard.php?history" id="block_link">
      <i class="fa fa-pencil" id="general_icon" ></i>
      History
</a>
           
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