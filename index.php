<?php
 require_once './class/consts.php'
 require_once './class/dbconnect.php';

$dbobj = DBConnection::getInstance();
print_r( $dbobj->fetchAll("SELECT * from users;",array()) );


?>






