<?php
    require('query.php');
    $add_user = new query();
    if(isset($_REQUEST['add'])){
        if($_POST['user_pass'] == $_POST['user_pass_true']){
            $sql = $add_user->add_user($_FILES['pic_user'], $_POST['name_user'], $_POST['user_pass'], $_POST['phone_wallet'], $_POST['pass_wallet'], $_POST['f_name'], $_POST['l_name'], $_POST['detail_user'], $_POST['age']);
            if($sql){
                echo "<script>alert('$sql')
                window.location.href='LoginUser.php';
                </script>";
            } else {
                echo "<script>alert('สมัครไม่สำเร็จ')</script>";
            }
        }
        else {
            echo "<script>alert('รหัสผ่านไม่ตรงกัน')</script>";
        }
    }
?>
<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('Navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
                <div class="col-sm-12">
                    <div class="container">
                        <div class="card-deck mt-5 mb-5">
                        <div class="card bg-light">
                        <div class="card-body text-dark">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <h1><b><span class="badge badge-warning text-dark">สมัคร</span></b></h1>
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-6 mb-3 form-group">
                                <label for="f_name"><b>ชื่อจริง:</b></label>
                                <input type="text" class="form-control" id="f_name" placeholder="กรุณาใส่ชื่อจริง" name="f_name" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="l_name"><b>นามสกุล:</b></label>
                                <input type="text" class="form-control" id="l_name" placeholder="กรุณาใส่นามสกุล" name="l_name" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="age"><b>อายุ:</b></label>
                                <input type="number" class="form-control" id="age" placeholder="กรุณาใส่อายุ" name="age" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="phone_wallet"><b>เบอร์ Wallet:</b></label>
                                <input type="text" class="form-control" id="phone_wallet" placeholder="กรุณาใส่เบอร์ Wallet" name="phone_wallet" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="pass_wallet"><b>รหัส Wallet:</b></label>
                                <input type="text" class="form-control" id="pass_wallet" placeholder="กรุณาใส่รหัส Wallet" name="pass_wallet" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="name_user"><b>ชื่อผู้ใช้:</b></label>
                                <input type="text" class="form-control" id="name_user" placeholder="กรุณาใส่ชื่อผู้ใช้" name="name_user" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="user_pass"><b>รหัสผู้ใช้:</b></label>
                                <input type="text" class="form-control" id="user_pass" placeholder="กรุณาใส่รหัสผู้ใช้" name="user_pass" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="user_pass_true"><b>ยืนยันรหัสผ่าน:</b></label>
                                <input type="text" class="form-control" id="user_pass_true" placeholder="กรุณาใส่รหัสผู้ใช้อีกครั้ง" name="user_pass_true" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="detail_user"><b>ที่อยู่:</b></label>
                                <textarea type="text" class="form-control" id="detail_user" placeholder="กรุณาใส่ที่อยู่" name="detail_user" rows="5" required></textarea>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="pic_user"><b>อัปโหลดรูปโปรไฟล์</b></label>
                                <input type="file" id="pic_user" value="empty.png" name="pic_user" class="form-control-file border">
                            </div>
                            <div class="col-6 d-flex justify-content">
                                <div class="btn-group">
                                    <button type="submit" name="add" class="btn btn-success">เพิ่มผู้ใช้</button>
                                    <button type="reset" class="btn btn-danger">ลบทั้งหมด</button>
                                    <A href="LoginUser.php" class="btn btn-warning">ยกเลิก</A>
                                </div>
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
    <?php include('Foot.php'); ?>
    </body>
</html>