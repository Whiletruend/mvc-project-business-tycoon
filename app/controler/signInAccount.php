<?php
    #-> Class 'SignAccountControler'
    class SignAccountControler {
        private static $_instance = null;
        private $ex_text;
        private $activePage;

        private function __construct() {
            $this->ex_text = 'Example Text';
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new SignAccountControler();
            }

            return self::$_instance;
        }

        public function render() {
            $this->activePage = 'signInAccount';
            include_once 'app/view/header.php';
            include_once 'app/view/signInAccount.php';
        }
    }
?>