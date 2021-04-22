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
            if(!isset($_SESSION)) { session_start(); }

            if(empty($userInfos)) {
                header('Location: ?action=register');
                
                die();
            }

            $dbUsername = $userInfos->getUsername();
            $dbPassword = $userInfos->getPassword();
            $dbMail = $userInfos->getMail();
            $dbMoney = $userInfos->getMoney();
            $dbAdmin = $userInfos->getIsAdmin();

            if(trim($dbPassword) == trim($postPass) && trim($dbMail) == trim($postMail)) {
                $_SESSION['username_USER'] = $dbUsername;
                $_SESSION['password_USER'] = $dbPassword;
                $_SESSION['mail_USER'] = $dbMail;
                $_SESSION['money_USER'] = $dbMoney;
                $_SESSION['isAdmin_USER'] = $dbAdmin;

                header('Location: .');

                /*echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Parfait !</strong> Connexion effectuée.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';*/
            }
        }
        
        public function render() { 
            $this->activePage = 'login';
            include_once 'app/view/header.php';
            include_once 'app/view/login.php';
            include_once 'app/view/footer.php';
        }
    }
?>