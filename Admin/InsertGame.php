<?php
    require('query.php');
    $add_Game = new query();
    $sql2 = $add_Game->show_type();
    if(isset($_REQUEST['add'])){
        $sql = $add_Game->add_game($_POST['id_type'], $_POST['name_game'], $_FILES['pic_game'], $_POST['detail_game'], $_POST['developer'], $_POST['publisher'], $_POST['price'], $_POST['video_game']);
        if($sql){
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
        } else {
            echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>";
        }
    }
?>
<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('Navbargame.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="col-12">
                <br/><br/>
                    <div class="row">
                        <div class="list-group col-12 mt-5 ">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                            เกม
                        </a>
                        <a href="DataGame.php" class="list-group-item list-group-item-action">เกมทั้งหมด</a>
                        <a href="DataType.php" class="list-group-item list-group-item-action">ประเภทเกม</a>
                        <a href="InsertGame.php" class="list-group-item list-group-item-action list-group-item-secondary">เพิ่มเกม</a>
                        <a href="InsertType.php" class="list-group-item list-group-item-action">เพิ่มประเภทเกม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <h1><b><span class="badge badge-warning text-dark ">เพิ่มเกม</span></b></h1>
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-6 mb-3 form-group ">
                                <label for="name_game"><b>ชื่อเกม:</b></label>
                                <input type="text" class="form-control" id="name_game" placeholder="กรุณาใส่ชื่อเกม" name="name_game" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="id_type"><b>ประเภทเกม:</b></b></label>
                                <select class="form-control" id="id_type" name="id_type" required>
                                    <option selected></option>
                                    <?php while($data = $sql2->fetch_assoc()): ?>
                                        <option value="<?= $data['id_type'] ?>"><?= $data['name_type'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="developer"><b>ผู้พัฒนา:</b></label>
                                <input type="text" class="form-control" id="developer" placeholder="กรุณาใส่ผู้พัฒนา" name="developer" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="publisher"><b>ผู้จำหน่าย:</b></label>
                                <input type="text" class="form-control" id="publisher" placeholder="กรุณาใส่ผู้จำหน่าย" name="publisher" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="price"><b>ราคา:</b></label>
                                <input type="number" class="form-control" id="price" placeholder="กรุณาใส่ราคา" name="price" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label for="video_game"><b>วิดีโอตัวอย่างเกม (ลิ้งค์):</b></label>
                                <input type="text" class="form-control" id="video_game" placeholder="กรุณาใส่(ลิ้งค์)วิดีโอตัวอย่างเกม" name="video_game" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="pic_game"><b>อัปโหลดรูปปกเกม</b></label>
                                <input type="file" id="pic_game" name="pic_game" class="form-control-file border">
                            </div>
                            <div class="col-12 mb-3 form-group">
                                <label for="detail_game"><b>รายละเอียดเกม:</b></label>
                                <textarea type="text" class="form-control" id="detail_game" placeholder="กรุณาใส่รายละเอียดเกม" name="detail_game" rows="5" required></textarea>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 d-flex justify-content">
                                <div class="btn-group">
                                    <button type="submit" name="add" class="btn btn-success">เพิ่ม</button>
                                    <button type="reset" class="btn btn-danger">ลบทั้งหมด</button>
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