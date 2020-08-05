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
    <title>Level Income Settings</title>
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
          <h1><i class="fa fa-edit"></i>Level Income Settings</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Level Income Settings</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{

  
  $lvl_one_Cnt=$_POST['lvl_one_cnt'];
  $lvl_one_Income=$_POST['lvl_one_income'];
  $lvl_two_Cnt=$_POST['lvl_two_cnt'];
  $lvl_two_Income=$_POST['lvl_two_income'];
  $lvl_three_Cnt=$_POST['lvl_three_cnt'];
  $lvl_three_Income=$_POST['lvl_three_income'];
  $lvl_four_Cnt=$_POST['lvl_four_cnt'];
  $lvl_four_Income=$_POST['lvl_four_income'];
  $lvl_five_Cnt=$_POST['lvl_five_cnt'];
  $lvl_five_Income=$_POST['lvl_five_income'];
  $lvl_six_Cnt=$_POST['lvl_six_cnt'];
  $lvl_six_Income=$_POST['lvl_six_income'];
  $lvl_seven_Cnt=$_POST['lvl_seven_cnt'];
  $lvl_seven_Income=$_POST['lvl_seven_income'];
  $lvl_eight_Cnt=$_POST['lvl_eight_cnt'];
  $lvl_eight_Income=$_POST['lvl_eight_income'];
  $lvl_nine_Cnt=$_POST['lvl_nine_cnt'];
  $lvl_nine_Income=$_POST['lvl_nine_income'];
  $lvl_ten_Cnt=$_POST['lvl_ten_cnt'];
  $lvl_ten_Income=$_POST['lvl_ten_income'];
  $udate = date("Y-m-d");

  $sql="update level_income_setting set lvl_one_cnt='$lvl_one_Cnt',lvl_one_income='$lvl_one_Income',lvl_two_cnt='$lvl_two_Cnt',lvl_two_income='$lvl_two_Income',lvl_three_cnt='$lvl_three_Cnt',lvl_three_income='$lvl_three_Income',lvl_four_cnt='$lvl_four_Cnt',lvl_four_income='$lvl_four_Income',lvl_five_cnt='$lvl_five_Cnt',lvl_five_income='$lvl_five_Income',lvl_six_cnt='$lvl_six_Cnt',lvl_six_income='$lvl_six_Income',lvl_seven_cnt='$lvl_seven_Cnt',lvl_seven_income='$lvl_seven_Income',lvl_eight_cnt='$lvl_eight_Cnt',lvl_eight_income='$lvl_eight_Income',lvl_nine_cnt='$lvl_nine_Cnt',lvl_nine_income='$lvl_nine_Income',lvl_ten_cnt='$lvl_ten_Cnt',lvl_ten_income='$lvl_ten_Income',update_date='$udate'";



   if(mysqli_query($conn,$sql))
   {
           
      echo "Setting Updated !";    
   }
   else
   {
    echo "There was some error!!";
   }
}
else
{
  $sql="select * from level_income_setting";
  
  $rs=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($rs);

  

?>
  
  <form class="form-horizontal" id="lvlincsetting" enctype="multipart/form-data" method="post" action="">
				
     




<div class="form-group row">
    <label for="lvl_one_cnt" class="control-label col-md-3">Level One Count:  </label>
    <div class="col-md-8">
    <input name="lvl_one_cnt" type="number" class="form-control" id="lvl_one_cnt" value="<?php echo $row['lvl_one_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_one_income" class="control-label col-md-3">Level One Income:  </label>
    <div class="col-md-8">
    <input name="lvl_one_income" type="number" class="form-control" id="lvl_one_income" value="<?php echo $row['lvl_one_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_two_cnt" class="control-label col-md-3">Level Two Count:  </label>
    <div class="col-md-8">
    <input name="lvl_two_cnt" type="number" class="form-control" id="lvl_two_cnt" value="<?php echo $row['lvl_two_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_two_income" class="control-label col-md-3">Level Two Income:  </label>
    <div class="col-md-8">
    <input name="lvl_two_income" type="number" class="form-control" id="lvl_two_income" value="<?php echo $row['lvl_two_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_three_cnt" class="control-label col-md-3">Level Three Count:  </label>
    <div class="col-md-8">
    <input name="lvl_three_cnt" type="number" class="form-control" id="lvl_three_cnt" value="<?php echo $row['lvl_three_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_three_income" class="control-label col-md-3">Level Three Income:  </label>
    <div class="col-md-8">
    <input name="lvl_three_income" type="number" class="form-control" id="lvl_three_income" value="<?php echo $row['lvl_three_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_four_cnt" class="control-label col-md-3">Level Four Count:  </label>
    <div class="col-md-8">
    <input name="lvl_four_cnt" type="number" class="form-control" id="lvl_four_cnt" value="<?php echo $row['lvl_four_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_four_income" class="control-label col-md-3">Level Four Income:  </label>
    <div class="col-md-8">
    <input name="lvl_four_income" type="number" class="form-control" id="lvl_four_income" value="<?php echo $row['lvl_four_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_five_cnt" class="control-label col-md-3">Level Five Count:  </label>
    <div class="col-md-8">
    <input name="lvl_five_cnt" type="number" class="form-control" id="lvl_five_cnt" value="<?php echo $row['lvl_five_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_five_income" class="control-label col-md-3">Level Five Income:  </label>
    <div class="col-md-8">
    <input name="lvl_five_income" type="number" class="form-control" id="lvl_five_income" value="<?php echo $row['lvl_five_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_six_cnt" class="control-label col-md-3">Level Six Count:  </label>
    <div class="col-md-8">
    <input name="lvl_six_cnt" type="number" class="form-control" id="lvl_six_cnt" value="<?php echo $row['lvl_six_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_six_income" class="control-label col-md-3">Level Six Income:  </label>
    <div class="col-md-8">
    <input name="lvl_six_income" type="number" class="form-control" id="lvl_six_income" value="<?php echo $row['lvl_six_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_seven_cnt" class="control-label col-md-3">Level Seven Count:  </label>
    <div class="col-md-8">
    <input name="lvl_seven_cnt" type="number" class="form-control" id="lvl_seven_cnt" value="<?php echo $row['lvl_seven_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_seven_income" class="control-label col-md-3">Level Seven Income:  </label>
    <div class="col-md-8">
    <input name="lvl_seven_income" type="number" class="form-control" id="lvl_seven_income" value="<?php echo $row['lvl_seven_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_eight_cnt" class="control-label col-md-3">Level Eight Count:  </label>
    <div class="col-md-8">
    <input name="lvl_eight_cnt" type="number" class="form-control" id="lvl_eight_cnt" value="<?php echo $row['lvl_eight_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_eight_income" class="control-label col-md-3">Level Eight Income:  </label>
    <div class="col-md-8">
    <input name="lvl_eight_income" type="number" class="form-control" id="lvl_eight_income" value="<?php echo $row['lvl_eight_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_nine_cnt" class="control-label col-md-3">Level Nine Count:  </label>
    <div class="col-md-8">
    <input name="lvl_nine_cnt" type="number" class="form-control" id="lvl_nine_cnt" value="<?php echo $row['lvl_nine_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_nine_income" class="control-label col-md-3">Level Nine Income:  </label>
    <div class="col-md-8">
    <input name="lvl_nine_income" type="number" class="form-control" id="lvl_nine_income" value="<?php echo $row['lvl_nine_income'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_ten_cnt" class="control-label col-md-3">Level Ten Count:  </label>
    <div class="col-md-8">
    <input name="lvl_ten_cnt" type="number" class="form-control" id="lvl_ten_cnt" value="<?php echo $row['lvl_ten_cnt'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="lvl_ten_income" class="control-label col-md-3">Level Ten Income:  </label>
    <div class="col-md-8">
    <input name="lvl_ten_income" type="number" class="form-control" id="lvl_ten_income" value="<?php echo $row['lvl_ten_income'];?>" required>
  </div>
</div>

  
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
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
  </body>
</html>