<?php

class DBConnection {

  private $dbh;
  private static $instance = null;

  private function __construct() {
    $dbh = new PDO(CONSTS::DB_SN, CONSTS::DB_USER, CONSTS::DB_PASS);
    if ($dbh == null){
        die("Error");
    }
  }

  public static function getInstance(){
    if($instance == null){
      $instance = new DBConnection();
    }
    return $instance;
  }

  public function fetchAll($query,$val){
    try {
      $stmt = $dbh->prepare($query);
      $stmt->execute($val);
      return $sth->fetchAll();
    }catch (PDOException $e){
      die("QUERY ERROR");
    }
  }

  function __destruct() {
    /* 接続を閉じます */
    $dbh = null;
  }
}

?>
