<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');


?>
<script type="text/javascript">
function logout(){
  if(window.confirm('ログアウトしますか？')){
    location.href ="./MPlogout.php";
    return true;
  }else{
    window.alert('キャンセルされました');
    return false;
  }
}
</script>


<div class="userbtnsetall">
  <div class="userbtnset">
    <div class="userbtnleft">
      <a href ="./materialpost.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./materialpost.php">素材投稿</a>
    </div>
    <div class="userbtnright">
      <a href ="./materiallist.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./materiallist.php">素材一覧</a>
    </div>
  </div>
  <div class="userbtnset">
    <div class="userbtnleft">
      <a href ="./materialma.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./materialma.php">素材管理</a>
    </div>
    <div class="userbtnright">
      <a href ="./MPlikeu.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./MPlikeu.php">お気に入りユーザー</a>
    </div>
  </div>
  <div class="userbtnset">
    <div class="userbtnleft">
      <a href ="./MPmma.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./MPmma.php">メッセージ管理</a>
    </div>
    <div class="userbtnright">
      <a href ="./MPlikem.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./MPlikem.php">お気に入り素材</a>
    </div>
  </div>
  <div class="userbtnset">
    <div class="userbtnleft">
      <a href ="./MPrequestlist.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./MPrequestlist.php">リクエスト一覧</a>
    </div>
  <div class="userbtnright">
      <a href ="./MPuserma.php"><img src="../../img\GO.png" width = "100px" height = "100px"></a>
      <a href ="./MPuserma.php">ユーザー管理</a>
    </div>
  </div>
</div>
<div class="yokobtn">
  <button class="returntop2" onclick="location.href='./index.php'">TOP</button>
  <button class="returntopout" onclick="return logout()">ログアウト</button>
</div>
<?php
include('MPfooter.php');
?>
