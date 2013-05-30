<?php
require_once('./class/consts.php');
require_once('./class/dbconnect.php');
require_once('./class/user.php');


$mparlat = 111263.28336;
$mparlan = 91159.16112;

$user = User::getInstance($_GET["session_id"]);
$dbh = DBConnection::getInstance();


$stores = $dbh->fetchAll("SELECT * FROM stores WHERE (lat > ? AND lat < ?) AND (lon > ? OR lon < ?)",array(
  $_GET["lat"] - (10 / $mparlat),
  $_GET["lat"] + (10 / $mparlat),
  $_GET["lon"] - (10 / $mparlon),
  $_GET["lon"] + (10 / $mparlon)
  ));


$ret_stores = array();

for($i=0;$i<length($stores);++$i){
  $comments = $dbh->fetchAll("SELECT * FROM comments WHERE store_id = ?",array($stores[$i]["id"]));
  $ret_comments = array();
  for($t=0;$t<length($comments);++$t){
    $user_data = $dbh->fetchAll("SELECT * FROM users WHERE id = ?",array($comments[$t]["user_id"]));
    $ret_comments[] = array("comment" =>
                                    array("username"=>$user_data[0]["name"],
                                          "comment"=>$comments[$t]["comment"]
                                          )
                            );
  }
  $ret_stores[] = array("store_id"   => $stores[$i]["id"],
                        "store_name" => $stores[$i]["name"],
                        "lat"        => $stores[$i]["lat"],
                        "lon"        => $stores[$i]["lon"],
                        "comments"   => $ret_comments
                       );
}


print json_encode(array("status"=>success,$ret_stores);


?>