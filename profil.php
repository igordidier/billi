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
                  <td>  <?php echo "$_SESSION[bio] " ?>   </td>
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
