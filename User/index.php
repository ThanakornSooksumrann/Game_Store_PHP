<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location:../LoginUser.php");
    }
    $pic = $_SESSION['pic_user'];
    $fname = $_SESSION['f_name'];
    $lname = $_SESSION['l_name'];
    require('query.php');
    $show_type = new query();
    $sql = $show_type->show_type();
?>
<!DOCTYPE html>
<html lang="en">
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
<body>
    <?php include('Navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-2">
            <form method="get" id="form"  enctype="multipart/form-data">
                <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                    ประเภทเกม
                </button>
                <?php while($data = $sql->fetch_assoc()): ?>
                <button type="submit" name="search" value="<?= $data['name_type'] ?>" class="list-group-item list-group-item-action"><?= $data['name_type'] ?></button>
                <?php endwhile; ?>
                </div>
            </form>
            </div>
            <div class="col-sm-10">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $con= new mysqli("localhost","maple","26012544","kumpad");
                        mysqli_query($con,"SET NAMES UTF8");
                        $name = $_GET['search'];
                        if (mysqli_connect_errno())
                        {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $result = mysqli_query($con, "SELECT * FROM game INNER JOIN type_game ON game.id_type = type_game.id_type
                        WHERE name_type LIKE '%{$name}%' OR name_game LIKE '%{$name}%'");
                        while ($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <div class="col-sm-3">
                            <div class="card bg-dark text-light mb-3" style="width: 18rem">
                                <img class="card-img-top" src="../uploads/<?= $row['pic_game'] ?>" alt="Card image" height="280px">
                                <div class="card-body">
                                <h4 class="card-title"><article  style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $row['name_game'] ?></article></h4>
                                <p class="card-text"><article  style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">ประเภท:<?= $row['name_type'] ?><br/>ราคา:<?= $row['price'] ?><br/>ยอดดาวน์โหลด:<?= $row['per_download'] ?></article></p>
                                <a href="Detail.php?id_game=<?= $row['id_game'] ?>" class="btn btn-info">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('Foot.php'); ?>
</body>
</html>