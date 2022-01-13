<?php
require_once(ROOT_PATH .'/Models/Models/CafeDb.php');

class Cafec extends CafeDb {
  private $table ='users';
  public function __construct($dbh = null) {
      parent::__construct($dbh);
    }



  public function findAll():Array {
      $sql = 'SELECT *
              FROM contacts ';

      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }



  public function findById($id = 0):Array{
    $sql = 'SELECT *
            FROM contacts ';
    $sql .= ' WHERE id = :id ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }



  public function findById2():Array{
    $sql = 'UPDATE contacts
    SET
    name = :name,
    kana = :kana,
    tel = :tel,
    email =:email,
    body=:body
    WHERE id =:id ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute(array(':id' => $_POST['id'],':name' => $_POST['name'],':kana' => $_POST['kana'],':tel' => $_POST['tel'],':email' => $_POST['email'],':body' => $_POST['body']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function findById3($id = 0):Array{
    $sql = 'DELETE FROM contacts
    WHERE id = :id ';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute(array(':id' => $_GET['id']));


    header('Location: cafecontact.php');
    exit();


  }

  public function findById4():Array{
    $sql = 'INSERT INTO contacts(name,kana,tel,email,body)
    VALUES(:namae,:kana,:tell,:mel,:tona) ';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':namae',$POST['name'],PDO::PARAM_INT);

    $sth->execute(array(':namae' => $_POST['name'],':kana' => $_POST['hurigana'],':tell' => $_POST['tel'],':mel' => $_POST['mail'],':tona' => $_POST['toinaiyou']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;


  }


}
 ?>
