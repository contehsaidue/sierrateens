<?php

session_start(); // starting a session
// Admin login

    include '../includes/config.php';
 
   if (isset($_POST['adminlogin'])){
          
     // checking values from database
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       
   $sql = "SELECT * FROM tbladmin WHERE username = '$username' AND password = '$password'";
   $result = mysqli_query($conn, $sql);
         // checking query status inside DB
             if(mysqli_num_rows($result) > 0) {
         
             $row = mysqli_fetch_assoc($result);
                   if($row['username'] === $username && $row['password'] === $password){
                    
                // creating session variables
                $_SESSION['adminid'] = $row['adminid'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['photo'] = $row['photo'];
                $_SESSION['position'] = $row['position'];

                 $_SESSION['status'] = "Welcome back online!";
                 $_SESSION['type'] = "success";
                     header('Location:dashboard.php');
                     exit();
                   }
                 } else{
                    $_SESSION['status'] = "There was an error in your login attempt!";
                    $_SESSION['type'] = "error";
                    header('Location:../index.php');
                }
          }
 

 // Query for updating personal records ADMIN
 if(isset($_POST['adminupdate'])){
  $adminid = $_POST['adminid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $position = $_POST['position'];
    // Image type 
    $photoname = $_FILES['photo']['name'];
    $admin_image_tempname = $_FILES['photo']['tmp_name'];

  // checking image file type
  $admin_image_type = strtolower(pathinfo( $photoname , PATHINFO_EXTENSION));
  // valid file extensions
  $extensions_arr = array("jpg","jpeg","png");

  $folder = "../assets/images/".$photoname; // storing image path to folder in root directory
  $folderdb = "assets/images/".$photoname; // storing image path into database
 
  if(in_array( $admin_image_type , $extensions_arr)){
  $sql="UPDATE tbladmin
          SET username ='$username', password = '$password',
              fname = '$fname',lname = '$lname', position = '$position',
             photo = '$folderdb' WHERE adminid = '$adminid'";
  move_uploaded_file( $admin_image_tempname , $folder);

  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "You've successfully updated your admin records!";
      $_SESSION['type'] = "success";
      header("Location: users-profile.php");
  } else{
      $_SESSION['status'] = "Admin record updation failed!";
      $_SESSION['type'] = "error";
      header("Location: users-profile.php");
  }
}else{
  $_SESSION['status'] = "Image type not supported - Supported image type (jpg, jpeg, png)!";
  $_SESSION['type'] = "error";
  header("Location: users-profile.php");
}
 
}

          
// Query to add homepage settings into Database : ADMIN
if (isset($_POST['adminindex'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblindexsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Homepage setting successfully set!";
    $_SESSION['type'] = "success";
    header('Location: homepage-header.php');
} else{
    $_SESSION['status'] = "Failed to save homepage settings!";
    $_SESSION['type'] = "error";
    header('Location: homepage-header.php');
}
  }
}
                
// delete homepage action using the $_GET variable : ADMIN
if(isset($_GET['deleteindexsettings'])){
  $id = $_GET['deleteindexsettings'];
  $sql ="DELETE FROM tblindexsettings WHERE indexid = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Homepage settings successfully removed";
      $_SESSION['type'] = "success";
      header('Location: homepage-header.php');
  } else{
      $_SESSION['status'] = "Failed to remove homepage settings!";
      $_SESSION['type'] = "error";
      header('Location: homepage-header.php');
  }
}

// ----  UPDATE HOMEPAGE SETTTINGS

if (isset($_POST['adminupdatehome'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblindexsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Homepage settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: homepage-header.php');
} else{
   $_SESSION['status'] = "Failed to update homepage settings!";
   $_SESSION['type'] = "error";
   header('Location: homepage-header.php');
 }
}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblindexsettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Homepage settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: homepage-header.php');
   } else{
      $_SESSION['status'] = "Failed to update homepage settings!";
      $_SESSION['type'] = "error";
      header('Location: homepage-header.php');
    }

 }

 }
}


// ************ ---- EVENT SECTION ---- ************
          
// Query to add event settings into Database : ADMIN
if (isset($_POST['admineventsettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tbleventsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Event settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: eventsettings.php');
} else{
    $_SESSION['status'] = "Failed to save event settings!";
    $_SESSION['type'] = "error";
    header('Location: eventsettings.php');
}
  }
}
                
