<?php
    #-> Class 'Index'
    class IndexControler {
        private static $_instance = null;
        private $ex_text;
        private $table;
        private $activePage;
        private $userRanking;

        private function __construct() {
            $this->ex_text = 'Example Text';

            $collection = UserAccess::getUsersDESCRanking();

            $this->userRanking = $collection;
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new IndexControler();
            }

            return self::$_instance;
        }

        public function render() {
            $this->activePage = 'home';
            include_once 'app/view/header.php';
            include_once 'app/view/index.php';
            include_once 'app/view/footer.php';
        }
    }
?>