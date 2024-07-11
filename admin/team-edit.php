<!DOCTYPE html>
<html lang="en">

<!-- Dashboard links starts -->
<?php include 'dashboard-links.php';?>
<!-- Dashboard links ends -->

<body>

<!-- Dashboard header starts -->
<?php include 'dashboard-header.php';?>
<!-- Dashboard header ends -->


<!-- Dashboard sidebar starts -->
 <?php include 'dashboard-sidebar.php';?>
<!-- Dashboard sidebar ends -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Sierrateens Membership Edit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
       
      </nav>
    </div><!-- End Page Title -->
   <!-- Feedback Message -->
   <?php 
                    if(isset($_SESSION['status']) && ($_SESSION['type'] == "success"))
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show fw-bold fst-italic mt-3" role="alert">
                            <strong>Admin <?php echo $_SESSION['fname']; ?></strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }else if (isset($_SESSION['status']) && ($_SESSION['type'] == "error")){
                        
                    ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show fw-bold fst-italic" role="alert">
                            <strong>Admin <?php echo $_SESSION['fname']; ?></strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                         unset($_SESSION['status']);
                    }     
                ?>

<?php 
include '../includes/config.php';
error_reporting(0);
if(isset($_GET['editmember'])){
    $updateid = $_GET['editmember'];
 $query = "SELECT * FROM tblteam WHERE id = '$updateid'";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);
}?>



<form action="controller.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <input type="hidden" name="updateid" value="<?php echo $row['id'];?>">
                <div class="col-md-6">
				<div class="form-group mt-4 mb-3">
				  <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>">
				</div>
        <div class="form-group mb-3">
				  <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>">
				</div>
</div> <!-- col 1 ends -->
        <div class="col-md-6">
        <div class="form-group mb-3">
        <small class="fst-italic fw-bold">Upload new image for this member</small>
				  <input type="file" class="form-control" name="profilenew">
				</div>
				<div class="form-group mb-3">
				  <input type="text" class="form-control" name="position" value="<?php echo $row['position'];?>">
				</div>
</div> <!-- col 2 ends -->
</div> <!-- row ends -->

	<button type="submit" class="btn btn-success fw-bold" name="adminupdatemember">Update Member Status</button>
		</form>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include 'dashboard-footer.php';?>


