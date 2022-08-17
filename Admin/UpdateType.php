<?php
    require('query.php');
    $con = new query();
    $load_type = $con->load_type($_REQUEST['id_type']);
    $data = $load_type->fetch_assoc();
?>

<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('NavbarGame.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="col-12">
                <br/><br/>
                    <div class="row">
                        <div class="list-group col-12 mt-5">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                            เกม
                        </a>
                        <a href="DataGame.php" class="list-group-item list-group-item-action">เกมทั้งหมด</a>
                        <a href="DataType.php" class="list-group-item list-group-item-action">ประเภทเกม</a>
                        <a href="InsertGame.php" class="list-group-item list-group-item-action">เพิ่มเกม</a>
                        <a href="InsertType.php" class="list-group-item list-group-item-action">เพิ่มประเภทเกม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <h1><b><span class="badge badge-warning text-dark">แก้ไขข้อมูลประเภทเกม</span></b></h1>
                        </div>
                    </div>
                    <form  enctype="multipart/form-data" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-12 mb-3 form-group">
                                <label for="name_type"><b>ชื่อประเภทเกม:</b></label>
                                <input type="text" class="form-control" value="<?= $data['name_type']; ?>" id="name_type" placeholder="กรุณาใส่ชื่อประเภทเกม" name="name_type" required>
                                <div class="valid-feedback">ถูกต้อง</div>
                                <div class="invalid-feedback">กรุณากรอกข้อมูลในช่องนี้</div>
                            </div>
                            <div class="col-12 d-flex justify-content">
                                <div class="btn-group">
                                    <button type="submit" name="updateGame" class="btn btn-success">แก้ไขข้อมูล</button>
                                    <a class="btn btn-warning" href="DataType.php">ยกเลิก</a>
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
    if(isset($_POST['updateGame'])){
    $update =$con->update_type($data['id_type'],$_POST['name_type']);
    if($update){
        echo "<script>
            alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href='DataType.php';
        </script>";
    } else {
        echo "<script>
            alert('แก้ไขข้อมูลไม่สำเร็จ');
            window.location.href='DataType.php';
        </script>";
    }}
?>