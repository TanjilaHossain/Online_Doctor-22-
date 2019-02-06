<?php

	include("includes/connect.php");
	
	$delete_id = $_GET['del'];
	$delete_query = "delete from doctors where Doctors_Id = '$delete_id' ";
	
	if(mysql_query($delete_query))
	{
		echo"<script>alert('One information has been deleted.....')</script>";
		//echo"<script>windows.open('view.php','_self)</script>'";
		header('location:index.php');
	}
	
?>