<?php
    require 'app/model/business.php';

    class BusinessAccess extends Database {
        public static function getAll() {
            $query = self::query('SELECT * FROM BUSINESS');
            $collection = array();

            foreach($query as $rows) {
                $collection[$rows['id_BUSINESS']] = new Business($rows['id_BUSINESS'], $rows['name_BUSINESS'], $rows['money_BUSINESS'], $rows['income_BUSINESS'], $rows['ea_BUSINESS'], $rows['wa_BUSINESS'], $rows['isMananged_BUSINESS'], $rows['id_MANAGER'], $rows['id_DOMAIN'], $rows['id_USER']);
            }

            return $collection;
        }
        
        public static function getBusinessByID($id) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $id));

            if(!empty($request)) {
                return new Business($request[0]['id_BUSINESS'], $request[0]['name_BUSINESS'], $request[0]['money_BUSINESS'], $request[0]['income_BUSINESS'], $request[0]['ea_BUSINESS'], $request[0]['wa_BUSINESS'], $request[0]['isMananged_BUSINESS'], $request[0]['id_MANAGER'], $request[0]['id_DOMAIN'], $request[0]['id_USER']);
            }
        }

        public static function getBusinessByUserID($userid) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_USER=:id', array(':id' => $userid));
            $collection = array();

            if(!empty($request)) {
                foreach($request as $rows) {
                    $collection[] = array('id_BUSINESS' => $rows['id_BUSINESS'], 'name_BUSINESS' => $rows['name_BUSINESS'], 'money_BUSINESS' => $rows['money_BUSINESS'], 'income_BUSINESS' => $rows['income_BUSINESS'], 'ea_BUSINESS' => $rows['ea_BUSINESS'], 'isManaged_BUSINESS' => $rows['isManaged_BUSINESS'], 'id_DOMAIN' => $rows['id_DOMAIN']);
                }
            }

            return $collection;
        }

        public static function getBusinessByManagerID($managerid) {
            $request = self::prepare('SELECT * FROM BUSINESS WHERE id_MANAGER=:id', array(':id' => $managerid));

            if(!empty($request)) {
                return new Business($request[0]['id_BUSINESS'], $request[0]['name_BUSINESS'], $request[0]['money_BUSINESS'], $request[0]['income_BUSINESS'], $request[0]['ea_BUSINESS'], $request[0]['wa_BUSINESS'], $request[0]['isMananged_BUSINESS'], $request[0]['id_MANAGER'], $request[0]['id_DOMAIN'], $request[0]['id_USER']);
            }
        }

        public static function businessAdd($domain, $name, $ea, $userid) {
            $request = self::request('INSERT INTO BUSINESS(name_BUSINESS, money_BUSINESS, income_BUSINESS, ea_BUSINESS, wa_BUSINESS, isManaged_BUSINESS, id_DOMAIN, id_USER) VALUES (:name_BUSINESS, 0, 0, :ea_BUSINESS, 0, 0, :id_DOMAIN, :id_USER)', array(':name_BUSINESS' => $name, ':ea_BUSINESS' => $ea, ':id_DOMAIN' => $domain, ':id_USER' => $userid));
        }

        public static function businessSell($businessid) {
            $request = self::request('DELETE FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $businessid));
        }

        public static function businessGetMoney($businessid) {
            $request = self::prepare('SELECT money_BUSINESS FROM BUSINESS WHERE id_BUSINESS=:id', array(':id' => $businessid));
            $update = self::request('UPDATE BUSINESS SET money_BUSINESS = 0 WHERE id_BUSINESS=:id', array(':id' => $businessid));
            
            return $request;
        }
    }
//`id_BUSINESS`, `name_BUSINESS`, `money_BUSINESS`, `income_BUSINESS`, `ea_BUSINESS`, `wa_BUSINESS`, `isManaged_BUSINESS`, `id_MANAGER`, `id_DOMAIN`, `id_USER`
?>