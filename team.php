
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
 $query = "SELECT * FROM tblteamsettings";
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



		
		<div class="fh5co-content-section">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Our Team</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">

				<div class="row">
				<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblteam ORDER BY RAND()";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
					<div class="col-md-4">
						<div class="fh5co-team text-center animate-box">
							<figure>
								<img src="<?php echo $row['profile'];?>" alt="user">
							</figure>
							<h4><?php echo $row['fname'].' '.$row['lname'];?> 
							<br> <span class="text-mute"><?php echo $row['position'];?></span></h4>						
						</div>
					</div>
				
	<?php 
}  
 }
 ?>
				</div>
			</div>
		</div>
		<!-- fh5co-content-section -->

		<!-- END What we do -->


		<?php include 'includes/footer.php';?> 