// delete event action using the $_GET variable : ADMIN
if(isset($_GET['deleteeventsettings'])){
  $id = $_GET['deleteeventsettings'];
  $sql ="DELETE FROM tbleventsettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Event page settings successfully removed";
      $_SESSION['type'] = "success";
      header('Location: eventsettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove event page settings!";
      $_SESSION['type'] = "error";
      header('Location: eventsettings.php');
  }
}


// ----  UPDATE EVENT PAGE SETTTINGS

if (isset($_POST['adminupdateeventsettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tbleventsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Event page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: eventsettings.php');
} else{
   $_SESSION['status'] = "Failed to update event page settings!";
   $_SESSION['type'] = "error";
   header('Location: eventsettings.php');
 }
}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tbleventsettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Event page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: eventsettings.php');
   } else{
      $_SESSION['status'] = "Failed to update Event page  settings!";
      $_SESSION['type'] = "error";
      header('Location: eventsettings.php');
    }

 }

 }
}



// ************ ---- GALLERY SECTION ---- ************
          
// Query to add event settings into Database : ADMIN
if (isset($_POST['admingallerysettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblgallerysettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Event settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: gallerysettings.php');
} else{
    $_SESSION['status'] = "Failed to save event settings!";
    $_SESSION['type'] = "error";
    header('Location: gallerysettings.php');
}
  }
}
                
// delete gallery action using the $_GET variable : ADMIN
if(isset($_GET['deletegallerysettings'])){
  $id = $_GET['deletegallerysettings'];
  $sql ="DELETE FROM tblgallerysettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Gallery page settings successfully removed";
      $_SESSION['type'] = "success";
      header('Location: gallerysettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove gallery page settings!";
      $_SESSION['type'] = "error";
      header('Location: gallerysettings.php');
  }
}



// ----  UPDATE GALLERY PAGE SETTTINGS

if (isset($_POST['adminupdategallerysettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblgallerysettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Gallery page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: gallerysettings.php');
} else{
   $_SESSION['status'] = "Failed to update gallery page settings!";
   $_SESSION['type'] = "error";
   header('Location: gallerysettings.php');
 }
}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblgallerysettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Gallery page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: gallerysettings.php');
   } else{
      $_SESSION['status'] = "Failed to update gallery page settings!";
      $_SESSION['type'] = "error";
      header('Location: gallerysettings.php');
    }

 }

 }
}



// ************ ---- SHOP SETTINGS SECTION ---- ************
          
// Query to add event settings into Database : ADMIN
if (isset($_POST['adminshopsettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblshopsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Shop settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: shopsettings.php');
} else{
    $_SESSION['status'] = "Failed to save shop settings!";
    $_SESSION['type'] = "error";
    header('Location: shopsettings.php');
}
  }
}
                
// delete gallery action using the $_GET variable : ADMIN
if(isset($_GET['deleteshopsettings'])){
  $id = $_GET['deleteshopsettings'];
  $sql ="DELETE FROM tblshopsettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Shop page settings successfully removed!";
      $_SESSION['type'] = "success";
      header('Location: shopsettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove shop page settings!";
      $_SESSION['type'] = "error";
      header('Location: shopsettings.php');
  }
}



// ----  UPDATE GALLERY PAGE SETTTINGS

if (isset($_POST['adminupdateshopsettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblshopsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Shop page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: shopsettings.php');
} else{
   $_SESSION['status'] = "Failed to update shop page settings!";
   $_SESSION['type'] = "error";
   header('Location: shopsettings.php');
 }
}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblshopsettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Shop page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: shopsettings.php');
   } else{
      $_SESSION['status'] = "Failed to update shop page settings!";
      $_SESSION['type'] = "error";
      header('Location: shopsettings.php');
    }

 }

 }
}




// ************ ---- TEAM SECTION ---- ************
          
// Query to add event settings into Database : ADMIN
if (isset($_POST['adminteamsettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblteamsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Team settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: teamsettings.php');
} else{
    $_SESSION['status'] = "Failed to save team settings!";
    $_SESSION['type'] = "error";
    header('Location: teamsettings.php');
}
  }
}
                
