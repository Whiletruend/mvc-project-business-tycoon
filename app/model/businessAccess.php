<?php
    namespace App\model;
    use PDO;
    
    class BusinessAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM BUSINESS');
            $collection = array();

            foreach($query as $rows) {
                $collection[$rows['id_BUSINESS']] = new Business($rows['id_BUSINESS'], $rows['name_BUSINESS'], $rows['money_BUSINESS'], $rows['isMananged_BUSINESS'], $rows['id_MANAGER'], $rows['id_DOMAIN'], $rows['id_USER']);
            }

            return $collection;
        }
        
        public static function getBusinessByID($id) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $id));

            if(!empty($request)) {
                return new Business($request[0]['id_BUSINESS'], $request[0]['name_BUSINESS'], $request[0]['money_BUSINESS'], $request[0]['isMananged_BUSINESS'], $request[0]['id_MANAGER'], $request[0]['id_DOMAIN'], $request[0]['id_USER']);
            }
        }

        public static function getBusinessByUserID($userid) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_USER=:id', array(':id' => $userid));
            $collection = array();

            if(!empty($request)) {
                foreach($request as $rows) {
                    $collection[] = array('id_BUSINESS' => $rows['id_BUSINESS'], 'name_BUSINESS' => $rows['name_BUSINESS'], 'money_BUSINESS' => $rows['money_BUSINESS'], 'isManaged_BUSINESS' => $rows['isManaged_BUSINESS'], 'id_DOMAIN' => $rows['id_DOMAIN']);
                }
            }

            return $collection;
        }

        public static function getBusinessByManagerID($managerid) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_MANAGER=:id', array(':id' => $managerid));

            if(!empty($request)) {
                return new Business($request[0]['id_BUSINESS'], $request[0]['name_BUSINESS'], $request[0]['money_BUSINESS'], $request[0]['isMananged_BUSINESS'], $request[0]['id_MANAGER'], $request[0]['id_DOMAIN'], $request[0]['id_USER']);
            }
        }

        public static function getBusinessAmountByUserID($userid) {
            $request = self::prepare('SELECT COUNT(*) as TOTAL FROM BUSINESS WHERE id_USER = :id', array(':id' => $userid));

            return $request[0]['TOTAL'];
        }

        public static function businessAdd($domain, $name, $ea, $userid) {
            $request = self::request('INSERT INTO BUSINESS(name_BUSINESS, money_BUSINESS, isManaged_BUSINESS, id_DOMAIN, id_USER) VALUES (:name_BUSINESS, 0, 0, :id_DOMAIN, :id_USER)', array(':name_BUSINESS' => $name, ':id_DOMAIN' => $domain, ':id_USER' => $userid));
        }

        public static function businessSell($businessid) {
            $request = self::request('DELETE FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $businessid));
        }

        public static function businessUpgradeIncome($businessid) {
            $request = self::prepare('SELECT * FROM POSSEDER WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':id_BUSINESS' => $businessid, ':id_UPGRADE' => 1));

            if(empty($request)) {
                $sub_request = self::request('INSERT INTO POSSEDER(id_BUSINESS, id_UPGRADE, level_UPGRADE) VALUES (:id, 1, 1)', array(':id' => $businessid));
            } else {
                $quality_amount = $request[0]['level_UPGRADE'] + 1;
                $sub_request = self::request('UPDATE POSSEDER SET level_UPGRADE=:level_UPGRADE WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':level_UPGRADE' => $quality_amount, ':id_BUSINESS' => $businessid, ':id_UPGRADE' => 1));
            }
        }
        
        public static function businessUpgradeQuality($businessid) {
            $request = self::prepare('SELECT * FROM POSSEDER WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':id_BUSINESS' => $businessid, ':id_UPGRADE' => 2));

            if(empty($request)) {
                $sub_request = self::request('INSERT INTO POSSEDER(id_BUSINESS, id_UPGRADE, level_UPGRADE) VALUES (:id, 2, 1)', array(':id' => $businessid));
            } else {
                $quality_amount = $request[0]['level_UPGRADE'] + 1;
                $sub_request = self::request('UPDATE POSSEDER SET level_UPGRADE=:level_UPGRADE WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':level_UPGRADE' => $quality_amount, ':id_BUSINESS' => $businessid, ':id_UPGRADE' => 2));
            }
        }

        public static function businessUpgradeEmployee($businessid) {
            $request = self::prepare('SELECT * FROM POSSEDER WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':id_BUSINESS' => $businessid, ':id_UPGRADE' => 3));

            if(empty($request)) {
                $sub_request = self::request('INSERT INTO POSSEDER(id_BUSINESS, id_UPGRADE, level_UPGRADE) VALUES (:id, 3, 1)', array(':id' => $businessid));
            } else {
                $quality_amount = $request[0]['level_UPGRADE'] + 1;
                $sub_request = self::request('UPDATE POSSEDER SET level_UPGRADE=:level_UPGRADE WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE', array(':level_UPGRADE' => $quality_amount, ':id_BUSINESS' => $businessid, ':id_UPGRADE' => 3));
            }
        }

        public static function businessGetMoney($businessid) {
            $request = self::prepare('SELECT money_BUSINESS FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $businessid));
            $update = self::request('UPDATE BUSINESS SET money_BUSINESS = 0 WHERE id_BUSINESS=:id', array(':id' => $businessid));
            
            return $request;
        }

        public static function businessGetDomainByID($businessid) {
            $request = self::prepare('SELECT id_DOMAIN FROM BUSINESS WHERE id_BUSINESS = :id', array(':id' => $businessid));

            if(!empty($request)) {
                return $request[0]['id_DOMAIN'];
            }
        }
    }
?>