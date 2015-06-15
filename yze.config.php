<?php
require_once 'yangzie/yangzie.php';
YZE_Hook::include_hooks(dirname(__FILE__));

global $db;
date_default_timezone_set ( 'Asia/Chongqing' );
session_start ();
ini_set ( "error_reporting", E_ALL & ~ E_NOTICE & ~ E_WARNING );
ini_set ( "display_errors", "On" );

$cwd = dirname ( __FILE__ );
define("MYSQL_USER",    "root");
define("MYSQL_HOST_M",  "127.0.0.1");
define("MYSQL_DB",      "ydoa");
define("MYSQL_PORT",    "3306");
define("MYSQL_PASS",    "ydhl");

// 数据库连接
try {
	$db=new PDO('mysql:dbname='.MYSQL_DB.';port='.MYSQL_PORT.';host='.MYSQL_HOST_M,MYSQL_USER,MYSQL_PASS);
	$db->setAttribute ( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
	$db->query ( 'SET NAMES UTF8' );
	$db = new YZE_DB_PDO($db);
} catch ( Exception $e ) {
	echo ( "db error" );die;
}


