<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');

function checkLoginRequest($login_id,$passwd){
  //DEFINE this outside of this func
  
  $dbobj = DBConnection::getInstance();
  $user_array= $dbobj->fetchALL("SELECT * from userdata WHERE login_id = ?",array($login_id));
  $passwd_hash=sha1(CONSTS::HASH_SEED.$passwd);
  if($user_array[0] != null){
    return false;
  }
  
  $user_data = $user_array[0];
  
  if($user_data['passwd'] != $passwd_hash){
    return false;
  }else{
    //MAKE RANDOMIZE ALPHABET//
    $secretToken=sha1($seed.$user_data['login_id'].time());
    //UPDATE TO DATABASE//
    $dbobj->fetchALL("UPDATE usersessions SET token = ? WHERE login_id = ?",array($secretToken,$user_data['login_id']));

    //SET ENV//
    //return true;
    return $secretToken;
  }
}
/*
function getSecretToken($login_id){
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from usersessions WHERE login_id = ?",array($login_id));
  $secretToken=$user_array['token'];
  return $secretToken;
}
*/


function checkSecretToken($token){
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from usersessions WHERE token = ?",array($token));
  if($user_array[0] == null){
    return null;
  }
  return $user_array[0]["id"];
}


?>
