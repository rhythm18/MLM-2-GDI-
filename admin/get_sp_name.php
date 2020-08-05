 <?php

include("inc/connect.php");

$id=$_GET['id'];
$sql="select name from users where member_id=".$id;
//echo $sql."<br>";
$name=ReturnAnyValue($conn,$sql);
if($name!="")
	echo "<font color=blue><b>".$name."</b></font>";
else
	echo 0;
?>