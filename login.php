
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
 <html class="no-js"> <!--<![endif]-->

 <head>
	
<?php include 'includes/links.php';?>
<style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>
	</head>

	<body class="text-center">
	
    <main class="form-signin">
    <form action="admin/controller.php" method="POST">
    <img class="mb-4" src="assets/images/logo.jpg" style="width: 65px; height: 55px;">
    <h1 class="h3 mb-3 fw-normal">ADMIN LOGIN</h1>

    <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="adminlogin">Sign in <i class="icon-user"></i> </button>
  </form>
</main>

		
	
	

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

