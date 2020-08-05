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

    <title>GDI Admin - Dashboard</title>

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

	<?php
include("inc/side-bar-menu.php");
	include("inc/menu.php");

	?>

    <main class="app-content">

      <div class="app-title">

        <div>

          <h1><i class="fa fa-dashboard"></i> <?php



      echo "Welcome, ".$_SESSION['name']."<br>";?></h1>



      <?php



      $sql="select last_activity,login_ip from admin where admin_id=".$_SESSION['admin_id'];

      $rs=mysqli_query($conn,$sql);

      $cnt=mysqli_num_rows($rs);

      $row=mysqli_fetch_array($rs);

           

            //echo "<div style='text-align:right'>";

      echo "Last Login: ".$row['last_activity'];

      echo ", IP: ".$row['login_ip']."";
      
     

          

?>

        </div>

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

        </ul>

		

      </div>



      

	  

      <div class="row">

        <div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">



              

			<?php 

			$sql="select COUNT(user_id) from users";
      $cntUserTotal=ReturnAnyValue($conn,$sql);

      $sql="select COUNT(user_id) from users where pay_status=1";
      $cntUserTotalPaid=ReturnAnyValue($conn,$sql);

      
?>





              <h4>Users</h4>

<p><b><?php echo "<a href=mng_user.php>$cntUserTotalPaid ($cntUserTotal)</a>";?></b></p>



            </div>

          </div>

        </div>





<div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">



              

      <?php 

      $sql="SELECT count(*) as kycs FROM `kyc_detail`";
      $totKYC=ReturnAnyValue($conn,$sql);

      $sql="SELECT count(*) as pending_kycs FROM `kyc_detail` WHERE kyc_status=2";
      $pendKYC=ReturnAnyValue($conn,$sql);
?>


              <h4>KYCs</h4>

              <p><b><?php echo "<a href=showpendingkyc.php>$pendKYC ($totKYC)</a>";?></b></p>

            </div>

          </div>

        </div>






<div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">



              

      <?php 

      $sql="SELECT count(*) as banks FROM `bank_detail`";
      $cntBanks=ReturnAnyValue($conn,$sql);
      $sql="SELECT count(*) as banks FROM `bank_detail` WHERE status=2";
      $pendBanks=ReturnAnyValue($conn,$sql);

?>


              <h4>Bank Details</h4>

              <p><b><?php echo "<a href=showpendingbank.php>$pendBanks ($cntBanks)</a>";?></b></p>

            </div>

          </div>

        </div>

 







<div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-inr fa-3x"></i>

            <div class="info">



              

      <?php 

      $sql="SELECT SUM(pay_amt) as total_joining_fee from user_payment";
      $fees=ReturnAnyValue($conn,$sql);
?>

              <h4>Fees Recieved</h4>

              <p><b><?php echo "<a href=pay_detail.php>Rs $fees </a>";?></b></p>

            </div>

          </div>

        </div>













<div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-inr fa-3x"></i>

            <div class="info">



              

      <?php 



$sql="SELECT SUM(net_amt) FROM `payout` WHERE pay_status=0";

$genPayout=ReturnAnyValue($conn,$sql);











?>

              <h4>Payout Generated</h4>

              <p><b><?php echo "Rs ". $genPayout;?></b></p>

            </div>

          </div>

        </div>





        <div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon"><i class="icon fa fa-inr fa-3x"></i>

            <div class="info">



              

      <?php 



 



$sql="SELECT SUM(net_amt) FROM `payout` WHERE pay_status=1";

$relPayout=ReturnAnyValue($conn,$sql);

if ($relPayout=="") $relPayout="0.00";











?>

              <h4>Payout Released</h4>

              <p><b><?php echo "Rs. ".$relPayout;?></b></p>

            </div>

          </div>

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

    <script type="text/javascript" src="js/plugins/chart.js"></script>

    <script type="text/javascript">

      var data = {

      	labels: ["January", "February", "March", "April", "May"],

      	datasets: [

      		{

      			label: "My First dataset",

      			fillColor: "rgba(220,220,220,0.2)",

      			strokeColor: "rgba(220,220,220,1)",

      			pointColor: "rgba(220,220,220,1)",

      			pointStrokeColor: "#fff",

      			pointHighlightFill: "#fff",

      			pointHighlightStroke: "rgba(220,220,220,1)",

      			data: [65, 59, 80, 81, 56]

      		},

      		{

      			label: "My Second dataset",

      			fillColor: "rgba(151,187,205,0.2)",

      			strokeColor: "rgba(151,187,205,1)",

      			pointColor: "rgba(151,187,205,1)",

      			pointStrokeColor: "#fff",

      			pointHighlightFill: "#fff",

      			pointHighlightStroke: "rgba(151,187,205,1)",

      			data: [28, 48, 40, 19, 86]

      		}

      	]

      };

      var pdata = [

      	{

      		value: 300,

      		color: "#46BFBD",

      		highlight: "#5AD3D1",

      		label: "Complete"

      	},

      	{

      		value: 50,

      		color:"#F7464A",

      		highlight: "#FF5A5E",

      		label: "In-Progress"

      	}

      ]

      

      var ctxl = $("#lineChartDemo").get(0).getContext("2d");

      var lineChart = new Chart(ctxl).Line(data);

      

      var ctxp = $("#pieChartDemo").get(0).getContext("2d");

      var pieChart = new Chart(ctxp).Pie(pdata);

    </script>

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