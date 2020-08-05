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
    <title>GDI : Activate User</title>
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
  
	<?php include("inc/side-bar-menu.php");
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Activate User</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Activate User</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
      <?php 
if(isset($_POST['submit']))

{
  

 $mid=$_POST['memberID'];
 $id=GetUserID($conn,$mid);
 //echo $mid; 



 include("inc/user_activation.php");
}


else{
   ?>


  <form class="form-horizontal" method="post" name="myform" action=""> 
  <input type="hidden" name="pay_method" value="4">
  <input type="hidden" name="pay_detail" value="pin">
  

  <div class="form-group row">
    <label for="pay_amt" class="control-label col-md-3">Payment Amount</label>
    <div class="col-md-8">
      <?php $sql="select joining_fee from settings";
  $join_fee=ReturnAnyValue($conn,$sql); 
  echo $join_fee;?>
      </div>
  </div>

<div class="form-group row">
    <label for="memberID" class="control-label col-md-3">Member ID:  </label>
    <div class="col-md-8">
    <input name="memberID" type="number" class="form-control" id="memberID" required>
    <span id="mname"></span>
  </div>
</div>



<div class="form-group row">
    <label for="pin_number" class="control-label col-md-3">PIN Number:  </label>
    <div class="col-md-8">
    <input name="pin_number" type="number" class="form-control" id="pin_number" required>
  </div>
</div>






  
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Activate" class="btn btn-primary">
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
    <script>
$(document).ready(function(){
$("#memberID").blur(function(){
  var sid=$("#memberID").val();
  
  $.get("get_name.php",
  {
    id: sid
    
  },
  function(data, status){
   // alert("Data: " + data + "\nStatus: " + status);
     $('#mname').html(data);
  });
});
}); 
</script>
  </body>
</html>