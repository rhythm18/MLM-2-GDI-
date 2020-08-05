#!/usr/bin/env php
<?php

include "/home/getdailyincome/public_html/admin/inc/connect.php";
//include("inc/chkAuth.php");


$sql="select * from settings where id=1";
$rsv=mysqli_query($conn,$sql);
$rowv=mysqli_fetch_array($rsv);

$dirReqCb=$rowv['dir_req_cb'];
$cashBackInc=$rowv['cash_back_inc'];
$joiningFee=$rowv['joining_fee'];
$days=$rowv['cash_back_days'];
$lvl=0;
$lvl_inc=($cashBackInc*$joiningFee)/100;
     

$sql="select user_id from users where pay_status='1'";
$rsMember=mysqli_query($conn,$sql);


while($rowMember=mysqli_fetch_array($rsMember))

{	
	$id=$rowMember['user_id'];



$sql="select count(*) FROM users WHERE pay_status=1 and sponsor_id=".$id;
$cntDirect=ReturnAnyValue($conn,$sql);
 

			      if($cntDirect>=$dirReqCb)
				      
				      	{
  					      $dt=date('Y-m-d');

  					      $sql="select count(*) from daily_income where inc_date='$dt' and user_id='$id' and inc_lvl='$lvl'";
  					      $cntDaily=ReturnAnyValue($conn,$sql);

						      if($cntDaily>0)
						      {

						      	//echo "Duplicate !";

						      }

						      else
						      {
						      	$sql="select count(*) from daily_income where user_id='$id' and inc_lvl='$lvl'";
					      		$cntDays=ReturnAnyValue($conn,$sql);
					      		

					      			if($cntDays<$days)
					      			{

						      			$sql="insert into daily_income(user_id,inc_amt,inc_lvl,inc_date) values('$id','$lvl_inc','$lvl','$dt')";

								      		if(mysqli_query($conn,$sql))
								        
										        {
										            echo "Daily Income Generated Successfully";
										            // calc level income for upline
										            GenDailyIncome($conn,$id,$lvl_inc);

										        }
								    }
						      }
					  		}
			
	}	                                             //get inncome,days,dir_req fom table using lvl no
                                               //days of income less the req days (insert daily income)
    
  		@mail("pcsaini@gmail.com", "GDI Income Calculation Success", "GDI Daily Income Calculated Successfully");



?>
