<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');
require_once('./class/user.php');

$user = User::getInstance($_GET["session_id"]);
$dbh = DBConnection::getInstance();

//check posted data
$comment = htmlspecialchars($_POST["comment"]);
$session_id = htmlspecialchars($_POST["session"]);
$store_id = htmlspecialchars($_POST["store_id"]);

if(!$comment || !$session_id || !$store_id){
 perror('2000','lack_of_data','必要な情報が不足しています');
 exit;
}
if($uid=checkSecretToken($_session_id)===false){
  perror('7000','invalid_token','セッション確立エラー');
  exit;
}
$update_array = array($uid,$comment,time());
$result_update = $dbobj->fetchALL("INSERT INTO comments (user_id,comment,time) VALUES (?,?,?,?)",array($update_array));

print json_encode(array("status"=>success,$ret_sotres));

?>
