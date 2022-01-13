<?php
include('MPheader.php');
if(($_SESSION['userauthority'] == '2') || !isset($_SESSION['userauthority'])){
    header('Location: MPnlogin.php');
	};
  require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
  $user = new UserController();
  $params = $user->sendmessagedeteal2();
  $a=$params['messagetable']['0'];
  if(!isset($a)){
    $_SESSION['mebreak']=1;
    header('Location: MPmma.php');
  };
  
  $_SESSION['cid']=$a['receive_user_id'];
  $_SESSION['saveflg']=1;
  $pars = $user->receiveuser();
  $b = $pars['usertable']['0'];
  $_SESSION['meid'] = $b['ID'];
?>
<form method="POST" id="bfo2">
  <div class="meuser">
    <p class="meuserp">
      <?php echo $b['username'].'さんへのメッセージ'?>
    </p>
    <div class="area2">
      <div class="mppost">
        <input id="pform2a" placeholder="タイトルを入力してください" type="text" name="title" autocomplte="off" value="<?php echo$a['title'] ?>" class="validate[required,minSize[1],maxSize[100]]">
      </div>
      <input type="hidden" value="1" name="save" >
      <input type="hidden" value="<?php echo$a['ID'] ?>" name="messageid" >
      <div class="formpost3">
          <textarea id="pform4" placeholder="メッセージを入力してください" type="textarea" name="message" cols="40" rows="5" autocomplte="off" <?php echo$a['message'] ?> class="validate[required,minSize[1],maxSize[200]]"><?php echo$a['message'] ?></textarea>
      </div>
    </div>
  <div class="mpbtnlist">
    <button class="returnuser4e" type="button" onclick="location.href='./MPuserpage.php'">保存せずユーザーページへ</button>
    <button type="submit" id="mesavee" form="bfo2" formaction="MPmebreak.php" class="returnmma">保存してメッセージ管理へ</button>
    <?php echo'<a href="./MPmedel.php?ID='.$a['ID'].'"onClick="return sendmedelj()" class="abu3">
    <button type="button" id="reqpp3" name="soumailsakujo">削除</button>
    </a>';
    ?>
    <button type="submit" id="mepl3" form="bfo2" formaction="MPmep.php" class="mepp">送信確認</button>
  </div>

</form>
<script type="text/javascript">
function sendmedelj(){
  if(window.confirm('本当に削除しますか？')){
    location.href ="./MPmedel.php";
    return true;
  }else{
    window.alert('キャンセルされました');
    return false;

  }
}
</script>

<?php
include('MPfooter.php');
?>
