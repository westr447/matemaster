<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$user = new UserController();
$params = $user->sendmessagedeteal2();
$a = $params;

if(!($_POST['title'])){
  header('Location: ./index.php');
}else if(!($_POST['message'])){
  header('Location: ./index.php');
}else if($_SESSION['saveflg']=='1'){
  $_SESSION['saveflg']=0;
  $params = $user->mebreak2();
  header('Location: ./MPmma.php');
}else if($a['messagetable']){
  $params = $user->mebreak3();
  header('Location: ./MPmma.php');
}else{
  $params = $user->mebreak();
  header('Location: ./MPmma.php');
};


include('MPfooter.php');
?>
