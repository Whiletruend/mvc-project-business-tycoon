<?php
    #-> Class 'RegisterControler'
    class RegisterControler {
        # Variables
        private static $_instance = null;
        private $ex_text;
        private $activePage;

        # Functions
        private function __construct() {
            $this->ex_text = 'Example Text';
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new RegisterControler();
            }

            return self::$_instance;
        }

        public static function userAddAccount($postMail, $postUsername, $postPass) {
            UserAuth::userAddAccount($postMail, $postUsername, $postPass);
        }
        
        public function render() { 
            $this->activePage = 'register';
            include_once 'app/view/header.php';
            include_once 'app/view/register.php';
            include_once 'app/view/footer.php';
        }
    }
?>