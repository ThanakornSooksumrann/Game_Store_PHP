<!DOCTYPE html>
<html lang="en">
<?php 
    include('Head.php'); 
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location:../LoginUser.php");
    }?>
<?php include('Font.php'); ?>
<body>
    <?php include('NavbarNo.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 mb-5" >
                <div class="container">
                <div class="card-deck">
                    <div class="card bg-dark">
                        <div class="card-body text-light text-center">
                            <img src="../uploads/<?= $pic; ?>" class="img-thumbnail mt-3" width="270px" alt="Cinque Terre"><br/>
                            <h1 class="mt-3"><font>WELCOME TO KUMPAD</font></h1><br/>
                            <h2><?= $fname; ?> <?= $lname; ?></h2>
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