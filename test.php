<?php include("inc/connect.php");
 $str= 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
 
 $str=$str."---". date('Y-m-d h:i:s');
 
 //mail("pcsaini@gmail.com",$str,$str);
 
$dt=  date('d-m-y h:i:s');
echo $dt;
 $sql="insert into test (ctime,details) values('$dt','date php')";
 mysqli_query($conn,$sql);
 
  $sql="insert into test (details) values('mysql date time')";
 mysqli_query($conn,$sql);
 
 ?>