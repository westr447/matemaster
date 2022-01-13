<?php
include('MPheader.php');
if(!isset($_SESSION['userauthority'])){
  header('Location: MPnlogin.php');
};
if(!($_POST['Rtag'])){
  header('Location: MPrequest.php');
}else if(!($_POST['title'])){
  header('Location: MPrequest.php');
}else if(!($_POST['message'])){
  header('Location: MPrequest.php');
};
?>
<form method="POST" id="bfo2">
  <div class="rppost">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']; ?>">
     <p class="rtagp">
       <?php echo$_POST['Rtag']?>
       <input type="hidden" name="Rtag" value="<?php echo $_POST['Rtag']; ?>">
     </p>
  </div>
  <div class="area2">
    <div class="mppost2">
      <p class="metip">
        <?php echo$_POST['title']?>
        <input type="hidden" name="title" value="<?php echo $_POST['title']; ?>">
      </p>
    </div>
    <div class="formpost3">
        <p class="meme">
          <?php echo$_POST['message']?>
          <input type="hidden" name="message" value="<?php echo $_POST['message']; ?>">
        </p>
    </div>
  </div>
  <div class="mpbtnlist">
    <button class="returnpr3" type="button" onclick="history.back(-1);return false;">戻る</button>
    <button type="submit" formaction="./MPrequestfinish.php" form="bfo2" id="reqpp" >リクエストする</button>
  </div>
</form>

<?php
include('MPfooter.php');
?>
