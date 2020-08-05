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
    <title>GDI : Update  KYC Details</title>
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

     
	<?php  include("inc/side-bar-menu.php");
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> KYC Details</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">KYC Details</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
         <?php if(isset($_GET['sts']) && $_GET['sts']==1) { ?>
        <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $_GET['msg'];?>
        </div>
        <?php } ?>

        <?php if(isset($_GET['sts']) && $_GET['sts']==0) { ?>
        <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo $_GET['msg'];?>
        </div>
        <?php } ?>
          <div class="tile">
            <div class="tile-body">
			
  <?php
  $sql="select * from kyc_detail where user_id=".$_SESSION['user_id'];
  $rsKYC=mysqli_query($conn,$sql);
  $rowKYC=mysqli_fetch_array($rsKYC);
   if ($rowKYC['kyc_status']==1) {$sts="Approved"; $cls="text-success";}
  if ($rowKYC['kyc_status']==0) {$sts="Rejected"; $cls="text-danger";}
  if ($rowKYC['kyc_status']==2) {$sts="Pending"; $cls="text-primary";}
  ?>
   <div class="row ml-1">  Apptoval Status :
    <div class="<?php echo $cls;?>">
   <?php echo $sts;?>
  </div>
  <br>  <br>
 </div>
  <h2 class="text-center">ID Proof</h2>
  <form class="form-horizontal" name="idpf" id="idpf" enctype="multipart/form-data" method="post" action="upload_idpf.php">
				

 <div class="form-group row">
  <label class="control-label col-md-3">Document Type</label>
  <div class="col-md-4">
      <select class="form-control" name="idpf_doc_id" id="idpf_doc_id">

      <option value="">-- Select ID Document  --</option>

  <?php 

  $sql = mysqli_query($conn, "SELECT * FROM list_doc");

  while ($row = $sql->fetch_assoc())
  {
   if($rowKYC['idpf_doc_id']==$row['doc_id'])
    echo "<option value=".$row['doc_id']." selected>". $row['doc_name']."</option>";
  else
    echo "<option value=".$row['doc_id'].">". $row['doc_name']."</option>";
   }
  ?>

      </select> 

  </div>
</div>



 <div class="form-group row">
    <label for="idpf_doc_no" class="control-label col-md-3">Document Number</label>
    <div class="col-md-4">
    <input name="idpf_doc_no" type="text" placeholder="Document Number" class="form-control" id="idpf_doc_no" value="<?php echo $rowKYC['idpf_doc_no'];?>" required>
    </div>
  </div>


      <div class="form-group row">

          <label for="fileToUpload" class="control-label col-md-3">Document Image</label>
          <div class="col-md-4">

          <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
     </div>
<?php if ($rowKYC['kyc_status']!=1) { ;?>
  <div class="form-group row">

          <label for="" class="control-label col-md-3"></label>
          <div class="col-md-4">

           <input type="submit" name="submit_idpf" id="submit_idpf" value="Upload" class="btn btn-primary" >
          </div>
     </div>
<?php } ?>



</form>
<hr>
 <h2 class="text-center">Address Proof</h2>

  <form class="form-horizontal" name="addrpf" id="addrpf" enctype="multipart/form-data" method="post" action="upload_addrpf.php">




  <div class="form-group row">
                  <label class="control-label col-md-3">Document Type</label>
                  <div class="col-md-4">
                    <select class="form-control" name="addr_doc_id" id="addr_doc_id">
            <option value="">-- Select Address Proof --</option>
           <?php 

$sql = mysqli_query($conn, "SELECT * FROM list_doc");

while ($row = $sql->fetch_assoc())
{

  if($rowKYC['addr_doc_id']==$row['doc_id'])
  echo "<option value=".$row['doc_id']." selected>". $row['doc_name']."</option>";
else
  echo "<option value=".$row['doc_id'].">". $row['doc_name']."</option>";
}
?>

    </select> 

  </div>

</div>

<div class="form-group row">
    <label for="addr_doc_no" class="control-label col-md-3">Document Number</label>
    <div class="col-md-4">
    <input name="addr_doc_no" type="text" placeholder="Document Number" class="form-control" id="addr_doc_no"  value="<?php echo $rowKYC['addr_doc_no'];?>" required>
    </div>
  </div>

      <div class="form-group row">
      <label for="fileToUpload" class="control-label col-md-3">Document Image</label>
          <div class="col-md-4">
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
        </div>
<?php if ($rowKYC['kyc_status']!=1) { ;?>
         <div class="form-group row">
      <label for="fileToUpload" class="control-label col-md-3"></label>
          <div class="col-md-4">
             <input type="submit" name="submit_addrpf" id="submit_addrpf" value="Upload" class="btn btn-primary">
          </div>
        </div>
 <?php } ?> 
       
        
        
              </form>
<hr>
<h2 class="text-center">PAN Card</h2>

      <form class="form-horizontal" name="pan" id="pan" enctype="multipart/form-data" method="post" action="upload_pan.php">


<div class="form-group row">
    <label for="pan_no" class="control-label col-md-3">PAN Number</label>
    <div class="col-md-4">
    <input name="pan_no" type="text" placeholder="PAN Number" class="form-control" id="pan_no" 
     value="<?php echo $rowKYC['pan_no'];?>" required>
    </div>
  </div>

 <div class="form-group row">
      <label for="fileToUpload" class="control-label col-md-3">PAN Image</label>
          <div class="col-md-4">
  <input type="file" name="fileToUpload" id="fileToUpload">
</div>
</div>
<?php if ($rowKYC['kyc_status']!=1) { ;?>
   <div class="form-group row">
      <label for="fileToUpload" class="control-label col-md-3"></label>
          <div class="col-md-4">
  <input type="submit" name="submit_pan" id="submit_pan" value="Upload" class="btn btn-primary" >
</div>
</div>
<?php } ?>

 

        
        
        
              </form>

<?php





$sql="select * from kyc_detail where user_id=".$_SESSION['user_id'];

$rs=mysqli_query($conn,$sql);

echo "<br>";

?>
<div class="table-responsive-sm">
  <table class="table">
    <thead>
      <tr>
        <th>I-D Proof</th>
        <th>Address Proof</th>
        <th>PAN Card</th>
        

      </tr>
    </thead>
    <tbody>


<?php

$i=1;
while($row=mysqli_fetch_array($rs))

{
  echo "<tr>";

  if($row['idpf_doc_img']!="")
      echo "<td>"."<img src='uploads/kycdoc/".$row['idpf_doc_img']."' width=150 height=150>"."</td>";
  else
    echo "<td>NA</td>";

  if($row['addr_doc_img']!="")
      echo "<td>"."<img src='uploads/kycdoc/".$row['addr_doc_img']."' width=150 height=150>"."</td>";
  else
    echo "<td>NA</td>";


  if($row['pan_img']!="")
      echo "<td>"."<img src='uploads/kycdoc/".$row['pan_img']."' width=150 height=150>"."</td>";
  else
    echo "<td>NA</td>";
  

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