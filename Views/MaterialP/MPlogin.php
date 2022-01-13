<?php

include('MPheader.php');


require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();



 ?>
 <script type="text/javascript">
 var key ='<?= $_SESSION['userauthority'] ?>';
 if(key = 3){
   alert("ユーザー登録していない、またはユーザー名かパスワードが間違っています");
   <?php
   $_SESSION = array();
   session_destroy();

   ?>
 };


 </script>

<?php
$_SESSION['flg'] = 100;
var_dump($_SESSION);
 ?>


  <div class="loginpl">
    <h1>ログイン</h1>
  </div>
  <form method="POST" id="bfo">
    <div class="formlog">
        <label class="label">ユーザー名：<label>
        <input id="sform1" type="text" name="username" value="" class="validate[required,minSize[1],maxSize[20]]" autocomplte="off"/>
    </div>
    <div class="formlog">
        <label class="label">パスワード：<label>
        <input id="sform3" type="password" name="password" value="" class="validate[required,minSize[1],maxSize[20]]" autocomplte="off"/>
    </div>

    <div class="form-item">
      <input type="hidden" name="token" value="<?=$token="loginclick" ?>">
    </div>
    <div class="form-item">
      <input type="hidden" name="flg" value= 100>
    </div>
    <button type="submit" formaction="index.php" form="bfo" id="loginbu"><p>ログイン</p></button>
  </form>
  <div class="ellog">
    <a class="ellogin" href ="./MPusernamefg.php">ユーザー名を忘れた方はこちら</a><br>
    <a class="ellogin" href ="./MPpassfg.php">パスワードを忘れた方はこちら</a><br>
    <a class="ellogin" href ="./MPnewuser.php">新規登録はこちら</a>
  </div>

  <div class ="foot"></div>


</body>

</html>
