<?php
    namespace App\model;
    use PDO;
    
    class DomainAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM DOMAINE');
            $collection = array();

            foreach($query as $rows) {
                $collection[$rows['id_DOMAIN']] = new Domain($rows['id_DOMAIN'], $rows['name_DOMAIN'], $rows['description_DOMAIN'], $rows['cost_DOMAIN']);
            }

            return $collection;
        }

        public static function getDomainByID($domainid) {
            $request = self::prepare('SELECT * FROM DOMAINE WHERE id_DOMAIN = :id', array(':id' => $domainid));

            if(!empty($request)) {
                return new Domain($request[0]['id_DOMAIN'], $request[0]['name_DOMAIN'], $request[0]['description_DOMAIN'], $request[0]['cost_DOMAIN']);
            }
        }

        public static function getDomainCostByID($domainid) {
            $request = self::prepare('SELECT cost_DOMAIN FROM DOMAINE WHERE id_DOMAIN = :id', array(':id' => $domainid));

            if(!empty($request)) {
                return $request[0]['cost_DOMAIN'];
            }
        }
    }
?>
