<?php
    #-> Class 'BusinessController'
    class BusinessController {
        private static $_instance = null;
        private $activePage;
        private $businessList;
        private $domainList;

        private function __construct() {
            $collection = BusinessAccess::getBusinessByUserID($_SESSION['id_USER']);
            $collection_domain = DomainAccess::getAll();

            $this->businessList = $collection;
            $this->domainList = $collection_domain;

            self::checkBuying();
        }

        private static function checkBuying() {
            if(isset($_POST['domain_BUSINESS']) & isset($_POST['name_BUSINESS']) & isset($_POST['ea_BUSINESS'])) {
                $domain = $_POST['domain_BUSINESS'];
                $name = $_POST['name_BUSINESS'];
                $employee_amount = $_POST['ea_BUSINESS'];

                if((!$domain == 'Choisissez le domaine de votre entreprise') or (!empty($name)) or (!$employee_amount == "Nombre d'employés au démarrage")) {
                    BusinessAccess::businessAdd($domain, $name, $employee_amount, $_SESSION['id_USER']);
                    header('Location: ./?action=business_global');
                }
            }
        }

        public static function getMoney($businessid) {
            $request = BusinessAccess::businessGetMoney($businessid); // Get the money amount in the database of the business
            $_SESSION['money_USER'] = $_SESSION['money_USER'] + $request[0]['money_BUSINESS']; // Set "locally" (session) the money to the USER
            $user_request = UserAccess::setUserMoney($_SESSION['id_USER'], $_SESSION['money_USER']); // Save theses changements

            header('Location: ./?action=business_global');
        }

        public static function sellBusiness($businessid) {
            header('Location: ./?action=business_global');
            BusinessAccess::businessSell($businessid);
        }

        public static function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new BusinessController();
            }

            return self::$_instance;
        }

        public function change_page($view) {
            $this->activePage = $view;
            include_once 'app/view/header.php';
            include_once 'app/view/business_sidebar.php';
            include_once 'app/view/business/' . $view . '.php';
            include_once 'app/view/footer.php';
        }
    }
?>
