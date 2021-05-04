<?php
    namespace App\controller;
    use App\model\DomainAccess;

    #-> Class 'DomainController'
    class DomainController {
        private static $_instance = null;
        private $activePage;

        private function __construct() {
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new DomainController();
            }

            return self::$_instance;
        }
    }
?>