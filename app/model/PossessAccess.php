<?php
    namespace App\model;
    use PDO;
    
    class PossessAccess extends Database {
        public static function getLevelByBusinessAndUpgradeID($businessid, $upgradeid) {
            $request = self::prepare('SELECT level_UPGRADE FROM POSSEDER WHERE id_BUSINESS = :id_BUSINESS AND id_UPGRADE = :id_UPGRADE;', array(':id_BUSINESS' => $businessid, ':id_UPGRADE' => $upgradeid));

            if(!empty($request)) {
                return $request[0]['level_UPGRADE'];
            } else {
                return 0;
            }
        }
    }
?>