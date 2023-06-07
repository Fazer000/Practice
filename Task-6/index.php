<?php
	session_start();

	if (!$_SESSION['user']) {
		header("Location: authorization.php");
	}

	include 'components/header.php';
	include 'components/main.php';
?>