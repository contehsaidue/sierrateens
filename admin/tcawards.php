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
      <h1>Teen's Choice Awards Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="btn-group me-2">
            <button  class="btn btn-sm btn-dark fw-bold"  data-bs-toggle="modal" data-bs-target="#adminAwards">Set Award Nominations <i class="bi bi-people"></i></button>
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
              <th>Nominee</th>
              <th>Category</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
<?php 
include '../includes/config.php';
 $query = "SELECT * FROM tblprivatenominations JOIN tblawardcategory 
 ON tblawardcategory.awardid = tblprivatenominations.catnameid";
 $queryrun = mysqli_query($conn, $query);
 $rowcount = mysqli_num_rows($queryrun);
 if ($rowcount > 0){
     while($row = mysqli_fetch_assoc($queryrun)){ ?>
    <td><?php echo $row['nameofnominee'];?></td>
    <td><?php echo $row['catname'];?></td>
    <td><img class="img-profile" src="../<?php echo $row['profile'];?>" /></td>
<td>
  <a href="controller.php?deletenominee=<?php echo $row['nomineeid'];?>" class="text-white mr-2 text-decoration-none btn btn-danger btn-sm" onclick="return confirm('Do you want to remove this nominee?')";
    title="Delete"><i class="bi bi-trash"></i> </a>
    <a href="tcawards-edit?editnominee=<?php echo $row['nomineeid'];?>" class="text-white mr-2 text-decoration-none btn btn-success btn-sm" onclick="return confirm('Do you want to edit this nomination details?')";
    title="Edit"><i class="bi bi-pen"></i> </a>
    <a href="controller.php?makepublic=<?php echo $row['nomineeid'];?>" class="text-white mr-2 text-decoration-none btn btn-dark btn-sm" onclick="return confirm('Are you sure you want to make this nomination public ?')";
    title="Make Public"><i class="bi bi-eye"></i> </a>
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

  
<!--Admin Add Award Nomination Modal -->
<div class="modal fade" id="adminAwards">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-uppercase"><img src="../assets/images/logo.jpg" style="width: 65px; height: 55px;" class="me-2"><strong> Teen's Choice Awards Nominee Portal</strong> <i class="bi bi-people"></i></h5>
		</div>
		<form action="controller.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <div class="row">
                <div class="col-md-6">
				<div class="form-group mb-3">
				  <input type="text" class="form-control" placeholder="Name of nominee" name="nameofnominee">
				</div>
</div>
                <div class="col-md-6">
                <div class="form-group mb-3">
				  <input type="file" class="form-control" name="profile">
				</div>
</div> <!-- col 1 ends -->
<div class="col-md-12">
<div class="form-group mb-3">
<select type="text"  class="form-select" name="category">
     <option selected> Category </option>
     <?php 
     include '../includes/config.php';
     $sql ="SELECT * FROM tblawardcategory";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)){ ?>
     ?>
     <option value="<?php echo $row['awardid'];?>"><?php echo $row['catname'];?></option>
     <?php } 
     
        }
        ?>
     </select>
				</div>
</div> <!-- col 2 ends -->
</div> <!-- row ends -->

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-success fw-bold" name="adminsetnomination">Set Nomination</button>
		  <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal">Close</button>
		</div>
		</form>
	  </div>
	</div>
  </div>



