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

        public static function checkLogin($postMail, $postPass) {
            $userInfos = UserAccess::getUserByMailAndPassword($postMail, $postPass);

            if(empty($userInfos)) {
                header('Location: ?action=register');

                die();
            }

            $dbPassword = $userInfos->getPassword();
            $dbMail = $userInfos->getMail();

            if(trim($dbPassword) == trim($postPass) && trim($dbMail) == trim($postMail)) {
                $_SESSION['userMail'] = $postMail;
                $_SESSION['userPass'] = $postPass;

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Parfait !</strong> Connexion effectuée.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                die();

                header('Location: ?action=home');
            }
        }
        
        public function render() { 
            $this->activePage = 'login';
            include_once 'app/view/header.php';
            include_once 'app/view/login.php';
        }
    }
?>