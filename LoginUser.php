<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        header("location:Admin/index.php");
    }
    if(isset($_SESSION['id_Admin'])){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
<body>
    <?php include('Navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                <div class="card-deck">
                    <div class="card bg-dark">
                        <div class="card-body text-light">
                        <h1 class="card-text">Login</h1>
                        <form action="ch_login_user.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่อผู้ใช้</label>
                            <input type="text" name="name_user" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">รหัสผ่าน</label>
                            <input type="password" name="user_pass" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">ลงชื่อเข้าใช้</button>
                            <a href="RegisterUser.php" class="btn btn-primary">สมัคร</a>
                        </div>
                        </form>
                        <p class="card-text">อยากกินข้าวไข่เจียว.....</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('Foot.php'); ?>
</body>
</html>