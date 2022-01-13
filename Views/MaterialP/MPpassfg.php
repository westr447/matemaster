<?php

include('MPheader.php');


require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$_SESSION['flg'] = 11;

 ?>

 


  <div class="loginpl">
    <h1>登録しているメールアドレスと新しいパスワードを入力してください</h1>
  </div>
  <form method="POST" id="bfo">
    <div class="formlog">
        <label class="label">メールアドレス：<label>
        <input id="sform1" type="email" name="email" value="" class="validate[required,custom[email]]" autocomplte="off" required/>
    </div>
    <div class="formlog2">
        <label class="label">パスワード：<label>
        <input id="sform3" type="password" name="password" class="validate[required,minSize[1],maxSize[20]]" required/>
    </div>
    <div class="formlog3">
        <label class="label">パスワード(確認用)：<label>
        <input id="sform4" type="password" name="kakupass" class="validate[required,minSize[1],maxSize[20],equals[sform3]]" required/>
    </div>

    <div class="form-item">
      <input type="hidden" name="token" value="<?=$token ?>">
    </div>
    <div class="passr">
      <button type="submit" formaction="MPpassc.php" form="bfo" id="passrsousin"><p>送信</p></button>
      <button class="returnpr" type="button" onclick="history.back(-1);return false;">戻る</button>
    </div>
  </form>

  <div class ="foot"></div>

</body>

</html>
