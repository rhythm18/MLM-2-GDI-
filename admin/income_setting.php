<?php include("inc/connect.php");

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

    <title>GDI : Basic Settings</title>

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

	<?php

	include("inc/menu.php");

	?>

     <main class="app-content">

      <div class="app-title">

        <div>

          <h1><i class="fa fa-edit"></i>Basic Settings</h1>

        </div>

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item">Basic Settings</li>

        </ul>

      </div>

      <div class="row">

       <div class="col-md-12">
        <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success">
        <strong>Success!</strong> setting updated successfully.
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger">
        <strong>Sorry!</strong> Sorry there was some problem.
        </div>
        <?php } ?>
          

          <div class="tile">

            <div class="tile-body">

			

      <?php



if(isset($_POST['submit']))

{


  $joinfee=$_POST['joining_fee'];

  //$booster_inc=$_POST['booster_income'];

  //$booster_days=$_POST['booster_days'];

  $min_payout=$_POST['min_payout'];

  $tds=$_POST['tds'];

  $tds_no_pan=$_POST['tds_no_pan'];

  $admin_charge=$_POST['admin_charge'];

  /*$dir_req_b=$_POST['dir_req_b'];

  $superbooster_inc=$_POST['super_booster_income'];

  $superbooster_days=$_POST['super_booster_days'];

  $dir_req_sb=$_POST['dir_req_sb'];

  $booster_max_days=$_POST['booster_max_days'];*/

  $rank_inc=$_POST['rank_income'];

  $dt=date('Y-m-d h:i:s');

  





 $sql="update settings set joining_fee='$joinfee',min_payout='$min_payout',tds='$tds',tds_no_pan='$tds_no_pan',admin_charge='$admin_charge',rank_income='$rank_inc', update_date='$dt'";

 //$sql="update settings set joining_fee='$joinfee' ,booster_income='$booster_inc' ,booster_days='$booster_days'  ,min_payout='$min_payout',tds='$tds',tds_no_pan='$tds_no_pan',admin_charge='$admin_charge',dir_req_b='$dir_req_b',super_booster_income='$superbooster_inc',super_booster_days='$superbooster_days',dir_req_sb='$dir_req_sb',booster_max_days='$booster_max_days',rank_income='$rank_inc', update_date='$dt'";



   if(mysqli_query($conn,$sql))

   {
      $url="income_setting.php?sts=1";
      gotopage($url);
      //echo "Setting Updated !";    

   }

   else

   {
      $url="income_setting.php?sts=0";
      gotopage($url);
    //echo "There was some error!!";

   }



}

else

{

  $sql="select * from settings";

  

  $rs=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($rs);



  



?>

  

  <form class="form-horizontal" id="setting" enctype="multipart/form-data" method="post" action="">

				

     









<div class="form-group row">

    <label for="joining_fee" class="control-label col-md-3">Joining Fee:  </label>

    <div class="col-md-8">

    <input name="joining_fee" type="number" class="form-control" id="joining_fee" value="<?php echo $row['joining_fee'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="tds" class="control-label col-md-3">TDS:  </label>

    <div class="col-md-8">

    <input name="tds" type="number" class="form-control" id="tds" value="<?php echo $row['tds'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="tds_no_pan" class="control-label col-md-3">TDS (without PAN):  </label>

    <div class="col-md-8">

    <input name="tds_no_pan" type="number" class="form-control" id="tds_no_pan" value="<?php echo $row['tds_no_pan'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="admin_charge" class="control-label col-md-3">Admin Charge:  </label>

    <div class="col-md-8">

    <input name="admin_charge" type="number" class="form-control" id="admin_charge" value="<?php echo $row['admin_charge'];?>" required>

  </div>

</div>

<!--



<div class="form-group row">

    <label for="booster_income" class="control-label col-md-3"> Booster Income:  </label>

    <div class="col-md-8">

    <input name="booster_income" type="number" class="form-control" id="booster_income" value="<?php echo $row['booster_income'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="booster_days" class="control-label col-md-3">Booster Days:  </label>

    <div class="col-md-8">

    <input name="booster_days" type="number" class="form-control" id="booster_days" value="<?php echo $row['booster_days'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="dir_req_b" class="control-label col-md-3">Direct Req (Booster):  </label>

    <div class="col-md-8">

    <input name="dir_req_b" type="number" class="form-control" id="dir_req_b" value="<?php echo $row['dir_req_b'];?>" required>

  </div>

</div>





<div class="form-group row">

    <label for="super_booster_income" class="control-label col-md-3">Super Booster Income:  </label>

    <div class="col-md-8">

    <input name="super_booster_income" type="number" class="form-control" id="super_booster_income" value="<?php echo $row['super_booster_income'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="super_booster_days" class="control-label col-md-3">Super Booster Days:  </label>

    <div class="col-md-8">

    <input name="super_booster_days" type="number" class="form-control" id="super_booster_days" value="<?php echo $row['super_booster_days'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="dir_req_sb" class="control-label col-md-3">Direct Req (Super Booster):  </label>

    <div class="col-md-8">

    <input name="dir_req_sb" type="number" class="form-control" id="dir_req_sb" value="<?php echo $row['dir_req_sb'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="booster_max_days" class="control-label col-md-3">Max Booster Days:  </label>

    <div class="col-md-8">

    <input name="booster_max_days" type="number" class="form-control" id="booster_max_days" value="<?php echo $row['booster_max_days'];?>" required>

  </div>

</div>

-->

<div class="form-group row">

    <label for="min_payout" class="control-label col-md-3">Minimium Payout:  </label>

    <div class="col-md-8">

    <input name="min_payout" type="number" class="form-control" id="min_payout" value="<?php echo $row['min_payout'];?>" required>

  </div>

</div>





<div class="form-group row">

     <label class="control-label col-md-3">Rank Income  :</label>

     <div class="col-md-8">

    <select class="form-control" name="rank_income" id="rank_income" >

      <option value="">-- Select Level Income --</option>
      <?php
      if ($row['rank_income']==1)
      { ?>
      <option value="1" selected>All Level income</option>

      <option value="2">Highest Level income</option>
      <?php }  if ($row['rank_income']==2)  { ?>

       <option value="1" >All Level income</option>

      <option value="2" selected>Highest Level income</option>

      <?php } ?>

    </select>

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