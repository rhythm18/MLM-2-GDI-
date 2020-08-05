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
    <title>GDI : Update  Profile</title>
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
  
     <?php include("inc/side-bar-menu.php");?>
   
 
	<?php
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> My Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">My Profile</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
         <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success">
        <strong>Success!</strong> user details updated successfully.
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger">
        <strong>Error!</strong> Sorry there was some problem.
        </div>
        <?php } ?>
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{

  $id=$_SESSION['user_id'];
  $dob=$_POST['dob'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $address=$_POST['address'];
  $pin=$_POST['pincode'];
  $cname=$_POST['company_name'];
  $oaddr=$_POST['office_addr'];
  $jobtype=$_POST['job_type'];
  $udate = date("Y-m-d");
  


 $sql="update user_profile set  dob='$dob',city='$city',state='$state',address='$address',pincode='$pin',company_name='$cname',office_addr='$oaddr',job_type='$jobtype',update_date='$udate' where user_id=$id";

   if(mysqli_query($conn,$sql))
   {
     //echo "Updated Successfully !!!";
     $url="user_profile.php?sts=1";
  
    
   }
   else
   {
    //echo "There was some error!!";
    $url="user_profile.php?sts=0";
   }

   gotopage($url);
}
else
{
  $sql="select * from user_profile where user_id=".$_SESSION['user_id'];
  
  $rs=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($rs);

  $sql="select sponsor_id FROM users WHERE user_id=".$_SESSION['user_id'];
  $spn_id=ReturnAnyValue($conn,$sql);

  $sql="select name from users where user_id=".$spn_id;
  $spn_name=ReturnAnyValue($conn,$sql);

?>
    
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
				
     
<div class="form-group row">
    <label class="control-label col-md-3">Sponsored By:</label>  
    <div class="col-md-8"><?php echo "<b>"  .$spn_name."</b>"; ?>
      </div>
  </div>
  <div class="form-group row">
    <label for="dob" class="control-label col-md-3">Date of birth:  </label>
    <div class="col-md-8">
      <input name="dob" type="Date" class="form-control"  id="dob" value="<?php echo $row['dob'];?>" required>
    </div>
  </div>  

  <div class="form-group row">
    <label for="city" class="control-label col-md-3">City:  </label>
    <div class="col-md-8">
    <input name="city" type="text" class="form-control" id="city"value="<?php echo $row['city'];?>" required>
    </div>
  </div>

<div class="form-group row">
    <label for="state" class="control-label col-md-3">State:  </label>
    <div class="col-md-8">
    <input name="state" type="text" class="form-control" id="state"value="<?php echo $row['state'];?>" required>
    </div>
</div>

<div class="form-group row">
    <label for="address" class="control-label col-md-3">Address:  </label>
    <div class="col-md-8">
    <textarea class="form-control" rows="4"  name="address" id="address" required><?php echo $row['address'];?></textarea>
    </div>
 </div>



<div class="form-group row">
    <label for="pincode" class="control-label col-md-3">Pin Code:  </label>
    <div class="col-md-8">
    <input name="pincode" type="number" class="form-control" id="pincode" value="<?php echo $row['pincode'];?>" required>
  </div>
</div>

  <div class="form-group row">
    <label for="company_name" class="control-label col-md-3">Company Name:  </label>
    <div class="col-md-8">
    <input name="company_name" type="text" class="form-control" id="company_name" value="<?php echo $row['company_name'];?>" required>
  </div>
    </div>


<div class="form-group row">
    <label for="office_addr" class="control-label col-md-3">Office Address:  </label>
    <div class="col-md-8">
    <textarea class="form-control" rows="4"  name="office_addr" id="office_addr" required><?php echo $row['office_addr'];?></textarea>
    </div>
 </div>

 <div class="form-group row">
    <label for="job_type" class="control-label col-md-3">Job Type:  </label>
    <div class="col-md-8">
    <input name="job_type" type="text" class="form-control" id="job_type"value="<?php echo $row['job_type'];?>" required>
    </div>
  </div>
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
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