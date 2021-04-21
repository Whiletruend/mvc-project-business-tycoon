<?php
    #-> Class 'LoginControler'
    class LoginControler {
        private static $_instance = null;
        private $ex_text;
        private $activePage;

        private function __construct() {
            $this->ex_text = 'Example Text';
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new LoginControler();
            }

            return self::$_instance;
        }
        
        public function render() { 
            $this->activePage = 'login';
            include_once 'app/view/header.php';
            include_once 'app/view/login.php';
        }
    }
?>