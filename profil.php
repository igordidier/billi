<?php
 include('server.php') ;

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Idea Page</title>
	<link rel="stylesheet" type="text/css" href="index.css">
  <?php include "boot.html"; ?>
</head>
<body>
  <?php include "header.php"; ?>

<?php
  if (isset($_POST['save_profile'])) {
     // for the database
     $bio = stripslashes($_POST['bio']);
     $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
     // For image upload
     $target_dir = "images/";
     $target_file = $target_dir . basename($profileImageName);
     // VALIDATION
     // validate image size. Size is calculated in Bytes
     if($_FILES['profileImage']['size'] > 200000) {
       $msg = "Image size should not be greated than 200Kb";
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
         $sql = "INSERT INTO users SET profile_image='$profileImageName', bio='$bio'";
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


  <div class="container">
      <div class="row">
        <div class="col-4 offset-md-4" style="margin-top: 30px;">
          <a href="form.php" class="btn btn-success">Update Profile</a>
          <br>
          <br>
          <table class="table table-bordered">
            <thead>
              <th>Image</th>
              <th>Bio</th>
            </thead>
            <tbody>

                <tr>
                  <td> <img style="margin:auto;display:flex;" src="ppimg/<?php echo "$_SESSION[profile_image] " ?>" width="200" height="200" /> </td>
                </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>


<!-- <h1><?php echo ucfirst("$_SESSION[username]"); ?></h1>
  <h2>Information du compte:</h2>

<br>
<p>Email: <?php echo "$_SESSION[email]"; ?></p>
<br>

<p>Nom: <?php echo "$_SESSION[last]"; ?></p>
<br>

<p>Prenom: <?php echo "$_SESSION[name]"; ?></p> -->


</body>
</html>
