<?php
	require 'app/controler/index-c.php';

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
			IndexControler::getInstance()->render();
			break;
	}
?>