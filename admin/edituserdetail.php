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
    <title>GDI : User- Edit </title>
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
       
               <ul class="app-notification dropdown-menu dropdown-menu-right">
           
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
          <h1><i class="fa fa-edit"></i> User</h1>
          <p>Edit</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit </h3>
            <div class="tile-body">
			<?php 
				
if(isset($_POST['submit']))

{

  $id=$_POST['user_id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $mobile=$_POST['mobile'];

 $sql="update users set  name='$name',email='$email',password='$pass',mobile='$mobile' where user_id='$id'";

 if(mysqli_query($conn,$sql))
   $url="mng_user.php?sts=1";
 else
  $url="mng_user.php?sts=0";
 gotopage($url);
 
}
else
{
  $sql="select * from users where user_id=".$_GET['userID'];
  
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
?>
              <form class="form-horizontal" id="edituser" enctype="multipart/form-data" method="post" action="">
			 <input type="hidden" name="user_id" value="<?php echo $_GET['userID'];?>">




<div class="form-group row">
    <label for="name" class="control-label col-md-3">Name</label>
    <div class="col-md-8">
    <input name="name" type="text" class="form-control"  id="name" value="<?php echo $row['name'];?>">
  </div>
</div>

<div class="form-group row">
    <label for="mobile" class="control-label col-md-3">Mobile</label>
    <div class="col-md-8">
    <input name="mobile" type="text" class="form-control"  id="mobile" value="<?php echo $row['mobile'];?>">
  </div>
</div>

  <div class="form-group row">
    <label for="email" class="control-label col-md-3">Email ID</label>
    <div class="col-md-8">
    <input name="email" type="text" class="form-control" id="email"value="<?php echo $row['email'];?>">
  </div>
</div>

  <div class="form-group row">
    <label for="password" class="control-label col-md-3">Password</label>
    <div class="col-md-8">
    <input name="password" type="password" class="form-control" id="password"value="<?php echo $row['password'];?>">
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
      }
    </script>
  </body>
</html>