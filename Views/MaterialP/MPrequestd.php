<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$params = $user->reqestdeteal();
$a=$params['requesttable'];

?>
<form method="POST" id="bfo2">
  <div class="rppost">
     <p class="rtagp">
       <?php echo$a['Rtag'] ?>
     </p>
     <input type="hidden" name="Rtag" value="<?php echo $a['Rtag']; ?>">
  </div>
  <div class="area2">
    <div class="mppost2">
      <p class="metip">
        <?php echo$a['title'] ?>
      </p>
    </div>
    <div class="formpost3">
        <p class="meme">
          <?php echo$a['message'] ?>
        </p>
    </div>
  </div>
  <div class="mpbtnlist">
    <button class="returnmatelist4" formaction="./MPrequestlist.php">リクエスト一覧へ</button>
    <button type="submit" formaction="./materialpost.php" form="bfo2" id="gomatepost">リクエストにあった素材を投稿する</button>
  </div>
</form>

<?php
include('MPfooter.php');
?>
