<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location:../LoginUser.php");
    }
    require('query.php');
    $id_history = $_REQUEST['id_history'];
    $delete = new query();
    $sql = $delete->del_his($id_history);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='History.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='History.php';
        </script>";
    }
?>