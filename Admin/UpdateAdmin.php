<?php
    require('query.php');
    $con = new query();
    $admin = $con->load_admin($_GET['id_admin']);
    $data = $admin->fetch_assoc();
?>
<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('NavbarAdmin.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="col-12">
                <br/><br/>
                    <div class="row">
                        <div class="list-group col-12 mt-5">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                            ผู้ดูเเลเว็บ
                        </a>
                        <a href="DataAdmin.php" class="list-group-item list-group-item-action">ผู้ดูเเลเว็บทั้งหมด</a>
                        <a href="InsertAdmin.php" class="list-group-item list-group-item-action">เพิ่มผู้ดูเเลเว็บ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <h1><b><span class="badge badge-warning text-dark">แก้ไขข้อมูลผู้ดูแลเว็บ</span></b></h1>
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-12 mb-3 form-group">
                                <img src="../uploads/<?= $data['pic_admin'];?>" width="300" class="img-thumbnail" alt="Cinque Terre?">
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="f_admin"><b>ชื่อจริง:</b></label>
                                <input type="text" class="form-control" value="<?= $data['f_admin']; ?>" id="f_admin" placeholder="กรุณาใส่ชื่อจริง" name="f_admin" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="l_admin"><b>นามสกุล:</b></label>
                                <input type="text" class="form-control" value="<?= $data['l_admin']; ?>" id="l_admin" placeholder="กรุณาใส่นามสกุล" name="l_admin" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="phone_admin"><b>เบอร์โทร:</b></label>
                                <input type="text" class="form-control" value="<?= $data['phone_admin']; ?>" id="phone_admin" placeholder="กรุณาใส่เบอร์โทร" name="phone_admin" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="age"><b>อายุ:</b></label>
                                <input type="number" class="form-control" value="<?= $data['age']; ?>" id="age" placeholder="กรุณาใส่อายุ" name="age" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="admin_name"><b>ชื่อผู้ดูแล:</b></label>
                                <input type="text" class="form-control" value="<?= $data['admin_name']; ?>" id="admin_name" placeholder="กรุณาใส่ชื่อผู้ใช้" name="admin_name" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="admin_pass"><b>รหัสผู้ดูแล:</b></label>
                                <input type="text" class="form-control" value="<?= $data['admin_pass']; ?>" id="admin_pass" placeholder="กรุณาใส่รหัสผู้ใช้" name="admin_pass" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-4 mb-3 form-group">
                                <label for="admin_pass_true"><b>ยืนยันรหัสผ่าน:</b></label>
                                <input type="text" class="form-control" value="<?= $data['admin_pass']; ?>" id="admin_pass_true" placeholder="กรุณาใส่รหัสผู้ใช้อีกครั้ง" name="admin_pass_true" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="pic_admin"><b>อัปโหลดรูปโปรไฟล์</b></label>
                                <input type="file" id="pic_admin" value="empty.jpg" name="pic_admin" class="form-control-file border">
                            </div>
                            <div class="col-6 d-flex justify-content">
                                <div class="btn-group">
                                    <button type="submit" name="update" class="btn btn-success">แก้ไขข้อมูล</button>
                                    <a class="btn btn-warning" href="DataAdmin.php">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
            $pic_admin = "";
            if($_FILES['pic_admin']['name']){
                $pic_admin = $_FILES['pic_admin'];
            } else {
                $pic_admin = $data['pic_admin'];
            }

            $update=$con->update_admin($data['id_admin'], $pic_admin, $_POST['admin_name'], $_POST['admin_pass'], $_POST['f_admin'], $_POST['l_admin'], $_POST['phone_admin'], $_POST['age']);
            if($update){
                echo "<script>
                    alert('แก้ไขข้อมูลสำเร็จ');
                    window.location.href='DataAdmin.php';
                </script>";
            } else {
                echo "<script>
                    alert('แก้ไขข้อมูลไม่สำเร็จ');
                    window.location.href='DataAdmin.php';
                </script>";
            }
        }
        else {
            echo "<script>alert('รหัสผ่านไม่ตรงกัน')</script>";
        }
    }
?>