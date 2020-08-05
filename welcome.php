<?php session_start(); include("inc/connect.php");?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="get daily income">
<meta name="keywords" content="best mlm plam, single leg plan, mlm, daily income, getdailyincome.in">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Daily Income | Registration Details</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   

    <!-- Header Section Begin -->
     <?php include("inc/site-header.php");?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option contact-breadcrumb set-bg" data-setbg="img/breadcrumb/contact-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>User Registration</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__text">
                            <div class="contact__form__title">
                                <h2>Registration Confirmation</h2>
                                <p>Registration Details.</p>
                            </div>
                            
<?php

$id=$_GET['id'];
echo "<b>Member Registration Completed Successfully !!<b>";
$sql="select * from users where user_id=$id";

$rs=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($rs);



echo "<p>Member Id: ".$row['member_id']."</p>";

echo "<p>Name: ".$row['name']."</p>";;

echo "<p>Mobile Number: ".$row['mobile']."</p>";;

echo "<p>E-Mail Id: ".$row['email']."</p>";;

echo "<p>Password: ".$row['password']."</p>";;

echo "<p>Registration Date: ".$row['join_date'];



echo "<br><br><a href=user_login.php>Login Now</a>";

  ?>
                         
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Section Begin -->
    <?php include("inc/site-footer.php");?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/site_main.js"></script>

     <script type="text/javascript">
  $(document).ready(function () {
        $("#sendmessage").css("display", "none");
          $(document.body).on('click', '#submitme', function(){
        
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var message = $('#message').val();
                    
            $.ajax({
                type : 'POST',
                url : 'sendQuery.php',
                data : {name:name,email:email,message:message},
                async:false,
                success:function(response){
                //alert(response);
                      if(response=='s'){
                           $("#sendmessage").css("display", "block");
                           
                                    $('#name').val('');
                                    $('#email').val('');
                                    $('#message').val('');
                           
                           
                      }else if(response=='n'){
                           
                           $("#errormessage").html("Please contact to Admin");
                           $("#errormessage").css("display", "block");
                      }else{
                           $("#errormessage").html("Please contact to Admin");
                           $("#errormessage").css("display", "block");
                          
                      }
                      
                  
                      
                      
                } 
            });
                    
                    
          });
        
   });
  </script>
</body>

</html>