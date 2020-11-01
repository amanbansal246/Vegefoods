<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
                <!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('images/<?php echo $admin_image ?>');"></a> -->
          <center>
          <h5 class="text-white"><?php echo $admin_name ?></h5>
          </center>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
            	<a href="index.php?dashbord">Dashbord</a>
				</li>
				<li>
	            <a href="#ProductsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
	            <ul class="collapse list-unstyled" id="ProductsSubmenu">
                <li>
                    <a href="index.php?insert_product">Insert Product</a>
                </li>
                <li>
                    <a href="index.php?view_product">View Product</a>
                </li>
	            </ul>
	          </li>
				<li>
	            <a href="#ProductcateSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products Categories</a>
	            <ul class="collapse list-unstyled" id="ProductcateSubmenu">
                <li>
                    <a href="index.php?insert_product_cat">Insert Products Categories</a>
                </li>
                <li>
                    <a href="index.php?view_product_cat">View Products Categories</a>
                </li>
	            </ul>
	          </li>
				<!-- <li>
	            <a href="#categoriesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
	            <ul class="collapse list-unstyled" id="categoriesSubmenu">
                <li>
                    <a href="index.php?insert_categories">Insert Categories</a>
                </li>
                <li>
                    <a href="index.php?view_categories">View Categories</a>
                </li>
	            </ul>
	          </li> -->
            <li>
	            <a href="#SliderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Slider</a>
	            <ul class="collapse list-unstyled" id="SliderSubmenu">
                <li>
                    <a href="index.php?insert_slider">Insert Slider</a>
                </li>
                <li>
                    <a href="index.php?view_slider">View Slider</a>
                </li>
	            </ul>
	          </li>
            <li>
	              <a href="index.php?view_customer">View Customer</a>
	          </li>
            <li>
	              <a href="index.php?view_order">View Order</a>
	          </li>
            <li>
	              <a href="index.php?view_payments">View Payments</a>
	          </li>
            <li>
	            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
	            <ul class="collapse list-unstyled" id="userSubmenu">
                <li>
                    <a href="index.php?insert_user">Insert User</a>
                </li>
                <li>
                    <a href="index.php?view_user">View User</a>
                </li>
                <li>
                    <a href="index.php?edit_profile?id=<?php echo $admin_id ?>">Edit Profile</a>
                </li>
	            </ul>
	          </li>
            <li>
	              <a href="../logout.php">Logout</a>
	          </li>
	        </ul>

	      </div>
    	</nav>
		<div id="content" class="p-4 p-md-5">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?user_profile=<?php echo $admin_id ?>">Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view_products">Products</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view_customers">Customers</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?pro_cat">Products Categories</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

