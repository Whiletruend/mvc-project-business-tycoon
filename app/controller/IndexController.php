<?php
    namespace App\controller;
    use App\model\UserAuth;
    use App\model\UserAccess;
    use App\model\BusinessAccess;

    #-> Class 'IndexController'
    class IndexController {
        private static $_instance = null;
        private $activePage;
        private $userRanking;
        private $userBusinessCount;
 
        private function __construct() {
            $collection = UserAccess::getUsersDESCRanking();

            $this->userRanking = $collection;
        }

        public static function getBusinessAmountByUserID($userid) {
            $value = BusinessAccess::getBusinessAmountByUserID($userid);

            return $value;
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new IndexController();
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