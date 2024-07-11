
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
 $query = "SELECT * FROM tblcontactsettings";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);?>
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo $row['bgimage'];?>);">
				<div class="desc animate-box">
					<div class="container">
						<div class="col-md-10 col-md-offset-1">
						<?php include 'includes/logo.php';?>
							<div class="animate-box">
								<h2><?php echo $row['bgtext'];?></h2>
								<p><a class="btn btn-primary btn-lg" href="contact">Talk to us</a></p>
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


		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<form action="admin/controller.php" method="POST">
					<div class="row animate-box">
						<div class="col-md-6">
							<h3 class="section-title">Our Address</h3>
							<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblcontact";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);?>
							<ul class="contact-info">
								<li><i class="icon-location-pin"></i><?php echo $row['address'];?></li>
								<li><i class="icon-phone2"></i><?php echo $row['phone1'];?></li>
								<li><i class="icon-phone2"></i><?php echo $row['phone2'];?></li>
								<li><i class="icon-mail"></i><a href="#"><?php echo $row['email'];?></a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Name" name="name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Phone" name="phone">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Send Message" class="btn btn-primary" name="sendmessage">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END fh5co-contact -->
		<?php include 'includes/footer.php';?>
