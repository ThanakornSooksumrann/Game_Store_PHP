<?php
    define('HOST','localhost');
    define('USER','maple');
    define('PASS','26012544');
    define('DB_NAME','kumpad');

    class query{
        //เช็คการเชื่อมต่อ Database
        public function __construct() {
            $this->con = mysqli_connect(HOST,USER,PASS,DB_NAME);
            
            mysqli_query($this->con,"SET NAMES UTF8");
            if(mysqli_connect_errno()){
                echo "Can't connect to data ".mysqli_connect_errno();
            }
        }

        //ฟังก์ชันสมัคร regis ใช้ SELECT ในการเทียบข้อมูลว่ามีชื่อ user ในนี้แล้วหรือเปล่า และมีฟังก์ชัน INSERT เป็นตัวเพิ่มข้อมูลเมื่อเช็คแล้วว่าชื่อไม่ซ้ำ <--- (regis.php)
        public function add_user($pic_user, $name_user, $user_pass, $phone_wallet, $pass_wallet, $f_name, $l_name, $detail_user, $age)
        {
            $sql = "SELECT * FROM user WHERE name_user = '$name_user'";
            $result = mysqli_query($this->con , $sql);
            if($result->num_rows <= 0){
                $sql = "INSERT INTO user (pic_user, name_user, user_pass, phone_wallet, pass_wallet, f_name, l_name, detail_user, age) 
                VALUES ('".$pic_user['name']."', '$name_user', '$user_pass', '$phone_wallet', '$pass_wallet', '$f_name', '$l_name', '$detail_user', $age)";
                $result = mysqli_query($this->con , $sql);
                return 'เพิ่มข้อมูลสำเร็จ';
            }
            else {
                return 'ชื่อผู้ใช้ซ้ำ กรุณาใช้ชื่อผู้ใช้อื่น';
            }
        }

        public function add_admin($pic_admin, $admin_name, $admin_pass, $f_admin, $l_admin, $phone_admin, $age)
        {
            $sql = "SELECT * FROM admin_web WHERE admin_name = '$admin_name'";
            $result = mysqli_query($this->con , $sql);
            if($result->num_rows <= 0){
                $sql = "INSERT INTO admin_web (pic_admin, admin_name, admin_pass, f_admin, l_admin, phone_admin, age) 
                VALUES ('".$pic_admin['name']."', '$admin_name', '$admin_pass', '$f_admin', '$l_admin', '$phone_admin', $age)";
                $result = mysqli_query($this->con , $sql);
                return 'เพิ่มข้อมูลสำเร็จ';
            }
            else {
                return 'ชื่อผู้ใช้ซ้ำ กรุณาใช้ชื่อผู้ใช้อื่น';
            }
        }

        //7.ฟังก์ชัน Login ใช้ SELECT ในการเทียบดูในตารางว่ามี User กับ password <--- (chk_login.php)
        public function login_user($name_user , $user_pass)
        {
            // เราต้องดึงข้อมูลของ username ที่ตรงกัน
            $sql = "SELECT * FROM user WHERE name_user = '$name_user'";
            $result = mysqli_query($this->con , $sql);
            // mysqli_num_rows($result) > 0 
            if($result->num_rows > 0 ){
                $user = $result->fetch_assoc();
                // ถ้ารหัสผ่านที่อยู่ใน table ตรงกับรหัสผ่านที่ผู้ใช้กรอกเข้ามาจะให้ทำอะไรต่อ
                if($user['user_pass'] == $user_pass){
                        // เอาไปตรวจสอบว่ามีการเข้าสู่ระบบมาหรือยัง  // เอาไปตรวจสอบว่าผู้ใช้อยู่ระดับ
                    return array('id_user'=>$user['id_user'] , 'f_name'=>$user['f_name'], 'l_name'=>$user['l_name'], 'pic_user'=>$user['pic_user']);
                }
                else {
                    return 'รหัสผ่านผิด';
                }
            }
            else {
                return 'ไม่พบผู้ใช้';
            }
        }

        public function login_admin($admin_name , $admin_pass)
        {
            // เราต้องดึงข้อมูลของ username ที่ตรงกัน
            $sql = "SELECT * FROM admin_web WHERE admin_name = '$admin_name'";
            $result = mysqli_query($this->con , $sql);
            // mysqli_num_rows($result) > 0 
            if($result->num_rows > 0 ){
                $user = $result->fetch_assoc();
                // ถ้ารหัสผ่านที่อยู่ใน table ตรงกับรหัสผ่านที่ผู้ใช้กรอกเข้ามาจะให้ทำอะไรต่อ
                if($user['admin_pass'] == $admin_pass){
                        // เอาไปตรวจสอบว่ามีการเข้าสู่ระบบมาหรือยัง  // เอาไปตรวจสอบว่าผู้ใช้อยู่ระดับ
                    return array('id_admin'=>$user['id_admin'] , 'pic_admin'=>$user['pic_admin'], 'f_admin'=>$user['f_admin'], 'l_admin'=>$user['l_admin']);
                }
                else {
                    return 'รหัสผ่านผิด';
                }
            }
            else {
                return 'ไม่พบผู้ใช้';
            }
        }
    }
?>