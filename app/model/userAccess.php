<?php
    require 'app/model/database.php';
    require 'app/model/user.php';

    class UserAccess extends Database {
        public static function getAll() {
            $collection = array();
            $query = self::query('SELECT * FROM UTILISATEUR');

            foreach($query as $key => $val) {
                $collection[] = $val;
            }

            return $collection;
        }
    }
?>