<html>
<?php include('Head.php'); ?>
<?php include('Font.php'); ?>
    <body>
    <?php include('NavbarUser.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="col-12">
                <br/><br/>
                    <div class="row">
                        <div class="list-group col-12 mt-5">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                            ผู้ใช้
                        </a>
                        <a href="DataUser.php" class="list-group-item list-group-item-action list-group-item-secondary">ผู้ใช้ทั้งหมด</a>
                        <a href="InsertUser.php" class="list-group-item list-group-item-action">เพิ่มผู้ใช้</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <div class="row">
                                <div class="col-sm-4"><h1><b><span class="badge badge-warning text-dark ">ผู้ใช้</span></b></h1></div>
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
                                <th scope="col">รูป</th>
                                <th scope="col">ชื่อจริง</th>
                                <th scope="col">นามสกุล</th>
                                <th scope="col">อายุ</th>
                                <th scope="col">ชื่อผู้ใช้</th>
                                <th scope="col">รหัสผู้ใช้</th>
                                <th scope="col">เบอร์ Wallet</th>
                                <th scope="col">เวลาสมัคร</th>
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

                            $result = mysqli_query($con, "SELECT * FROM user
                            WHERE f_name LIKE '%{$name}%' OR l_name LIKE '%{$name}%' OR name_user LIKE '%{$name}%' OR phone_wallet LIKE '%{$name}%' OR
                            age LIKE '%{$name}%'");
                        while ($row = mysqli_fetch_array($result))
                        {
                        ?>
                            <tr align="center">
                                <td scope="col"><?= @++$i; ?></td>
                                <td><img src="../uploads/<?= $row['pic_user']; ?>" width="150px" height="150px"></td>
                                <td><?= $row['f_name']; ?></td>
                                <td><?= $row['l_name']; ?></td>
                                <td><?= $row['age']; ?></td>
                                <td><?= $row['name_user']; ?></td>
                                <td><?= $row['user_pass']; ?></td>
                                <td><?= $row['phone_wallet']; ?></td>
                                <td><?= $row['time_user']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="UpdateUser.php?id_user=<?=$row['id_user']?>" class="btn btn-warning">แก้ไข</a>
                                        <a href="DeleteUser.php?id_user=<?=$row['id_user']?>" onclick="return confirm('คุณต้องการลบใช่ไหม')" class="btn btn-danger">ลบ</a>
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