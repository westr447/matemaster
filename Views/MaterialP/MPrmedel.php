<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$user->receivemessagedel($_GET['ID']);


include('MPfooter.php');
?>
