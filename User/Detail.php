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
    $load_game = new query();
    $sql = $load_game->load_game($_REQUEST['id_game']);
    $sqlS = $load_game->load_com($_REQUEST['id_game']);
    $data = $sql->fetch_assoc();
    if(isset($_POST['plus'])){
        $p = $data['per_download']+1;
        $sqlH = $load_game->add_his($id, $data['name_game']);
        $sqlU = $load_game->update_per_dow($_REQUEST['id_game'], $p);
    }
    
    if(isset($_REQUEST['add'])){
        $sql5 = $load_game->add_com($data['id_game'], $id, $_REQUEST['comment']);
        if($sql5){
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
           
        } else {
            echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
<body>
    <?php include('NavbarNo.php'); ?>
    <div class="container mt-4 mb-5 bg-dark">
        <div class="row">
            <div class="col-5 mt-4">
                <img width="450" height="410" src="../uploads/<?= $data['pic_game']?>">
            </div>
            <div class="col-6 mt-4 text-light">
                    <h1><?= $data['name_game'] ?></h1>
                    <h4><span class="badge badge-secondary">ประเภท:</span> <?= $data['name_type'] ?><br/>
                    <span class="badge badge-primary">ผู้พัฒนา:</span> <?= $data['developer'] ?><br/>
                    <span class="badge badge-info">ผู้จัดจำหน่าย:</span> <?= $data['publisher'] ?><br/>
                    <span class="badge badge-danger">ยอดดาวน์โหลด:</span> <?= $data['per_download'] ?><br/>
                    <span class="badge badge-warning">ราคา:</span> <?= $data['price'] ?> บาท<br/>
                    <span class="badge badge-secondary">เวลาที่อัพ:</span> <?= $data['time_game'] ?></h4><br/>
                    <form enctype="multipart/form-data" method="POST">
                        <button class="btn btn-success" type="submit"  onclick="return confirm('คุณต้องซื้อใช่ไหม')" name="plus"><?= $data['price'] ?> บาท</button>
                    </form>
            </div>
            <div class="col-12 mt-4">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" src="<?= $data['video_game'] ?>" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="jumbotron">
                <h3>รายละเอียดเกม:</h3>
                <hr width="100%" size='13' color='00000000' />
                <h5><?= $data['detail_game'] ?></h5>
                </div>
            </div>
            <div class="col-12">
                <div class="jumbotron">
                <form enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="exampleInputPassword1"><h3>ความคิดเห็น</h3></label>
                    <hr width="100%" size='13' color='00000000' />
                    <textarea type="text" name="comment" class="form-control" id="exampleInputPassword1" required></textarea>
                </div>
                <button type="submit" name="add"  onclick="window.location.reload()" class="btn btn-primary mb-3">ส่ง</button><br/>
                </form>
                <hr width="100%" size='13' color='00000000' />
                
                <?php while($dataS = $sqlS->fetch_assoc()): ?>
                <div class="media">
                <?php if($id == $dataS['id_user']){ ?>
                    <img src="../uploads/<?= $pic ?>" class="rounded-circle align-self-start mr-3" style="width:40px; height: 40px;">
                <?php }else{ ?>
                    <img src="../uploads/empty.png" class="rounded-circle align-self-start mr-3" style="width:50px; height: 50px;">
                <?php } ?>
                <div class="media-body">
                    <?php if($id == $dataS['id_user']){ ?>
                        <h4><?= $fname.' '.$lname ?></h4>
                    <?php }else{ ?>
                        <h4>Kumpad B<?= @++$i ?></h4>
                    <?php } ?>
                    <p><b><?= $dataS['comment'] ?></b></p>
                    <?php if($id == $dataS['id_user']){ ?>
                        <form enctype="multipart/form-data" method="POST">
                            <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="window.location.reload()"  onclick="return confirm('คุณต้องการลบใช่ไหม')" name="del" value="<?= $dataS['id_com'] ?>" >
                                ลบ
                            </button>
                        </form> 
                    <?php } ?>
                </div>
                </div>
                <hr width="100%" size='13' color='00000000' />
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('Foot.php'); ?>
</body>
</html>

<?php
    if(isset($_REQUEST['del'])){
    $id_com = $_REQUEST['del'];
    $sql = $load_game->del_com($id_com);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
        </script>";
    }}
?>