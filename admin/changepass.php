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
    <title>GDI : Change Password</title>
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
          <h1><i class="fa fa-edit"></i> Change Password</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Change Password</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{
  
  $pass=$_POST['password'];
  $npass=$_POST['npass'];
  $cpass=$_POST['cpass'];
  $id=$_SESSION['admin_id'];
  

  $sql="select * from admin where admin_id='$id' and password='$pass'";
  
  $rs=mysqli_query($conn,$sql);

  $cnt=mysqli_num_rows($rs);

  if($cnt==0)
  {
     $msg="<b>sorry invalid old password</b>";
     $url="changepass.php?sts=0&msg=$msg";
  }

  else
  {
    if($cpass!=$npass)
    {
      $msg= "<b>New and Confirmed Password must be same</b>";
       $url="changepass.php?sts=0&msg=$msg";
    }
    else
    {
      $sql="update admin set password=$npass where admin_id=$id";
      if(mysqli_query($conn,$sql))
      {
         $msg= "<b>Password updated successfully</b>";
         $url="changepass.php?sts=1&msg=$msg";
      }
      else
      {
        $msg= "<b>Sorry, there was some problem.</b>";
        $url="changepass.php?sts=0&msg=$msg";
      }

      
    }
  }
   gotopage($url);
}
else
  
{
?>  
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
				
     <div class="form-group row">
    <label for="password" class="control-label col-md-3">Old Password: </label>
        <div class="col-md-8">
    <input name="password" type="password" class="form-control"  id="password" required>
  </div>
</div>
 <div class="form-group row">
    <label for="npass" class="control-label col-md-3">New Password: </label>
        <div class="col-md-8">
    <input name="npass" type="password" class="form-control"  id="npass"required>
  </div>
</div>

  <div class="form-group row">
    <label for="cpass" class="control-label col-md-3">Confirmed Password: </label>
        <div class="col-md-8">
          <input name="cpass" type="password" class="form-control"  id="cpass" required>
           <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success mt-2">
        <strong>Success!</strong> Password updated successfully.
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger mt-2">
        <strong>Error!</strong> <?php echo $_GET['msg'];?>.
        </div>
        <?php } ?>
  </div>

</div>

  
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
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