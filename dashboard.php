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

    <title>GDI User - Dashboard</title>

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



      $sql="select member_id from users where user_id=".$_SESSION['user_id'];

      $memberID=ReturnAnyValue($conn,$sql);





      echo "Welcome, ".$_SESSION['name'];?></h1>

      

       <?php



$sql="select last_activity,login_ip from users where user_id=".$_SESSION['user_id'];



$rs=mysqli_query($conn,$sql);

$cnt=mysqli_num_rows($rs);

while($row=mysqli_fetch_array($rs))

{ 

  //echo "<div style='text-align:right'>";
  echo "Member Id:".$memberID;
  echo "<br>Last Login: ".$row['last_activity'];

  echo "<br> from IP: ".$row['login_ip']."";

}



?>

        </div>

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

        </ul>

		

      </div>



      <div class="row">

       <div class="col-md-6 col-lg-3">

                    <div class="widget-small warning coloured-icon" style="background-color: lightgreen"><i class="icon fa fa-files-o fa-3x"></i>

                      <div class="info">

                        

                        <?php 

                          $sql="select pay_status from users where user_id=".$_SESSION['user_id'];
                          $payStatus=ReturnAnyValue($conn,$sql);

                          if($payStatus==1)
                          {
                            $sql="select joining_fee from settings where id=1";

                            $joiningFee=ReturnAnyValue($conn,$sql);

                        ?>



                           <h4>My Pack</h4>

                      <p><b><?php echo "Rs ".$joiningFee;?></b></p>

                        <?php
                      }

                        else
                        {
                          ?>
                           <h4>My Pack<h4>

                      <p><b><?php echo "Free";}?></b></p>
                        

        

       

                      </div>

                    </div>

                  </div>





        <div class="col-md-6 col-lg-3">

          <div class="widget-small warning coloured-icon" style="background-color: violet;"><i class="icon fa fa-files-o fa-3x"></i>

            <div class="info">

              

      <?php

            $sql="select join_date from users where user_id=".$_SESSION['user_id'];

            $joinDate=ReturnAnyValue($conn,$sql);

          ?>

              <h4>Joining</h4>

            <p><b><?php echo $joinDate;?></b></p>





      



            </div>

          </div>

        </div>



        <div class="col-md-6 col-lg-3">

          <div class="widget-small warning coloured-icon" style="background-color: #11ffe6;"><i class="icon fa fa-files-o fa-3x"></i>

            <div class="info">



               <?php

            $sql="select activation_date from users where user_id=".$_SESSION['user_id'];

            $activateDate=ReturnAnyValue($conn,$sql);

          ?>

              <h4>Activation</h4>

            <p><b><?php echo $activateDate;?></b></p>

              





            </div>

          </div>

        </div>





      

        

       

        <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon" style="background-color:lightgray;"><i class="icon fa fa-thumbs-o-up fa-3x"></i>

            <div class="info">

             

<?php



        $sql="SELECT COUNT(*) from users where sponsor_id=".$_SESSION['user_id'];

        $countMySponsored=ReturnAnyValue($conn,$sql);

        ?>



        <h4>My Directs</h4>

                      <p><b><?php echo "<a href=direct_member.php>".$countMySponsored."</a>";?></b></p>

       

                      </div>

                    </div>

                  </div>

                 



                 <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon" style="background-color:#ffff00;"><i class="icon fa fa-thumbs-o-up fa-3x"></i>

            <div class="info">

             

<?php


        $sponsorsTeam=sponsorTeamCnt($conn,$_SESSION['user_id']);

        ?>



        <h4>My Team</h4>

                

                        <p><b><?php echo $sponsorsTeam;?></b></p>



                      </div>

                    </div>

                  </div>



                   <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon" style="background-color:#a1ff00;"><i class="icon fa fa-thumbs-o-up fa-3x"></i>

            <div class="info">

             

<?php
        $sql="select SUM(inc_amt) from gen_income where user_id=".$_SESSION['user_id'];
        $sumDirInc=ReturnAnyValue($conn,$sql);


        ?>



        <h4>Direct Income</h4>

                

                        <p><b><?php echo "Rs ".$sumDirInc;?></b></p>



                      </div>

                    </div>

                  </div>

                  <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon" style="background-color:#ffc0be;"><i class="icon fa fa-thumbs-o-up fa-3x"></i>

            <div class="info">

             

<?php
        $sql="select SUM(inc_amt) from daily_income where inc_lvl=0 and user_id=".$_SESSION['user_id'];
        $sumCBInc=ReturnAnyValue($conn,$sql);


        ?>



        <h4>Cashback Income</h4>

                

                        <p><b><?php echo "Rs ".$sumCBInc;?></b></p>




                      </div>

                    </div>

                  </div>


                   <div class="col-md-6 col-lg-3">

          <div class="widget-small info coloured-icon" style="background-color:#a1a9e6;"><i class="icon fa fa-thumbs-o-up fa-3x"></i>

            <div class="info">

             