// delete team action using the $_GET variable : ADMIN
if(isset($_GET['deleteteamsettings'])){
  $id = $_GET['deleteteamsettings'];
  $sql ="DELETE FROM tblteamsettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Team page settings successfully removed";
      $_SESSION['type'] = "success";
      header('Location: teamsettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove team page settings!";
      $_SESSION['type'] = "error";
      header('Location: teamsettings.php');
  }
}

// ----  UPDATE TEAM PAGE SETTTINGS

if (isset($_POST['adminupdateteamsettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblteamsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Team page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: teamsettings.php');
} else{
   $_SESSION['status'] = "Failed to update team page settings!";
   $_SESSION['type'] = "error";
   header('Location: teamsettings.php');
 }

}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblteamsettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Team page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: teamsettings.php');
   } else{
      $_SESSION['status'] = "Failed to update team page settings!";
      $_SESSION['type'] = "error";
      header('Location: teamsettings.php');
    }

 }

 }
}


// ************ ---- ABOUT SECTION ---- ************
          
// Query to add event settings into Database : ADMIN
if (isset($_POST['adminaboutsettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblaboutsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Team settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: aboutsettings.php');
} else{
    $_SESSION['status'] = "Failed to save team settings!";
    $_SESSION['type'] = "error";
    header('Location: aboutsettings.php');
}
  }
}
                
// delete team action using the $_GET variable : ADMIN
if(isset($_GET['deleteaboutsettings'])){
  $id = $_GET['deleteaboutsettings'];
  $sql ="DELETE FROM tblaboutsettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "About page settings successfully removed";
      $_SESSION['type'] = "success";
      header('Location: aboutsettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove about page settings!";
      $_SESSION['type'] = "error";
      header('Location: aboutsettings.php');
  }
}


// ----  UPDATE ABOUT PAGE SETTTINGS

if (isset($_POST['adminupdateaboutsettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblaboutsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "About page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: aboutsettings.php');
} else{
   $_SESSION['status'] = "Failed to update about page settings!";
   $_SESSION['type'] = "error";
   header('Location: aboutsettings.php');
 }

}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblaboutsettings SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "About page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: aboutsettings.php');
   } else{
      $_SESSION['status'] = "Failed to update about page settings!";
      $_SESSION['type'] = "error";
      header('Location: aboutsettings.php');
    }

 }

 }
}

// ************ ---- CONTACT SECTION ---- ************
          
// Query to add contact settings into Database : ADMIN
if (isset($_POST['admincontactsettings'])){
  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimage']['name'];
  $bg_image_tempname = $_FILES['bgimage']['tmp_name'];
  
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png");

    $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
    $db_path = "assets/images/".$bg_image; // storing image path into database

    if(in_array($bg_image_type, $extensions_arr)){

  // Insert home string
  $sql = "INSERT INTO tblcontactsettings (bgtext,bgimage)
            VALUES ('$bg_text','$db_path')";
  
      move_uploaded_file($bg_image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Contact settings successfully set!";
    $_SESSION['type'] = "success";
    header('Location: contactsettings.php');
} else{
    $_SESSION['status'] = "Failed to save contact settings!";
    $_SESSION['type'] = "error";
    header('Location: contactsettings.php');
}
  }
}
                
// delete team action using the $_GET variable : ADMIN
if(isset($_GET['deletecontactsettings'])){
  $id = $_GET['deletecontactsettings'];
  $sql ="DELETE FROM tblcontactsettings WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Contact page settings successfully removed";
      $_SESSION['type'] = "success";
   header('Location: contactsettings.php');
  } else{
      $_SESSION['status'] = "Failed to remove homepage settings!";
      $_SESSION['type'] = "error";
   header('Location: contactsettings.php');
  }
}



// ----  UPDATE CONTACT PAGE SETTTINGS

