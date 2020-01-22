<?php
  include('server.php');

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

<div class="main_collum">

  <form class="post_form" action="billi.php" method="post">

    <textarea name="post_text" rows="8" cols="80" placeholder="Quick word?"></textarea>
    <input type="submit" name="post_button" value="Post">
    <hr>

  </form>

</div>

  </body>
</html>
