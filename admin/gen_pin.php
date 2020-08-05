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
    <title>Generate Pin</title>
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
  
    <!-- Sidebar menu-->
	<?php include("inc/side-bar-menu.php");
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Generate Pin</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Generate Pin</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
     <?php



if(isset($_POST['submit']))
{


  $assign_to=$_POST['assign_to'];
  $gendate=date('Y-m-d');
  $n=$_POST['no_of_pin'];

  $assign_to=GetUserId($conn,$assign_to);

     
    $cnt="select COUNT(pin_id) from pins";
    $pinno=ReturnAnyValue($conn,$cnt);

for ($i = 0; $i < $n; $i++)
  {
    if($cnt>0)
    {
      $sql="SELECT FLOOR(RAND() * 9999999) AS random_num FROM pins WHERE 'random_num' NOT IN (SELECT pin_number FROM pins) LIMIT 1";
      $pinno=ReturnAnyValue($conn,$sql);
    }

    else
     {
      $pinno=rand(99999,999999999999);

     }
      
      $sql="insert into pins(pin_number,gen_date,assign_to) values ('$pinno','$gendate','$assign_to')";

      if(mysqli_query($conn,$sql))
      {
        
      
       echo "<br><b>Pin Generated !!</b>";
       echo "<br> Pin Number- ".$pinno;
       echo "<br> Assigned To: ".$assign_to;
             
      }
      else
        echo "error:".$sql."<br>".mysqli_error($conn);
    }
}
else
{
?>  
  
  <form class="form-horizontal" id="genPin" enctype="multipart/form-data" method="post" action="">
				
      <div class="form-group row">
    <label for="no_of_pin" class="control-label col-md-3">Number of Pins:  </label>
    <div class="col-md-8">
    <input name="no_of_pin" type="number" class="form-control" id="no_of_pin" required>
  </div>
</div>

<div class="form-group row">
    <label for="assign_to" class="control-label col-md-3">Assign To:  </label>
    <div class="col-md-8">
    <input name="assign_to" type="text" class="form-control" id="assign_to" required>
    <span id="mname"></span>
  </div>
</div>
          

				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Generate Pin" class="btn btn-primary">
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
$("#assign_to").blur(function(){
  var sid=$("#assign_to").val();
  
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