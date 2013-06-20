<?php
function myautoloader ($pClassName) {
    include(dirname(__FILE__) . "/../class/" . $pClassName . ".php");
  }

function init(){
  //autoLoader

  spl_autoload_register("myautoloader");

  header("X-Content-Type-Options: nosniff");
}

function error_exit($text){
  //ログに書く処理とかあると幸せになれる気がしなくもない？
  die(json_encode(array("status"=>"error","text"=>$text)));
}

?>