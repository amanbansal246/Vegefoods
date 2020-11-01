<div class="py-1" style="background-color:#81b04a">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
							<a href="#" class="btn btn-outline-light rounded font-weight-light">
								<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo "Welcome Guest";
								}else{
									echo "Welcome:".$_SESSION['customer_email']."";
								}
								?>
							</a>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
						    <span class="text" style="font-size:13px">Total Price: INR <?php totalPrice(); ?> Total Items <?php item(); ?></span>
					    </div>
					    <div class="col-md-5 pr-2 d-flex topper align-items-center text-lg-right">
							<ul class="nav">
								<li class="nav-item">
								<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo  "<a href='checkout.php' class='nav-link text-white'>My Account</a>";
								}else{
									echo "<a href='customer/my_account.php' class='nav-link text-white'>My Account</a>";
								}
								?>
								</li>
								<li class="nav-item"><a href="cart.php" class="nav-link text-white">Go to Cart</a></li>
								<li class="nav-item">
								<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo  "<a href='checkout.php' class='nav-link text-white'>Login</a>";
								}else{
									echo "<a href='logout.php' class='nav-link text-white'>Logout</a>";
									
								}
								?>
								</li>
								<li class="nav-item">
								<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo "<a href='customer_register.php' class='nav-link text-white'>Register</a>";
								}
								?>
								</li>
								
							</ul>
						</div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
              	<a class="dropdown-item" href="wishlist.php">Wishlist</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[  <?php item(); ?> ]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

