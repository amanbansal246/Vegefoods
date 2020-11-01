
<?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_p="select * from products where product_id ='$edit_id'";
    $run_edit=mysqli_query($conn,$get_p);
    $row_edit=mysqli_fetch_array($run_edit);
    $p_id=$row_edit['product_id'];
    $p_title=$row_edit['product_title'];
    $p_cat_id=$row_edit['p_cat_id'];
    $p_img=$row_edit['product_img'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    $p_keyword=$row_edit['product_keyword'];

    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_edit_cat=mysqli_query($conn,$get_p_cat);
    $row_edit_cat=mysqli_fetch_array($run_edit_cat);
    $p_cat_title=$row_edit_cat['p_cat_title'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="../css/icomoon.css"> -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
   
    <!-- Bootstrap CSS
    <link rel="stylesheet" href="../css/bootstrap.min.css"> -->

    <!-- Font Awesome CSS -->
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
</head>
<body>


<div class="container">
<div class="mb-3 mt-5 text-center" style="font-size:30px">
    <i class="fas fa-stethoscope"></i>
    <span>Online Food Management</span>
    </div>
    <p class="text-center" style="font-size:20px;"> <i class="fas fa-user-secret text-success "></i> Admin Area</p>

  <form action="" method="POST" class="shadow-lg p-5" enctype="multipart/form-data">
    <div class="form-group">
      <label for="pro_title">Product Title</label>
      <input type="text" class="form-control" placeholder="Product Title"  name="pro_title">
   </div>
    <div class="form-group">
      <label for="pro_category">Product Categories</label>
      <select name="pro_category" class="form-control">  
      <option>select a product category</option>
      <?php
        $get_p_cats="select * from product_categories";
        $run_p_cats=mysqli_query($conn,$get_p_cats);
        while($row=mysqli_fetch_array($run_p_cats))
        {
            $id=$row['p_cat_id'];
            $cat_title=$row['p_cat_title'];
            echo "<option value='$id'>$cat_title</option>";
        }
      ?>
      </select>
   </div>
   <div class="form-group">
      <label for="pro_image">Product Image</label>
      <input type="file" class="form-control" placeholder="Image"  name="pro_image">
   </div>
   <div class="form-group">
      <label for="pro_price">Product Price</label>
      <input type="number" class="form-control" placeholder="Price"  name="pro_price">
   </div>
   <div class="form-group">
      <label for="pro_keyword">Product Keyword</label>
      <input type="text" class="form-control" placeholder="Keyword"  name="pro_keyword">
   </div>
   <div class="form-group">
      <label for="pro_desc">Product description</label>
      <textarea name="pro_desc" class="form-control" rows="6" cols="19"></textarea>
   </div>
   <button class="btn btn-outline-success mt-3 text-weigth-bold btn-block " name="submit">Submit</button>
  </form>
  <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="../index.php">Back to Home</a></div>
</div>
    <!-- Boostrap JavaScript -->
  <!-- <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>

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
  <script src="../js/main.js"></script> -->
  <script src="../js/all.min.js"></script> 
  <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php

if(isset($_REQUEST['submit']))
{
  $pro_title=$_REQUEST['pro_title'];
  $pro_category=$_REQUEST['pro_category'];
  $pro_price=$_REQUEST['pro_price'];
  $pro_keyword=$_REQUEST['pro_keyword'];
  $pro_desc=$_REQUEST['pro_desc'];
  $file_name=$_FILES['pro_image']['name'];
  $file_temp_loc=$_FILES['pro_image']['tmp_name'];
  $file_store="product_image/".$file_name;

  move_uploaded_file($file_temp_loc,$file_store);
  $sql="update products set product_title='$pro_title',p_cat_id='$pro_category',product_price='$pro_price',product_keyword='$pro_keyword',product_desc='$pro_desc',product_img='$file_name' where product_id=' $edit_id '";

  $run_product=$conn->query($sql);
  if($run_product)
  {
    echo "<script>alert('Product Updated Successfully')</script>";
    echo "<script>window.open('index.php?view_product')</script>";
  }else{
    echo "failed";
  }
}
?>