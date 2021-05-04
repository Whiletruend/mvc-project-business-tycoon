<?php
    namespace App\model;
    use App\controller\UserController;
    
    #-> Class 'userAuth'
    class UserAuth {
        public static function isConnected() {
            if(!isset($_SESSION)) { session_start(); }

            $connected = false;

            if(isset($_SESSION['mail_USER'])) {

                $userInfos = UserAccess::getUserByMailAndPassword($_SESSION['mail_USER'], $_SESSION['password_USER']);

                $dbMail = $userInfos->getMail();
                $dbPassword = $userInfos->getPassword();

                if((trim($_SESSION['mail_USER']) == trim($dbMail)) & (trim($_SESSION['password_USER']) == $dbPassword)) {
                    $connected = true;
                }
            }

            return $connected;
        }

        public static function isAdmin() {
            if(!isset($_SESSION)) { session_start(); }

            $isAdmin = false;

            if(self::isConnected()) {

                $userInfos = UserAccess::getUserByMailAndPassword($_SESSION['mail_USER'], $_SESSION['password_USER']);

                $dbMail = $userInfos->getMail();
                $dbPassword = $userInfos->getPassword();
                $dbIsAdmin = $userInfos->getIsAdmin();

                if((trim($_SESSION['mail_USER']) == trim($dbMail)) & (trim($_SESSION['password_USER']) == $dbPassword)) {
                    $isAdmin = $dbIsAdmin;
                }
            }

            return $isAdmin;
        }
    }
?>