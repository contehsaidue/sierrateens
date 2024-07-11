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
					
<h1 id="fh5co-logo">
	<a href="index">Sierrateens  <img class="logo-css" src="assets/images/logo.jpg" alt="sierrateenslogo"></a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="index">Home</a></li>
							<li><a href="teensawards">Teen's Choice Awards</a></li>
							<li><a data-toggle="modal" data-target="#adminPortal">Nominations</a></li>
							<li><a href="contact">Partner / Sponsorship</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

 <!-- Feedback Message -->
 <?php 
                    if(isset($_SESSION['status']) && ($_SESSION['type'] == "success"))
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show fw-bold fst-italic mt-3" role="alert">
                            <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }else if (isset($_SESSION['status']) && ($_SESSION['type'] == "error")){
                        
                    ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show fw-bold fst-italic" role="alert">
                             <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                         unset($_SESSION['status']);
                    }     
                ?>
		<!-- end:header-top -->


		<div id="fh5co-feature-product" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3 class="text-uppercase">Upcoming Event</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>

				<div class="row row-bottom-padded-md">
				<?php 
include 'includes/config.php';
 $query = "SELECT * FROM tblevent";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);?>
					<div class="col-md-12 text-center animate-box">
						<p><img src="<?php echo $row['image'];?>" alt="Free HTML5 Bootstrap Template" class="img-responsive img-rounded"></p>
					</div>
					
				</div>
				</div>
			</div>
		</div>

		
		<div id="fh5co-portfolio" class="fh5co-section-gray">
			<div class="container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Moments</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>

				
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

				
			</div>
		</div>
		<?php include 'includes/footer.php';?>


<!--Admin Nomination Modal -->
<div class="modal fade" id="adminPortal">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-uppercase"><img class="logo-css" src="assets/images/logo.jpg" alt="sierrateenslogo"><strong> Teen's Choice Award Nomination Portal</strong> <i class="bi bi-image"></i></h5>
		</div>
		<form action="admin/controller.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <div class="row">
                <div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Name of Nominee" name="nameofnominee">
				</div>
</div> <!-- col 1 ends -->
<div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Category Nominated for" name="category">
				</div>
</div>
<div class="col-md-12">
		<div class="form-group mb-3">
			<textarea type="text" class="form-control"  name="nominationattest" cols="5" rows="5">
				say something about the nominee...
</textarea>
		</div>
</div> <!-- col 2 ends -->
</div> <!-- row ends -->

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary fw-bold" name="submitnomination">Submit Nomination</button>
		  <button type="button" class="btn btn-danger fw-bold" data-dismiss="modal">Close</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

