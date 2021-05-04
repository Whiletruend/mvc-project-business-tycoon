<?php
    namespace App\controller;
    use App\model\UserAccess;

    #-> Class 'RegisterController'
    class RegisterController {
        # Variables
        private static $_instance = null;
        private $activePage;
        private static $msg = '';

        # Functions
        private function __construct() {
            self::checkRegister();
        }

        private static function checkRegister() {
            if(isset($_POST['mail_USER']) & isset($_POST['username_USER']) & isset($_POST['password_USER'])) {
                $postMail = $_POST['mail_USER'];
                $postName = $_POST['username_USER'];
                $postPass = $_POST['password_USER'];
          
                self::userAddAccount($postMail, $postName, $postPass);
            }
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new RegisterController();
            }

            return self::$_instance;
        }

        public static function userAddAccount($postMail, $postUsername, $postPass) {
            $getInfos = UserAccess::getUserByMailOrUsername($postMail, $postUsername);
            if(!isset($_SESSION)) { session_start(); }

            if(empty($getInfos)) { 
                UserAccess::registerUser($postMail, $postUsername, $postPass);
                
                header('Location: ./?action=login&account_created');
            } else {

                $mail = $getInfos['mail_USER'];
                $username = $getInfos['username_USER'];

                if((trim($mail) == trim($postMail)) or (trim($username) == trim($postUsername))) {
                    self::$msg = 'Ce compte existe déjà.';
                }
            }
        }

        public function render() { 
            $this->activePage = 'register';
            include_once 'app/view/header.php';
            include_once 'app/view/register.php';
            include_once 'app/view/footer.php';
        }
    }
?>