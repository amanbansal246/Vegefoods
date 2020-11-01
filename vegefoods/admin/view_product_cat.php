<div class="container">
  <h2>Products Categories</h2>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category No</th>
        <th>Category Id</th>
        <th>Product Title</th>
        <th>Product Description</th>
        <th>Product Delete</th>
        <th>Product Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php   
        $i=0;
        $get_pro = "SELECT * FROM product_categories  ";
        $run_pro=mysqli_query($conn,$get_pro);
        $count_pro=mysqli_num_rows($run_pro);
        while($row_pro=mysqli_fetch_array($run_pro))
        {
            $pro_cat_id=$row_pro['p_cat_id'];
            $pro_cat_title=$row_pro['p_cat_title'];
            $pro_cat_desc=$row_pro['p_cat_desc'];
            $i++;
           ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $pro_cat_id ?></td>
        <td><?php echo $pro_cat_title ?></td>
        <td><?php echo $pro_cat_desc ?></td>
        <td><a href="index.php?delete_p_cat=<?php echo $pro_cat_id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a> </td>
        <td><a href="index.php?edit_p_cat=<?php echo $pro_cat_id ?>" class="btn btn-info"> <i class="fa fa-edit"></i> </a> </td>
    </tr>
           <?php 
        }
   ?>
    </tbody>
  </table>
</div>