if (isset($_POST['adminupdatecontactsettings'])){

  if (empty($_FILES['bgimagenew']['name'])){

  // capturing input values
  $bg_text = $_POST['bgtext'];
 
  // Insert update string
  $sql = "UPDATE tblcontactsettings SET bgtext = '$bg_text'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Contact page settings successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: contactsettings.php');
} else{
   $_SESSION['status'] = "Failed to update contact page settings!";
   $_SESSION['type'] = "error";
   header('Location: contactsettings.php');
 }

}else{

  // capturing input values
  $bg_text = $_POST['bgtext'];
  $bg_image = $_FILES['bgimagenew']['name'];
  $bg_image_tempname = $_FILES['bgimagenew']['tmp_name'];
 
    // checking image file type
    $bg_image_type = strtolower(pathinfo($bg_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/images/".$bg_image; // storing image path to folder in root directory
   $db_path = "assets/images/".$bg_image; // storing image path into database

   if(in_array($bg_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblcontactsetting SET bgtext = '$bg_text' ,bgimage = '$db_path'";
 
     move_uploaded_file($bg_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Contact page settings successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: contactsettings.php');
   } else{
      $_SESSION['status'] = "Failed to update contact page settings!";
      $_SESSION['type'] = "error";
      header('Location: contactsettings.php');
    }

 }

 }
}


// ************ ---- GALLERY SECTION ADD IMAGES ---- ************

if (isset($_POST['adminimage'])){
  // capturing input values
  $image = $_FILES['image']['name'];
  $image_tempname = $_FILES['image']['tmp_name'];
  $itext = $_POST['itext'];
 
    // checking image file type
    $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/gallery/".$image; // storing image path to folder in root directory
   $db_path = "assets/gallery/".$image; // storing image path into database

   if(in_array($image_type, $extensions_arr)){

  // Insert course string
  $sql = "INSERT INTO tblgallery (imagetext,image)
           VALUES ('$islogan','$itext','$db_path')";
 
     move_uploaded_file($image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Gallery Image successfully added";
   $_SESSION['type'] = "success";
   header('Location: gallery.php');
} else{
   $_SESSION['status'] = "Failed to add gallery image!";
   $_SESSION['type'] = "error";
   header('Location: gallery.php');
}
 }
}

// delete gallery image action using the $_GET variable : ADMIN
if(isset($_GET['deletegalleryimage'])){
  $id = $_GET['deletegalleryimage'];
  $sql ="DELETE FROM tblgallery WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Gallery Image successfully removed";
      $_SESSION['type'] = "success";
      header('Location: gallery.php');
  } else{
      $_SESSION['status'] = "Failed to remove gallery image!";
      $_SESSION['type'] = "error";
      header('Location: gallery.php');
  }
}



// ************ ---- EVENT SECTION ADD IMAGES ---- ************

if (isset($_POST['admineventimage'])){
  // capturing input values
  $image = $_FILES['image']['name'];
  $image_tempname = $_FILES['image']['tmp_name'];
  $itext = $_POST['itext'];
 
    // checking image file type
    $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/event/".$image; // storing image path to folder in root directory
   $db_path = "assets/event/".$image; // storing image path into database

   if(in_array($image_type, $extensions_arr)){

  // Insert course string
  $sql = "INSERT INTO tblevent (imagetext,image)
           VALUES ('$itext','$db_path')";
 
     move_uploaded_file($image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Event Image successfully added";
   $_SESSION['type'] = "success";
   header('Location: event.php');
} else{
   $_SESSION['status'] = "Failed to add event image!";
   $_SESSION['type'] = "error";
   header('Location: event.php');
}
 }
}

// delete event image action using the $_GET variable : ADMIN
if(isset($_GET['deleteeventimage'])){
  $id = $_GET['deleteeventimage'];
  $sql ="DELETE FROM tblevent WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Event Image successfully removed";
      $_SESSION['type'] = "success";
      header('Location: event.php');
  } else{
      $_SESSION['status'] = "Failed to remove event image!";
      $_SESSION['type'] = "error";
      header('Location: event.php');
  }
}

// ************ ---- SHOP SECTION TO ADD PRODUCT IMAGES ---- ************

