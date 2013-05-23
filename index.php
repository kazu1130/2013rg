<?php
 require_once './dbconnect.php';

$dbobj = DBConnection::getInstance();
print_r( $dbobj->fetchAll("SELECT * from userdata WHERE uid = ?",array($_GET["uid"])) );

?>
