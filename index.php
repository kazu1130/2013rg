<?php
require_once('./function/funcs_system.php');
init();

$dbobj = DBConnection::getInstance();
print_r( $dbobj->fetchAll("SELECT * from users;",array()) );


?>






