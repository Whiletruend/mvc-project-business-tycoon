<?php
    #-> Class 'userAuth'
    class UserAuth {
        public static function userAddAccount($postMail, $postUsername, $postPass) {
            $getInfos = UserAccess::getUserByMailOrUsername($postMail, $postUsername);
            if(!isset($_SESSION)) { session_start(); }

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
                <strong>Erreur !</strong> Ce compte existe déjà.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                die();
            }
        }

        public static function userLogin($postMail, $postPass) {
            $userInfos = UserAccess::getUserByMailAndPassword($postMail, $postPass);
            if(!isset($_SESSION)) { session_start(); }

            if(empty($userInfos)) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur !</strong> E-Mail ou mot de passe incorrect. <a href="?action=login" class="alert-link">Recommencer</a>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

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
            }
        }

        public static function userLogout() {
            if(!isset($_SESSION)) { session_start(); } 

            if(self::isConnected()) { session_destroy(); }

            unset($_SESSION['username_USER']);
            unset($_SESSION['mail_USER']);
            unset($_SESSION['password_USER']);
            unset($_SESSION['money_USER']);
            unset($_SESSION['isAdmin_USER']);
        }

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