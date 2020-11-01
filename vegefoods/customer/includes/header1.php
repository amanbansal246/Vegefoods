    <!-- start container -->
<div class="container-fluid">
  <div class="row">
  <div class="col-sm-2 bg-light sidebar ">
  <?php
  $session_customer=$_SESSION['customer_email'];
  $get_cust="select * from customers where customer_email='$session_customer'";
  $run_cust=mysqli_query($conn,$get_cust);
  $row_customer=mysqli_fetch_array($run_cust);
  $customer_image=$row_customer['customer_img'];
  $customer_name=$row_customer['customer_name'];
  if(!isset($_SESSION['customer_email'])){

  }else{
?>
    </div>
  </div>
  <div class="row"> <!--start row -->
  <nav class="col-sm-2 bg-light sidebar py-5"> <!--start slide bar 1 colums-->
    <div class="slidebar-sticky ">
      <ul class="nav flex-column ">
      <li class="nav-item"><a href="#" class="nav-link">
      <img src="customer_images/<?php echo $customer_image ?>" height='183px'>
      </a></li>
      <li class="nav-item"><a href="#" class="nav-link">
      <h5 align='center' ><?php echo $customer_name ?></h5> 
      </a></li>
        <li class="nav-item <?php if(PAGE == 'my_order') { echo 'active'; } ?>"><a href="my_order.php" class="nav-link active"><i class="fas  fa-user"></i> My Order</a></li>
        <li class="nav-item"><a href="pay_offline.php" class="nav-link <?php if(PAGE == 'pay_offline') { echo 'active'; } ?>"><i class="fab fa-accessible-icon"></i> Pay Offline</a></li>
        <li class="nav-item"><a href ="#" class="nav-link <?php if(PAGE == 'checkStatus') { echo 'active'; } ?>"><i class="fas fa-align center"></i>Edit Account</a></li>
        <li class="nav-item"><a href ="change_password.php" class="nav-link <?php if(PAGE == 'requesterChangePass') { echo 'active'; } ?>"><i class="fas fa-key center"></i>Change Password</a></li>
        <li class="nav-item"><a href ="delete_ac.php" class="nav-link <?php if(PAGE == 'requesterChangePass') { echo 'active'; } ?>"><i class="fas fa-key center"></i>Delete Account</a></li>
        <li class="nav-item"><a href ="../logout.php" class="nav-link <?php if(PAGE == 'logout') { echo 'active'; } ?>"><i class="fas fa-sign-out-alt "></i>Logout</a></li>
      </ul>
    </div>
    </nav><!--end 1 slide bar 1 colums-->
    <!--header end  -->


  <?php  
  }
?>