if (isset($_POST['adminaddproduct'])){
  // capturing input values
  $productname = $_POST['productname'];
  $productprice = $_POST['productprice'];
  $productimage = $_FILES['productimage']['name'];
  $productimage_tempname = $_FILES['productimage']['tmp_name'];
  
    // checking image file type
    $productimage_type = strtolower(pathinfo($productimage, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/shop/". $productimage; // storing image path to folder in root directory
   $db_path = "assets/shop/". $productimage; // storing image path into database

   if(in_array( $productimage_type , $extensions_arr)){

  // Insert course string
  $sql = "INSERT INTO tblshop (productimage,productname,productprice)
           VALUES ('$db_path',' $productname',' $productprice')";
 
     move_uploaded_file( $productimage_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Product successfully added to store";
   $_SESSION['type'] = "success";
   header('Location: shop.php');
} else{
   $_SESSION['status'] = "Failed to add product to store!";
   $_SESSION['type'] = "error";
   header('Location: shop.php');
}
 }
}

// delete product image action using the $_GET variable : ADMIN
if(isset($_GET['deleteproduct'])){
  $id = $_GET['deleteproduct'];
  $sql ="DELETE FROM tblshop WHERE productid = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Product successfully removed from store!";
      $_SESSION['type'] = "success";
      header('Location: shop.php');
  } else{
      $_SESSION['status'] = "Failed to remove product from store!";
      $_SESSION['type'] = "error";
      header('Location: shop.php');
  }
}


// ----  UPDATE SHOP PRODUCTS

if (isset($_POST['adminupdateproduct'])){

  if (empty($_FILES['productimagenew']['name'])){

  // capturing input values
  $updateid = $_POST['updateid'];
  $productname = $_POST['productname'];
  $productprice = $_POST['productprice'];

  // Insert update string
  $sql = "UPDATE tblshop SET productname = '$productname', productprice = ' $productprice'
  WHERE productid = '$updateid'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Product successfully updated in store!";
   $_SESSION['type'] = "success";
   header('Location: shop.php');
} else{
   $_SESSION['status'] = "Failed to update product in store!";
   $_SESSION['type'] = "error";
   header('Location: shop.php');
 }

}else{

  // capturing input values
  $updateid = $_POST['updateid'];
  $productname = $_POST['productname'];
  $productprice = $_POST['productprice'];
  $productimage = $_FILES['productimagenew']['name'];
  $productimage_tempname = $_FILES['productimagenew']['tmp_name'];
  
    // checking image file type
    $productimage_type = strtolower(pathinfo($productimage, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/shop/". $productimage; // storing image path to folder in root directory
   $db_path = "assets/shop/". $productimage; // storing image path into database

   if(in_array( $productimage_type , $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblshop SET productimage = '$db_path', productname = '$productname',
   productprice = ' $productprice' WHERE productid = '$updateid'";
 
     move_uploaded_file($profile_image_tempname , $root_path);

    if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Product successfully updated in store!";
   $_SESSION['type'] = "success";
   header('Location: shop.php');
} else{
   $_SESSION['status'] = "Failed to update product in store!";
   $_SESSION['type'] = "error";
   header('Location: shop.php');
 }


 }

 }
}


// **************** ADMIN ADD MEMBER SECTION ************************

if (isset($_POST['adminaddmember'])){
  // capturing input values
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $image = $_FILES['profile']['name'];
  $image_tempname = $_FILES['profile']['tmp_name'];
  $position = $_POST['position'];
  
    // checking image file type
    $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/members/".$image; // storing image path to folder in root directory
   $db_path = "assets/members/".$image; // storing image path into database

   if(in_array($image_type, $extensions_arr)){

  // Insert course string
  $sql = "INSERT INTO tblteam (fname,lname,profile,position)
           VALUES ('$fname','$lname','$db_path','$position')";
 
     move_uploaded_file($image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Member successfully added";
   $_SESSION['type'] = "success";
   header('Location: team.php');
} else{
   $_SESSION['status'] = "Failed to add member!";
   $_SESSION['type'] = "error";
   header('Location: team.php');
}
 }
}

// delete member details action using the $_GET variable : ADMIN
if(isset($_GET['deletemember'])){
  $id = $_GET['deletemember'];
  $sql ="DELETE FROM tblmember WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Member successfully removed";
      $_SESSION['type'] = "success";
       header('Location: team.php');
  } else{
      $_SESSION['status'] = "Failed to remove member!";
      $_SESSION['type'] = "error";
       header('Location: team.php');
  }
}


// ----  UPDATE MEMBER SECTION 

if (isset($_POST['adminupdatemember'])){

  if (empty($_FILES['profilenew']['name'])){

  // capturing input values
  $updateid = $_POST['updateid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $position = $_POST['position'];

  // Insert update string
  $sql = "UPDATE tblteam SET fname = '$fname', lname = '$lname', position = '$position' 
  WHERE id = '$updateid'";

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Member details successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: team.php');
} else{
   $_SESSION['status'] = "Failed to update member details!";
   $_SESSION['type'] = "error";
   header('Location: team.php');
 }

}else{

  // capturing input values
  $updateid = $_POST['updateid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $position = $_POST['position'];
  $profile_image = $_FILES['profilenew']['name'];
  $profile_image_tempname = $_FILES['profilenew']['tmp_name'];
 
    // checking image file type
    $profile_image_type = strtolower(pathinfo(  $profile_image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/members/".$profile_image; // storing image path to folder in root directory
   $db_path = "assets/members/".$profile_image; // storing image path into database

   if(in_array($profile_image_type, $extensions_arr)){

  // Insert course string
  $sql = "UPDATE tblteam SET fname = '$fname', lname = '$lname', 
                          profile = '$db_path', position = '$position' WHERE id = '$updateid'";
 
     move_uploaded_file($profile_image_tempname , $root_path);

     if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Member details successfully updated!";
      $_SESSION['type'] = "success";
      header('Location: team.php');
   } else{
      $_SESSION['status'] = "Failed to update member details!";
      $_SESSION['type'] = "error";
      header('Location: team.php');
    }

 }

 }
}


// ************* ABOUT SECTION *********************


if (isset($_POST['adminabout'])){
  // capturing input values
  $title = $_POST['title'];
  $text = $_POST['text'];
 
  // Insert about string
  $sql = "INSERT INTO tblabout (title,about) VALUES ('$title','$text')";


  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "About details successfully added";
   $_SESSION['type'] = "success";
   header('Location: about.php');
} else{
   $_SESSION['status'] = "Failed to add about details!";
   $_SESSION['type'] = "error";
   header('Location: about.php');
  }

}

// delete about action using the $_GET variable : ADMIN
if(isset($_GET['deleteabout'])){
  $id = $_GET['deleteabout'];
  $sql ="DELETE FROM tblabout WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "About details successfully removed";
      $_SESSION['type'] = "success";
      header('Location: about.php');
  } else{
      $_SESSION['status'] = "Failed to remove about details!";
      $_SESSION['type'] = "error";
      header('Location: about.php');
  }
}


// ---- UPDATE  ABOUT INFO DETAILS
if (isset($_POST['adminupdateabout'])){
  // capturing input values
  $title = $_POST['title'];
  $text = $_POST['text'];
 
  // Insert about string
  $sql = "UPDATE tblabout SET title = '$title' ,about = '$text'";
 
  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "About details successfully updated!";
   $_SESSION['type'] = "success";
   header('Location: about.php');
} else{
   $_SESSION['status'] = "Failed to update about details!";
   $_SESSION['type'] = "error";
   header('Location: about.php');
  }

}

