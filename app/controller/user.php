<?php
    require 'app/model/userAccess.php';
    require 'app/model/userAuth.php';

    #-> Class 'UserController'
    class UserController {
        private static $_instance = null;
        private $activePage;
        private $userRanking;
 
        private function __construct() {
            $collection = UserAccess::getUsersDESCRanking();

            $this->userRanking = $collection;
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new UserController();
            }

            return self::$_instance;
        }

        public static function isConnected() {
            $connected = UserAuth::isConnected();

            return $connected;
        }

        public static function isAdmin() {
            $admin = UserAuth::isAdmin();

            return $admin;
        }

        public function render() {
            $this->activePage = 'home';
            include_once 'app/view/header.php';
            include_once 'app/view/index.php';
            include_once 'app/view/footer.php';
        }
    }
?>