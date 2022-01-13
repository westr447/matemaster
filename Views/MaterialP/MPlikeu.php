<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$para = $user->bookuser();

$count=0;

?>

<ul id="userb" class="sortlist">
  <?php foreach($para['usertable']  as $mat): ?>
    <div class="line">
      <div class="sidename">
        <a href="./MPauser.php?id=<?php echo$mat['ID'] ?>"  class="hiddenthumbnail"><?php echo$mat['username'] ?></a>
      </div>
      <ul id="id01" class="sortlist">
      <?php
      $_SESSION['fuseridlist']=$mat['ID'];
      $params = $user->mymatelistall2();
      ?>
      <?php foreach($params['materialtable']  as $mate):?>

         <div class="matelist">
           <li class="matenara">
             <div class="nakakomi">
               <div clas="materialthumbnail">
                 <?php echo'<a class="hiddenthumbnail" href="./mymaterialdetail.php?id='.$mate['ID'].'">
                   <div radius="4" class="matelistthumb">
                     <img src="../../Mimg\\'.$mate['Lname'].'" class="matetimg">
                   </div>
                 </a>'?>
               </div>
               <div class="titlebtnset">
                 <a class="matename" href="/mymaterialdetail.php"><?php echo$mate['name']?></a>
                 <div class="titlebtn">
                   <input type="hidden" value=<?php $mate['ID']?> name="materialID" >
                   <?php
                   $_SESSION['materialID'] = $mate['ID'];

                   $good = $user->checkgoodcon();
                   $goodp=$good['likematerialtable'];
                   $mark =$user->checkmark();
                   $markp = $mark['favoritematerialtable'];
                   $jsonid = json_encode($_SESSION['ID']);
                   $jsonmateid = json_encode($mate['ID']);
                   ?>
                   <script type="text/javascript">

                   $(document).on('click','#goodbtn<?php echo$count ?>',function(e){
                     e.stopPropagation();
                       let $this = $(this),
                           userid = JSON.parse(<?php echo$jsonid ?>),
                           materialID = JSON.parse(<?php echo$jsonmateid ?>);
                       $.ajax({
                           type: 'POST',
                           url: 'mategood.php',
                           dataType: 'html',
                           data: { userid: userid,
                                   materialID: materialID}
                       }).done(function(data){
                           location.reload();
                       }).fail(function() {
                         location.reload();
                       });
                     });
                   </script>
                   <script type="text/javascript">

                   $(document).on('click','#bookmarkbtn<?php echo$count ?>',function(e){
                     e.stopPropagation();
                       let $this = $(this),
                           userid = JSON.parse(<?php echo$jsonid ?>),
                           materialID = JSON.parse(<?php echo$jsonmateid ?>);
                       $.ajax({
                           type: 'POST',
                           url: 'MPbookmark.php',
                           dataType: 'html',
                           data: { userid: userid,
                                   materialID: materialID}
                       }).done(function(data){
                           location.reload();
                       }).fail(function() {
                         location.reload();
                       });
                     });
                   </script>

                   <button type="button" name="good" id="goodbtn<?php echo$count ?>" class="goodbtn" >
                     <?php if(!$goodp): ?>
                       <img src="../../img\ハート.png">
                     <?php else: ?>
                       <img src="../../img\ハート2.png">
                     <?php endif; ?>
                   </button>
                   <button type="button" name="bookmark" id="bookmarkbtn<?php echo$count ?>" class="bookmarkbtn">
                   <?php if(!$markp): ?>
                     <img src="../../img\bookmark.png">
                   <?php else: ?>
                     <img src="../../img\bookmark2.png">
                   <?php endif; ?>
                   </button>
                 </div>
               </div>
             </div>
           </li>
         </div>
       <?php endforeach;?>
      </ul>
    </div>


  <?php endforeach; ?>
</ul>





<div class='chbtn'>
  <?php
  for($i=0;$i<=$params['pages'];$i++) {
    if(isset($_GET['page']) && $_GET['page'] == $i) {
        echo $i+1;
    } else {


        echo"<button class=\"tagbtn\" onclick=\"location.href='?page=".$i."'\">".($i+1)."</button>";
    }
  };


  ?>


</div>

<script type="text/javascript">
function up(){
  if(window.confirm('本当に削除しますか？')){
    location.href ="./MPdel.php";
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
