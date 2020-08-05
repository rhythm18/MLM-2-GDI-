 <?php

include("inc/connect.php");

$email=$_GET['email'];
$sql="select count(*) as cnt  from users where email='$email'";

$cnt=ReturnAnyValue($conn,$sql);

if($cnt>0)
	echo 0;
else
	echo 1;
?>