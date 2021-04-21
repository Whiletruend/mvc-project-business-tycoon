<?php
	require 'app/controler/index.php';
	require 'app/controler/user.php';
	require 'app/controler/signInAccount.php';

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'default';
	}

	switch($action) {
		case 'signInAccount':
			SignAccountControler::getInstance()->render();
			break;
		default:
			UserControler::getInstance()->render();
			break;
	}
?>