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
  $sql="select user_id from users where member_id=".$sponsorid;
  $sponsorid=ReturnAnyValue($conn,$sql);
  if($sponsorid=="")
  {
     $msg="Please provide valid sponsor id. !!";
            $url="index.php";
            dispMessage($msg,$url); 
            die();  
  }
  
  if($pass!=$cpass)
   {
            $msg="Password and Confirm Password must be same !!";
            $url="index.php";
            dispMessage($msg,$url);  
            die();
    }
  $join_date=date('Y-m-d');

  

  //check mobile already in used 
  /*$sql="select count(*) from users where mobile='$mobile'";
  $cnt=ReturnAnyValue($conn,$sql);

  if($cnt>0) 
        {
            $msg="This Mobile Number is already registered !!";
            $url="index.php";
            dispMessage($msg,$url); 
            die();  
        } */
//check email already used 
/*$sql="SELECT COUNT(*) FROM users WHERE email='$email'";
$cnt=ReturnAnyValue($conn,$sql);

    if($cnt>0) 
        {
            $msg="This email is already registered !!";
            $url="index.php";
            dispMessage($msg,$url);   
        } 

 */

$sql="select COUNT(*) as cnt from users";
$memberCnt=ReturnAnyValue($conn, $sql);
echo $memberCnt;

if($memberCnt>0)
{
  $sql="SELECT FLOOR(RAND() * 99999) AS random_num FROM users WHERE 'random_num' NOT IN (SELECT member_id FROM users) LIMIT 1";
  $memberID=ReturnAnyValue($conn,$sql);
}

else
 {
  $memberID=rand(99999,999999);

 }

  $sql="insert into users(member_id,sponsor_id,name,mobile,email,password,join_date) values ('$memberID','$sponsorid','$name','$mobile','$email','$pass','$join_date')";


    if(mysqli_query($conn,$sql))
    {

       

            $id=mysqli_insert_id($conn);
            $sql="insert into user_profile(user_id) values('$id')";
            
            mysqli_query($conn,$sql);

            $sql="insert into bank_detail(user_id) values('$id')";

            mysqli_query($conn,$sql);

            $sql="insert into kyc_detail(user_id) values('$id')";
            
            mysqli_query($conn,$sql);

            include("send_welcomeletter.php");
             $strUrl="welcome.php?id=$id";
             header('Location:'.$strUrl);
   }

      else 
            {
                    echo "error:".$sql."<br>".mysqli_error($conn);
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
      <script src="js/jquery-3.2.1.min.js"></script>

    <title>User Sign Up</title>
    <script>
$(document).ready(function(){
$("#sponsor_id").blur(function(){
  var sid=$("#sponsor_id").val();
  
  $.get("get_name.php",
  {
    id: sid
    
  },
  function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
     $('#sname').html(data);
  });
});
}); 
</script>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1><?php 
include("inc/company_name.php");
?></h1>
      </div>

          
      <div class="login-box">

        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3>

           <div class="form-group">
          <b>Sponsor ID </b>
          <input name="sponsor_id" type="text" class="form-control" placeholder="Enter sponsor id" id="sponsor_id" required>
          <span id="sname" name="sname"></span>
        </div>

          <div class="form-group">
          <b>Name</b>
          <input name="name" type="text" class="form-control" placeholder="Enter name" id="name" required>
        </div>

          <div class="form-group">
            <b>Email</b>
            <input name="email" type="text" class="form-control" placeholder="Enter email" id="email" required>
          </div>

          <div class="form-group">
           <b> Mobile Number</b>
            <input name="mobile" type="text" class="form-control" placeholder="Enter Mobile Number" id="mobile" required="">
          </div>

          <div class="form-group">
          <b> Password </b>
            <input name="password" type="password" class="form-control" placeholder="Enter password" id="password" required>
          </div>

           <div class="form-group">
           <b> Confirm Password </b>
            <input name="cpass" type="password" class="form-control" placeholder="Confirm password" id="cpass" required>
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