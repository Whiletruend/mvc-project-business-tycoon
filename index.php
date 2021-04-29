<?php
	require 'app/controller/index.php';
	require 'app/controller/business.php';
	require 'app/controller/user.php';
	require 'app/controller/login.php';
	require 'app/controller/register.php';

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'default';
	}

	if(!isset($_SESSION)) { session_start(); }

	switch($action) {
		case 'business_managers':
			BusinessController::getInstance()->change_page($action);
			break;
		case 'business_upgrades':
			BusinessController::getInstance()->change_page($action);
			break;
		case 'business_global':
			BusinessController::getInstance()->change_page($action);
			break;
		case 'logout':
			LoginController::userLogout();
			break;
		case 'login':
			LoginController::getInstance()->render();
			break;
		case 'register':
			RegisterController::getInstance()->render();
			break;

		default:
			UserController::getInstance()->render();
			break;
	}
?>