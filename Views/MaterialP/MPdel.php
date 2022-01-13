<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$user->del($_GET['ID']);

header('Location: ./materialma.php');

include('MPfooter.php');
?>
