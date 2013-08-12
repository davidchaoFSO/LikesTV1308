<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	Session::set_flash('success', 'Logged out successfully!');
	Response::redirect('home');

?>