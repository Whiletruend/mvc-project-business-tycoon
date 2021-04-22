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

        public function render() {
            $this->activePage = 'business';
            include_once 'app/view/header.php';
            include_once 'app/view/business.php';
            include_once 'app/view/footer.php';
        }
    }
?>