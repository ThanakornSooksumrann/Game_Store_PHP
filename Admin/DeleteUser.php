<?php
    require('query.php');
    $id_user = $_REQUEST['id_user'];
    $delete = new query();
    $sql = $delete->del_user($id_user);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='DataUser.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='DataUser.php';
        </script>";
    }
?>