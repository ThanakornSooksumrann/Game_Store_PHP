<?php session_start();
    if(!isset($_SESSION['id_admin'])){
        header("location:../LoginAdmin.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
<body>
    <?php include('Navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 mb-5" >
                <div class="container">
                <div class="card-deck">
                    <div class="card bg-dark">
                        <div class="card-body text-light text-center">
                            <img src="../uploads/<?= $pic; ?>" class="img-thumbnail mt-3" width="270px" alt="Cinque Terre"><br/>
                            <h1 class="mt-3"><font>WELCOME ADMIN WEB</font></h1>
                            <h2><?= $fadmin.' '.$ladmin ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include('Foot.php'); ?>
</body>
</html>