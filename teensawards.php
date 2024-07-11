
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
 $query = "SELECT * FROM tbleventsettings";
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
								<p><a class="btn btn-primary btn-lg" href="contact">Get in Touch</a></p>
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
					<h1 id="fh5co-logo"><a href="index">Sierrateens  <img class="logo-css" src="assets/images/logo.jpg" alt="sierrateenslogo"></a></h1>
						<!------  Menu --->
				<!-- START #fh5co-menu-wrap -->
				<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="index">Home</a></li>
							<li><a href="teensawards">Teens Awards</a></li>
							<li><a data-toggle="modal" data-target="#adminPortal">Nominations</a></li>
							<li><a href="contact">Partner / Sponsorship</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->

		
		<div class="fh5co-content-section">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3><?php echo date ('Y');?> Awards Nominees</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container"> 
			<div class="row row-bottom-padded-md">
			<?php 
		
include 'includes/config.php';
error_reporting(0);

 $query = "SELECT DISTINCT catname, nameofnominee, profile FROM tblpublicnominations 
 JOIN tblawardcategory ON tblawardcategory.awardid = tblpublicnominations.catnameid";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3 class="text-uppercase"><?php echo $row['catname'];?></h3>
					</div>
				</div>
				<div class="row row-bottom-padded-md">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="<?php echo $row['profile'];?>" alt="<?php echo $row['nameofnominee'];?>"></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3 class="text-center btn btn-primary"><i class="icon-users"></i> <?php echo $row['nameofnominee'];?></h3>
									<span class="posted_by"><?php echo date ('Y');?> TCA Nominees</span>
								</div>
							</div> 
						</div>
					</div>
			<?php 
}  
 }else if ($rowcount == 0){ 
	error_reporting(0); ?>
	<div class="row row-bottom-padded-md">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Teen's Choice Awards is over for this year!</h3>
						<p class="text-italic">Join us again next edition, highlights from this year's award show...</p>
					</div>
				</div> 

				<!-- Showing highlights from previous year -->
			
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
					<ul id="fh5co-portfolio-list">
						<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblevent ORDER BY RAND()";
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



	<?php }?>
							</div> 
						</div>
					</div>

					<div class="clearfix visible-md-block"></div>
				</div>

				</div>
			</div>
		</div>
		<!-- fh5co-content-section -->

		<!-- END What we do -->

		<?php include 'includes/footer.php';?>
