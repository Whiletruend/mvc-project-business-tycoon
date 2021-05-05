<?php
    namespace App\controller;
    use App\model\UserAccess;
    use App\model\DomainAccess;
    use App\model\BusinessAccess;

    #-> Class 'AdminController'
    class AdminController {
        private static $_instance = null;
        private $activePage;

        private function __construct() {
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new AdminController();
            }

            return self::$_instance;
        }

        public function render() {
            $this->activePage = 'admin';
            include_once 'app/view/header.php';
            include_once 'app/view/admin.php';
            include_once 'app/view/footer.php';
        }
    }
?>