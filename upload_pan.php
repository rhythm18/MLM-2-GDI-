<?php

include("inc/connect.php");
include("inc/chkAuth.php");


if(isset($_POST['submit_pan']))
{

  $id=$_SESSION['user_id'];
  $pan_no=$_POST['pan_no'];
  $udate=date('Y-m-d');


  

  $target_dir = "uploads/kycdoc/";
  $target_file = $target_dir.$id."-PAN-".basename($_FILES["fileToUpload"]["name"]);
  $filename=basename($_FILES["fileToUpload"]["name"]);

  $fileFlag=0;

  if($filename!="")
    {
        $uploadOk = 1;
        $filename=$id."-PAN-".$filename;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $msg= "Sorry, your file is too large.";
          $uploadOk = 0;
          header("Location:kyc_detail.php?sts=0&msg=$msg");
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          header("Location:kyc_detail.php?sts=0&msg=$msg");
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          $msg= "Sorry, your file was not uploaded.";
           header("Location:kyc_detail.php?sts=0&msg=$msg");

      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $msg="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $fileFlag=1;
              $sql="update kyc_detail set pan_no='$pan_no',update_date='$udate',pan_img='$filename' where user_id=$id";

              if(mysqli_query($conn,$sql))
               {
                
                        $msg= "PAN info Updated Successfully !!!";
                        $url="kyc_detail.php";
                        header("Location:kyc_detail.php?sts=1&msg=$msg");
                
               }
               else
               {
                 $msg="There was some error in updating pan info!!";
                 header("Location:kyc_detail.php?sts=0&msg=$msg");
                
               }

          } else {
              $msg ="Sorry, there was an error uploading your file.";
              header("Location:kyc_detail.php?sts=0&msg=$msg");
          }
      }
  
  }
else
{
 
 

    $sql="update kyc_detail set pan_no='$pan_no',update_date='$udate' where user_id=$id";


   if(mysqli_query($conn,$sql))
   {
    
            $msg= "PAN info Updated Successfully !!!";
            $url="kyc_detail.php";
            header("Location:kyc_detail.php?sts=1&msg=$msg");
    
   }
   else
   {
      $msg="There was some error in updating pan info!!";
      header("Location:kyc_detail.php?sts=0&msg=$msg");
    
   }
}
}

?>