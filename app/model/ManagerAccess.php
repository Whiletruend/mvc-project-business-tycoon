<?php
    namespace App\model;
    use PDO;
    
    class ManagerAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM DIRECTEUR');
            $collection = array();

            if(!empty($query)) {
                foreach($query as $rows) {
                    $collection[$rows['id_MANAGER']] = new Manager($rows['id_MANAGER'], $rows['name_MANAGER']);
                }
            }

            return $collection;
        }

        public static function addManager($name) {
            $request = self::request('INSERT INTO DIRECTEUR(name_MANAGER) VALUES (:name_MANAGER)', array(':name_MANAGER' => $name));
        }

        public static function getManagerIDByName($name) {
            $request = self::prepare('SELECT id_MANAGER FROM DIRECTEUR WHERE name_MANAGER = :name_MANAGER', array(':name_MANAGER' => $name));

            return $request[0]['id_MANAGER'];
        }

        public static function getMangerNameByID($id) {
            $request = self::prepare('SELECT name_MANAGER FROM DIRECTEUR WHERE id_MANAGER = :id_MANAGER', array(':id_MANAGER' => $id));

            return $request[0]['name_MANAGER'];
        }
    }
?>