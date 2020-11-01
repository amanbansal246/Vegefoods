<?php
session_start();
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <!-- <h1 class="mb-0 bread">Products</h1> -->
			<?php
					if(!isset($_GET['p_cat']))
					{
						echo '<h1 class="mb-0 bread">Products</h1>';		
					}
				?>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
		<!-- category section start -->
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
						<?php
                		  getPCats();     
            	    	?>
					</ul>
    			</div>
    		</div>
			<!-- category section end -->

			<!-- content section start -->
			<div class="row">
				<?php
					if(!isset($_GET['p_cat']))
					{
						$per_page=8;
						if(isset($_GET['page']))
						{
							$page=$_GET['page'];
						}else{
							$page=1;
						}
						$start_from=($page-1)*$per_page;
						$get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page ";
						$run_pro=mysqli_query($conn,$get_product);
						while($row=mysqli_fetch_array($run_pro))  //while loop start
						{
							$pro_id= $row['product_id'];
							$pro_title= $row['product_title'];
							$pro_price= $row['product_price'];
							$pro_img= $row['product_img'];
							?>
					<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="details.php?pro_id=<?php echo $pro_id ?>" class="img-prod"><img class="img-fluid" src="<?php echo 'admin/product_image/'.$pro_img?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo $pro_title ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"><?php echo $pro_price ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    	<?php
						} // while loop end
					
				?>

			</div><!-- content section end -->
      
			<!--pagintation start  -->
			<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <!-- <li><a href="#">&lt;</a></li> -->
				<?php
					$query= "select * from products";
					$result = mysqli_query($conn,$query);
					$total_record=mysqli_num_rows($result);
					$total_pages=ceil($total_record/$per_page);
					echo "<li><a href='shop.php?page=1'>".'First'."</a></li>";
					for($i=0;$i<=$total_pages;$i++){
						echo "<li><a href='shop.php?page=".$i."'>".$i."</a></li> ";
					};
					echo "<li><a href='shop.php?page=".$total_pages."'>".'Last'."</a></li>";

					
					}
				?>
                <!-- <li><a href="#">&gt;</a></li> -->
              </ul>
            </div>
          </div>
        </div>
		<div class="row">
		<?php
		getPcatPro()
		?>
		</div>
		<!--pagintation end  -->
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
    
  </body>
</html>