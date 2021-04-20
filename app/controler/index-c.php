<?php
    #-> Class 'Index'
    class IndexControler {
        private static $_instance = null;
        private $test;
        private $activePage;

        private function __construct() {
            $this->test = 'just a simple try';
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new IndexControler();
            }

            return self::$_instance;
        }

        public function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/index-v.php';
        }
    }
?>