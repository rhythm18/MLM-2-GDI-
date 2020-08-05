<?php 
include("inc/connect.php");
include("inc/chkAuth.php");

$sql="select * from payout";

$rs=mysqli_query($conn,$sql);
$output="";
$output="<table class='table table-hover table-bordered' id='prdTable'>
				  <div class='table-responsive'><div id='dispMsg'>
				</div>
					<thead>
					  <tr>
						<th>S.No.</th>
						<th>Pay ID</th>
						<th>Name</th>
            <th>Member ID</th>
        <th>Amount</th>
        <th>Closing Date</th>
        <th>TDS</th>
         <th>Admin Charge</th>
         <th>Net Amount</th>
         <th>Previous Balance</th>
         <th>Current Balance</th>
         <th>Pay Method</th>
        <th>Pay Detail</th>
         <th>Payout Date</th>
         <th>Pay Status</th>

      </tr>
    </thead>
    <tbody>";


$i=1;
while($row=mysqli_fetch_array($rs))

{

 $output=$output."<tr>";
 $output=$output."<td>$i</td>";

$sql="select name from users where user_id=".$row['user_id'];
$name=ReturnAnyValue($conn,$sql);

  $sql="select member_id from users where user_id=".$row['user_id'];
$memberID=ReturnAnyValue($conn,$sql);


  $output=$output."<td>".$row['pid']."</td>";

  $output=$output."<td>".$name."</td>";
  $output=$output."<td>".$memberID."</td>";
  $output=$output."<td>".$row['amount']."</td>";
  $output=$output."<td>".$row['closing_date']."</td>";
  $output=$output."<td>".$row['tds']."</td>";
  $output=$output."<td>".$row['admin_charge']."</td>";
  $output=$output."<td>".$row['net_amt']."</td>";
  $output=$output."<td>".$row['prev_bal']."</td>";
  $output=$output."<td>".$row['cur_bal']."</td>";
  $output=$output."<td>".$row['pay_method']."</td>";
  $output=$output."<td>".$row['pay_detail']."</td>";
  $output=$output."<td>".$row['payout_date']."</td>";
  $output=$output."<td>".$row['pay_status']."</td>";

  $output=$output."</tr>"; 
   
$i=$i+1;
  
}
  $output=$output."</tbody></table>";
$fname="payout-".date('Y-m-d');
header('Content-Type: application/xls');
//header('Content-Type: text/csv');

header('Content-Disposition: attachment; filename=payout.xls');
echo $output;
  ?>

	