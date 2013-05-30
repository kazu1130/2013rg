<?php

getSTATIC($id){
switch ($id){
  case "Configpath":
    $return = "./configure";
    break;
  case "MasterSeed":
    $return = "61737b06cff3d7f999c297d96f2b20007521eee1";
    break;
  }
  
  if($return){
    return $return;
  }else{
    return false;
    }
  
}


?>
