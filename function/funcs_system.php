<?php
function init(){
  //autoLoader
  spl_autoload_register(function my_autoload ($pClassName) {
    include(__DIR__ . "../class/" . $pClassName . ".php");
  });

  header("X-Content-Type-Options: nosniff");
}

function error_exit($text){
  //ログに書く処理とかあると幸せになれる気がしなくもない？
  die(json_encode(array("status"=>"error","text"=>$text));
}

?>