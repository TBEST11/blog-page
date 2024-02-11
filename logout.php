<?php 
session_start();
require './db.php';
			$_SESSION = array();
			session_write_close();
			unset($_SESSION['usernamen']);
			unset($_SESSION['password']);
			
			session_unset();
			session_destroy();
			header('location: login.php');
exit;
?>