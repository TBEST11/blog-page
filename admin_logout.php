<?php 
session_start();
require './db.php';
			$_SESSION = array();
			session_write_close();
			unset($_SESSION['admin_username']);
			unset($_SESSION['admin_password']);
			
			session_unset();
			session_destroy();
			header('location: home.php');
exit;
?>