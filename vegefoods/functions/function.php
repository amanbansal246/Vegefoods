<?php
$db=mysqli_connect("localhost","root","","vegefoods");
//for getting user ip Start

function addCart(){
	global $db;
	if(isset($_GET['add_cart'])){
		 //$ip_add=getUserIP();
		$email=$_SESSION['customer_email'];
		 $p_id=$_GET['add_cart'];
		 $product_qty=$_POST['product_qty'];
		 //$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		 $check_product="select * from cart where customer_email='$email' AND p_id='$p_id'";
		 $run_check =mysqli_query($db,$check_product);
		if(mysqli_num_rows($run_check)>0)
		{
			$query="update cart set qty=qty+'$product_qty' where customer_email='$email' ";
			$run_query=mysqli_query($db,$query);
			echo "<script>alert('This product is already added in cart')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}else{
			//$query="insert into cart (p_id,ip_add,qty) values('$p_id','$ip_add','$product_qty')";
			$query="insert into cart (p_id,customer_email,qty) values('$p_id','$email','$product_qty')";
			$run_query=mysqli_query($db,$query);	
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}
//items count start
function item(){
	global $db;
	//$ip_add=getUserIP();
	$count=0;
	if(!isset($_SESSION['customer_email']))
	{
		echo $count;
	}else{
		$email=$_SESSION['customer_email'];
		$get_items="select * from cart where customer_email ='$email' ";
		$run_item=mysqli_query($db,$get_items);
		$count=mysqli_num_rows($run_item);
		echo $count;	
	}
}
//items count end

//total price start
function totalPrice()
{
	global $db;
	//$ip_add=getUserIP();
	
	$total=0;
	if(!isset($_SESSION['customer_email']))
	{
		echo $total;
	}else{
		$email=$_SESSION['customer_email'];
		$select_cat="select * from cart where customer_email='$email'";
		$run_cart=mysqli_query($db,$select_cat);
		while($record=mysqli_fetch_array($run_cart))
		{
			$pro_id=$record['p_id'];
			$pro_qty=$record['qty'];
			$get_price="select  product_price from products where product_id='$pro_id'";
			$run_price=mysqli_query($db,$get_price);
			while($row=mysqli_fetch_array($run_price))
			{
				$sub_total=$row['product_price']*$pro_qty;
				
			}
			$total+=$sub_total;
		}
		echo $total;
		}
}

//total price end

//for getting user ip Start
function getPro() {
    global $db;
    $get_product="select * from products order by 1 DESC LIMIT 0,8";
    $run_products=mysqli_query($db,$get_product);
    while($row_product =mysqli_fetch_array($run_products))
    {
    	$pro_id=$row_product['product_id'];
    	$pro_title=$row_product['product_title'];
    	$pro_price=$row_product['product_price'];
    	$pro_img=$row_product['product_img'];
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
	    							<a href="wishlist.php?pro_id=<?php echo $pro_id ?>" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    	<?php
	
    }

}
// product category
function getPCats()
{
	global $db;
	$sql = "select * from product_categories";
	$run = $db->query($sql);
	while($row = $run->fetch_assoc())
	{
	$p_cat_id=$row['p_cat_id'];
	$p_cat_title=$row['p_cat_title'];
	echo "<li> <a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
	}
}

// get product category product
function getPcatPro()
{
	global $db;
	if(isset($_GET['p_cat']))
	{
		$p_cat_id=$_GET['p_cat'];
		echo $p_cat_id;	
		$get_p_cat="select * from product_categories where p_cat_id ='$p_cat_id'";
		$run_p_cat=mysqli_query($db,$get_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		$p_cat_title=$row_p_cat['p_cat_title'];
		$p_cat_desc=$row_p_cat['p_cat_desc'];

		$get_products="select * from products where p_cat_id ='$p_cat_id'";
		$run_products=mysqli_query($db,$get_products);	
		$count=mysqli_num_rows($run_products);	
		if($count==0)
		{
			echo "<div class='container '>
			<h1 class='text-success'>No product found in this product category</h1>
			</div>";
		}else{
			echo "
				<div class='container'  >
					<h1 class='text-success'>$p_cat_title</h1>
					
				</div>
			";
		}
		while($row_product =mysqli_fetch_array($run_products))
    {
    	$pro_id=$row_product['product_id'];
    	$pro_title=$row_product['product_title'];
    	$pro_price=$row_product['product_price'];
		$pro_img=$row_product['product_img'];
		?>
		<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="details.php?pro_id" class="img-prod"><img class="img-fluid" src="<?php echo 'admin/product_image/'.$pro_img?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="details.php?pro_id"><?php echo $pro_title ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"><?php echo $pro_price ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="details.php?pro_id" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="details.php?pro_id" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
	}
}
}
