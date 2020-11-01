<?php
session_start();
include("dbConnection.php");
include('functions/function.php');
?>	
<?php
if(isset($_GET['pro_id']))
{
	$pro_id=$_GET['pro_id'];
	$get_product="select * from products where product_id='$pro_id' ";
	$run_product=mysqli_query($conn,$get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$p_title=$row_product['product_title'];
	$p_price=$row_product['product_price'];
	$p_desc=$row_product['product_desc'];
	$p_img=$row_product['product_img'];

	$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id' ";
	$run_p_cat=mysqli_query($db,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_id=$row_p_cat['p_cat_id'];
	$p_cat_title=$row_p_cat['p_cat_title'];

	

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

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="goto-here">
<?php
include('includes/header.php');
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
		<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
		<h1 class="mb-0 bread">Product Single</h1>
		</div>
	</div>
	</div>
</div>

<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="admin/product_image/<?php echo $p_img ?>" class="image-popup"><img src="admin/product_image/<?php echo $p_img ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $p_title ?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>$<?php echo $p_price ?></span></p>
    				<p><?php echo $p_desc ?></p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
					 
					<?php
					addCart();
					?>
					  <form action="details.php?add_cart=<?php echo $pro_id ?>" method="POST">
					  <label for="" class="form-control">Product Quantity</label>
					  <select name="product_qty"  class="form-control">
	                  	<option value="1">1</option>
	                    <option value="2">2</option>
	                    <option value="3">3</option>
	                    <option value="4">4</option>
	                  </select> 
					  <div class="w-100"></div>
					  <p>
					  <button type="submit" class="btn btn-outline-dark bg-dark mt-3 text-successs">Add to Cart</button>
					  </p>
					  </form>
	                </div>
		            </div>
				</div>
          	</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<!-- related product start -->
				<?php
				$get_product="select * from products order by 1 LIMIT 0,4";
				$run_product=mysqli_query($conn,$get_product);
				while($row=mysqli_fetch_array($run_product))
				{
					$pro_id=$row['product_id'];
					$pro_title=$row['product_title'];
					$pro_price=$row['product_price'];
					$pro_img=$row['product_img'];
					?>
		<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="details.php?pro_id=<?php echo $pro_id ?>" class="img-prod"><img class="img-fluid" src="<?php echo 'admin/product_image/'.$pro_img?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="details.php?pro_id=<?php echo $pro_id ?>"><?php echo $pro_title ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"><?php echo $pro_price ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="details.php?pro_id=<?php echo $pro_id ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="details.php?pro_id=<?php echo $pro_id ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="whishlist.php?pro_id=<?php echo $pro_id ?>" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    	<?php


				}
				?>
				<!-- related product end -->
    		</div>
    	</div>
    </section>


<?php
include('includes/footer.php');
?>  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

<script>
	$(document).ready(function(){

	var quantitiy=0;
		$('.quantity-right-plus').click(function(e){
			
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
				
				$('#quantity').val(quantity + 1);

				
				// Increment
			
		});

			$('.quantity-left-minus').click(function(e){
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
			
				// Increment
				if(quantity>0){
				$('#quantity').val(quantity - 1);
				}
		});
		
	});
</script>

</body>
</html>