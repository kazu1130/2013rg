<?php

function error_exit($text){
  //ログに書く処理とかあると幸せになれる気がしなくもない？
  die(json_encode(array("status"=>"error","text"=>$text));
}

?>