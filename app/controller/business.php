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

        public static function tryToBuy() {
            echo '<h1>echo</h2>';
        }

        public function change_page($view) {
            $this->activePage = $view;
            include_once 'app/view/header.php';
            include_once 'app/view/business_sidebar.php';
            include_once 'app/view/business/' . $view . '.php';
            include_once 'app/view/footer.php';
        }
    }
?>