<?php
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$user = new UserController();

if($_POST['materialL']){
  $picture1a=$_POST['materialL']['tmpname'];
  $picture1b=$_POST['Lname'];

}else{
  header('Location: materialpost.php');
};
if($_POST['materialM']){
  $picture2a=$_POST['materialM']['tmpname'];
  $picture2b=$_POST['Mname'];
};
if($_POST['materialS']){
  $picture3a=$_POST['materialS']['tmpname'];
  $picture3b=$_POST['Sname'];
};


// ②tmp内のファイルをmainディレクトリに移す

if($_POST['materialS']){
  if(rename($picture1a,"Mimg/$picture1b")){
    if(rename("$picture2a","Mimg/$picture2b")){
      if(rename("$picture3a","Mimg/$picture3b")){
        $params = $user->post3();
        header('Location: materialma.php');//仮移動。素材管理からそれぞれの自素材詳細に移動できるようになったら自素材詳細画面に変更する。

      }else{
        $_SESSION['mperr'] = '1';
        unlink("../../$picture1a");
        unlink("../../$picture2a");
        unlink("../../$picture3a");
        header('Location: materialpost.php');
      };
    }else{
      $_SESSION['mperr'] = '1';
      unlink("../../$picture1a");
      unlink("../../$picture2a");
      header('Location: materialpost.php');
    };
  }else{
    $_SESSION['mperr'] = '1';
    nlink("../../$picture1a");
    header('Location: materialpost.php');
  };
}else if($_POST['materialM']){
  if(rename($picture1a,"Mimg/$picture1b")){
    if(rename("$picture2a","Mimg/$picture2b")){
      $params = $user->post2();
      header('Location: materialma.php');//仮移動。素材管理からそれぞれの自素材詳細に移動できるようになったら自素材詳細画面に変更する。
    }else{
      $_SESSION['mperr'] = '1';
      unlink("../../$picture1a");
      unlink("../../$picture2a");
      header('Location: materialpost.php');
    };
  }else{
    $_SESSION['mperr'] = '1';
    nlink("../../$picture1a");
    header('Location: materialpost.php');
  };
}else if($_POST['materialL']){
  if(rename($picture1a,"Mimg/$picture1b")){
    $params = $user->post1();
    header('Location: materialma.php');//仮移動。素材管理からそれぞれの自素材詳細に移動できるようになったら自素材詳細画面に変更する。
  }else{
    $_SESSION['mperr'] = '1';
    nlink("../../$picture1a");
    header('Location: materialpost.php');
  };
};





var_dump($_POST);
var_dump($picture1a);
var_dump($picture1b);
var_dump($picture2a);
var_dump($picture3a);
?>
