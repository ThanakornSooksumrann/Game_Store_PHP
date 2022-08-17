<?php
  session_start();
  $id = $_SESSION['id_admin'];
  $fadmin = $_SESSION['f_admin'];
  $ladmin = $_SESSION['l_admin'];
  $pic = $_SESSION['pic_admin'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><font><h2>KUMPAD</h2></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><h4>Home</h4><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DataGame.php"><h4>Game</h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Show.php"><h4>History</h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DataUser.php"><h4>User</h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DataAdmin.php"><h4>Admin</h4></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-danger" href="Logout.php"><h4>Logout</h4></a>
      </li>
    </ul>
  </div>
</nav>