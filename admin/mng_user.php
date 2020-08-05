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

    <title>GDI- Manage Users</title>

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

          <h1><i class="fa fa-edit"></i> Manage Users</h1>

          <p>Users List</p>

        </div>

        <ul class="app-breadcrumb breadcrumb">

          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

          <li class="breadcrumb-item">Manage Users</li>

        </ul>

      </div>

    <!-- display mesage  -->

	<div class="row" style="margin: 0">

					<div class="col-lg-5">

						<div class="alert alert-danger alert-dismissable" id="errorblock" style="margin-left:5px">

							<i class="fa fa-ban"></i>

							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

							<span id="error_text"></span>

						</div>

						<div class="alert alert-success alert-dismissable" id="successblock" style="margin-left:5px">

							<i class="fa fa-ban"></i>

							<button type="button" class="close" data-dismiss="alert" aria-hidden="true" id="for_reaload">&times;</button>

							<span id="success_text"></span>

						</div>

					</div>

				</div>

          </div>

        </div>

      </div>

	  <!-- display msg end -->

	<div class="row">

        <div class="col-md-12">
          <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success">
        <strong>Success!</strong>user details updated successfully.
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger">
        <strong>Error!</strong> Sorry there was some problem.
        </div>
        <?php } ?>

            <div class="tile">





            	<?php







$sql="select * from users ORDER BY `users`.`user_id` DESC";



$rs=mysqli_query($conn,$sql);





?>

				
<div class="table-responsive">
				  <table class="table table-hover table-bordered" id="prdTable">

				  <div id="dispMsg">

				</div>

					<thead>

					  <tr>

						<th>S.No.</th>

						

						<th>Name</th>

        <th>Email</th>

        <th>Contact No</th>

        <th>Sponsor</th>

        <th>Pay Status</th>

        <th>Last Login</th>

        <th>Login IP</th>

        <th>Action</th>

        <th>Status</th>





      </tr>

    </thead>

    <tbody>





<?php



$i=1;

while($row=mysqli_fetch_array($rs))



{



  echo "<tr>";

 	echo "<td>$i</td>";

	  echo "<td>"."<a href=view_user_profile.php?userID=".$row['user_id'].'>'.$row['name']."-".$row['member_id']."</a></td>";

	  echo "<td>".$row['email']."</td>";

    echo "<td>".$row['mobile']."</td>";





$sql="select * from users where user_id=".$row['sponsor_id'];

  $rsw=mysqli_query($conn,$sql);

  $rows=mysqli_fetch_array($rsw);



$name=$rows['name'];

$memberID=$rows['member_id'];



  echo "<td>".$name."-".$memberID."</td>";





  $paystatus=$row['pay_status'];

  if($paystatus==0) $payStatus="<a href=payment.php?userID=".$row['user_id'].">Free</a>";

  if($paystatus==1) $payStatus="Paid";

  echo "<td>".$payStatus."</td>";



	  echo "<td>".$row['last_activity']."</td>";

	  echo "<td>".$row['login_ip']."</td>";

	  echo "<td>"."<a href=user_delete.php?userID=".$row['user_id']."><i class='fa fa-trash-o' aria-hidden='true'></i></a>&nbsp;&nbsp;</a>".  "<a href=edituserdetail.php?userID=".$row['user_id']."><i class='fa fa-pencil' aria-hidden='true'></i></a>"."</td>";



	$status=$row['status'];

	if($status==0) $strStatus="<a href=useractive.php?userID=".$row['user_id'].">Activate</a>";

	if($status==1) $strStatus="<a href=usernotactive.php?userID=".$row['user_id'].">Deactivate</a>";

	echo "<td>".$strStatus."</td>";





  

   

$i=$i+1;

  echo "</tr>";

  

}

  ?>

						</tbody>

					</table>
        </div>

				</div>

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

	<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>

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

	<script>

	

	

			function delProduct(pid) {

				

		     var ans=confirm("Are you sure, you want to delete this product? All the related orders (if any) will be deleted");

			 if(ans==true){

                $.ajax({type: "POST",

                    url: "del_product.php",

                    data: "pID=" + pid + "&action=delete" ,

                   

                    success: function (response) {

						

                        var response_1 = response.charAt();

                        if (response_1 == "f") {

                            $("#error_text").html("There was some error,Please try again");

                            $("#errorblock").show();

                            setTimeout('$("#errorblock").fadeOut("slow");', 2000);

                            return false;

                        }

						else if (response_1 == "s") {

							//alert("success");

                            $("#errorblock").hide();

                            $("#category_name").val('');

                            $("#success_text").html("Product deleted successfully");

                            $("#successblock").show();

                            setTimeout('$("#successblock").fadeOut("slow");', 2000);

							

							setTimeout('window.location.reload();', 1000);

                            if(type !=""){

                                setTimeout('window.location.reload();', 2000);

                            }

                         }

                    }

                });

            }

			}

			

			

			

			

	

	

$(document).ready( function () {  

$("#errorblock").hide();

$("#successblock").hide();

$("#errorblock").hide();

                         

$('#prdTable').DataTable();



});

</script>

  </body>

</html>