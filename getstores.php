<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');
require_once('./class/user.php');


$user = User::getInstance($_GET["session_id"]);





?>