<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$user->likematerialdel($_GET['ID']);

header('Location: ./MPlikem.php');

include('MPfooter.php');
?>
