<?php
include('MPheader.php');
?>
<div class="mekan">
  <button class="soukaku" onclick="location.href='./MPsmlist.php'">送信メッセージ確認・削除</button>
  <button class="jukaku" onclick="location.href='./MPrmlist.php'">受信メッセージ確認・削除</button>
  <button class="tyuuhen" onclick="location.href='./MPmedit.php'">中断メッセージ編集・削除</button>
  <?php
  if($_SESSION['mebreak']=='1'){
    echo '中断メッセージはありません。';
    $_SESSION['mebreak']=0;
  };
  ?>
</div>
<?php
include('MPfooter.php');
?>
