<?php

include("inc/connect.php");
include("inc/chkAuth.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Debit User Account</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    
    <!-- Sidebar menu-->
	<?php include("inc/side-bar-menu.php");
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Debit User Account</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Debit User Account</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{
  
  $memberID=$_POST['member_id'];
  $amt=$_POST['amt'];
  $detail=$_POST['detail'];
  $dt=date('Y-m-d');

  $sql="select user_id from users where member_id=".$memberID;
  $uid=ReturnAnyValue($conn,$sql);
  
  $sql="select cur_bal from payout where user_id='$uid' order by pid desc limit 1";
  $oldBal=ReturnAnyValue($conn,$sql);
  if($oldBal=="")
  {
    $oldBal=0;
  }
  $newBal=$oldBal-$amt;

 
  if($amt>$oldBal)
  {
    echo "Sorry, insufficient Balance !";
  }

  else
  {

  $sql="insert into payout(user_id,net_amt,payout_date,prev_bal,cur_bal,pay_type,pay_detail,pay_status) values('$uid','$amt','$dt',$oldBal,'$newBal','2','$detail','1')";

  echo $sql;

      if(mysqli_query($conn,$sql))
      {
        echo "<b>User Account Debited Successfully !!!!</b>";
      }
      else
      {
        echo "There was some error ";
      }
    }
}
else
  
{
?>  
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
				
     <div class="form-group row">
    <label for="member_id" class="control-label col-md-3">Member ID: </label>
        <div class="col-md-8">
    <input name="member_id" type="text" class="form-control" id="member_id" required>
    <span name="mname" id="mname"></span>
  </div>
</div>
 <div class="form-group row">
    <label for="amt" class="control-label col-md-3">Amount: </label>
        <div class="col-md-8">
    <input name="amt" type="text" class="form-control" id="amt"required>
  </div>
</div>

  <div class="form-group row">
    <label for="detail" class="control-label col-md-3">Details: </label>
        <div class="col-md-8">
          <input name="detail" type="text" class="form-control" id="detail" required>
  </div>
</div>

  
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
				
				
				
              </form>
            </div>
            <?php
          }
          ?>
            </div>
            
          </div>
        </div>
        <div class="clearix"></div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      
    </script>

     <script>
$(document).ready(function(){
$("#member_id").blur(function(){
  var sid=$("#member_id").val();
  
  $.get("get_balance.php",
  {
    id: sid
    
  },
  function(data, status){
   // alert("Data: " + data + "\nStatus: " + status);
     $('#mname').html(data);
  });
});
}); 
</script>
  </body>

</html>