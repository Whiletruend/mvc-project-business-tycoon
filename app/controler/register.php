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

        public static function addAccount($postMail, $postUsername, $postPass) {
            $getInfos = UserAccess::getUserByMailOrUsername($postMail, $postUsername);

            if(empty($getInfos)) { 
                UserAccess::registerUser($postMail, $postUsername, $postPass);

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Parfait !</strong> Votre compte a été créé avec succès. <a href="?action=login" class="alert-link">Se connecter</a>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                die();
            }

            $mail = $getInfos['mail_USER'];
            $username = $getInfos['username_USER'];

            if((trim($mail) == trim($postMail)) or (trim($username) == trim($postUsername))) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur !</strong> Ce compte existe déjà. <a href="?action=login" class="alert-link">Se connecter</a>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
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