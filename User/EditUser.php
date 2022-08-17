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
<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('NavbarNo.php'); ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
                    <div class="container">
                        <div class="card-deck mt-5 mb-5">
                        <div class="card bg-light">
                        <div class="card-body text-dark">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <h1><b><span class="badge badge-warning text-dark">แก้ไขข้อมูลผู้ใช้</span></b></h1>
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-12 mb-3 form-group">
                                <img src="../uploads/<?= $data['pic_user'];?>" width="300" class="img-thumbnail" alt="Cinque Terre?">
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="f_name"><b>ชื่อจริง:</b></label>
                                <input type="text" class="form-control" value="<?= $data['f_name']; ?>" id="f_name" placeholder="กรุณาใส่ชื่อจริง" name="f_name" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="l_name"><b>นามสกุล:</b></label>
                                <input type="text" class="form-control" value="<?= $data['l_name']; ?>" id="l_name" placeholder="กรุณาใส่นามสกุล" name="l_name" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="age"><b>อายุ:</b></label>
                                <input type="number" class="form-control" value="<?= $data['age']; ?>" id="age" placeholder="กรุณาใส่อายุ" name="age" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="detail_user"><b>ที่อยู่:</b></label>
                                <textarea type="text" class="form-control" id="detail_user" placeholder="กรุณาใส่ที่อยู่" name="detail_user" rows="5" required><?= $data['detail_user']; ?></textarea>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="phone_wallet"><b>เบอร์ Wallet:</b></label>
                                <input type="text" class="form-control" value="<?= $data['phone_wallet']; ?>" id="phone_wallet" placeholder="กรุณาใส่เบอร์ Wallet" name="phone_wallet" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="pass_wallet"><b>รหัส Wallet:</b></label>
                                <input type="text" class="form-control" value="<?= $data['pass_wallet']; ?>" id="pass_wallet" placeholder="กรุณาใส่รหัส Wallet" name="pass_wallet" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="name_user"><b>ชื่อผู้ใช้:</b></label>
                                <input type="text" class="form-control" value="<?= $data['name_user']; ?>" id="name_user" placeholder="กรุณาใส่ชื่อผู้ใช้" name="name_user" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="user_pass"><b>รหัสผู้ใช้:</b></label>
                                <input type="text" class="form-control" value="<?= $data['user_pass']; ?>" id="user_pass" placeholder="กรุณาใส่รหัสผู้ใช้" name="user_pass" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="user_pass_true"><b>ยืนยันรหัสผ่าน:</b></label>
                                <input type="text" class="form-control" value="<?= $data['user_pass']; ?>" id="user_pass_true" placeholder="กรุณาใส่รหัสผู้ใช้อีกครั้ง" name="user_pass_true" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="pic_user"><b>อัปโหลดรูปโปรไฟล์</b></label>
                                <input type="file" id="pic_user" value="empty.jpg" name="pic_user" class="form-control-file border">
                            </div>
                            <div class="col-6 d-flex justify-content">
                                <div class="btn-group">
                                    <button type="submit" name="update" class="btn btn-success">แก้ไขข้อมูล</button>
                                    <a class="btn btn-warning" href="Profile.php">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </form>
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

<?php
    if(isset($_POST['update'])){
        if($_POST['admin_pass'] == $_POST['admin_pass_true']){
            $pic_user = "";
            if($_FILES['pic_user']['name']){
                $pic_user = $_FILES['pic_user'];
            } else {
                $pic_user = $data['pic_user'];
            }

            $update=$con->update_user($data['id_user'], $pic_user, $_POST['name_user'], $_POST['user_pass'], $_POST['phone_wallet'], $_POST['pass_wallet'], $_POST['f_name'], $_POST['l_name'], $_POST['detail_user'], $_POST['age']);
            if($update){
                echo "<script>
                    alert('แก้ไขข้อมูลสำเร็จ');
                    window.location.href='Profile.php';
                </script>";
            } else {
                echo "<script>
                    alert('แก้ไขข้อมูลไม่สำเร็จ');
                    window.location.href='Profile.php';
                </script>";
            }
        }
        else {
            echo "<script>alert('รหัสผ่านไม่ตรงกัน')</script>";
        }
    }
?>