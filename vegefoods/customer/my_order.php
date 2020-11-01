<?php
session_start();
define('PAGE', 'my_order');
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
<div class="ml-4" >
  <div class="container-fluid text-white" style="background-color:#81b04a">
    <center>
    <h2 class="text-white">Orders</h2>
    </center> 
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Sr.No </th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Quantity</th>
        <th>Order Date</th>
        <th>Paid/Unpaid</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $customer_session=$_SESSION['customer_email'];
      $get_customer="select * from customers where customer_email='$customer_session'";
      $run_cust=mysqli_query($conn,$get_customer);
      $row_cust=mysqli_fetch_array($run_cust);
      $customer_id=$row_cust['customer_id'];
      $get_order="select * from customer_order where customer_id='$customer_id'";
      $run_order=mysqli_query($conn,$get_order);
      $i=0;
      while($row_order=mysqli_fetch_array($run_order))
      {
        $order_id=$row_order['order_id'];
        $due_amount=$row_order['due_amount'];
        $invoice_no=$row_order['invoice_no'];
        $qty=$row_order['qty'];
        $order_date=substr($row_order['order_date'],0,11);
        //$order_status="pending";
        $i++;
        // if($order_status=='pending'){
        //   $order_status='Unpaid';
        // }else{
        //   $order_status='paid';
        // }
      echo "<tr><td>".$order_id."</td>
            <td>".$due_amount."</td>
            <td>".$invoice_no."</td>
            <td>".$qty."</td>
            <td>".$order_date."</td>
            <td>Unpaid</td>
      </tr>";
      } 
      ?>
    </tbody>
  </table>
</div>









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