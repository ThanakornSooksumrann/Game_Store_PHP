<?php
    require('query.php');
    $id_game = $_REQUEST['id_game'];
    $delete = new query();
    $sql = $delete->del_game($id_game);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='DataGame.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='DataGame.php';
        </script>";
    }
?>