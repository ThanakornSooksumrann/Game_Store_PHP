<?php
    session_start();
    require('query.php');
    $query = new query();

    $sql = $query->login_admin($_POST['admin_name'],$_POST['admin_pass']);

    if(is_array($sql)){
        $_SESSION['id_admin'] = $sql['id_admin'];
        $_SESSION['f_admin'] = $sql['f_admin'];
        $_SESSION['l_admin'] = $sql['l_admin'];
        $_SESSION['pic_admin'] = $sql['pic_admin'];
        echo "<script>
        alert('เข้าสู่ระบบสำเร็จ');
        window.location.href='Admin/index.php';
        </script>";
    } else {
        echo "<script>
            alert('$sql');
            window.location.href='LoginAdmin.php';
            </script>";
    }

?>