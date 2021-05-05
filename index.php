<?php
	namespace App\controller;
	include 'vendor/autoload.php';

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'default';
	}

	if(!isset($_SESSION)) { session_start(); }

	switch($action) {
		// Business Cases
		case 'business_upgrade_quality':
			BusinessController::getInstance()->upgradeQuality($_GET['id_BUSINESS']);
			break;
		case 'business_upgrade_income':
			BusinessController::getInstance()->upgradeIncome($_GET['id_BUSINESS']);
			break;
		case 'business_upgrade_employee':
			BusinessController::getInstance()->upgradeEmployee($_GET['id_BUSINESS']);
			break;
		case 'business_moneyget':
			BusinessController::getInstance()->getMoney($_GET['id_BUSINESS']);
			break;
		case 'business_sell':
			BusinessController::getInstance()->sellBusiness($_GET['id_BUSINESS']);
			break;
		case 'business_managers':
			BusinessController::getInstance()->change_page($action);
			break;
		case 'business_upgrades':
			BusinessController::getInstance()->change_page($action);
			break;
		case 'business_global':
			BusinessController::getInstance()->change_page($action);
			break;

		// User Cases
		case 'logout':
			LoginController::userLogout();
			break;
		case 'login':
			LoginController::getInstance()->render();
			break;
		case 'register':
			RegisterController::getInstance()->render();
			break;
		case 'admin':
			AdminController::getInstance()->render();
			break;
		
		// Default
		default:
			IndexController::getInstance()->render();
			break;
	}
?>