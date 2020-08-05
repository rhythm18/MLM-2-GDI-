<?php

$servername="localhost";
$username="root";
$password="mysql";
$dbname="mlm";

$domain="http://getdailyincome.in/";
$domainName="GetDailyIncome.in";

$conn=mysqli_connect($servername,$username,$password,$dbname);


if(!$conn)
{
	die("connection failed".mysqli_error($conn));

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

function dispMessage($msg,$url)
{
	echo "<script language=\"javascript\">";
	echo "alert('".$msg."'); \n";
	echo "window.location = '".$url."'; \n";
	echo "</script>";
}

function sponsorTeamCnt($conn,$id)
{
	static $cnt=0;

$sql="select user_id from users where pay_status=1 and sponsor_id=".$id;
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
	$rs=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($rs))
	{	
		$userID=$row['sponsor_id'];
		$sql="select count(*) as cnt where sponsor_id=".$userID;
		$cntDirect=ReturnAnyValue($conn,$sql);

		$sql="select * from singleleg_income_setting where lvl_no=".$lvl_no;
		$rsLvl=mysqli_query($conn,$sql);
		$rowLvl=mysqli_fetch_array($rsLvl);

		$dirReq=$rowLvl['dir_req']+4;	//to get cash back income
		$lvlIncome=$rowLvl['lvl_income'];


		if($cntDirect>=$dirReq)
		{
			$amt=($lvlIncome*$userInc)/100;
			$dt=date('Y-m-d');

				$sql="insert into daily_income(user_id,inc_amt,inc_lvl,inc_date) values('$userID','$amt','$lvl_no','$dt')";

	      		if(mysqli_query($conn,$sql))
	        
			        {
			            echo "Level ".$lvl_no." Income Generated Successfully";



			            $lvl_no++;
			            if($lvl_no>10)
			            {
			            	exit();
			            }

						GenDailyIncome($conn,$userID,$userInc);

			        }
			//give lvl income
			
			
		}
		else
		{
			exit();
		}
		
	}
	
}
?>