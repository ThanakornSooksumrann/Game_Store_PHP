<?php
    require('query.php');
    $id_admin = $_REQUEST['id_admin'];
    $delete = new query();
    $sql = $delete->del_admin($id_admin);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='DataAdmin.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='DataAdmin.php';
        </script>";
    }
?>