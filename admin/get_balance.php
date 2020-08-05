 <?php

include("inc/connect.php");

$id=$_GET['id'];
$sql="select * from users where member_id=".$id;
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$userID=$row['user_id'];
$name=$row['name'];

$sql="select cur_bal from payout where user_id=".$userID." order by pid desc limit 1";
$curBal=ReturnAnyValue($conn,$sql);

if($name!="")
	echo "<font color=blue><b>Name: ".$name.", Balance: ".$curBal."</b></font>";
else
	echo "<font color=red>Invalid Sponsor</font>";
?>