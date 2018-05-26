<?php
	if ($_SESSION['session_control'] == true) {
		
		session_start();
		session_destroy();
		header('Location:login.php');
	
	}else {
		header('Location:login.php');
	}
?>
