<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$_SESSION['mr'] = "ms";
$user = new UserController();
if($_SESSION['mtso']=='1'){
  $params = $user->sendmessageallr();
}else{
  $params = $user->sendmessageall();
};
?>
<div class="sortbtnerea3">
  <select class="sort-btn" name ="sort" onChange="location.href=value;">
    <option value="" >並び替え▼</option>
    <option value="./MPintersection0.php">投稿が新しい順▼</option>
    <option value="./MPintersection1.php">投稿が古い順▼</option>
  </select>
</div>
<div class="reqlist">
  <ul  id="id02" class="sortlist">
    <?php foreach($params['messagetable']  as $mate): ?>
      <form method="GET" name="reqdpost" id="bfo2" action="MPrequestd.php">
        <li class="goreqd">
          <?php echo '<a href ="./MPsmc.php?id='.$mate['ID'].'"> '.$mate['title'].'</a>'?>
        </li>
      </form>
    <?php endforeach; ?>
  </ul>
</div>
 <div class="mpbtnlist">
   <button class="returnpr4" type="button" onclick="history.back(-1);return false;">戻る</button>

 </div>
<?php
include('MPfooter.php');
?>
