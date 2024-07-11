
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	
	<?php include 'includes/links.php';?>
	
		</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblgallerysettings";
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
								<p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p>
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
						<h3>Our Gallery</h3>
					</div>
				</div>

				
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
					<ul id="fh5co-portfolio-list">
						<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblgallery ORDER BY RAND()";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
							<li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo $row['image'];?>);); ">
								<a href="#" class="color-3">
									<div class="case-studies-summary">
										<h2><?php echo $row['imagetext'];?></h2>
									</div>
								</a>
							</li>
						
							<?php 
}  
 }
 ?>
						</ul>		
					</div>
				</div>
		
			</div>
		</div>
		

	

		
		<?php include 'includes/footer.php';?>
