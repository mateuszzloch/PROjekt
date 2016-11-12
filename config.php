<?php
session_start();
require_once('db/db.php');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'sql.itcave.pl');
define('DB_NAME', 'itcave');
define('DB_USER', 'itcave');
define('DB_PASS', 'Perseusz20^!');
$db = new Database();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
