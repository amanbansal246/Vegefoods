<?php
session_start();
  include('functions/function.php');
  include('dbConnection.php');

if(isset($_SESSION['admin_email']))
{

  $admin_email=$_SESSION['admin_email'];
  $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' ";
  $run_admin=mysqli_query($conn,$get_admin);
  $row_admin=mysqli_fetch_array($run_admin);
  $admin_id=$row_admin['admin_id'];
  $admin_name=$row_admin['admin_name'];
  $admin_image=$row_admin['admin_image'];

  $get_pro = "SELECT * FROM products  ";
  $run_pro=mysqli_query($conn,$get_pro);
  $count_pro=mysqli_num_rows($run_pro);
  

  $get_cust = "SELECT * FROM customers ";
  $run_cust=mysqli_query($conn,$get_cust);
  $count_cust=mysqli_num_rows($run_cust);

  $get_p_cat = "SELECT * FROM product_categories ";
  $run_p_cat=mysqli_query($conn,$get_p_cat);
  $count_p_cat=mysqli_num_rows($run_p_cat);

  $get_order = "SELECT * FROM customer_order ";
  $run_order=mysqli_query($conn,$get_order);
  $count_order=mysqli_num_rows($run_order);
}
else{
  echo "<script>window.open('login.php','_self')</script>";
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>	
  <?php
    include('includes/header_slider.php');
  ?>     
    <div class="container-fluid">
      <?php 
        if(isset($_GET['dashbord']))
        {
          include('dashbord.php');
        }
        if(isset($_GET['insert_product']))
        {
          include('insert_product.php');
        }
        if(isset($_GET['view_product']))
        {
          include('view_product.php');
        }
        if(isset($_GET['insert_product_cat']))
        {
          include('insert_product_cat.php');
        }
        if(isset($_GET['view_product_cat']))
        {
          include('view_product_cat.php');
        }
        if(isset($_GET['delete_product'])){
          $delete_id=$_GET['delete_product'];

          $sql_del="delete from products where product_id='$delete_id' ";
          $run_del=mysqli_query($conn,$sql_del);
          if($run_del){
            echo "<script>window.open('index.php?view_product','_self')</script>";
          }else{
            echo "<script>alert('can't delete')</script>";
            echo "<script>window.open('index.php?view_product','_self')</script>";
          }
        }
        if(isset($_GET['edit_product'])){
          include 'edit_product.php';
        }
        if(isset($_GET['delete_p_cat'])){
          $delete_cat_id=$_GET['delete_p_cat'];

          $sql_del="delete from product_categories where p_cat_id='$delete_cat_id' ";
          $run_del=mysqli_query($conn,$sql_del);
          if($run_del){
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
          }else{
            echo "<script>alert('can't delete')</script>";
            echo "<script>window.open('index.php?view_product_cat','_self')</script>";
          }
        }
        if(isset($_GET['edit_p_cat'])){
          include 'edit_p_cat.php';
        }
        if(isset($_GET['view_customer'])){
          include 'view_customer.php';
        }


      ?>
    </div>

      <!-- close div of header_slider.php -->
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
