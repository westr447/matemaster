<?php

include('MPheader.php');


require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$_SESSION['flg'] = 150;

 ?>

 <script type="text/javascript">
 var key ='<?= $_SESSION['userauthority'] ?>';
 if(key = 3){
   alert("ユーザー登録していない、またはメールアドレスかパスワードが間違っています");
   <?php
   $_SESSION = array();
   session_destroy();

   ?>
 };


 </script>

<?php
$_SESSION['flg'] = 150;
var_dump($_SESSION);
 ?>


  <div class="loginpl">
    <h1>登録しているメールアドレスとパスワードを入力してください</h1>
  </div>
  <form method="POST" id="bfo">
    <div class="formlog">
        <label class="label">メールアドレス：<label>
        <input id="sform1" type="email" name="email" value="" class="validate[required,custom[email]]" autocomplte="off" required/>
    </div>
    <div class="formlog2">
        <label class="label">パスワード：<label>
        <input id="sform3" type="password" name="password" value="" class="validate[required,minSize[1],maxSize[20]]" autocomplte="off"/>
    </div>
    <div class="form-item">
      <input type="hidden" name="token" value="<?=$token="loginclick" ?>">
    </div>
    <div class="form-item">
      <input type="hidden" name="flg" value= 150>
    </div>
    <div class="passr">
      <button id="passrsousin" type="submit" formaction="index.php" form="bfo"><p> 送信</p></button>
      <button class="returnpr" type="button" onclick="history.back(-1);return false;">戻る</button>
    </div>
  </form>

  <div class ="foot"></div>

</body>

</html>
