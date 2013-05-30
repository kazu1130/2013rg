<?php
class User {
  public $id,$name;
  private function __construct($id){
    $dbh = DBConnection::getInstance();
    $dbq = $dbh-> fetchAll("SELECT * FROM users WHERE id=?",array($id));
    $this->name = $dbq[0]["name"];
    $this->id = $dbq[0]["id"];
  }
  function getInstance($session_id){
    $dbh = DBConnection::getInstance();
    $user_array = $dbh->fetchALL("SELECT * from usersessions WHERE token = ?",array($token));
    if($user_array[0] == null){
      //ERROR
      die();
    }
    return new User($user_array[0]["id"]);
  }
}

?>