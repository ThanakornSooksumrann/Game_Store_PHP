<?php
    session_start();
    session_destroy();
    echo "<script>
            alert('ออกจากระบบ');
            window.location.href='../index.php';
        </script>";
?>