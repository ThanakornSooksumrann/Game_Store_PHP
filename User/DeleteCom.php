<?php
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("location:../LoginUser.php");
    }
    require('query.php');
    $id_com = $_REQUEST['id_com'];
    $delete = new query();
    $sql = $delete->del_com($id_com);

    if($sql){
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href='Detail.php';
        </script>";
    } else {
        echo "<script>
            alert('ลบข้อมูลไม่สำเร็จ');
            window.location.href='Detail.php';
        </script>";
    }
?>