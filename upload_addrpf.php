<?php

include("inc/connect.php");
include("inc/chkAuth.php");
      

if(isset($_POST['submit_addrpf']))
{

  $id=$_SESSION['user_id'];
  $addpf_id=$_POST['addr_doc_id'];
  $addpf_no=$_POST['addr_doc_no'];
  $udate=date('Y-m-d');

  

  $target_dir = "uploads/kycdoc/";
  $target_file = $target_dir.$id."-ADDR-".basename($_FILES["fileToUpload"]["name"]);
  $filename=basename($_FILES["fileToUpload"]["name"]);

  $fileFlag=0;

  if($filename!="")
    {
        $uploadOk = 1;
        $filename=$id."-ADDR-".$filename;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $msg= "Sorry, your file is too large.";
          header("Location:kyc_detail.php?sts=0&msg=$msg");
          $uploadOk = 0;
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
          header("Location:kyc_detail.php?sts=0&msg=$msg");
      }

      if ($uploadOk == 0) {
          $msg= "Sorry, your file was not uploaded.";
          header("Location:kyc_detail.php?sts=0&msg=$msg");

      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $fileFlag=1;
                $sql="update kyc_detail set addr_doc_id='$addpf_id',addr_doc_no='$addpf_no',update_date='$udate', addr_doc_img='$filename' where user_id=$id";

                   if(mysqli_query($conn,$sql))
                   {
                            $msg="Address Proof Updated Successfully !!!";
                            $url="kyc_detail.php";
                            header("Location:kyc_detail.php?sts=1&msg=$msg");  

                   }
                   else
                   {
                    $msg= "There was some error in updating Address proof!!";
                    header("Location:kyc_detail.php?sts=0&msg=$msg");
                   }

          } else {
              $msg= "Sorry, there was an error uploading your file.";
              header("Location:kyc_detail.php?sts=0&msg=$msg");
          }
      }
  

  }

else
{
 

   
     $sql="update kyc_detail set addr_doc_id='$addpf_id',addr_doc_no='$addpf_no',update_date='$udate' where user_id=$id";

     if(mysqli_query($conn,$sql))
     {
              $msg="Address Proof Updated Successfully !!!";
              $url="kyc_detail.php";
              header("Location:kyc_detail.php?sts=1&msg=$msg");  

     }
     else
     {
      $msg= "There was some error in updating Address proof!!";
      header("Location:kyc_detail.php?sts=0&msg=$msg");
     }
}
}



?>


