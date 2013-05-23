<?php
require_once('./dbconnect.php');

function checkLoginRequest($user_id,$passwd){
  //DEFINE this outside of this func
  $seed=""61737b06cff3d7f999c297d96f2b20007521eee1";
  
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from userdata WHERE uname = ?",array($user_id));
  $passwd_hash=sha1($seed.$passwd);
  if($user_array['passwd']!=$passwd_hash){
    perror('6000','login_error');
    return false;
  }else{
    //MAKE RANDOMIZE ALPHABET//
    $secretToken=sha1($seed.$user_array['uname'].time());
    //UPDATE TO DATABASE//
    $dbobj->fetchALL("UPDATE usersessions SET ? = '?' WHERE uname= ?",array($user_id,$secretToken,$user_id));
        
    //SET ENV//
    //return true;
    return $secretToken;
  }
function getSecretToken($user_id){
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from usersessions WHERE uname = ?",array($user_id));
  $secretToken=$user_array['token'];
  return $secreToken;
}

}

?>