// ************* CONTACT SECTION *********************


// Query to add contact into Database : ADMIN
if (isset($_POST['admincontact'])){
$email= $_POST['email'];
$address = $_POST['address'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];


// Insert contact string
$sql = "INSERT INTO tblcontact (email,address,phone1, phone2)
VALUES ('$email','$address','$phone1','$phone2')";


if (mysqli_query($conn, $sql)) {
$_SESSION['status'] = "Contact details successfully added";
$_SESSION['type'] = "success";
header('Location: contact.php');
} else{
$_SESSION['status'] = "Failed to add contact details!";
$_SESSION['type'] = "error";
header('Location: contact.php');
}

}

// delete contact action using the $_GET variable : ADMIN
if(isset($_GET['deletecontact'])){
$id = $_GET['deletecontact'];
$sql ="DELETE FROM tblcontact WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
$_SESSION['status'] = "Contact successfully removed";
$_SESSION['type'] = "success";
header('Location: contact.php');
} else{
$_SESSION['status'] = "Failed to remove contact!";
$_SESSION['type'] = "error";
header('Location: contact.php');
}
}

// Query to update contact into Database : ADMIN
if (isset($_POST['adminupdatecontact'])){
  $email= $_POST['email'];
  $address = $_POST['address'];
  $phone1 = $_POST['phone1'];
  $phone2 = $_POST['phone2'];
  
  
  // Insert contact string
  $sql = "UPDATE tblcontact SET email = '$email' ,address = '$address'
  ,phone1 = '$phone1', phone2 = '$phone2'";
  
  
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Contact details successfully updated";
  $_SESSION['type'] = "success";
  header('Location: contact.php');
  } else{
  $_SESSION['status'] = "Failed to update contact details!";
  $_SESSION['type'] = "error";
  header('Location: contact.php');
  }
  
  }

