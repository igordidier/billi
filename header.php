
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

    <form action="search.php" method="get">
    <center><h3>Search Database</h3></center>
    <center><table>
    <tr>
    	<td>Search</td>
    	<td><input type="text" name="srch" size="100"></td>
    	<td><input type="submit" name="submit"></td>
    </tr>
    </table></center>
    </form>

    <form action="search.php"class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search"  name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn">Search</button>
    </form>
    <li class="nav-item active">
      <?php    echo '<a class="nav-link" href="logout.php">log out</a>';
      echo '<a class="nav-link" href="profil.php">'.  ucfirst($_SESSION["username"]) . '</a>';
      ?>
    </li>
  </div>
</nav>
</div>
