<?php
    require 'app/model/userAccess.php';

    #-> Class 'UserControler'
    class UserControler {
        private static $_instance = null;
        private $ex_text;
        private $userList;
        private $activePage;
 
        private function __construct() {
            $this->ex_text = 'Example Text';

            $collection = UserAccess::getAll();
            $this->userList = array();

            foreach($collection as $key => $val) {
                $this->userList[] = array('Username' => $val->getUsername(),
                'Password' => $val->getPassword());
            }
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new UserControler();
            }

            return self::$_instance;
        }

        public function login() {
            $mail = $_POST['mail_USER'];
            $pass = $_POST['password_USER'];

            $html = '<h1>' . $mail . ':' . $pass . '</h1>';

            return $html;
        }

        public function render() {
            include_once 'app/view/header.php';
            include_once 'app/view/index.php';
        }
    }
?>