<?php
include('MPheader.php');
if(($_SESSION['userauthority'] == '2') || !isset($_SESSION['userauthority'])){
    header('Location: MPnlogin.php');
	};
  require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
  $user = new UserController();
  $params = $user->receiveuser();
  $a = $params['usertable']['0'];
  
?>
<form method="POST" id="bfo2">
  <div class="meuser">
    <p class="meuserp">
      <?php echo $a['username'].'さんへのメッセージ'?>
    </p>
    <div class="area2">
      <div class="mppost2">
        <input type="hidden" value="<?php echo$a['ID']?>" name="rid" >
        <input type="hidden" value="<?php echo$_POST['title']?>" name="title" >
        <?php
        if(isset($_POST['save'])){
          echo'<input type="hidden" value="1" name="save" >';
          echo'<input type="hidden" value="'.$_POST['messageid'].'" name="messageid" >';
        };

        ?>
        <p class="metip">
          <?php echo $_POST['title']?>
        </p>
      </div>
      <div class="formpost3">
        <input type="hidden" value="<?php echo$_POST['message']?>" name="message" >
          <p class="meme">
            <?php echo $_POST['message']?>
          </p>
      </div>
    </div>
    <div class="mpbtnlist">
      <button class="returnpr4" type="button" onclick="history.back(-1);return false;">戻る</button>
      <button type="submit" id="mepl" form="bfo2" formaction="MPmefinish.php" class="mepp5">送信</button>
    </div>
  </div>
</form>

<?php
include('MPfooter.php');
?>
