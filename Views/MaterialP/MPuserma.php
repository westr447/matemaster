<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$params = $user->alluser();

?>
<div class="usermaall">
  <div class="usermatable">
    <table>
      <form method="get" >
        <?php foreach($params['usertable'] as $hi): ?>
          <tr>
            <td><?=$hi['username'] ?></td>
            <td><?=$hi['email'] ?></td>
            <td>
              <div class="usermabtn">
                <?php
                echo'<form method="GET" action="./MPuserdel.php" onclick="return userdel()">
                <a href="./MPuserdel.php?ID='.$hi['ID'].'">削除</a>
                </form>';
                ?>
              </div>
            </div>
          </tr>
        <?php endforeach; ?>
      </form>
    </table>
  </div>
</div>
<script type="text/javascript">
function userdel(){
  if(window.confirm('本当に削除しますか？')){
    location.href ="./MPuserdel.php";
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
