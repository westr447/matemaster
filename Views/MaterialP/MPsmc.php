<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');




$user = new UserController();
$params = $user->sendmessagedeteal();
$a=$params['messagetable'];
$_SESSION['cid']=$a['receive_user_id'];

$params = $user->receiveuser();
$b = $params['usertable']['0'];
$_SESSION['meid'] = $_GET['id'];


?>

 <div class="meuser">
   <p class="meuserp">
     <?php echo$b['username'] ?>さんへのメッセージ
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
   
     <button class="returnpr4" type="button" onclick="history.back(-1);return false;">戻る</button>
       <?php echo'<a href="./MPmedel.php?ID='.$a['ID'].'"onClick="return sendmedelj()"class="abu22">
         <button id="reqppsmc" name="soumailsakujo" >削除</button>
       </a>';
       ?>

   
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
