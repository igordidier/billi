<?php
  session_start();

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

  <h1><?php echo ucfirst("$_SESSION[name]"); ?></h1>

<h2>Information du compte:</h2>
<br>
<p>Email: <?php echo "$_SESSION[email]"; ?></p>
<br>

<p>Nom: <?php echo "$_SESSION[last]"; ?></p>
<br>

<p>Prenom: <?php echo "$_SESSION[name]"; ?></p>


</body>
</html>
