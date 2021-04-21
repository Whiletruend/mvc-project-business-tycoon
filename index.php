<?php
	require 'app/controler/index.php';
	require 'app/controler/user.php';

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = 'default';
	}

	switch($action) {
		case 'test':
			echo 'nothing';
			break;
		default:
			UserControler::getInstance()->render();
			break;
	}
?>