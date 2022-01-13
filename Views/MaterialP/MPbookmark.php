<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();

?>

<script src=" https://code.jquery.com/jquery-3.4.1.min.js "></script>

<?php


$_SESSION['materialID']=$_POST['materialID'];
$mark = $user->checkmark();
$a=$mark['favoritematerialtable'];
if($a){
  $params = $user->nomarkaction();
  
}else{
  $params = $user->markaction();
  

};


include('MPfooter.php');
?>
