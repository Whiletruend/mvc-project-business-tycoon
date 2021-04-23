<?php
    #-> Class 'BusinessController'
    class BusinessController {
        private static $_instance = null;
        private $activePage;

        private function __construct() {
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new BusinessController();
            }

            return self::$_instance;
        }

        public function global() {
            $this->activePage = 'business_global';
            include_once 'app/view/header.php';
            include_once 'app/view/business_sidebar.php';
            include_once 'app/view/business/business_global.php';
            include_once 'app/view/footer.php';
        }

        public function upgrades() {
            $this->activePage = 'business_upgrades';
            include_once 'app/view/header.php';
            include_once 'app/view/business_sidebar.php';
            include_once 'app/view/business/business_upgrades.php';
            include_once 'app/view/footer.php';
        }

        public function managers() {
            $this->activePage = 'business_managers';
            include_once 'app/view/header.php';
            include_once 'app/view/business_sidebar.php';
            include_once 'app/view/business/business_managers.php';
            include_once 'app/view/footer.php';
        }
    }
?>