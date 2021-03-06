<?php
require_once(ROOT_PATH .'/MPdatabase.php');

class MPDb {
  protected $dbh;

  public function __construct($dbh = null) {
      if(!$dbh) { // 接続情報が存在しない場合
          try{
            $option =
            [ //エミュレートモードをOFFにする
              PDO::ATTR_EMULATE_PREPARES=>false
            ];
             $this->dbh = new PDO(
                  'mysql:dbname='.DB_NAME.
                  ';host='.DB_HOST,DB_USER,DB_PASSWORD,$option
             );
             //接続成功
          } catch (PDOException $e){
              echo "接続失敗: ". $e->getMessage() . "\n";
              exit();
          }
      } else {//接続情報が存在する場合
          $this->dbh = $dbh;
      }
  }
  public function get_db_handler(){
    return $this->dbh;
  }
}

 ?>
