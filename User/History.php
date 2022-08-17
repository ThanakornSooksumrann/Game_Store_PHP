<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location:../LoginUser.php");
}
    require('query.php');
    $load = new query();
    $sql = $load->join_his();
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
                    <div class="card bg-light">
                        <div class="card-body text-dark text-center">
                            <h3 class="mt-3">ประวัติการซื้อเกม</h3><br/>
                            <h4><?= $fname; ?> <?= $lname; ?></h4>
                            <table align="center" class="table">
                                <thaed class="table-dark text-dark">
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อเกม</th>
                                        <th scope="col">วัน-เวลาที่ดาวน์โหลด</th>
                                        <th scope="col">ลบ</th>
                                    </tr>
                                </thaed>
                                <tbody>
                                    <?php while($data = $sql->fetch_assoc()): 
                                        if($id == $data['id_user']){ ?>
                                    <tr>
                                        <td><?= @++$i ?></td>
                                        <td><?= $data['game'] ?></td>
                                        <td><?= $data['time_history'] ?></td>
                                        <td><a href="DeleteHistory.php?id_history=<?=$data['id_history']?>" onclick="return confirm('คุณต้องการลบใช่ไหม')" class="btn btn-danger">ลบ</a></td>
                                    </tr>
                                    <?php } ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
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