<?php

include('MPheader.php');


require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$_SESSION['flg'] = 10;

 ?>


  <div class="loginpl">
    <h1>登録したいメールアドレス、ユーザー名、パスワードを入力してください</h1>
  </div>
  <form method="POST" id="bfo">
    <div class="formlog">
        <label class="label">メールアドレス：<label>
        <input id="sform1" type="email" name="email" value="" class="validate[required,custom[email]]" autocomplte="off" required/>
    </div>
    <div class="formlog2">
        <label class="label">ユーザー名：<label>
        <input id="sform2" type="text" name="username" class="validate[required,minSize[1],maxSize[20]]" autocomplte="off" required/>
    </div>
    <div class="formlog2">
        <label class="label">パスワード：<label>
        <input id="sform3" type="password" name="password" class="validate[required,minSize[1],maxSize[20]]" required/>
    </div>
    <div class="formlog3">
        <label class="label">パスワード(確認用)：<label>
        <input id="sform4" type="password" name="kakupass" class="validate[required,minSize[1],maxSize[20],equals[sform3]]" required/>
    </div>
    <div class="passr">
      <div>
        <div class="form-item">
          <input type="hidden" name="token" value="<?=$_SESSION['flg'] ?>">
        </div>
        <button type="submit" formaction="MPnewuc.php" form="bfo" id="passrsousin"><p>送信</p></button>
      </div>
      <button class="returnpr" type="button" onclick="history.back(-1);return false;">戻る</button>
    </div>
  </form>

  <div class ="foot"></div>

</body>

</html>
