<?php
    require 'app/model/database.php';
    require 'app/model/user.php';

    class UserAccess extends Database {
        public static function getAll() {
            $collection = array();
            $testcoll = array();
            $query = self::query('SELECT * FROM UTILISATEUR');

            foreach($query as $rows) {
                $collection[$rows['id_USER']] = new User($rows['id_USER'], $rows['username_USER'], $rows['password_USER'], $rows['mail_USER'], $rows['money_USER'], $rows['isAdmin_USER']);
            }

            return $collection;
        }

        public static function signIn($mail, $password) {
            $password = md5($password);
            $query = self::query("SELECT * FROM UTILISATEUR WHERE mail_USER='$mail' and password_USER='$password'");
            $data = mysqli_fetch_array($query);
            $result = mysqli_num_rows($query);
        }
    }
?>