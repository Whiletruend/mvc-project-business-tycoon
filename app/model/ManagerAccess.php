<?php
    namespace App\model;
    use PDO;
    
    class ManagerAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM AMÉLIORATION');
            $collection = array();

            foreach($query as $rows) {
                $collection[$rows['id_UPGRADE']] = new Upgrade($rows['id_UPGRADE'], $rows['name_UPGRADE'], $rows['description_UPGRADE'], $rows['cost_UPGRADE']);
            }

            return $collection;
        }

        public static function getUpgradeByID($id) {
            $request = self::prepare('SELECT * FROM AMÉLIORATION WHERE id_UPGRADE=:id', array(':id' => $id));
            
            if(!empty($request)) {
                return new Upgrade($request[0]['id_UPGRADE'], $request[0]['name_UPGRADE'], $request[0]['description_UPGRADE'], $request[0]['cost_UPGRADE']);
            }
        }
    }
?>