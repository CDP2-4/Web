<?php
	session_start();

	if(isset($_SESSION['name'])) {
		$login = true;
	}
?>