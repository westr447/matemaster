<?php
session_start();
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

if($_SESSION['flg'] != 11){
  header('Location: index.php');
  exit();
};

$user = new UserController();
$params = $user->passre();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <title>MaterialPoint</title>
   <link rel="stylesheet" type="text/css" href="../../CSS\mp.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 </head>
 <body>
   <p>パスワードを変更しました。</p>
   <button class="returnlogin" onclick="location.href='MPlogin.php'">ログイン画面へ戻る</button>
</body>

</html>
