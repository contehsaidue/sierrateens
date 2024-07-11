<?php session_start (); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		
<?php 
include 'includes/links.php';
?>
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblshopsettings";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);?>
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo $row['bgimage'];?>);">
				<div class="desc">
					<div class="container">
						<div class="col-md-10 col-md-offset-1">
						<?php include 'includes/logo.php';?>
							<div class="animate-box">
								<h2><?php echo $row['bgtext'];?></h2>
								<p><a class="btn btn-primary btn-lg" href="#">Get our merchandise <i class="icon-cart"></i> </a></p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<!------  Menu --->
				<?php include 'includes/menu.php';?>
				</div>
			</div>
		</header>


		<!-- end:header-top -->
		
		<div id="fh5co-portfolio" class="fh5co-section-gray">
			<div class="container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Shop Now <i class="icon-cart"></i></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>

				
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
					<ul id="fh5co-portfolio-list">
						<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblshop ORDER BY RAND()";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
							<li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo $row['productimage'];?>);); ">
								<a href="#" class="color-3">
									<div class="case-studies-summary">
									<span> <?php echo $row['productname'];?></span>
										<h2 class="btn btn-primary"> <i class="icon-cart"></i> Le: <?php echo $row['productprice'];?></h2>
                                        <button class="btn btn-primary" title="Place Order"  data-toggle="modal" data-target="#adminShop"><i class="icon-cart"></i></button>
									</div>
								</a>
							</li>
						
							<?php 
}  
 } else { 
	error_reporting(0); ?>
	<div class="row row-bottom-padded-md">
					<div class="col-md-12 col-md-offset-3 text-center heading-section animate-box">
						<h3>Sorry for any incovenience, no product in <br> store at this moment!</h3>
					</div>
				</div> 		
						
 <?php }  ?>
	
			</div>
		</div>
	</div>
</div>
		<?php include 'includes/footer.php';?>


<!--Admin Nomination Modal -->
<div class="modal fade" id="adminShop">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-uppercase"><img class="logo-css" src="assets/images/logo.jpg" alt="sierrateenslogo"><strong> Sierrateens Store </strong> <i class="icon-cart"></i></h5>
		</div>
		<form action="admin/controller.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <div class="row">
                <div class="col-md-6">
				<div class="form-group mb-3">
     <select type="text"  class="form-control" name="nameofproduct">
     <option selected> Name of Product </option>
     <?php 
     include '../includes/config.php';
     $sql ="SELECT * FROM tblshop";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)){ ?>
     ?>
     <option value="<?php echo $row['productid'];?>"><?php echo $row['productname'];?></option>
     <?php } 
     
        }
        ?>
     </select>
				</div>
</div> <!-- col 1 ends -->
<div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Product Quantity" name="quantity">
				</div>
</div>
</div> <!-- row ends -->

<div class="row">
    <div class="col-md-6">
    <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Your Phone Number" name="phone">
    </div>
</div> <!-- col 1 ends -->
<div class="col-md-6">
    <div class="form-group mb-3">
        <input type="text" class="form-control" placeholder="Your Name" name="name">
    </div>
</div>
</div> <!-- row ends -->

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary fw-bold" name="submitorder"><i class="icon-cart"></i> Place Order</button>
		  <button type="button" class="btn btn-danger fw-bold" data-dismiss="modal">Close</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

