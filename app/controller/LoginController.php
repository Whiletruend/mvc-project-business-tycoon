<?php  
    namespace App\controller;

    use App\model\User;
    use App\model\UserAuth;
    use App\model\UserAccess;

    #-> Class 'LoginController'
    class LoginController {
        private static $_instance = null;
        private $activePage;
        private static $msg = '';

        private function __construct() {
            self::checkLogin();
        }

        private static function checkLogin() {
            if(isset($_POST['mail_USER']) & isset($_POST['password_USER'])) {
                $postMail = $_POST['mail_USER'];
                $postPass = $_POST['password_USER'];
          
                self::userLogin($postMail, $postPass);
            }
        }

        private static function userLogin($postMail, $postPass) {
            $userInfos = UserAccess::getUserByMailOrPassword($postMail, $postPass);
            if(!isset($_SESSION)) { session_start(); }

            if(empty($userInfos)) {
                self::$msg = "Ce compte n'existe pas.";
            } else {
                $dbId = $userInfos->getID();
                $dbUsername = $userInfos->getUsername();
                $dbPassword = $userInfos->getPassword();
                $dbMail = $userInfos->getMail();
                $dbMoney = $userInfos->getMoney();
                $dbAdmin = $userInfos->getIsAdmin();

                if(trim($dbPassword) == trim($postPass) && trim($dbMail) == trim($postMail)) {
                    $_SESSION['id_USER'] = $dbId;
                    $_SESSION['username_USER'] = $dbUsername;
                    $_SESSION['password_USER'] = $dbPassword;
                    $_SESSION['mail_USER'] = $dbMail;
                    $_SESSION['money_USER'] = $dbMoney;
                    $_SESSION['isAdmin_USER'] = $dbAdmin;

                    header('Location: .');
                } elseif(trim($dbPassword) != trim($postPass) or trim($dbMail) != trim($postMail)) {
                    self::$msg = "Email ou Mot de passe incorrect.";
                }
            }
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new LoginController();
            }

            return self::$_instance;
        }

        public static function userLogout() {
            if(UserAuth::isConnected()) { session_destroy(); }

            unset($_SESSION['id_USER']);
            unset($_SESSION['username_USER']);
            unset($_SESSION['mail_USER']);
            unset($_SESSION['password_USER']);
            unset($_SESSION['money_USER']);
            unset($_SESSION['isAdmin_USER']);

            header('Location: ./?action=login');
        }

        public function render() { 
            $this->activePage = 'login';
            include_once 'app/view/header.php';
            include_once 'app/view/login.php';
            include_once 'app/view/footer.php';
        }
    }
?>