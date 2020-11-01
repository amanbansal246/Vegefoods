<?php
session_start();
if(!isset($_SESSION['customer_email']))
{
  echo "<script>window.open('customer_login.php')</script>";
}else{
  include("dbConnection.php");
include('functions/function.php');
 if(isset($_GET['order_id']))
 {
   $order_id=$_GET['order_id'];
   
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
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="goto-here">
<?php
include('includes/header.php');
?>
<?php
include('includes/header1.php');
?>
<div class="col-sm-6 offset-2" >
  <form  action="confirm.php?update_id=<?php echo $order_id ?>" method="POST" class="shadow-lg p-5" enctype="multipart/form-data">
    <div class="form-group">
      <label>Invoice Number</label>
      <input type="text" class="form-control" placeholder="Invoice Number"  name="invoice_no">
   </div>
    <div class="form-group">
      <label>Amount</label>
      <input type="text" class="form-control" placeholder="Amount"  name="amount">
   </div>
    <div class="form-group">
      <label>Select Payment Mode</label>
      <select name="payment_mode" class="form-control">  
      <option>select a product category</option>
      <option>Cash On Delivery</option>
      <option>Paypal</option>
      <option>Debit Card</option>
      </select>
   </div>
    <div class="form-group">
      <label>Transaction Mode</label>
      <input type="text" class="form-control" placeholder="Transaction Mode"  name="transaction_mode">
   </div>
   <div class="form-group">
      <label>Payment Date</label>
      <input type="date" class="form-control" placeholder="Payment Date"  name="payment_date">
   </div>
   <button class="btn btn-outline-success mt-3 text-weigth-bold btn-block " name="confirm_payment" type="submit">Submit</button>
  </form>
<?php 
if(isset($_POST['confirm_payment']))
{
  $update_id=$_GET['update_id'];
  $invoice_number=$_POST['invoice_number'];
  $amount=$_POST['amount'];
  $payment_mode=$_POST['payment_mode'];
  $trfr_number=$_POST['transaction_mode'];
  $date=$_POST['payment_date'];
  $complete="complete";
  $insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";
  $run_insert=mysqli_query($conn,$insert);
  $update_q="update customer_order set order_status='$complete' where order_id='$update_id' ";
  $run_insert=mysqli_query($conn,$update_q);
  // $update_p="update pending_order set order_status='$complete' where order_id='$update_id' ";
  // $run_insert=mysqli_query($conn,$update_p);
  echo "<script>alert('Your Order has been Received')</script>";
  echo "<script>window.open('my_account.php?order','_self')</script>";

}
?>




<?php
include('includes/footer1.php');
?>
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

  <?php
}?>
