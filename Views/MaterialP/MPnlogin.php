<?php


require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$_SESSION['flg'] = 2;

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
   <p>ログインしてください。</p>
   <div class="nlog">
     <div class="na">
       <button class="returnlogin2" onclick="location.href='MPlogin.php'">ログイン画面へ戻る</button>
     </div>
    <div class="nb">
      <button class="returnlogin2" onclick="location.href='./index.php'">TOPに戻る</button>
    </div>
   </div>
</body>

</html>
