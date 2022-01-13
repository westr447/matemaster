<?php
include('MPheader.php');
if($_GET['categoryid']=="1"){
    $_SESSION['mlcategory']=1;
    header('Location: ./materiallist.php');
  }else if($_GET['categoryid']=="2"){
    $_SESSION['mlcategory']=2;
    header('Location: ./materiallist.php');
  }else if($_GET['categoryid']=="3"){
    $_SESSION['mlcategory']=3;
    header('Location: ./materiallist.php');
  }else{
    $_SESSION['mlcategory']=0;
    header('Location: ./materiallist.php');
  };
include('MPfooter.php');
?>
