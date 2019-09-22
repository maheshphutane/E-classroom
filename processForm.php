<?php
  $msg = "";
  $msg_class = "";
require('include/nav_admin.php');
     
          if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
  
 require('include/db.php');

  if (isset($_POST['save_profile'])) {
    
    // for the database
    

    
    $bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "images/";
    $filepath = "images/" . $_FILES["profileImage"]["name"];
  
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 1000000) {
      $msg = "Image size should not be greated than 1000Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET profile_image='$profileImageName', bio='$bio' where id='".$_SESSION['user']['id']."'";
      
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
       
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>