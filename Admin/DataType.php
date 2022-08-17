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
                        <div class="list-group col-12 mt-5 ">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                            เกม
                        </a>
                        <a href="DataGame.php" class="list-group-item list-group-item-action">เกมทั้งหมด</a>
                        <a href="DataType.php" class="list-group-item list-group-item-action list-group-item-secondary">ประเภทเกม</a>
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
                            <div class="row">
                                <div class="col-sm-4"><h1><b><span class="badge badge-warning text-dark ">ประเภท</span></b></h1></div>
                                <div class="col-sm-8">
                                    <form method="get" id="form"  enctype="multipart/form-data" class="form-inline">
                                        <input class="form-control mr-sm-2"  placeholder="ค้นหา" type="text" name="search" size="50" value="">
                                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr align="center">
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">เวลาเพิ่มข้อมูลนี้</th>
                                <th scope="col">แก้ไข/ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con= new mysqli("localhost","maple","26012544","kumpad");
                            mysqli_query($con,"SET NAMES UTF8");
                            $name = $_GET['search'];
                            if (mysqli_connect_errno())
                            {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }

                            $result = mysqli_query($con, "SELECT * FROM type_game
                            WHERE name_type LIKE '%{$name}%'");

                        while ($row = mysqli_fetch_array($result))
                        {
                        ?>
                            <tr align="center">
                                <td scope="col"><?= @++$i; ?></td>
                                <td><?= $row['name_type']; ?></td>
                                <td><?= $row['time_type']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="UpdateType.php?id_type=<?=$row['id_type']?>" class="btn btn-warning">แก้ไข</a>
                                        <a href="DeleteType.php?id_type=<?=$row['id_type']?>" onclick="return confirm('คุณต้องการลบใช่ไหม')" class="btn btn-danger">ลบ</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                    <?php if($result->num_rows <= 0){ echo "<center><b>ไม่พบข้อมูลที่ค้นหา</b></center>";} ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('Foot.php'); ?>
    </body>
</html>