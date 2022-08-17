<?php
    session_start();
    require('query.php');
    $query = new query();

    $sql = $query->login_user($_POST['name_user'],$_POST['user_pass']);

    if(is_array($sql)){
        $_SESSION['id_user'] = $sql['id_user'];
        $_SESSION['f_name'] = $sql['f_name'];
        $_SESSION['l_name'] = $sql['l_name'];
        $_SESSION['pic_user'] = $sql['pic_user'];
        echo "<script>
        alert('เข้าสู่ระบบสำเร็จ');
        window.location.href='User/Welcome.php';
        </script>";
    } else {
        echo "<script>
            alert('$sql');
            window.location.href='LoginUser.php';
            </script>";
    }

?>