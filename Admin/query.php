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

        //เพิ่มข้อมูล <--- (INSERT)
        public function add_game($id_type, $name_game, $pic_game, $detail_game, $developer, $publisher, $price, $video_game)
        {
            if(move_uploaded_file($pic_game['tmp_name'],'../uploads/'.$pic_game['name'])){
                $sql = "INSERT INTO game (id_type, name_game, pic_game, detail_game, developer, publisher, price, video_game) 
                VALUES ($id_type, '$name_game', '".$pic_game['name']."', '$detail_game', '$developer', '$publisher', $price, '$video_game')";
                $result = mysqli_query($this->con,$sql);
                return $result;
            }
        }

        public function add_type($name_type)
        {
            $sql = "INSERT INTO type_game (name_type)
            VALUES ('$name_type')";
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        public function add_user($pic_user, $name_user, $user_pass, $phone_wallet, $pass_wallet, $f_name, $l_name, $detail_user, $age)
        {
            $sql = "SELECT * FROM user WHERE name_user = '$name_user'";
            $result = mysqli_query($this->con , $sql);
            if($result->num_rows <= 0){
                if(move_uploaded_file($pic_user['tmp_name'],'../uploads/'.$pic_user['name'])){
                    $sql = "INSERT INTO user (pic_user, name_user, user_pass, phone_wallet, pass_wallet, f_name, l_name, detail_user, age) 
                    VALUES ('".$pic_user['name']."', '$name_user', '$user_pass', '$phone_wallet', '$pass_wallet', '$f_name', '$l_name', '$detail_user', $age)";
                    $result = mysqli_query($this->con , $sql);
                    return 'เพิ่มข้อมูลสำเร็จ';
                }
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
                if(move_uploaded_file($pic_admin['tmp_name'],'../uploads/'.$pic_admin['name'])){
                    $sql = "INSERT INTO admin_web (pic_admin, admin_name, admin_pass, f_admin, l_admin, phone_admin, age) 
                    VALUES ('".$pic_admin['name']."', '$admin_name', '$admin_pass', '$f_admin', '$l_admin', '$phone_admin', $age)";
                    $result = mysqli_query($this->con , $sql);
                    return 'เพิ่มข้อมูลสำเร็จ';
                }
            }
            else {
                return 'ชื่อผู้ใช้ซ้ำ กรุณาใช้ชื่อผู้ใช้อื่น';
            }
        }

        //แสดงข้อมมูล <--- (SELECT)
        public function show_game()
        {
            $sql = "SELECT * FROM game";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function show_type()
        {
            $sql = "SELECT * FROM type_game";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function show_user()
        {
            $sql = "SELECT * FROM user";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }
        
        public function show_admin()
        {
            $sql = "SELECT * FROM admin_web";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        //ลบข้อมูล row <--- (DELETE)
        public function del_game($id_game)
        {
            $sql = "DELETE FROM game WHERE id_game = '$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function del_type($id_type)
        {
            $sql = "DELETE FROM type_game WHERE id_type = '$id_type'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function del_user($id_user)
        {
            $sql = "DELETE FROM user WHERE id_user = '$id_user'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function del_admin($id_admin)
        {
            $sql = "DELETE FROM admin_web WHERE id_admin = '$id_admin'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        //โชว์ข้อมูลที่จะแกไข <--- (SELECT for UPDATE)
        public function load_game($id_game)
        {
            $sql = "SELECT * FROM game WHERE id_game = '$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_type($id_type)
        {
            $sql = "SELECT * FROM type_game WHERE id_type = '$id_type'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_user($id_user)
        {
            $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_admin($id_admin)
        {
            $sql = "SELECT * FROM admin_web WHERE id_admin = '$id_admin'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        //แก้ไขข้อมูล <--- (UPDATE)
        public function update_game($id_game, $id_type, $name_game, $pic_game, $detail_game, $developer, $publisher, $price, $video_game)
        {
            $sql = "";
            if(!is_array($pic_game)){
                $sql = "UPDATE game SET id_type=$id_type, name_game='$name_game', detail_game='$detail_game', developer='$developer', publisher='$publisher', price=$price, video_game='$video_game' WHERE id_game='$id_game'";
            } else {
                if(move_uploaded_file($pic_game['tmp_name'],'../uploads/'.$pic_game['name'])){
                    $sql = "UPDATE game SET id_type=$id_type, name_game='$name_game', pic_game='".$pic_game['name']."', detail_game='$detail_game', developer='$developer', publisher='$publisher', price=$price, video_game='$video_game'  WHERE id_game='$id_game'";
                }
            }
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        public function update_type($id_type, $name_type){
            $sql = "";
            $sql = "UPDATE type_game SET name_type='$name_type' WHERE id_type='$id_type'";
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        public function update_user($id_user, $pic_user, $name_user, $user_pass, $phone_wallet, $pass_wallet, $f_name, $l_name, $detail_user, $age)
        {
            $sql = "";
            if(!is_array($pic_user)){
                $sql = "UPDATE user SET name_user='$name_user', user_pass='$user_pass', phone_wallet='$phone_wallet', pass_wallet='$pass_wallet', f_name='$f_name', l_name='$l_name',detail_user ='$detail_user', age=$age WHERE id_user='$id_user'";
            } else {
                if(move_uploaded_file($pic_user['tmp_name'],'../uploads/'.$pic_user['name'])){
                    $sql = "UPDATE user SET pic_user='".$pic_user['name']."', name_user='$name_user', user_pass='$user_pass', phone_wallet='$phone_wallet', pass_wallet='$pass_wallet', f_name='$f_name', l_name='$l_name',detail_user ='$detail_user', age=$age WHERE id_user='$id_user'";
                }
            }
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        public function update_admin($id_admin, $pic_admin, $admin_name, $admin_pass, $f_admin, $l_admin, $phone_admin, $age)
        {
            $sql = "";
            if(!is_array($pic_admin)){
                $sql = "UPDATE admin_web SET admin_name='$admin_name', admin_pass='$admin_pass', f_admin='$f_admin', l_admin='$l_admin', phone_admin='$phone_admin', age=$age  WHERE id_admin='$id_admin'";
            } else {
                if(move_uploaded_file($pic_admin['tmp_name'],'../uploads/'.$pic_admin['name'])){
                    $sql = "UPDATE admin_web SET pic_admin='".$pic_admin['name']."', admin_name='$admin_name', admin_pass='$admin_pass', f_admin='$f_admin', l_admin='$l_admin', phone_admin='$phone_admin', age=$age  WHERE id_admin='$id_admin'";
                }
            }
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        //เชื่อมสองตาราง <--- (JOIN INNER)
        public function join_game()
        {
            $sql = "SELECT * FROM game INNER JOIN type_game ON game.id_type = type_game.id_type";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_com_user($id)
        {
            $sql = "SELECT * FROM comment INNER JOIN user ON comment.id_user = comment.id_user WHERE id_user='$id'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_com_game($id_game)
        {
            $sql = "SELECT * FROM comment INNER JOIN game ON comment.id_game = game.id_game WHERE id_game='$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_his()
        {
            $sql = "SELECT * FROM history INNER JOIN user ON history.id_user = user.id_user";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function del_his($id_history)
        {
            $sql = "DELETE FROM history WHERE id_history = '$id_history'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }
    }