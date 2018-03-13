<?php
 include("dbcon.php");
      
	  $delete_id = $_GET['delete'];
	  
     $delete_query = "delete from products where id='$delete_id'";
	 if(mysql_query($delete_query)){
		 echo"<script>window.open('index.php?deleted=post has been deleted','_self')</script>";
	 }

	 
	 $delete_id1 = $_GET['delete'];
	  
     $delete_query = "delete from contact where id='$delete_id1'";
	 if(mysql_query($delete_query)){
		 echo"<script>window.open('contact.php?deleted=contact has been deleted','_self')</script>";
	 }
	
	
 ?>