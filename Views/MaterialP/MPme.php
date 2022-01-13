<?php
include('MPheader.php');
if(($_SESSION['userauthority'] == '2') || !isset($_SESSION['userauthority'])){
    header('Location: MPnlogin.php');
	};
  require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
  $user = new UserController();
  $params = $user->receiveuser();
  $a = $params['usertable']['0'];
  $_SESSION['saveflg']=0;
  $_SESSION['meid']=$a['ID']
?>
<form method="POST" id="bfo2">
  <div class="meuser">
    <p class="meuserp">
      <?php echo $a['username'].'さんへのメッセージ'?>
    </p>
    <div class="area2">
      <div class="mppost">
        <input id="pform2a"  placeholder="タイトルを入力してください" type="text" name="title" autocomplte="off" class="validate[required,minSize[1],maxSize[100]]">
      </div>
      <div class="formpost3">
          <textarea id="pform4" placeholder="メッセージを入力してください" type="textarea" name="message" cols="40" rows="5" autocomplte="off" class="validate[required,minSize[1],maxSize[200]]"></textarea>
      </div>
    </div>
  <div class="mpbtnlist">
    <button class="returnuser4" onclick="location.href='./MPuserpage.php'">保存せずユーザーページへ</button>
    <input type="hidden" value="<?php echo$a['ID']?>" name="rid" >
    <button type="submit" id="mesave" form="bfo2" formaction="MPmebreak.php" class="returnmma">保存してメッセージ管理へ</button>
    <button type="submit" id="mepl" form="bfo2" formaction="MPmep.php" class="meppme">送信確認</button>
  </div>

</form>
<?php
include('MPfooter.php');
?>
