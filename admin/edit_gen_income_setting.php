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
    <title>Update Generation Income Setting</title>
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
       <?php include("inc/side-bar-menu.php");?>
    </header>
    <!-- Sidebar menu-->
	<?php
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Update Level Income Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="view_gen_income_setting.php">Level Income Setting</a></li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
     <?php



if(isset($_POST['submit']))
{

  $lvl_no=$_GET['lvlNO'];
  $lvl_number=$_POST['lvl_number'];
  $udate=date('Y-m-d');
  $lvl_income=$_POST['lvl_income'];
  
  



    $sql="update gen_income_setting set lvl_number='$lvl_number', lvl_income='$lvl_income',update_date='$udate' where lvl_number='$lvl_no'";


  if(mysqli_query($conn,$sql))
    $url="view_gen_income_setting.php?sts=1";
  else
   $url="view_gen_income_setting.php?sts=1";
 gotopage($url);
   
}
else
{
  $sql="select * from gen_income_setting where lvl_number=".$_GET['lvlNO'];
  
  $rs=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($rs);
?>  
  
  <form class="form-horizontal" id="singleleginc" enctype="multipart/form-data" method="post" action="">
				

        <div class="form-group row">
    <label for="lvl_number" class="control-label col-md-3">Level Number:  </label>
    <div class="col-md-8">
    <input name="lvl_number" type="number" class="form-control" id="lvl_number" value="<?php echo $row['lvl_number'];?>" readonly>
  </div>
</div>



<div class="form-group row">
    <label for="lvl_income" class="control-label col-md-3">Level Income:  </label>
    <div class="col-md-8">
    <input name="lvl_income" type="number" class="form-control" id="lvl_income" value="<?php echo $row['lvl_income'];?>" required>
    

     
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