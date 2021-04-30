<?php
    require 'app/model/domain.php';

    class DomainAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM DOMAINE');
            $collection = array();

            foreach($query as $rows) {
                $collection[$rows['id_DOMAIN']] = new Domain($rows['id_DOMAIN'], $rows['name_DOMAIN'], $rows['description_DOMAIN'], $rows['cost_DOMAIN']);
            }

            return $collection;
        }
    }
?>