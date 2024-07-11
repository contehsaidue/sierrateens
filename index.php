
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
 <html class="no-js"> <!--<![endif]-->

 <head>
	
<?php include 'includes/links.php';?>

	</head>

	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblindexsettings";
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
								<p><a class="btn btn-primary btn-lg" href="shop">Shop with us <i class="icon-cart"></i> </a></p>
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


		<div id="fh5co-feature-product" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Sierrateens Events</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>

				<div class="row row-bottom-padded-md">
						<?php 
		include 'includes/config.php';
		$query = "SELECT * FROM tblevent ORDER BY RAND()";
		$queryrun = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($queryrun);?>
							<div class="col-md-12 text-center animate-box">
								<p><img src="<?php echo $row['image'];?>" alt="Free HTML5 Bootstrap Template" class="img-responsive img-rounded"></p>
							</div>
					
				</div>
				<div class="row row-bottom-padded-md">
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Angular JS</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Node JS</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Django Python</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="https://youtube.com/channel/UCeKOOR5N8Y-9_JDhWqoDx4Q" target="_blank" class="link-watch popup-vimeo btn btn-primary"><i class="icon-play3"></i> Watch More Events </a>
					</div>
				</div>
				
			</div>
		</div>

		<div id="fh5co-features">
			<div class="container">
				<div class="row">
					<div class="col-md-6">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-laptop"></i>
							</span>
							<div class="feature-copy">
								<h3>Social Media Marketing and Branding </h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-youtube"></i>
							</span>
							<div class="feature-copy">
								<h3>Content Creation</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>
</div>
				
				<div class="row">
					<div class="col-md-6">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-network"></i>
							</span>
							<div class="feature-copy">
								<h3>Online Promotion</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-brush"></i>
							</span>
							<div class="feature-copy">
								<h3>Graphics Design</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>
					</div>
				</div>
			
				</div>
			</div>
		</div>

		
		<div id="fh5co-portfolio" class="fh5co-section-gray">
			<div class="container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Our Gallery</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>

				
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
						<ul id="fh5co-portfolio-list">
						<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblgallery ORDER BY RAND() LIMIT 4";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
							<li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo $row['image'];?>);); ">
								<a href="#" class="color-5">
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

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box">
						<a href="gallery" class="btn btn-primary btn-lg">See Gallery</a>
					</div>
				</div>

				
			</div>
		</div>
		

		<div id="fh5co-blog-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Teen's Choice Awards</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="row row-bottom-padded-md">
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="assets/images/1.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3 class="text-center">Drizilik</h3>
									<span class="posted_by"><?php echo date ('Y');?> TCA Nominees</span>
								</div>
							</div> 
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="assets/images/1.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3 class="text-center">Speedo</h3>
									<span class="posted_by">2022 TCA Nominees</span>
								</div>
							</div> 
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" src="assets/images/1.jpg" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<h3 class="text-center">Medo T</h3>
									<span class="posted_by">2022 TCA Nominees</span>
								</div>
							</div> 
						</div>
					</div>
					<div class="clearfix visible-md-block"></div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box">
						<a href="events" class="btn btn-primary btn-lg">Go make a nomination</a>
					</div>
				</div>

			</div>
		</div>
		<!-- fh5co-blog-section -->
	
<?php include 'includes/footer.php';?>