<?php
        $sql="select SUM(inc_amt) from daily_income where inc_lvl>0 and user_id=".$_SESSION['user_id'];
        $sumDailyInc=ReturnAnyValue($conn,$sql);


        ?>



        <h4>Level Income</h4>

                

                        <p><b><?php echo "Rs ".$sumDailyInc;?></b></p>



                      </div>

                    </div>

                  </div>


                  <div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon" style="background-color: #ff760f"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">



              

      <?php 



$sql="SELECT SUM(net_amt) FROM `payout` WHERE pay_status=0 and user_id=".$_SESSION['user_id'];

$genPayout=ReturnAnyValue($conn,$sql);



?>

              <h4>Payout Generated</h4>

              <p><b><?php echo "Rs ".$genPayout;?></b></p>

            </div>

          </div>

        </div>





        <div class="col-md-6 col-lg-3">

          <div class="widget-small primary coloured-icon" style="background-color: #79ffda"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">



              

      <?php 



 



$sql="SELECT SUM(net_amt) FROM `payout` WHERE pay_status=1 and user_id=".$_SESSION['user_id'];

$relPayout=ReturnAnyValue($conn,$sql);













?>

              <h4>Payout Released</h4>

              <p><b><?php echo "Rs ".$relPayout;?></b></p>

            </div>

          </div>

        </div>



                   



                  



                  <div class="row" style="margin: 0">

          <div class="col-lg-5">

            

            </div>

          </div>

        </div>

          

    <!-- display msg end -->

  <div class="row">

        <div class="col-md-12">

            <div class="tile">


 <?php









$sql="select * from settings";





$rs=mysqli_query($conn,$sql);





?>

        
          <div class="table-responsive">
          <table class="table table-hover table-bordered" id="prdTable">
            

          <div id="dispMsg">
             <div class="text-center"><h1><b>Cashback Income</b></h1></div>

        </div>

          <thead class="thead-dark">

            <tr>

        <th>Plan</th>

        <th>Direct Required</th>

        <th>Amount</th>
        <th>Days</th>



      <th>Total Income</th>

        



      </tr>

    </thead>

    <tbody>





<?php



while($row=mysqli_fetch_array($rs))



{

 
  



    echo "<tr>";

    echo "<td>".$row['joining_fee']."</td>";


    echo "<td>".$row['dir_req_cb']."</td>";


    $cbAmt=($row['joining_fee']*$row['cash_back_inc'])/100;


    echo "<td>".$cbAmt."</td>";

    echo "<td>".$row['cash_back_days']."</td>";

    echo "<td>".$cbAmt*$row['cash_back_days']."</td>";

   echo "</tr>";



  

}

  ?>

</tbody></table></div>
                  

                  <?php









$sql="select * from singleleg_income_setting";





$rs=mysqli_query($conn,$sql);





?>

        
          <div class="table-responsive">
          <table class="table table-hover table-bordered" id="prdTable">

          <div id="dispMsg">
             <div class="text-center"><h1><b>Level Income</b></h1></div>

        </div>

          <thead class="thead-dark">

            <tr>

        <th>Rank</th>

        <th>Direct Req</th>


        <th>Current Direct</th>



        <th>Income (%)</th>
        <th>Members</th>
        <th>Amount</th>
        <th>Days</th>
        <th>Total Income</th>

        



      </tr>

    </thead>

    <tbody>





<?php

$memCnt=4;

while($row=mysqli_fetch_array($rs))



{

  

if($sponsorsTeam>=$row['member_count'] && $countMySponsored>=$row['dir_req'])

{

  $strStyle="table-success";

}

else

{

  $strStyle="";

}

    echo "<tr class='$strStyle'>";

    echo "<td>".$row['lvl_number']."</td>";


    echo "<td>".$row['dir_req']."</td>";


    echo "<td>".$countMySponsored."</td>";

    


    echo "<td>".$row['lvl_income']."</td>";

    echo "<td>".$memCnt."</td>";

    $lvlIncome=($cbAmt*$memCnt*$row['lvl_income'])/100;
    echo "<td>".$lvlIncome."</td>";

    echo "<td>".$row['days']."</td>";

   
    echo "<td>".$lvlIncome*$row['days']."</td>";

   echo "</tr>";



  $memCnt=$memCnt*4;

}

  ?>

</tbody></table></div>

 <?php









$sql="select * from gen_income_setting";





$rs=mysqli_query($conn,$sql);





?>

        
          <div class="table-responsive">
          <table class="table table-hover table-bordered" id="prdTable">

          <div id="dispMsg">
            <div class="text-center"><h1><b>Direct Income</b></h1></div>

        </div>

          <thead class="thead-dark">

            <tr>

        <th>Level</th>
        <th>Members</th>



        <th>Amount</th>
        <th>Total Income</th>


      <!--  <th>Total Income</th> -->

        



      </tr>

    </thead>

    <tbody>





<?php

$m=4;

while($row=mysqli_fetch_array($rs))



{

  

echo "<tr>";

    echo "<td>".$row['lvl_number']."</td>";

    echo "<td>".$m."</td>";
    echo "<td>".$row['lvl_income']."</td>";


    echo "<td>".$m*$row['lvl_income']."</td>";

   echo "</tr>";


$m=$m*4;
  

}

  ?>

</tbody></table></div>



           

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