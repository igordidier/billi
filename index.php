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
