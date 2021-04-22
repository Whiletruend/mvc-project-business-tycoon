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
                $this->userList[] = array('Mail' => $val->getMail(),
                'Username' => $val->getUsername(),
                'Password' => $val->getPassword());
            }
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new UserControler();
            }

            return self::$_instance;
        }
        
    }
?>