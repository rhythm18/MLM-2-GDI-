<?php
include("inc/connect.php");



	$sql="delete from users where user_id=".$_GET['userID'];

	if(mysqli_query($conn,$sql))
	{
		$msg="User Account Deleted Successfully !";
		$url="mng_user.php";
		dispMessage($msg,$url)

	}





	
?>