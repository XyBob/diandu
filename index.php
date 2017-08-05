<?php
ob_start();

define('APP_DEBUG', TRUE); // 开启调试模式
$url_ext_name = substr($_SERVER['REQUEST_URI'], -4);
if (in_array($url_ext_name, array('.jpg', '.pdf', '.gif', '.png', '.doc', '.exe', '.css')) || substr($_SERVER['REQUEST_URI'], -3) == '.js') {
	header("HTTP/1.0 404 Not Found");
	exit;
}

// 解决uploadify在火狐下session_id丢失的问题
if (isset($_COOKIE['PHPSESSID']) && $_COOKIE['PHPSESSID'])
{
	session_id($_COOKIE['PHPSESSID']);
}
if (isset($_REQUEST['PHPSESSID']) && $_REQUEST['PHPSESSID']) {
	session_id($_REQUEST['PHPSESSID']);
}
if (isset($_GET['PHPSESSID']) && $_GET['PHPSESSID']) {
	session_id($_GET['PHPSESSID']);
}
if (isset($_POST['PHPSESSID']) && $_POST['PHPSESSID']) {
	session_id($_POST['PHPSESSID']);
}

require realpath('.') . DIRECTORY_SEPARATOR . 'frame' . DIRECTORY_SEPARATOR . 'entrance.php';
