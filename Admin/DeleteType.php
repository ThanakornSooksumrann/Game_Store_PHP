<?php
    require('query.php');
    $id_type = $_REQUEST['id_type'];
    $delete = new query();
    $sql = $delete->del_type($id_type);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='DataType.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='DataType.php';
        </script>";
    }
?>