<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();

?>

<script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>

<?php


$_SESSION['materialID']=$_POST['materialID'];
var_dump($_SESSION['materialID']);
$params = $user->dlcount();


include('MPfooter.php');
?>
