<?php
session_start();
include("dbConnection.php");
include('functions/function.php');
?>
<?php
if(!isset($_SESSION['customer_email']))
{
	echo "<script>window.open('customer/customer_login.php','_self')</script>";
	// include('customer/customer_login.php');
}else{
	echo "<script>window.open('payment_options.php','_self')</script>";
	// include('payment_options.php');
}
?>
