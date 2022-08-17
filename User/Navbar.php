<?php
  session_start();
  $pic = $_SESSION['pic_user'];
  $fname = $_SESSION['f_name'];
  $lname = $_SESSION['l_name'];
  $id = $_SESSION['id_user'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Welcome.php"><font><h2>KUMPAD</h2></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php"><h5>หน้าสินค้า</h5><span class="sr-only">(current)</span></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <form method="get" id="form"  enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2"  placeholder="ค้นหา" type="text" name="search" size="40" value="">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">ค้นหา</button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="Profile.php"><h4><?= $fname.' '.$lname; ?></h4></a>
        </li>
        <li class="nav-item ">
          <img class="rounded-circle" width="45px" height="50"  src="../uploads/<?= $pic ?>" >
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="Logout.php"><h4>Logout</h4></a>
        </li>
    </ul>
    </ul>
  </div>
</nav>