<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();

?>

<script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>

<?php

var_dump($_POST);
$_SESSION['fuseid']=$_POST['userid'];
$mark = $user->checkmarkuser();
$a=$mark['favoriteusertable'];
if($a){
  $params = $user->nomarkuaction();

}else{
  $params = $user->markuaction();


};


include('MPfooter.php');
?>
