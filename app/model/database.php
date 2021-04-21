<?php
    #-> Class 'Database'
    class Database {
        # Variables
        private static $db = null;
        private static $host_DB = 'localhost';
        private static $name_DB = 'projet_mvc_test';
        private static $user_DB = 'root';
        private static $pass_DB = '';

        # Functions
        protected static function query($statement) {
            $stat = self::getPDO()->query($statement);

            return $stat->fetchAll();
        }

        protected static function getPDO() {
            if(is_null(self::$db)) {
                $connect = new PDO('mysql:host=' . self::$host_DB . ';dbname=' . self::$name_DB . ';charset=utf8', self::$user_DB, self::$pass_DB);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db = $connect;
            }

            return self::$db;
        }

        protected static function prepare($statement, $attributes) {
            $stat = self::getPDO()->prepare($statement);
            $stat->execute($attributes);

            return $stat->fetchAll();
        }

        protected static function request($statement, $attributes) {
            $stat = self::getPDO()->prepare($statement);
            $stat->execute($attributes);
        }
    }
?>