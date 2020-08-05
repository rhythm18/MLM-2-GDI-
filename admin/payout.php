<?php 
//include "/home/getdailyincome/public_html/admin/inc/connect.php";
include("inc/connect.php");

$dt=date('Y-m-d');
 $errorFlag=0;


$sql="select count(*) from payout where closing_date='$dt'";
$cntDailyPay=ReturnAnyValue($conn,$sql);

if($cntDailyPay==0)
{

$sql="select * from settings where id=1";
	  $rssetting=mysqli_query($conn,$sql);
	  $rowsetting=mysqli_fetch_array($rssetting);
	  $tdsNoPan=$rowsetting['tds_no_pan'];
	  $tds=$rowsetting['tds'];
	  $adminCharge=$rowsetting['admin_charge'];

//payout gen for cashback and level income

$sql="SELECT SUM(inc_amt) as dailysum,user_id FROM `daily_income` WHERE status='0' and inc_date='$dt' GROUP BY user_id";
$rs=mysqli_query($conn,$sql);


while($row=mysqli_fetch_array($rs))
		
		{

			$dailySum=$row['dailysum'];
			$id=$row['user_id'];
			$sql="SELECT pan_no FROM `kyc_detail` where user_id=".$id;
			$checkPan=ReturnAnyValue($conn,$sql);
			if($checkPan==NULL) $tds=$tdsNoPan;


			

					$amount=$dailySum;


					$tdsAmt=($amount*$tds)/100;
					$adminChargeAmt=($amount*$adminCharge)/100;

					$netAmount=$amount-($amount*($tds+$adminCharge)/100);

					
					$sql="select cur_bal from payout where user_id=".$id." order by pid DESC limit 1";
					$oldBal=ReturnAnyValue($conn,$sql);
					if($oldBal=="")
					{
						$oldBal=0;
					}
					$newBal=$oldBal+$netAmount;

					$sql="insert into payout(user_id,amount,closing_date,tds,admin_charge,net_amt,prev_bal,cur_bal) values('$id','$amount','$dt','$tdsAmt','$adminChargeAmt','$netAmount','$oldBal','$newBal')";
						

					if(mysqli_query($conn,$sql))
					    {
					    	$sql="UPDATE `daily_income` SET `status` = '2' WHERE inc_date='$dt' and user_id=".$id;
					    	mysqli_query($conn,$sql);
					    	

					    	
					        
					    }

					 else 
					    {
					        //echo "error:".$sql."<br>".mysqli_error($conn);
					        $errorFlag=1;

					    }


			    
		}

		//payout generated for direct income

		$sql="SELECT SUM(inc_amt) as dirsum,user_id FROM `gen_income` WHERE status='0' and inc_date='$dt' GROUP BY user_id";

		$rs=mysqli_query($conn,$sql);


	while($row=mysqli_fetch_array($rs))
		
		{

			$directSum=$row['dirsum'];
			$id=$row['user_id'];
			$sql="SELECT pan_no FROM `kyc_detail` where user_id=".$id;
			$checkPan=ReturnAnyValue($conn,$sql);
			if($checkPan==NULL) $tds=$tdsNoPan;

	

					$amount=$directSum;


					$tdsAmt=($amount*$tds)/100;
					$adminChargeAmt=($amount*$adminCharge)/100;

					$netAmount=$amount-($amount*($tds+$adminCharge)/100);

					
					$sql="select cur_bal from payout where user_id=".$id." order by pid DESC limit 1";
					$oldBal=ReturnAnyValue($conn,$sql);
					
					if($oldBal=="")
					{
						$oldBal=0;
					}
					$newBal=$oldBal+$netAmount;

					$sql="select count(*) as cnt from payout where user_id=".$id." and closing_date='$dt'";
					$cnt=ReturnAnyValue($conn,$sql);

					if($cnt>0)
					{
						$sql="update payout set amount=amount+'$amount',tds=tds+'$tdsAmt',admin_charge=admin_charge+'$adminChargeAmt',net_amt=net_amt+'$netAmount',prev_bal='$oldBal',cur_bal='$newBal' where user_id=".$id." 
						and closing_date='$dt'";
					}
					else
					{

					$sql="insert into payout(user_id,amount,closing_date,tds,admin_charge,net_amt,prev_bal,cur_bal) values('$id','$amount','$dt','$tdsAmt','$adminChargeAmt','$netAmount','$oldBal','$newBal')";
					}

					if(mysqli_query($conn,$sql))
					    {
					    	

					    	$sql="UPDATE `gen_income` SET `status` = '2' WHERE inc_date='$dt' and user_id=".$id;
					    	mysqli_query($conn,$sql);
					    	
					        
					    }

					else 
					    {
					        //echo "error:".$sql."<br>".mysqli_error($conn);
					        $errorFlag=1;
					    }


			    
		}

  }
  if($errorFlag==0)
  	{

  		mail("pcsaini@gmail.com", "GDI Payout Success", "GDI Payout Generated Successfully");
	}

else
{
	  mail("pcsaini@gmail.com", "GDI Payout Error", "There was an error in GDI Payout Generation");

}

?>