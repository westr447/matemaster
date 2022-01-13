<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$user = new UserController();


if(!($_POST['title'])){
  header('Location: ./index.php');
}else if(!($_POST['message'])){
  header('Location: ./index.php');
}else if($_POST['save']){
  $params = $user->messend2();
  header('Location: ./MPmma.php');
}else{
  $params = $user->messend();
  header('Location: ./MPmma.php');
};

include('MPfooter.php');
?>
