<?php
session_start();
include("dbConnection.php");
include('functions/function.php');
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

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">

    


  </head>
  <body class="goto-here" >
<?php
include('includes/header.php');
?>

<div class="container-fluid">
<div class="mb-3 mt-5 text-center" style="font-size:30px">
    <i class="fas fa-stethoscope"></i>
    <span style="color:#81b04a">Online Food Management</span>
    </div>
    <p class="text-center" style="font-size:20px;color:#81b04a "> <i class="fas fa-user-secret text-success "></i> User Registration</p>
</div>

<div class="container">
  <form action="" method="POST" name="myform" class="shadow-lg p-5" enctype="multipart/form-data" onsubmit="return validate()">
    <div class="form-group">
      <label>Customer Name</label>
      <input type="text" class="form-control" placeholder="Customer Name"  name="c_name" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>
   </div>
    <div class="form-group">
      <label> Customer Email</label>
      <input type="email" class="form-control" placeholder="Customer Email"  name="c_email" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>  
   </div>
    <div class="form-group">
      <label>Customer password</label>
      <input type="password" class="form-control" placeholder="Customer Password"  name="c_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>  
   </div>
   <div class="form-group">
      <label>Confirm password</label>
      <input type="password" class="form-control" placeholder="Confirm Password"  name="con_pass" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>  
   </div>
    <div class="form-group">
      <label>Country</label>
      <input type="text" class="form-control" placeholder="Customer Country"  name="c_country" >
   </div>
   <div class="form-group">
      <label>City</label>
      <input type="text" class="form-control" placeholder="Customer City"  name="c_city">
   </div>
   <div class="form-group">
      <label>Contact</label>
      <input type="text" pattern="[789][0-9]{9}" class="form-control" placeholder="Customer Contact"  name="c_contact" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>
   </div>
   <div class="form-group">
      <label >Address</label>
      <input type="text" class="form-control" placeholder="Customer Address"  name="c_address" required>
      <span id="namemsg" class="text-danger font-weight-bold"></span>
   </div>

   <div class="form-group">
      <label>Product Image</label>
      <input type="file" class="form-control" placeholder="Image"  name="c_image" required>
   </div>

   <button type="submit" class="btn btn-outline-success mt-3 text-weigth-bold btn-block " name="submit">Submit</button>
  </form>
  <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="index.php">Back to Home</a></div>
</div>

  
<?php
include('includes/footer.php');
?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/all.min.js"></script>
  </body>
</html>
<?php
if(isset($_REQUEST['submit']))
{
  $c_name=$_REQUEST['c_name'];
  $c_email=$_REQUEST['c_email'];
  $c_password=$_REQUEST['c_pass'];
  $c_country=$_REQUEST['c_country'];
  $c_city=$_REQUEST['c_city'];
  $c_contact=$_REQUEST['c_contact'];
  $c_address=$_REQUEST['c_address'];

  $c_image=$_FILES['c_image']['name'];
  $c_temp_img=$_FILES['c_image']['tmp_name'];
  //$c_ip=getUserIP();
    
  move_uploaded_file($c_temp_img,"customer/customer_images/$c_image");
  $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_img) values ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image')";
  
  if ($conn->query($insert_customer) === TRUE) {
    $_SESSION['customer_email']=$c_email;
    echo "<script>alert('You have been registered Successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";  
  } else {
  //  echo "<script>alert(' ')</script>";
  echo "<h1>Error: " . $insert_customer . "</h1><br>" . $conn->error;
    //echo "<script>window.open('index.php','_self')</script>";
  }
  



  // $sel_cart="select * from cart where ip_add='$c_ip' ";
  // $run_cart=mysqli_num_rows($run_cart);
  // if($check_cart>0)
  // {
  //   $_SESSION['customer_email']=$c_email;
  //   echo "<script>alert('You have been registered Successfully')</script>";
  //   echo "<script>window.open('checkout.php','_self')</script>";
  // }else{
  //   $_SESSION['customer_email']=$c_email;
  //   echo "<script>alert('You have been registered Successfully')</script>";
  //   echo "<script>window.open('index.php','_self')</script>";
  // }
}
?> 
