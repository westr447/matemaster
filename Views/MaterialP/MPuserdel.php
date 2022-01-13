<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$user->userdel($_GET['ID']);
header('Location: ./userma.php');
var_dump($_GET);
include('MPfooter.php');
?>
