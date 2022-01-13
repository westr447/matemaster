<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
if(isset($_GET['id'])){
  $_SESSION['cid']=$_GET['id'];
};
$user = new UserController();
$params = $user->receivemessagedeteal();
$a=$params['messagetable'];
$params = $user->senduser();
$b = $params['usertable']['0'];
?>

 <div class="meuser">
   <p class="meuserp">
     <?php echo$b['username'] ?>さんからのメッセージ
   </p>
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
     <button class="returnpr4" type="button" onclick="history.back(-1);return false;" >戻る</button>
       <?php echo'<a href="./MPrmedel.php?ID='.$a['ID'].'"onClick="return rmedelj()"class="abu2">
         <button id="reqpp" name="soumailsakujo" >削除</button>
       </a>';
       ?>

   </div>
   <script type="text/javascript">
   function rmedelj(){
     if(window.confirm('本当に削除しますか？')){
       location.href ="./MPrmedel.php";
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
