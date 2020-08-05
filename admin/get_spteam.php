<?php include("inc/connect.php");

$userID=65;
$cnt=getTeam($conn,$userID);

echo "<br>count=".$cnt;

function sponsorTeamCnt($conn,$id)
{
	static $cnt=0;

$sql="select user_id from users where sponsor_id=".$id;
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs))
	{
		//echo "<br>".$row['user_id'];
		getTeam($conn,$row['user_id']);
		$cnt++;
	}
	return $cnt;
}
?>
