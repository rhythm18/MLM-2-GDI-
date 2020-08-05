<?php
$servername = "localhost";
$username="root";
$password="mysql";
$dbname="mlm";

$levelOneCount = 5;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function gotopage($url)
{
	echo "<script language=\"javascript\">";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}


function ReturnAnyValue($con,$Ssql){
	//firequery($Ssql);
	$TempRst = mysqli_query($con,$Ssql);
	$EOF = @mysqli_num_rows($TempRst);
	if ($EOF != 0){
		$TempRow = mysqli_fetch_row($TempRst);
		$Retun = $TempRow[0];
	}else{
		$Retun = "";
	}
	return $Retun;
}

function dispMessage($msg,$url)
{
	echo "<script language=\"javascript\">";
	echo "alert('".$msg."'); \n";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}

function GetUserId($con,$mID)
{
	//firequery($Ssql);
	$sql="select user_id from users where member_id=".$mID;
	$TempRst = mysqli_query($con,$sql);
	$EOF = @mysqli_num_rows($TempRst);
	if ($EOF != 0){
		$TempRow = mysqli_fetch_row($TempRst);
		$Retun = $TempRow[0];
	}else{
		$Retun = "";
	}
	return $Retun;
}

function sponsorTeamCnt($conn,$id)
{
	static $cnt=0;

$sql="select user_id from users where sponsor_id=".$id;
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs))
	{
		//echo "<br>".$row['user_id'];
		sponsorTeamCnt($conn,$row['user_id']);
		$cnt++;
	}
	return $cnt;
}



function GenDailyIncome($conn,$id,$userInc)
{
	static $lvl_no=1;


	$sql="select sponsor_id from users where user_id=".$id;
		echo "<br>".$sql;
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs))
	{	
		$userID=$row['sponsor_id'];
		echo "<br>".$userID;
		$sql="select count(*) from users where sponsor_id=".$userID;
				echo "<br>".$sql;

		$cntDirect=ReturnAnyValue($conn,$sql);

		$sql="select * from singleleg_income_setting where lvl_number=".$lvl_no;
		echo "<br>".$sql;
		$rsLvl=mysqli_query($conn,$sql);
		$rowLvl=mysqli_fetch_array($rsLvl);

		$dirReq=$rowLvl['dir_req']+4;	//to get cash back income
		$lvlIncome=$rowLvl['lvl_income'];

		echo "<br>Count :".$cntDirect." -Req: ".$dirReq;

		if($cntDirect>=$dirReq)
		{
			$amt=($lvlIncome*$userInc)/100;
			$dt=date('Y-m-d');

				$sql="insert into daily_income(user_id,inc_amt,inc_lvl,inc_date) values('$userID','$amt','$lvl_no','$dt')";
				echo "<br>".$sql;

	      		if(mysqli_query($conn,$sql))
	        
			        {
			            echo "Level ".$lvl_no." Income Generated Successfully";


			            $lvl_no++;

			        }
			//give lvl income
			
			
		}
		GenDailyIncome($conn,$userID,$userInc);
		
	}
	
}

?>