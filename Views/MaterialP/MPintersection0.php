<?php
include('MPheader.php');
echo$_SESSION['mr'];
if($_SESSION['mr']=='m'){
  $_SESSION['mtso']=0;
  header('Location: ./materiallist.php');
}else if($_SESSION['mr']=='r'){
  $_SESSION['mtso']=0;
  header('Location: ./MPrequestlist.php');
}

include('MPfooter.php');
?>
