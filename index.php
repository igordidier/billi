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
  <div class="header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Billi</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Idea</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <li class="nav-item active">
        <?php    echo '<a class="nav-link" href="logout.php">log out</a>';
        echo '<a class="nav-link" href="profil.php">'.  ucfirst($_SESSION["username"]) . '</a>';
        ?>
      </li>
    </div>
  </nav>
</div>


  	 <!-- notification message -->


    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>

    <?php endif ?>


<?php
if($_POST) {
    $title = $_POST['title'];
    $content = $_POST['commentContent'];
    $date = $_POST['date'];
    $handle = fopen("comments.html","a");
    fwrite($handle,"<div class=idea><div class=tittle>" . $title . "</div><div class=date>" . $date . "</div><div class=para>" . $content . "</div></div>");
    fclose($handle);

}
$db = mysqli_connect('localhost', 'root', '', 'billi');
if ($_POST) {
  $querycom = "INSERT INTO idea (title, comment, date)
        VALUES('$title', '$content', '$date')";
  mysqli_query($db, $querycom);
}




?>

      <h1 style="text-align:center;"><?php echo ucfirst($_SESSION["username"]); ?> Idea's Page</h1>
        <form action = "" method = "POST">
        Title: <input type = "text" name = "title" required><br/><br>
        Idea: <textarea rows = "10" cols = "30" name = "commentContent" required></textarea><br/><br>
        Date: <input type="date" name="date" value="">
        <input type = "submit" value = "Post"><br/>

        </form>
        <hr>
Sort:
      <button class="sortbtn" onclick="myFunction()">Old To New</button>
      <button class="sortbtn" onclick="sort()">New To Old</button>

        <script>
function myFunction() {
  document.getElementById("column").style.WebkitFlexDirection = "column"; //
}
function sort(){
  document.getElementById("column").style.WebkitFlexDirection = "column-reverse";
}
</script>



        <div id="column">
          <?php include "comments.html"; ?>
        </div>


</body>
</html>
