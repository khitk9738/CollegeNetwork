<?php 
include("includes/connect.php"); 

if(isset($_GET['del'])){

	$delete_id = $_GET['del'];
	
	$delete_query = "delete from posts where post_id='$delete_id' ";
	
	if(mysqli_query($con,$delete_query)){
	
	echo "<script>alert('Post Has been Deleted')</script>";
	echo "<script>window.open('view_posts.php','_self')</script>";
	
	}
	



}




?>