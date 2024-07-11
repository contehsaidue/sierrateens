


<footer>
			<div id="footer">
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-3 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Services</h3>
							<ul>
								<li><a href="#">Social Media marketing <br> and branding</a></li>
								<li><a href="#">Content Creation</a></li>
								<li><a href="#">Graphics Design</a></li>
								<li><a href="#">Online Promotion</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Company</h3>
							<ul>
								<li><a href="about">About Us</a></li>
								<li><a href="team">Our Team</a></li>
								<li><a href="contact">Contact Us</a></li>
								<li><a href="contact">Support</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Events</h3>
							<ul>
								<li><a href="#">Teen's Choice Awards</a></li>
								<li><a href="#">Sierra Buzz</a></li>
								<li><a href="#">Charity</a></li>
								<li><a href="#">Others</a></li>
							</ul>
						</div>
						
						<div class="col-md-3 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Connect</h3>
							<ul>
								<li><a href="https://www.facebook.com/sierrateens232/" target="_blank">Like on Facebook</a></li>
								<li><a href="https://instagram.com/sierrateens?igshid=YmMyMTA2M2Y=" target="_blank">Follow on Instagram</a></li>
								<li><a href="https://youtube.com/channel/UCeKOOR5N8Y-9_JDhWqoDx4Q" target="_blank">Subscribe to our Youtube Channel</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="https://www.facebook.com/sierrateens232/" target="_blank"><i class="icon-facebook2"></i></a>
								<a href="https://instagram.com/sierrateens?igshid=YmMyMTA2M2Y=" target="_blank"><i class="icon-instagram"></i></a>
								<a href="https://youtube.com/channel/UCeKOOR5N8Y-9_JDhWqoDx4Q" target="_blank"><i class="icon-youtube"></i></a>
							</p>
							<p>© <?php echo date ('Y');?> <a href="index"> Sierrateens.com </a>. All Rights Reserved.</p>
						</div>
					</div>
					<p><a class="text-decoration-none" href="#" target="_blank"><strong>Lytestack Technologies</strong></a></p>
				</div>
			</div>
		</footer>

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->

	<script src="assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/sticky.js"></script>

	<!-- Stellar -->
	<script src="assets/js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="assets/js/hoverIntent.js"></script>
	<script src="assets/js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/magnific-popup-options.js"></script>
	
	<!-- Main JS -->
	<script src="assets/js/main.js"></script>

	</body>
</html>


<!--Admin Login Modal -->
<div class="modal fade" id="adminModal">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-uppercase"><img src="assets/images/logo.jpg" style="width: 65px; height: 55px;" class="me-2"><strong> Sierrateens Admin Login Portal </strong></h5>
		</div>
		<form action="admin/controller.php" method="POST">
		<div class="modal-body">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Enter Admin Username" name="username">
				</div>
				<div class="form-group">
				  <input type="password" class="form-control" placeholder="Password" name="password">
				</div>
				<div class="form-check">
				  <input type="checkbox" class="form-check-input" id="exampleCheck1">
				  <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
				</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary" name="adminlogin">Login</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

