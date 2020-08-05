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
    <title>GDI : Update Bank Details</title>
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

  <?php  include("inc/side-bar-menu.php"); ?>
	<?php
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Bank Details</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Bank Details</li>
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

if(isset($_POST['submit']))
{

  $id=$_SESSION['user_id'];
  $bname=$_POST['bank_name'];
  $acc_hname=$_POST['acc_holdername'];
  $accno=$_POST['acc_no'];
  $ifsc=$_POST['ifsc_code'];
  $baddress=$_POST['branch_addr'];
  $paytm=$_POST['paytm'];
  $udate = date("Y-m-d");


  $target_dir = "uploads/bankdoc/";
  $target_file = $target_dir.$id."-".basename($_FILES["fileToUpload"]["name"]);
  

  $filename=basename($_FILES["fileToUpload"]["name"]);

  $fileFlag=0;$msg="";

  if($filename!="")
  {

      $uploadOk = 1;
      $filename=$id."-".$filename;

      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      


    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; $sts=0;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $msg="Sorry, your file was not uploaded.";$sts=0;

    } 
    else 
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
         {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $fileFlag=1;$sts=1;
         } 
        else
         {
            $msg= "Sorry, there was an error uploading your file.";$sts=0;
        }
    }
  
}

if($fileFlag==1)
{
  $str=" ,cheque_img='$filename'";
}
else
{
  $str="";
}

 $sql="update bank_detail set  bank_name='$bname',acc_holdername='$acc_hname',acc_no='$accno',ifsc_code='$ifsc',branch_addr='$baddress',paytm='$paytm' ,update_date='$udate'".$str." where user_id=$id";

   if(mysqli_query($conn,$sql))
   {
     $msg=$msg." Bank Details Updated Successfully !!!"; $sts=1;

    
   }
   else
   {
    $msg=$msg." There was some error in updating bank details!!";$sts=0;
   }

   $url="bank_detail.php?sts=$sts&msg=$msg";
   gotopage($url);
}
else
{
  $sql="select * from bank_detail where user_id=".$_SESSION['user_id'];
  
  $rs=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($rs);
  if ($row['status']==1) {$sts="Approved"; $cls="text-success";}
  if ($row['status']==0) {$sts="Rejected"; $cls="text-danger";}
  if ($row['status']==2) {$sts="Pending"; $cls="text-primary";}

?>
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
				
<div class="form-group row">
    <label for="bank_name" class="control-label col-md-3">Status:  </label>
    <div class="col-md-8 <?php echo $cls;?>">
    <?php echo $sts;?>
    </div>
  </div>

  <div class="form-group row">
    <label for="bank_name" class="control-label col-md-3">Bank Name:  </label>
    <div class="col-md-8">
    <input name="bank_name" type="text" class="form-control" id="bank_name"value="<?php echo $row['bank_name'];?>" required>
    </div>
  </div>

<div class="form-group row">
    <label for="acc_holdername" class="control-label col-md-3">Account Holder Name:  </label>
    <div class="col-md-8">
    <input name="acc_holdername" type="text" class="form-control" id="acc_holdername" value="<?php echo $row['acc_holdername'];?>" required>
    </div>
</div>

<div class="form-group row">
    <label for="acc_no" class="control-label col-md-3">Account Number:  </label>
    <div class="col-md-8">
    <input name="acc_no" type="number" class="form-control" id="acc_no" value="<?php echo $row['acc_no'];?>" required>
  </div>
</div>





<div class="form-group row">
    <label for="ifsc_code" class="control-label col-md-3">IFSC Code:  </label>
    <div class="col-md-8">
    <input name="ifsc_code" type="text" class="form-control" id="ifsc_code" value="<?php echo $row['ifsc_code'];?>" required>
  </div>
</div>


<div class="form-group row">
    <label for="branch_addr" class="control-label col-md-3">Branch Address:  </label>
    <div class="col-md-8">
    <textarea class="form-control" rows="4"  name="branch_addr" id="branch_addr" required><?php echo $row['branch_addr'];?></textarea>
    </div>
 </div>

 <div class="form-group row">
    <label for="paytm" class="control-label col-md-3">Paytm Number:  </label>
    <div class="col-md-8">
    <input name="paytm" type="text" class="form-control" id="paytm" value="<?php echo $row['paytm'];?>" required>
  </div>
</div>

<div class="form-group row">
    <label for="cheque_img" class="control-label col-md-3">Cheque Image:  </label>
          <div class="col-md-8">
          <input type="file" class="control-label col-md-7" name="fileToUpload" id="fileToUpload" ><br>
         <?php  if($row['cheque_img']) { ?>
          <img src=uploads/bankdoc/<?php echo $row['cheque_img'];?> width=400 height=400>
        <?php } ?>
</div>
</div>


 
 
         <?php if ($row['status']!=1)
        {?>
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
				<?php }?>
				
				
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