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
      <h1>Event Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="btn-group me-2">
            <button  class="btn btn-sm btn-dark fw-bold"  data-bs-toggle="modal" data-bs-target="#adminSettings"> Settings <i class="bi bi-tools"></i> </button>
          </div>
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

<table class="table table-striped table-bordered table-hover table-responsive datatable" style="font-size:12px" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Background Text</th>
              <th>Background Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <tr>
<?php 
include '../includes/config.php';
 $query = "SELECT * FROM tbleventsettings";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
    <td><?php echo $row['bgtext'];?></td>
    <td><img class="img-profile" src="../<?php echo $row['bgimage'];?>" /></td>
<td>
  <a href="controller.php?deleteeventsettings=<?php echo $row['id'];?>" class="text-white mr-2 text-decoration-none btn btn-danger btn-sm" onclick="return confirm('Do you want to remove this event page settings?')";
    title="Delete">  <i class="bi bi-trash"></i></a>
    <a href="eventsettings-edit?editeventsettings=<?php echo $row['id'];?>" class="text-white mr-2 text-decoration-none btn btn-success btn-sm" onclick="return confirm('Do you want to edit this event page settings?')";
    title="Delete">  <i class="bi bi-pen"></i></a>
</td>
</tr>
<?php 
}  
 }
 ?>
          </tbody>
        </table>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include 'dashboard-footer.php';?>

  

<!--Admin Homepage Settings Modal -->
<div class="modal fade" id="adminSettings">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-uppercase"><img src="../assets/images/logo.jpg" style="width: 65px; height: 55px;" class="me-2"><strong> Event Settings </strong> <i class="bi bi-tools"></i></h5>
		</div>
		<form action="controller.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <div class="row">
                <div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Enter Background Text" name="bgtext">
				</div>

            </div> <!-- col 1 ends -->
            <div class="col-md-6">

				<div class="form-group mb-3">
				  <input type="file" class="form-control" name="bgimage">
				</div>
</div> <!-- row ends -->

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success fw-bold" name="admineventsettings">Save Details</button>
		  <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Close</button>
		</div>
		</form>
	  </div>
	</div>
  </div>

  </div>
	</div>
  </div>
