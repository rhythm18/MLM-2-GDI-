<?php
session_start();
include("inc/connect.php");

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $cpass=$_POST['cpass'];

  $mobile=$_POST['mobile'];
  $sponsorid=$_POST['sponsor_id'];
  $join_date=date('Y-m-d');

  
  
  
  
  $sql="select user_id from users order by user_id DESC LIMIT 0,1";
  $spillID=ReturnAnyValue($conn,$sql);

	for ($i = 0; $i < 10; $i++)
	 { 
	 	$sql="insert into users(sponsor_id,spill_id,name,mobile,email,password,join_date,pay_status) values ('$sponsorid','$spillID','$name','$mobile','$email','$pass','$join_date','1')";
			 mysqli_query($conn,$sql);
	   
	}
}
else
{
?>  


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Sign Up</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>AR Finance</h1>
      </div>
      <div class="login-box">

        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP Test</h3>

           <div class="form-group">
          <label for="sponsor_id">Sponsor_id:</label>
          <input name="sponsor_id" type="number" class="form-control" placeholder="Enter sponsor id" id="sponsor_id" required>
        </div>

          <div class="form-group">
          <label for="name">Name:</label>
          <input name="name" type="text" class="form-control" placeholder="Enter name" id="name" required>
        </div>

          <div class="form-group">
            <label for="email">Email-ID:</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email" id="email" required>
          </div>

          <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input name="mobile" type="number" class="form-control" placeholder="Enter Mobile Number" id="mobile" required="">
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="password" class="form-control" placeholder="Enter password" id="password" required>
          </div>

           <div class="form-group">
            <label for="cpass">Confirm Password:</label>
            <input name="cpass" type="password" class="form-control" placeholder="Enter password" id="cpass" required>
          </div>

			
		  <?php } ?>
          <!--<div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>-->
        
      
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
                  <a href="index.php">Already a Member? Sign in</a>

        </form>

        <!--<form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="username">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>
?>