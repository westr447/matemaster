<?php
require_once(ROOT_PATH .'/Models/Models/MPDb.php');

class MPc extends MPDb {
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



  public function passr():Array{
    $sql = 'UPDATE usertable
    SET
    password = :password
    WHERE email =:email ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$email,PDO::PARAM_INT);
    $sth->execute(array(':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),':email' => $_POST['email']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function au():Array{
    $sql = 'SELECT
    ID,
    username,
    email
    FROM usertable
    WHERE del_flg =0 ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  }

  public function udel():Array{
    $sql = 'UPDATE usertable
    SET
    del_flg =1
    WHERE ID = :ID ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
    $sth->execute(array(':ID' => $_GET['ID']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function matedel($ID = 0):Array{
    $sql = 'UPDATE materialtable
    SET
    del_flg =1
    WHERE ID = :ID ';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
    $sth->execute(array(':ID' => $_GET['ID']));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    header('Location: ./materialma.php');


  }//素材削除

  public function likematedel($ID = 0):Array{
    $sql = 'DELETE FROM favoritematerialtable
    WHERE materialID = :materialID ';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':materialID',$materialID,PDO::PARAM_INT);
    $sth->execute(array(':materialID' => $_GET['ID']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    header('Location: ./MPlikem.php');


  }//お気に入り素材解除

  public function findById3($id = 0):Array{
    $sql = 'DELETE FROM contacts
    WHERE id = :id ';

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute(array(':id' => $_GET['id']));


    header('Location: cafecontact.php');
    exit();


  }

  public function logins():Array{
    $sql = 'SELECT
    ID,
    username,
    email,
    password,
    authority
    FROM usertable
    WHERE username = :username ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':username',$_POST['username'],PDO::PARAM_INT);

    $sth->execute(array(':username' => $_POST['username']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if(password_verify($_POST['password'], $result['0']['password'])){
      $result['ok']='1';
      return $result;
    }else{
      $result['ok']='0';
      return $result;
    };
    return $result;

  }

  public function logins2():Array{
    $sql = 'SELECT
    ID,
    username,
    email,
    password,
    authority
    FROM usertable
    WHERE email = :email ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':password',$_POST['password'],PDO::PARAM_INT);

    $sth->execute(array('email' => $_POST['email']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if(password_verify($_POST['password'], $result['0']['password'])){
      $result['ok']='1';
      return $result;
    }else{
      $result['ok']='0';
      return $result;
    };
    return $result;

  }

  public function newuserc($id = 0):Array{
    $sql = 'INSERT INTO usertable(username,email,password)
    VALUES (:username,:email,:password) ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$mail,PDO::PARAM_INT);
    $sth->execute(array('username' => $_POST['username'],':email' => $_POST['email'],':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }



  public function pos3($id = 0):Array{
    $sql = 'INSERT INTO materialtable(userid,categoryid,name,tag1,tag2,tag3,Lname,Mname,Sname,wideL,heightL,wideM,heightM,wides,heights,explanation)
    VALUES (:userid,:categoryid,:name,:tag1,:tag2,:tag3,:Lname,:Mname,:Sname,:wideL,:heightL,:wideM,:heightM,:wides,:heights,:explanation) ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
    $sth->execute(array(':userid' => $_POST['userid'],':categoryid' => $_POST['categoryid'],':name' => $_POST['name'],':tag1' => $_POST['tag1'],':tag2' => $_POST['tag2'],':tag3' => $_POST['tag3'],
    ':Lname' => $_POST['Lname'],':Mname' => $_POST['Mname'],':Sname' => $_POST['Sname'],':wideL' => $_POST['wideL'],':heightL' => $_POST['heightL'],':wideM' => $_POST['wideM'],
    ':heightM' => $_POST['heightM'],':wides' => $_POST['wideS'],':heights' => $_POST['heightS'],':explanation' => $_POST['explanation']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function pos2($id = 0):Array{
    $sql = 'INSERT INTO materialtable(userid,categoryid,name,tag1,tag2,tag3,Lname,Mname,wideL,heightL,wideM,heightM,explanation)
    VALUES (:userid,:categoryid,:name,:tag1,:tag2,:tag3,:Lname,:Mname,:wideL,:heightL,:wideM,:heightM,:explanation) ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
    $sth->execute(array(':userid' => $_POST['userid'],':categoryid' => $_POST['categoryid'],':name' => $_POST['name'],':tag1' => $_POST['tag1'],':tag2' => $_POST['tag2'],':tag3' => $_POST['tag3'],
    ':Lname' => $_POST['Lname'],':Mname' => $_POST['Mname'],':wideL' => $_POST['wideL'],':heightL' => $_POST['heightL'],':wideM' => $_POST['wideM'],
    ':heightM' => $_POST['heightM'],':explanation' => $_POST['explanation']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function pos1($id = 0):Array{
    $sql = 'INSERT INTO materialtable(userid,categoryid,name,tag1,tag2,tag3,Lname,wideL,heightL,explanation)
    VALUES (:userid,:categoryid,:name,:tag1,:tag2,:tag3,:Lname,:wideL,:heightL,:explanation) ';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
    $sth->execute(array(':userid' => $_POST['userid'],':categoryid' => $_POST['categoryid'],':name' => $_POST['name'],':tag1' => $_POST['tag1'],':tag2' => $_POST['tag2'],':tag3' => $_POST['tag3'],
    ':Lname' => $_POST['Lname'],':wideL' => $_POST['wideL'],':heightL' => $_POST['heightL'],':explanation' => $_POST['explanation']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  public function mlistall($page = 0):Array{
    if(isset($_SESSION['mlkey'])){
      $a=$_SESSION['mlkey'];
      $sql = 'SELECT
      ID,
      categoryid,
      name,
      tag1,
      tag2,
      tag3,
      explanation,
      Lname,
      likecount,
      download
      FROM materialtable
      WHERE del_flg = 0 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
      ORDER BY ID DESC ';
      $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
      $sth = $this->dbh->prepare($sql);
      $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }else{
      $sql = 'SELECT
      ID,
      categoryid,
      name,
      tag1,
      tag2,
      tag3,
      explanation,
      Lname,
      likecount,
      download
      FROM materialtable
      WHERE del_flg = 0
      ORDER BY ID DESC ';
      $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
  }

public function pamlistall($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0  AND userid = :userid AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['cid'],":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    userid,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND userid = :userid
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['cid']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function mlistall2($page = 0):Array{



  $sql = 'SELECT
  ID,
  categoryid,
  name,
  tag1,
  tag2,
  tag3,
  explanation,
  Lname,
  likecount,
  download
  FROM materialtable
  WHERE del_flg = 0
  ORDER BY ID DESC ';
  $sql .= ' LIMIT 5 OFFSET '.(5 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function mymateall($page = 0):Array{
  $sql = 'SELECT
  ID,
  userid,
  categoryid,
  name,
  tag1,
  tag2,
  tag3,
  explanation,
  Lname,
  likecount,
  download
  FROM materialtable
  WHERE del_flg = 0 AND userid =:userid
  ORDER BY ID DESC ';
  $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array('userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function mymateall2($page = 0):Array{
  $sql = 'SELECT
  ID,
  userid,
  name,
  Lname,
  likecount,
  download
  FROM materialtable
  WHERE del_flg = 0 AND userid =:userid
  ORDER BY ID DESC ';
  $sql .= ' LIMIT 4 OFFSET '.(4 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array('userid' => $_SESSION['fuseridlist']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function bkmall($page = 0):Array{
  $sql = 'SELECT *
  FROM materialtable
  WHERE ID IN(SELECT materialid FROM favoritematerialtable WHERE userid = :userid)
  ORDER BY ID DESC ';
  $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array('userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}



public function mlistallirast($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =1 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =1
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}


public function mlistallpic($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function mlistallch($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3
    ORDER BY ID DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}


public function mlistallr($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation) ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 ';

    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function mlistallrirast($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 1 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation) ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 1 ';

    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function mlistallrpic($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 2 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation) ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2 ';

    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function mlistallrch($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 3 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation) ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3 ';

    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function po($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function po2($page = 0):Array{
  $sql = 'SELECT
  ID,
  categoryid,
  name,
  tag1,
  tag2,
  tag3,
  explanation,
  Lname,
  likecount,
  download
  FROM materialtable
  WHERE del_flg = 0
  ORDER BY likecount + download DESC ';
  $sql .= ' LIMIT 5 OFFSET '.(5 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function poirast($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 1 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =1
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function popic($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 2 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function poch($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid = 3 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3
    ORDER BY likecount + download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function do($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function doirast($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =1 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =1
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function dopic($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =2
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

public function doch($page = 0):Array{
  if(isset($_SESSION['mlkey'])){
    $a=$_SESSION['mlkey'];
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3 AND (name like :name or tag1 like :tag1 or tag2 like :tag2 or tag3 like :tag3 or explanation like :explanation)
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(":name" => "%$a%",":tag1" => "%$a%",":tag2" => "%$a%",":tag3" => "%$a%",":explanation" => "%$a%"));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }else{
    $sql = 'SELECT
    ID,
    categoryid,
    name,
    tag1,
    tag2,
    tag3,
    explanation,
    Lname,
    likecount,
    download
    FROM materialtable
    WHERE del_flg = 0 AND categoryid =3
    ORDER BY download DESC ';
    $sql .= ' LIMIT 10 OFFSET '.(10 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}





/**

*
*@return Int
*/

public function countAll():Int {
    $sql = 'SELECT count(*) as count FROM materialtable ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
}


public function mycount():Int {
    $sql = 'SELECT count(*) as count FROM materialtable
    WHERE del_flg = 0 AND userid =:userid ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array('userid' => $_SESSION['ID']));
    $count = $sth->fetchColumn();
    return $count;
}
public function cmcount():Int {
    $sql = 'SELECT count(*) as count FROM materialtable
    WHERE del_flg = 0 AND userid =:userid ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array('userid' => $_SESSION['cid']));
    $count = $sth->fetchColumn();
    return $count;
}
public function madt():Array{
  $sql = 'SELECT
  ID,
  userid,
  categoryid,
  name,
  tag1,
  tag2,
  tag3,
  Lname,
  Mname,
  Sname,
  wideL,
  heightL,
  wideM,
  heightM,
  wides,
  heights,
  explanation
  FROM materialtable
  WHERE ID = :ID ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['id']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

public function booku():Array{
  $sql = 'SELECT
  ID,
  username
  FROM usertable
  WHERE ID IN (SELECT fuseid FROM favoriteusertable WHERE userid=:userid) ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function checkgood(){
    $sql = 'SELECT *
            FROM likematerialtable
            WHERE userid = :userid AND materialID = :materialID ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] ,
                         ':materialID' => $_SESSION['materialID']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


public function checkma(){
    $sql = 'SELECT *
            FROM favoritematerialtable
            WHERE userid = :userid AND materialID = :materialID ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] ,
                         ':materialID' => $_SESSION['materialID']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function checkmau(){
    $sql = 'SELECT *
            FROM favoriteusertable
            WHERE userid = :userid AND fuseid = :fuseid ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] ,
                         ':fuseid' => $_SESSION['fuseid']));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function nogoodact(){
    $sql = 'DELETE
            FROM likematerialtable
            WHERE :userid = userid AND :materialID = materialID ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] , ':materialID' => $_SESSION['materialID']));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

public function goodact():Array{
  $sql = 'INSERT INTO likematerialtable(userid,materialID)
  VALUES(:userid,:materialID) ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':userid' => $_SESSION['ID'] , ':materialID' => $_SESSION['materialID']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}


public function nomarkact(){
    $sql = 'DELETE
            FROM favoritematerialtable
            WHERE :userid = userid AND :materialID = materialID ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] , ':materialID' => $_SESSION['materialID']));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

public function markact():Array{
  $sql = 'INSERT INTO favoritematerialtable(userid,materialID)
  VALUES(:userid,:materialID) ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':userid' => $_SESSION['ID'] , ':materialID' => $_SESSION['materialID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function markuact():Array{
  $sql = 'INSERT INTO favoriteusertable(userid,fuseid)
  VALUES(:userid,:fuseid) ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':userid' => $_SESSION['ID'] , ':fuseid' => $_SESSION['fuseid']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function nomarkuact(){
    $sql = 'DELETE
            FROM favoriteusertable
            WHERE :userid = userid AND :fuseid = fuseid ';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array(':userid' => $_SESSION['ID'] , ':fuseid' => $_SESSION['fuseid']));
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}


public function rm($id = 0):Array{
  $sql = 'INSERT INTO requesttable(userid,Rtag,title,message)
  VALUES (:userid,:Rtag,:title,:message) ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_POST['userid'],':Rtag' => $_POST['Rtag'],':title' => $_POST['title'],':message' => $_POST['message']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function reqall():Array{
  $sql = 'SELECT
  ID,
  title
  FROM requesttable
  WHERE del_flg = 0
  ORDER BY ID DESC ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function reqall2($page = 0):Array{
  $sql = 'SELECT
  ID,
  title
  FROM requesttable
  WHERE del_flg = 0
  ORDER BY ID DESC ';
  $sql .= ' LIMIT 5 OFFSET '.(5 * $page);
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function reqallr():Array{
  $sql = 'SELECT
  ID,
  title
  FROM requesttable
  WHERE del_flg = 0 ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function reqd():Array{
  $sql = 'SELECT
  ID,
  Rtag,
  title,
  message
  FROM requesttable
  WHERE ID = :ID ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['id']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

public function ruser():Array{
  $sql = 'SELECT
  ID,
  username
  FROM usertable
  WHERE del_flg = 0 AND ID = :ID ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':ID' => $_SESSION['cid']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function suser():Array{
  $sql = 'SELECT
  ID,
  username
  FROM usertable
  WHERE del_flg = 0 AND ID = :ID ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':ID' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function msend():Array{
  $sql = 'INSERT INTO messagetable(userid,receive_user_id,title,message)
  VALUES (:userid,:receive_user_id,:title,:message) ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_SESSION['ID'],':receive_user_id' => $_POST['rid'],':title' => $_POST['title'],':message' => $_POST['message']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function msend2():Array{
  $sql = 'UPDATE messagetable
  SET
  title = :title,
  message = :message,
  unfinished = 0
  WHERE ID = :ID AND hide = 0 ';

  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_POST['messageid'],':title' => $_POST['title'],':message' => $_POST['message']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function dlc():Array{
  $sql = 'UPDATE materialtable
  SET
  download = download + 1
  WHERE ID = :ID ';

  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_POST['materialID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function mbreak():Array{
  $sql = 'INSERT INTO messagetable(userid,receive_user_id,title,message,unfinished)
  VALUES (:userid,:receive_user_id,:title,:message,:unfinished) ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_SESSION['ID'],':receive_user_id' => $_SESSION['meid'],':title' => $_POST['title'],':message' => $_POST['message'],':unfinished' => 1));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function mbreak2():Array{//中断データを再度保存
  $sql = 'UPDATE messagetable
  SET
  userid=:userid,
  receive_user_id=:receive_user_id,
  title=:title,
  message=:message,
  unfinished=:unfinished ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_SESSION['ID'],':receive_user_id' => $_SESSION['meid'],':title' => $_POST['title'],':message' => $_POST['message'],':unfinished' => 1));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function mbreak3():Array{//既に中断データあり
  $sql = 'UPDATE messagetable
  SET
  userid=:userid,
  receive_user_id=:receive_user_id,
  title=:title,
  message=:message,
  unfinished=:unfinished
  WHERE userid=:userid AND unfinished=1';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':userid',$userid,PDO::PARAM_INT);
  $sth->execute(array(':userid' => $_SESSION['ID'],':receive_user_id' => $_SESSION['meid'],':title' => $_POST['title'],':message' => $_POST['message'],':unfinished' => 1));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function sendmall():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE hide = 0 AND unfinished = 0 AND userid =:userid
  ORDER BY ID DESC ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function sendmallr():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE hide = 0 AND unfinished = 0 AND userid =:userid ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
public function sendmed():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE ID = :ID AND userid = :userid ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['id'],':userid' => $_SESSION['ID']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}

public function sendmed2():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE userid = :userid AND unfinished= 1 AND hide =0 ';
  $sth = $this->dbh->prepare($sql);
  
  $sth->execute(array(':userid' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


public function reseivemed():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE ID = :ID AND receive_user_id = :receive_user_id ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['id'],':receive_user_id' => $_SESSION['ID']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  return $result;
}


public function sendmedel():Array{
  $sql = 'UPDATE messagetable
  SET
  hide = 1
  WHERE ID = :ID AND userid = :userid ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['ID'],':userid' => $_SESSION['ID']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  header('Location: ./MPmma.php');

}


public function recmedel():Array{
  $sql = 'UPDATE messagetable
  SET
  hide = 1
  WHERE ID = :ID AND receive_user_id = :receive_user_id ';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(':ID',$ID,PDO::PARAM_INT);
  $sth->execute(array(':ID' => $_GET['ID'],':receive_user_id' => $_SESSION['ID']));
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  header('Location: ./MPrmlist.php');

}

public function receivemall():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE hide = 0 AND unfinished = 0 AND receive_user_id =:receive_user_id
  ORDER BY ID DESC ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':receive_user_id' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

public function receivemallr():Array{
  $sql = 'SELECT
  ID,
  userid,
  receive_user_id,
  title,
  message,
  unfinished,
  hide
  FROM messagetable
  WHERE hide = 0 AND unfinished = 0 AND receive_user_id =:receive_user_id ';
  $sth = $this->dbh->prepare($sql);
  $sth->execute(array(':receive_user_id' => $_SESSION['ID']));
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}





}
 ?>
