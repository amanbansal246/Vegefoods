
<div class="container">
  <h2>Products </h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product No</th>
        <th>Product ID</th>
        <th>Category Id</th>
        <th>Date</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Product Keyword</th>
        <th>Product Delete</th>
        <th>Product Edit</th>

      </tr>
    </thead>
    <tbody>
    <?php   
        $i=0;
        $get_pro = "SELECT * FROM products  ";
        $run_pro=mysqli_query($conn,$get_pro);
        $count_pro=mysqli_num_rows($run_pro);
        while($row_pro=mysqli_fetch_array($run_pro))
        {
            $pro_id=$row_pro['product_id'];
            $pro_cat_id=$row_pro['p_cat_id'];
            $pro_title=$row_pro['product_title'];
            $pro_img=$row_pro['product_img'];
            $pro_price=$row_pro['product_price'];
            $pro_keyword=$row_pro['product_keyword'];
            $date=$row_pro['date'];
            $i++;
           ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $pro_id ?></td>
        <td><?php echo $pro_cat_id ?></td>
        <td><?php echo $date ?></td>
        <td><?php echo $pro_title ?></td>
        <td> <img src="product_image/<?php echo $pro_img ?>" height="80px" width="100px" > </td>
        <td><?php echo $pro_price ?></td>
        <td><?php echo $pro_keyword ?></td>
        <td><a href="index.php?delete_product=<?php echo $pro_id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a> </td>
        <td><a href="index.php?edit_product=<?php echo $pro_id ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </td>

    </tr>
           <?php 
        }
   ?>
    </tbody>
  </table>
</div>
