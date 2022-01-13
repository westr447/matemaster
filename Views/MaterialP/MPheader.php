<?php
session_start();

$token = sha1(uniqid(rand(), true));
$_SESSION['key'] = $token;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MaterialPoint</title>
  <link rel="stylesheet" type="text/css" href="../../CSS\mp.css">
  <link rel="stylesheet" href="../../CSS\validationEngine.jquery.css">
  <script type="text/javascript"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../../js\jquery.validationEngine-ja.js" charset="UTF-8"></script>
  <script src="../../js\jquery.validationEngine.js"></script>
  <script type="text/javascript">
    jQuery(function(){
      jQuery("#bfo").validationEngine(
        'attach', {
          promptPosition: "bottomRight:10px"
        }
      );
    });
  </script>
  <script type="text/javascript">
    jQuery(function(){
      jQuery("#bfo2").validationEngine(
        'attach', {
          promptPosition: "bottomLeft:10px"
        }
      );
    });
  </script>


</head>
<body>
  <div class="box">
    <div class="headm">
      <div class="headt">
        <img src="../../img\MPlogo.png" >
      </div>
      <div class="menu">
        <ul>
          <li><a href="./index.php">TOP</a></li>
          <li><a href="./materiallist.php">素材一覧</a></li>
          <li><a href="./materialpost.php">素材投稿</a></li>
          <li><a href="./MPuserpage.php">ユーザーページ</a></li>
        </ul>
      </div>
    </div>
