<?php
session_start();
include("dbConnection.php");
include('functions/function.php');
if(isset($_SESSION['customer_email']))
{
  echo "<script>window.open('my_account.php','_self')</script>";
}else{
  if(isset($_POST['login']))
  {
    $email=$_REQUEST['c_Email'];
    $customer_email = mysqli_real_escape_string($conn,trim($email));
    $customer_Password = mysqli_real_escape_string($conn,trim($_REQUEST['c_Password']));

 
    $select_customers = "SELECT * FROM customers WHERE customer_email='".$customer_email."' AND customer_pass='".$customer_Password."' limit 1";
    $run_cust=mysqli_query($conn,$select_customers);
   // $get_ip=getUserIP();
    $check_customer=mysqli_num_rows($run_cust);
    $select_cart="select * from cart where customer_email='$email' ";
    $run_cart=mysqli_query($conn,$select_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_customer==0){
      echo "<script>alert('Password or Email id incorrect!')</script>";
      echo "<script> window.open('customer_login.php','_self')</script>";
    }
    if($check_customer==1){
      $_SESSION['customer_email']=$customer_email;
      echo "<script>alert('You are logged in!')</script>";
      echo "<script> window.open('my_account.php','_self')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    

  </head>
  <body class="goto-here">
<?php
include('includes/header.php');
?>
 <div class="mb-3 text-center mt-5" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span style="color:#81b04a">Online Food Managment System</span>
  </div>
  <p class="text-center" style="font-size: 20px;"> <i class="fas fa-user-secret text-success"></i> <span style="color:#81b04a">User Login</span>
  </p>
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="customer_login.php" class="shadow-lg p-4" method="POST" onsubmit="return validation()">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
              class="form-control" placeholder="Email" name="c_Email" required>
            <!--Add text-white below if want text color white-->
            <small class="form-text">We'll never share your email with anyone else.</small>
            <span id="namemsg" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input type="password"
              class="form-control" placeholder="Password" name="c_Password" required>
          </div>
          <button type="submit" class="btn btn-outline-success mt-3 btn-block shadow-sm font-weight-bold" name="login">Login</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back
            to Home</a></div>
      </div>
    </div>
  </div>

    <hr>
<?php
include('includes/footer.php');
?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/all.min.js"></script>
  </body>
</html>