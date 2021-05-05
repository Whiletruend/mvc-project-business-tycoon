<?php
    namespace App\controller;
    use App\model\BusinessAccess;
    use App\model\DomainAccess;
    use App\model\UpgradeAccess;
    use App\model\UserAccess;
    use App\model\PossessAccess;
    
    #-> Class 'BusinessController'
    class BusinessController {
        private static $_instance = null;
        private $activePage;
        private $businessList;
        private $domainList;
        private $upgradeList;
        private static $buyingRecap = array();
        private static $msg = '';

        private function __construct() {
            $collection = BusinessAccess::getBusinessByUserID($_SESSION['id_USER']);
            $collection_domain = DomainAccess::getAll();
            $collection_upgrades = UpgradeAccess::getAll();

            $this->businessList = $collection;
            $this->domainList = $collection_domain;
            $this->upgradeList = $collection_upgrades;

            self::checkBuying();
            self::checkAcceptRecap();

            // Update the new session money
            $_SESSION['money_USER'] = UserAccess::getUserMoneyByID($_SESSION['id_USER']);
        }

        private static function checkBuying() {
            if(isset($_POST['domain_BUSINESS']) & (isset($_POST['name_BUSINESS'])) & isset($_POST['ea_BUSINESS'])) {

                if($_POST['domain_BUSINESS'] != 'Choisissez le domaine de votre entreprise') {
                    if(!empty($_POST['name_BUSINESS'])) {
                        if($_POST['ea_BUSINESS'] != "Nombre d'employés au démarrage") {
                            $domain_id = $_POST['domain_BUSINESS'];
                            $name = $_POST['name_BUSINESS'];
                            $employee_amount = $_POST['ea_BUSINESS'];
                            $collection_domain = DomainAccess::getDomainByID($domain_id);
                            $emp_upgrade = UpgradeAccess::getUpgradeByID(3);
                            $totalCost = $collection_domain->getCost() + ($employee_amount * $emp_upgrade->getCost());

                            self::$buyingRecap = array('OnRecap' => true, 'Name' => $name, 'DomainID' => $domain_id, 'Domain' => $collection_domain->getName(), 'Emp_amount' => $employee_amount, 'TotalCost' => $totalCost);
                        }
                    }
                }
            }
        }

        private static function checkAcceptRecap() {
            if( (isset($_POST['recap_name_BUSINESS'])) & (isset($_POST['recap_domain_BUSINESS'])) & (isset($_POST['recap_empamount_BUSINESS'])) & isset($_POST['recap_totalcost_BUSINESS']) ) {

                $name = $_POST['recap_name_BUSINESS'];
                $domain = $_POST['recap_domain_BUSINESS'];
                $emp_amount = $_POST['recap_empamount_BUSINESS'];
                $totalcost = $_POST['recap_totalcost_BUSINESS'];
                $userMoney = $_SESSION['money_USER'];
                $userID = $_SESSION['id_USER'];

                if($userMoney >= $totalcost) {
                    $newMoney = $userMoney - $totalcost;

                    UserAccess::setUserMoneyByID($userID, $newMoney);
                    BusinessAccess::businessAdd($domain, $name, $emp_amount, $userID);
                    header('Location: ./?action=business_global');
                } else {
                    self::$msg = "Vous n'avez pas assez d'argent pour acheter cette entreprise";
                }
            }
        }

        public static function getMoney($businessid) {
            $request = BusinessAccess::businessGetMoney($businessid); // Get the money amount in the database of the business
            $_SESSION['money_USER'] = $_SESSION['money_USER'] + $request[0]['money_BUSINESS']; // Set "locally" (session) the money to the USER
            $user_request = UserAccess::setUserMoneyByID($_SESSION['id_USER'], $_SESSION['money_USER']); // Save theses changements

            header('Location: ./?action=business_global');
        }

        public static function getLevelByBusinessAndUpgradeID($businessid, $upgradeid) {
            $level = PossessAccess::getLevelByBusinessAndUpgradeID($businessid, $upgradeid);

            return $level;
        }

        public static function sellBusiness($businessid) {
            $domain = BusinessAccess::businessGetDomainByID($businessid);
            $domaincost = DomainAccess::getDomainCostByID($domain);
            $newMoney = $_SESSION['money_USER'] + ($domaincost / 2);

            UserAccess::setUserMoneyByID($_SESSION['id_USER'], $newMoney);
            BusinessAccess::businessSell($businessid);

            header('Location: ./?action=business_global');
        }

        public static function upgradeEmployee($businessid) {
            // Set-up variables
            $collection_upgrades = UpgradeAccess::getAll(); // Get every upgrades and their values
            $totalcost = $collection_upgrades[3]->getCost() * self::getLevelByBusinessAndUpgradeID($businessid, 3);
            $userMoney = $_SESSION['money_USER'];

            if($userMoney >= $totalcost) {
                $newMoney = $userMoney - $totalcost;

                UserAccess::setUserMoneyByID($_SESSION['id_USER'], $newMoney);
                BusinessAccess::businessUpgradeEmployee($businessid);
            }

            header('Location: ./?action=business_upgrades');
        }

        public static function upgradeIncome($businessid) {
            // Set-up variables
            $collection_upgrades = UpgradeAccess::getAll(); // Get every upgrades and their values
            $totalcost = $collection_upgrades[1]->getCost() * self::getLevelByBusinessAndUpgradeID($businessid, 1);
            $userMoney = $_SESSION['money_USER'];

            if($userMoney >= $totalcost) {
                $newMoney = $userMoney - $totalcost;

                UserAccess::setUserMoneyByID($_SESSION['id_USER'], $newMoney);
                BusinessAccess::businessUpgradeIncome($businessid);
            }

            header('Location: ./?action=business_upgrades');
        }

        public static function upgradeQuality($businessid) {
            // Set-up variables
            $collection_upgrades = UpgradeAccess::getAll(); // Get every upgrades and their values
            $totalcost = $collection_upgrades[2]->getCost() * self::getLevelByBusinessAndUpgradeID($businessid, 2);
            $userMoney = $_SESSION['money_USER'];

            if($userMoney >= $totalcost) {
                $newMoney = $userMoney - $totalcost;

                UserAccess::setUserMoneyByID($_SESSION['id_USER'], $newMoney);
                BusinessAccess::businessUpgradeQuality($businessid);
            }

            header('Location: ./?action=business_upgrades');
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