// ************* ADMIN ADD AWARD NOMINATION CATEGORY SECTION *********************


// Query to add nomination category into Database : ADMIN
if (isset($_POST['adminsetcategory'])){
  $category = mysqli_escape_string ($conn, $_POST['category']);
 
 
  // Insert nomination string
  $sql = "INSERT INTO tblawardcategory (catname) VALUES ('$category')";
   
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Award category successfully set!";
  $_SESSION['type'] = "success";
  header('Location: tcawardcategory.php');
  } else{
  $_SESSION['status'] = "Failed to add award category!";
  $_SESSION['type'] = "error";
  header('Location: tcawardcategory.php');
  }
  
  }
  
  // delete nomination category action using the $_GET variable : ADMIN
  if(isset($_GET['deletecategory'])){
  $id = $_GET['deletecategory'];
  $sql ="DELETE FROM tblawardcategory WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Award category successfully removed";
  $_SESSION['type'] = "success";
  header('Location: tcawardcategory.php');
  } else{
  $_SESSION['status'] = "Failed to remove award category!";
  $_SESSION['type'] = "error";
  header('Location: tcawardcategory.php');
  }
  }

// Query to update nomination category into Database : ADMIN
if (isset($_POST['adminupdatecategory'])){
  $updateid = $_POST['updateid'];
  $category = mysqli_escape_string ($conn, $_POST['category']);
 
 
  // Insert nomination string
  $sql = "UPDATE tblawardcategory SET catname = '$category' WHERE awardid = '$updateid'";
   
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Award category successfully updated!";
  $_SESSION['type'] = "success";
  header('Location: tcawardcategory.php');
  } else{
  $_SESSION['status'] = "Failed to update award category!";
  $_SESSION['type'] = "error";
  header('Location: tcawardcategory.php');
  }
  
  }

// ************* SUMBIT NOMINATION SECTION FROM VISTTOR TO ADMIN *********************


// Query to add nomination into Database : ADMIN
if (isset($_POST['submitnomination'])){
  $nameofnominee = mysqli_escape_string ($conn, $_POST['nameofnominee']);
  $category = mysqli_escape_string ($conn, $_POST['category']);
  $nominationattest = mysqli_escape_string ($conn, $_POST['nominationattest']);
 
  
  // Insert nomination string
  $sql = "INSERT INTO tblnominations (nameofnominee,category,attesttation)
  VALUES ('$nameofnominee','$category','$nominationattest')";
  
  
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Nomination successfully submitted!";
  $_SESSION['type'] = "success";
  header('Location: ../events.php');
  } else{
  $_SESSION['status'] = "Failed to submit nomination!";
  $_SESSION['type'] = "error";
  header('Location: ../events.php');
  }
  
  }
  
  // delete nomination action using the $_GET variable : ADMIN
  if(isset($_GET['deletevisitornomination'])){
  $id = $_GET['deletevisitornomination'];
  $sql ="DELETE FROM tblnominations WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Nomination successfully removed";
  $_SESSION['type'] = "success";
  header('Location: nominations.php');
  } else{
  $_SESSION['status'] = "Failed to remove nomination!";
  $_SESSION['type'] = "error";
  header('Location: nominations.php');
  }
  }


  
// ************* SUMBIT MESSAGE FROM VISITOR TO ADMIN IN DASHBOARD SECTION *********************


// Query to add message into Database : ADMIN
if (isset($_POST['sendmessage'])){
  $name = mysqli_escape_string ($conn, $_POST['name']);
  $phone = mysqli_escape_string ($conn, $_POST['phone']);
  $message = mysqli_escape_string ($conn, $_POST['message']);
 
  
  // Insert nomination string
  $sql = "INSERT INTO tblincomingmsg (name,phone,message)
  VALUES ('$name','$phone','$message')";
  
  
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Message successfully sent!";
  $_SESSION['type'] = "success";
  header('Location: ../contact.php');
  } else{
  $_SESSION['status'] = "Failed to submit nomination!";
  $_SESSION['type'] = "error";
  header('Location: ../contact.php');
  }
  
  }
  
  // delete visitor action using the $_GET variable : ADMIN
  if(isset($_GET['deletemessage'])){
  $id = $_GET['deletemessage'];
  $sql ="DELETE FROM tblincomingmsg WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Message successfully removed";
  $_SESSION['type'] = "success";
  header('Location: incoming-msg.php');
  } else{
  $_SESSION['status'] = "Failed to remove message!";
  $_SESSION['type'] = "error";
   header('Location: incoming-msg.php');
  }
  }


    
