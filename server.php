<?php
session_start();

// initializing variables
 $username = "";
 $email    = "";
 $name     = "";
 $last     ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'billi');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
echo "";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $last = mysqli_real_escape_string($db, $_POST['last']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
   if (empty($username)) { array_push($errors, "Username is required"); }
   if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($name)) { array_push($errors, "name is required"); }
   if (empty($last)) { array_push($errors, "last is required"); }
   if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $results = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($results);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    	$password = md5($password_1);//encrypt the password before saving in the database

    	$query = "INSERT INTO users (username, email, password, name , last)
    			  VALUES('$username', '$email', '$password', '$name', '$last')";
    	mysqli_query($db, $query);
    	$_SESSION['username'] = $username;
      $_SESSION['name'] = $name;
      $_SESSION['last'] = $last;
      $_SESSION['email'] = $email;
    	$_SESSION['success'] = "You are now logged in";
    	header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);



   if (empty($username)) {
   	array_push($errors, "Username is required");
  }
   if (empty($password)) {
   	array_push($errors, "Password is required");
   }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
  	$results = mysqli_query($db, $query);
    $ligne = $results->fetch_assoc();
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['last'] = $ligne['last'];
      $_SESSION['name'] = $ligne['name'];
      $_SESSION['email'] = $ligne['email'];
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//search engin

if (isset($_POST['search'])) {
  $sql = "SELECT username, email, name, last FROM users";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          echo "Username: " . $row["username"]. " - Name: " . $row["name"]. " " . $row["last"]. "<br>";
      }
  } else {
      echo "0 results";
  }
}


// $querycom = "INSERT INTO idea (title, comment, date)
//       VALUES('$title', '$content', '$date')";
// mysqli_query($db, $querycom);

?>
