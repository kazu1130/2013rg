<?php
require_once('./dbconnect.php');

function checkLoginRequest($login_id,$passwd){
  //DEFINE this outside of this func
  $seed="61737b06cff3d7f999c297d96f2b20007521eee1";
  
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from userdata WHERE login_id = ?",array($login_id));
  $passwd_hash=sha1($seed.$passwd);
  if($user_array[0] != null){
    perror('6000','login_error');
    return false;
  }
  if($user_array[0]['passwd'] != $passwd_hash){
    perror('6000','login_error');
    return false;
  }else{
    //MAKE RANDOMIZE ALPHABET//
    $secretToken=sha1($seed.$user_array['login_id'].time());
    //UPDATE TO DATABASE//
    $dbobj->fetchALL("UPDATE usersessions SET token = ? WHERE login_id = ?",array($secretToken,$login_id));

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
  return $user_array[0]["login_id"];
}


?>
