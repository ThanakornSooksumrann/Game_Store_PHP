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

        //ลบ
        public function del_com($id_com)
        {
            $sql = "DELETE FROM comment WHERE id_com = '$id_com'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function del_his($id_history)
        {
            $sql = "DELETE FROM history WHERE id_history = '$id_history'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }
        
        //เพิ่ม
        public function add_com($id_game, $id_user, $comment)
        {
            $sql = "INSERT INTO comment (id_game, id_user, comment)
            VALUES ($id_game, $id_user, '$comment')";
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        public function add_his($id_user, $game)
        {
            $sql = "INSERT INTO history (id_user, game)
            VALUES ($id_user, '$game')";
            $result = mysqli_query($this->con,$sql);
            return $result;
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

        //โชว์ข้อมูลที่จะแกไข <--- (SELECT for UPDATE)
        public function load_game($id_game)
        {
            $sql = "SELECT * FROM game INNER JOIN type_game ON game.id_type = type_game.id_type WHERE id_game = '$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_user($id_user)
        {
            $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_type($id_type)
        {
            $sql = "SELECT * FROM type_game WHERE id_type = '$id_type'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function load_com($id_game)
        {
            $sql = "SELECT * FROM comment WHERE id_game = '$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        //แก้ไขข้อมูล <--- (UPDATE)
        public function update_game($id_game, $id_type, $name_game, $pic_game, $detail_game, $developer, $publisher, $price)
        {
            $sql = "";
            if(!is_array($pic_game)){
                $sql = "UPDATE game SET id_type=$id_type, name_game='$name_game', detail_game='$detail_game', developer='$developer', publisher='$publisher', price=$price  WHERE id_game='$id_game'";
            } else {
                if(move_uploaded_file($pic_game['tmp_name'],'uploads/'.$pic_game['name'])){
                    $sql = "UPDATE game SET id_type=$id_type, name_game='$name_game', pic_game='".$pic_game['name']."', detail_game='$detail_game', developer='$developer', publisher='$publisher', price=$price  WHERE id_game='$id_game'";
                }
            }
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

        public function update_per_dow($id_game, $per_download){
            $sql = "";
            $sql = "UPDATE game SET per_download=$per_download WHERE id_game='$id_game'";
            $result = mysqli_query($this->con,$sql);
            return $result;
        }

        //เชื่อมสองตาราง <--- (JOIN INNER)
        public function join_game($id_game)
        {
            $sql = "SELECT * FROM game INNER JOIN type_game ON game.id_type = type_game.id_type WHERE id_game='$id_game'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_com_user($id)
        {
            $sql = "SELECT * FROM comment INNER JOIN user ON comment.id_user = comment.id_user WHERE id_user='$id'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_com_user_all()
        {
            $sql = "SELECT * FROM comment INNER JOIN user ON comment.id_user = comment.id_user";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_com_game($id_game)
        {
            $sql = "SELECT * FROM comment INNER JOIN game ON comment.id_game = game.id_game WHERE id_game LIKE '%{$id_game}%'";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }

        public function join_his()
        {
            $sql = "SELECT * FROM history INNER JOIN user ON history.id_user = user.id_user";
            $result = mysqli_query($this->con , $sql);
            return $result;
        }
    }
?>