<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');
require_once('./class/user.php');


$mparlat = 111263.28336;
$mparlan = 91159.16112;

$user = User::getInstance($_GET["session_id"]);

$dbh = DBConnection::getInstance();

$stores = $dbh->fetchAll("SELECT * FROM stores WHERE lat > ? AND lon = ?",array());


$_GET["lat"]
$_GET["lon"]





?>