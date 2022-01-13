<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$user = new UserController();


if(!($_POST['Rtag'])){
  header('Location: ./MPrequest.php');
}else{
  $params = $user->reqestmes();
  header('Location: ./MPrequestlist.php');
};

include('MPfooter.php');
?>
