 <?php

include("inc/connect.php");

$mobile=$_GET['mobile'];
$sql="select count(*) as cnt  from users where mobile='$mobile'";

$cnt=ReturnAnyValue($conn,$sql);

if($cnt>0)
	echo 0;
else
	echo 1;
?>