<?php
function init(){
  //autoLoader
  spl_autoload_register(function my_autoload ($pClassName) {
    include(__DIR__ . "../class/" . $pClassName . ".php");
  });

  header("X-Content-Type-Options: nosniff");
}

function error_exit($text){
  //���O�ɏ��������Ƃ�����ƍK���ɂȂ��C�����Ȃ����Ȃ��H
  die(json_encode(array("status"=>"error","text"=>$text));
}

?>