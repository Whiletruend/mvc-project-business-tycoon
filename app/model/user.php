<?php
    #-> Class 'IndexModel'
    final class User {
        # Variables
        private $id;
        private $username;
        private $password;
        private $mail;
        private $money;
        private $is_admin;

        # Functions
        public function __construct($id, $username, $password, $mail, $money, $is_admin) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->mail = $mail;
            $this->money = $money;
            $this->is_admin = $is_admin;
        }

        public function getID() {
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getMail() {
            return $this->mail;
        }

        public function getMoney() {
            return $this->money;
        }

        public function getIsAdmin() {
            return $this->is_admin;
        }
    }
?>