<?php
 require_once './consts.php';
class DBConnection {

  private $dbh;
  private static $instance = null;

  private function __construct() {
    $this->dbh = new PDO(CONSTS::DB_SN, CONSTS::DB_USER, CONSTS::DB_PASS);
    if ($this->dbh == null){
        die("Error");
    }
  }

  public static function getInstance(){
    if(DBConnection::$instance == null){
      DBConnection::$instance = new DBConnection();
    }
    return DBConnection::$instance;
  }

  public function fetchAll($query,$val){
    try {
      $prepared = $this->dbh->prepare($query);
      $prepared->execute($val);
      return $prepared->fetchAll();
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
