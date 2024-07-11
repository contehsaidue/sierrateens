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
      <h1>Contact Info Edit</h1>
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
if(isset($_GET['editcontact'])){
    $updateid = $_GET['editcontact'];
 $query = "SELECT * FROM tblcontact WHERE id = '$updateid'";
 $queryrun = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($queryrun);
}?>


    <form action="controller.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group mb-3">
				  <input type="email" class="form-control"  name="email" value="<?php echo $row['email'];?>">
				</div>
</div> <!-- col 1 ends -->
<div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control"  name="address" value="<?php echo $row['address'];?>">
				</div>

</div> <!-- col 2 ends -->
</div> <!-- row ends -->
<div class ="row">
    <div class= "col-md-6">
<div class="form-group mb-3">
				  <input type="text" class="form-control"  name="phone1" value="<?php echo $row['phone1'];?>">
				</div>
</div>
<div class= "col-md-6">
<div class="form-group mb-3">
				  <input type="text" class="form-control"  name="phone2" value="<?php echo $row['phone2'];?>">
				</div>
</div>
</div>
		</div>
			<button type="submit" class="btn btn-success fw-bold" name="adminupdatecontact">Update  Contact Info</button>
		</form>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include 'dashboard-footer.php';?>

