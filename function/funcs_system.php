<?php
function init(){
  //autoLoader
  spl_autoload_register(function my_autoload ($pClassName) {
    include(__DIR__ . "../class/" . $pClassName . ".php");
  });

  header("X-Content-Type-Options: nosniff");
}

function error_exit($text){
  //ƒƒO‚É‘‚­ˆ—‚Æ‚©‚ ‚é‚ÆK‚¹‚É‚È‚ê‚é‹C‚ª‚µ‚È‚­‚à‚È‚¢H
  die(json_encode(array("status"=>"error","text"=>$text));
}

?>