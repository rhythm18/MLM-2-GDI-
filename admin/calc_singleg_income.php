
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
    <title>Daily Income Gen</title>
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
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php 
include("../inc/company_name.php");
?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
  <?php
  include("inc/menu.php");
  ?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Daily Income Gen</h1>
          <p>Confirmation</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Daily Income Gen</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Daily Income Gen</h3>
            <div class="tile-body">
<?php

$sql="select user_id from users where pay_status='1'";
$rsMember=mysqli_query($conn,$sql);

while($rowMember=mysqli_fetch_array($rsMember))

{	
	$id=$rowMember['user_id'];



$sql="select count(*) FROM users WHERE pay_status=1 and user_id>".$id;
$cnt=ReturnAnyValue($conn,$sql);
//member count
$sql="select count(*) FROM users WHERE pay_status=1 and sponsor_id=".$id;
$cntDirect=ReturnAnyValue($conn,$sql);      //get count from table where members are paid and self

$sponsorTeam=sponsorTeamCnt($conn,$id);     //count sponsor team

$sql="select rank_income from settings where id=1";
$rankIncome=ReturnAnyValue($conn,$sql);
//decide if all level income or just highest level income
if($rankIncome==1) 
{                                     // Calculate Income for all Levels
$sql="SELECT * FROM `singleleg_income_setting` WHERE member_count<='$cnt' order by lvl_number desc";
}
else
{                                     // Calculate Income for highest Level only
  $sql="SELECT * FROM `singleleg_income_setting` WHERE member_count<='$cnt' order by lvl_number desc LIMIT 0,1";
}
//echo "<br>".$sql;
$rs=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($rs))
	
	{
			$lvl_inc=$row['lvl_income'];
			$dir_req=$row['dir_req'];
			$days=$row['days'];
			$lvl=$row['lvl_number'];
      $sponsorTeam=$row['sponsor_team'];
			   
                  //check booster 
			if($lvl==1)
			{                    
				$sql="select booster from users where user_id=".$id;
				$booster=ReturnAnyValue($conn,$sql);

				if($booster==1)
				{               
					$sql="select * from settings where id=1";
					$rsBooster=mysqli_query($conn,$sql);
					$rowBooster=mysqli_fetch_array($rsBooster);
					$days=$rowBooster['booster_days'];
					$lvl_inc=$rowBooster['booster_income'];
				}

        if($booster==2)
        {               
          $sql="select * from settings where id=1";
          $rsBooster=mysqli_query($conn,$sql);
          $rowBooster=mysqli_fetch_array($rsBooster);
          $days=$rowBooster['super_booster_days'];
          $lvl_inc=$rowBooster['super_booster_income'];
        }

			}


			      if($cntDirect>=$dir_req && $cntSponsorTeam>=$sponsorTeam)
				      
				      	{
					      $dt=date('Y-m-d');

					      $sql="select count(*) from daily_income where inc_date='$dt' and user_id='$id' and inc_lvl='$lvl'";
					      $cntDaily=ReturnAnyValue($conn,$sql);
					      

						      if($cntDaily>0)
						      {

						      	echo "Duplicate !";

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
										        }
								    }
						      }
					  	}
			}
	}	                                             //get inncome,days,dir_req fom table using lvl no
                                               //days of income less the req days (insert daily income)
    





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
      }
    </script>
  <script>
$(document).ready(function(){
  
  $("#ordQty").focusout(function(){
    var oQty=parseInt($(this).val());
  var aQty=parseInt($("#avail_qty").val());
  
  //$("#ordQty").val(0);
  if(oQty > aQty)
  { alert("Sorry, order qty is more than available qty");
    $(this).val(0);
     $(this).focus();
    }
  
  });
    
  $("#category").change(function() {
    var catid= $(this).val() ;
   
    $.ajax({
    type: 'post',
    url: 'load_products.php',
    data: {
     catID:catid
     },
     success: function(response){
     
      $( '#listProd' ).html(response);
     }
   });
  });
  
    $(document.body).on('change', '#prodID', function() {
    
    var pid= $(this).val() ;
   
    $.ajax({
    type: 'post',
    url: 'load_product_details.php',
    data: {
     prodID:pid
     },
     success: function(response){
     
      $( '#pDetails' ).html(response);
     }
   });
  });
  
});
  
  </script>
  </body>
</html>