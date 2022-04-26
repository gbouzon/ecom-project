<?php
	session_start();
	require_once('app/core/autoload.php');
	require_once('app/core/i18n.php');
	require('app/core/phpqrcode/qrlib.php');
	define('BASE', 'http://localhost');