// ************* SUMBIT ORDER FROM VISITOR TO ADMIN IN DASHBOARD SECTION *********************


// Query to add order into Database : ADMIN
if (isset($_POST['submitorder'])){
  $nameofproduct = mysqli_escape_string ($conn, $_POST['nameofproduct']);
  $productquantity = mysqli_escape_string ($conn, $_POST['quantity']);
  $phone = mysqli_escape_string ($conn, $_POST['phone']);
  $name = mysqli_escape_string ($conn, $_POST['name']);
  
 
  // Insert nomination string
  $sql = "INSERT INTO tblshoporder (nameofproduct,quantity,phone,name)
  VALUES ('$nameofproduct','$productquantity','$phone','$name')";
  
  
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Order successfully placed!";
  $_SESSION['type'] = "success";
  header('Location: ../shop');
  } else{
  $_SESSION['status'] = "Failed to place in order!";
  $_SESSION['type'] = "error";
  header('Location: ../shop');
  }
  
  }
  
  // delete visitor action using the $_GET variable : ADMIN
  if(isset($_GET['deleteorder'])){
  $id = $_GET['deleteorder'];
  $sql ="DELETE FROM tblshoporder WHERE orderid = '$id'";
  if (mysqli_query($conn, $sql)) {
  $_SESSION['status'] = "Order successfully removed";
  $_SESSION['type'] = "success";
 header('Location: shoporder');
  } else{
  $_SESSION['status'] = "Failed to remove order!";
  $_SESSION['type'] = "error";
  header('Location: shoporder');
  }
  }

  
// **************** ADD PRIVATE TCA NOMINEE SECTION ************************

if (isset($_POST['adminsetnomination'])){
  // capturing input values
  $nameofnominee = $_POST['nameofnominee'];
  $image = $_FILES['profile']['name'];
  $image_tempname = $_FILES['profile']['tmp_name'];
  $catname = $_POST['category'];
  
    // checking image file type
    $image_type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    // valid file extensions
   $extensions_arr = array("jpg","jpeg","png");

   $root_path = "../assets/privatenominations/".$image; // storing image path to folder in root directory
   $db_path = "assets/privatenominations/".$image; // storing image path into database

   if(in_array($image_type, $extensions_arr)){

  // Insert course string
  $sql = "INSERT INTO tblprivatenominations (nameofnominee,profile,catnameid)
           VALUES ('$nameofnominee','$db_path','$catname')";
 
     move_uploaded_file($image_tempname , $root_path);

  if (mysqli_query($conn, $sql)) {
   $_SESSION['status'] = "Award nominations successfully set!";
   $_SESSION['type'] = "success";
   header('Location: tcawards.php');
} else{
   $_SESSION['status'] = "Failed to add nominee!";
   $_SESSION['type'] = "error";
   header('Location: tcawards.php');
}
 }
}

// delete member details action using the $_GET variable : ADMIN
if(isset($_GET['deletenominee'])){
  $id = $_GET['deletenominee'];
  $sql ="DELETE FROM tblprivatenominations WHERE nomineeid = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Nominee successfully removed";
      $_SESSION['type'] = "success";
      header('Location: tcawards.php');
  } else{
      $_SESSION['status'] = "Failed to remove nominee!";
      $_SESSION['type'] = "error";
      header('Location: tcawards.php');
  }
}

// make nominations public action button using the $_GET variable : ADMIN
if(isset($_GET['makepublic'])){
  $id = $_GET['makepublic'];
  $sql ="INSERT INTO tblpublicnominations SELECT * FROM tblprivatenominations WHERE nomineeid = '$id'";
  if (mysqli_query($conn, $sql)) {
      $_SESSION['status'] = "Nomination successfully made public!";
      $_SESSION['type'] = "success";
      header('Location: tcawards.php');
  } else{
      $_SESSION['status'] = "Failed to make nomination public!";
      $_SESSION['type'] = "error";
      header('Location: tcawards.php');
  }
}
?>