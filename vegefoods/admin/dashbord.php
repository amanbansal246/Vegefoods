 <!-- <div class="container"> -->
      <!-- Start Customer Container -->
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2 ">
            <div class="card-body text-center card bg-primary text-white">
              <div class="row">
                <div class="col-sm-9">
                   <i class="fa fa-tasks fa-5x"></i>  
                </div>
                <div class="col-sm-3">
                <div class="h3 text-white"> <?php echo $count_pro ?> </div>
                </div>
              </div>
              <div class="text">Products</div>
            </div>
            <a href="index.php?view_products">
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-9">
                  View Details
                </div>
                <div class="col-sm-3">
                  <i class="fa fa-tasks"></i> 
                </div>
              </div>
            </div>
            </a>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center card bg-success text-white">
              <div class="row">
                <div class="col-sm-9">
                   <i class="fa fa-comments fa-5x"></i>  
                </div>
                <div class="col-sm-3">
                <div class="h3 text-white"><?php echo $count_cust ?></div>
                </div>
              </div>
              <div class="text">Customers</div>
            </div>
            <a href="index.php?view_customer">
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-9">
                  View Details
                </div>
                <div class="col-sm-3">
                  <i class="fa fa-tasks"></i> 
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>  <!-- End Customer 2st Column-->


        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center card bg-warning text-white">
              <div class="row">
                <div class="col-sm-9">
                   <i class="fa fa-shopping-cart fa-5x"></i>  
                </div>
                <div class="col-sm-3">
                <div class="h3 text-white"><?php echo $count_p_cat ?></div>
                </div>
              </div>
              <div class="text">Products Categories</div>
            </div>
            <a href="index.php?view_product_cat">
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-9">
                  View Details
                </div>
                <div class="col-sm-3">
                  <i class="fa fa-tasks"></i> 
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>  <!-- End Customer 3st Column-->


        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4st Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center card bg-danger text-white">
              <div class="row">
                <div class="col-sm-9">
                   <i class="fa fa-support fa-5x"></i>  
                </div>
                <div class="col-sm-3">
                <div class="h3 text-white"><?php echo $count_order ?></div>
                </div>
              </div>
              <div class="text">Orders</div>
            </div>
            <a href="index.php?view_order">
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-9">
                  View Details
                </div>
                <div class="col-sm-3">
                  <i class="fa fa-tasks"></i> 
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>  <!-- End Customer 4st Column-->

      </div> <!-- End Customer 1 Row-->
      
  <div class="row mt-5">  <!--2nd row start -->
    <div class="col-lg-12">
    <h2>New Orders</h2>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Order No</th>
        <th>Customer Email</th>
        <th>Invoice No</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $i=0;
      $get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
      $run_order=mysqli_query($conn,$get_order);
      while($row_order=mysqli_fetch_array($run_order)){ 
          $order_id=$row_order['order_id'];
          $customer_id=$row_order['customer_id'];
          $product_id=$row_order['product_id'];
          $invoice_no=$row_order['invoice_no'];
          $qty=$row_order['qty'];
          $date=$row_order['order_date'];
          $status=$row_order['order_status'];
          $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td>
          <?php 
            $get_cust="select * from customers where customer_id ='$customer_id'";
            $run_cust=mysqli_query($conn,$get_cust);
            $row_cust=mysqli_fetch_array($run_cust);
            $customer_email=$row_cust['customer_email'];
            echo $customer_email;
          ?>
        </td>
        <td><?php echo $invoice_no ?></td>
        <td><?php echo $product_id ?></td>
        <td><?php echo $qty ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $status ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
    </div>
    <div class="col-lg-4">
    </div>
 </div>  <!--2nd row start -->


    <!-- </div> End Customer Container -->