<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');

$dbobj = DBConnection::getInstance();
$user_array= $dbobj->fetchALL("SELECT * from userdata WHERE login_id = ?",array($_GET["login_id"]));
$passwd_hash=sha1(CONSTS::HASH_SEED.$_GET["pass"]);

if($user_array[0] != null){
  die(json_encode(array("status"=>"Error")));
}

$user_data = $user_array[0];

if($user_data['pass'] != $passwd_hash){
  die(json_encode(array("status"=>"Error")));
}

//MAKE RANDOMIZE ALPHABET//
$secretToken=sha1($seed.$user_data['id'].time());
//UPDATE TO DATABASE//
$dbobj->fetchALL("UPDATE usersessions SET token = ? WHERE login_id = ?",array($secretToken,$user_data['login_id']));


print json_enode(array("status"=>"success","token"=>$secretToken));


?>