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
    <title>GDI- Update Profile</title>
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
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{

  $id=$_SESSION['admin_id'];
  $number=$_POST['number'];
  $name=$_POST['name'];
  $email=$_POST['email'];
 // $admintype=$_POST['admin_type'];
  
  


 $sql="update admin set number='$number',name='$name',email='$email' where admin_id=$id";
 

 if(mysqli_query($conn,$sql))
 {
   $url="admin_profile.php?sts=1";
  
 }
 else
 {
   $url="admin_profile.php?sts=0";
 }
 gotopage($url);

}
else
{
  $sql="select * from admin where admin_id=".$_SESSION['admin_id'];
  
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);

?>
  
  <form class="form-horizontal" id="adminprofile" enctype="multipart/form-data" method="post" action="">
				
     

<div class="form-group row">
    <label for="name" class="control-label col-md-3">Name:  </label>
        <div class="col-md-8">
    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name'];?>" required>
  </div>
</div>
<div class="form-group row">
    <label for="email" class="control-label col-md-3">Email:  </label>
        <div class="col-md-8">
    <input name="email" type="text" class="form-control" id="email" value="<?php echo $row['email'];?>" required>
  </div>
</div>
<div class="form-group row">
    <label for="number" class="control-label col-md-3">Contact Number:  </label>
        <div class="col-md-8">
    <input name="number" type="text" class="form-control" id="number" value="<?php echo $row['number'];?>" required>
   
     <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success mt-2">
        <strong>Success!</strong> Profile details updated successfully.
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger mt-2">
        <strong>Error!</strong> Sorry there was some problem.
        </div>
        <?php } ?>
  </div>
</div>

 

<!--
<div class="form-group row">
     <label class="control-label col-md-3">Admin Type  :</label>
     <div class="col-md-8">
   <select class="form-control" name="admin_type" id="admin_type" >
      <option value="">-- Select Type --</option>
      <option value="1">Admin</option>
      <option value="2">Operator</option>
    </select>
    </div>
</div> -->
         
				
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