<?php
require_once('./function/funcs_system.php');
init();
$user = User::getInstance($_GET["session_id"]);
$dbh = DBConnection::getInstance();

//check posted data
$comment = htmlspecialchars($_POST["comment"]);
$store_id = htmlspecialchars($_POST["store_id"]);

if(!$comment || !$store_id){
 error_exit('必要な情報が不足しています');
}

$update_array = array($user->id,$store_id,$comment,time());
$result_update = $dbobj->fetchALL("INSERT INTO comments (user_id,store_id,comment,time) VALUES (?,?,?,?,?)",array($update_array));

print json_encode(array("status"=>success));

?>
