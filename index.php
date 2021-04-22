<?php
	require 'app/controler/index.php';
	require 'app/controler/user.php';
	require 'app/controler/login.php';
	require 'app/controler/register.php';

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'default';
	}

	if(!isset($_SESSION)) { session_start(); }

	switch($action) {
		case 'login':
			LoginControler::getInstance()->render();
			break;
		case 'register':
			RegisterControler::getInstance()->render();
			break;
		default:
			IndexControler::getInstance()->render();
			break;
	}
?>