<div class="container">
  <h2>Customers</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Country</th>
        <th>City</th>
        <th>contact</th>
        <th>Address</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php 
    $i=0;
    $sql="select * from customers ";
    $run_sql=mysqli_query($conn,$sql);
    $count_pro=mysqli_num_rows($run_pro);
    while($row_pro=mysqli_fetch_array($run_sql))
    {
        $customer_name=$row_pro['customer_name'];
        $customer_email=$row_pro['customer_email'];
        $customer_pass=$row_pro['customer_pass'];
        $customer_country=$row_pro['customer_country'];
        $customer_city=$row_pro['customer_city'];
        $customer_contact=$row_pro['customer_contact'];
        $customer_address=$row_pro['customer_address'];
        $customer_img=$row_pro['customer_img'];
    
        $i++;
        ?>

      <tr>
        <td><?php echo $customer_name ?></td>
        <td><?php echo $customer_email ?></td>
        <td><?php echo $customer_pass ?></td>
        <td><?php echo $customer_country ?></td>
        <td><?php echo $customer_city ?></td>
        <td><?php echo $customer_contact ?></td>
        <td><?php echo $customer_address ?></td>
        <td>
            <img src="../customer/Customer_images/<?php echo $customer_img ?>" height="80px" width="100px">
        </td>
       
        <td><a href="index.php?delete_product=<?php echo $pro_id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a> </td>
        <td><a href="index.php?edit_product=<?php echo $pro_id ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </td>


      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>