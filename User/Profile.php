<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location:../LoginUser.php");
    }
    $pic = $_SESSION['pic_user'];
    $fname = $_SESSION['f_name'];
    $lname = $_SESSION['l_name'];
    $id = $_SESSION['id_user'];
    require('query.php');
    $con = new query();
    $user = $con->load_user($id);
    $data = $user->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include('Head.php'); ?>
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
                            <h2><?= $fname; ?> <?= $lname; ?></h2>
                            <p class="text-card">ชื่อผู้ใช้: <?= $data['name_user'] ?><br/>
                                อายุ: <?= $data['age'] ?><br/>
                                เบอร์: <?= $data['phone_wallet'] ?><br/>
                                เวลาที่สมัครบัญชีนี้ครั้งแรก: <?= $data['time_user'] ?><br/>
                                ที่อยู่: <?= $data['detail_user'] ?>
                            </p>
                            <div class="btn-group">
                                <a href="EditUser.php" class="btn btn-warning">แก้ไขโปรไฟล์</a>
                                <a href="History.php" class="btn btn-info">ประวัติการซื้อเกม</a>
                            </div>
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