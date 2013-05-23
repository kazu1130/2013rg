<?php
require_once('./dbconnect.php');

function checkLoginRequest($user_id,$passwd){
  //DEFINE this outside of this func
  $seed=""61737b06cff3d7f999c297d96f2b20007521eee1";
  
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from userdata WHERE login_id = ?",array($login_id));
  $pass_hash=sha1($seed.$pass);
  if($user_array['passwd']!=$pass_hash){
    perror('6000','login_error');
    return false;
  }else{
    //MAKE RANDOMIZE ALPHABET//
    $secretToken=sha1($seed.$user_array['login_id'].time());
    //UPDATE TO DATABASE//
    $dbobj->fetchALL("UPDATE usersessions SET ? = '?' WHERE login_id= ?",array($login_id,$secretToken,$user_id));
        
    //SET ENV//
    //return true;
    return $secretToken;
  }
function getSecretToken($login_id){
  $dbobj = DBConnection::getInstance();
  $user_array=$dbobj->fetchALL("SELECT * from usersessions WHERE login_id = ?",array($login_id));
  $secretToken=$user_array['token'];
  return $secretToken;
}

}

?>
