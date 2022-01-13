<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$user->sendmessagedel($_GET['ID']);
header('Location: MPmma.php');


include('MPfooter.php');
?>
