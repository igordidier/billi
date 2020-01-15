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

<div class="searchcontainer">


  <?php
if($_REQUEST['submit']){
  $search = $_GET['search'];
  $sql = "SELECT username, email, name, last FROM users WHERE username LIKE '%$search%' ";
      $result = mysqli_query($db, $sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              echo "Username: " . $row["username"]. " - Name: " . $row["name"]. " Last Name  " . $row["last"]. "<br>";
                }
      } else {
          echo "No results for $search";
            }
}
 ?>

</div>

</body>
</html>
