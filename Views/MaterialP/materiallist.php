<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$_SESSION['mr']="m";
if(isset($_POST['mlkey'])){
  $_SESSION['mlkey'] = $_POST['mlkey'];
};



$user = new UserController();

if(isset($_POST['listchange'])){
  $params = $user->pop();
}else if($_SESSION['mtso']=='1'){
  if($_SESSION['mlcategory']=='1'){
    $params = $user->matelistallrirast();
  }else if($_SESSION['mlcategory']=='2'){
    $params = $user->matelistallrpic();
  }else if($_SESSION['mlcategory']=='3'){
    $params = $user->matelistallrch();
  }else{
    $params = $user->matelistallr();
  };
}else if($_SESSION['mtso']=='2'){
  if($_SESSION['mlcategory']=='1'){
    $params = $user->popirast();
  }else if($_SESSION['mlcategory']=='2'){
    $params = $user->poppic();
  }else if($_SESSION['mlcategory']=='3'){
    $params = $user->popch();
  }else{
    $params = $user->pop();
  };
}else if($_SESSION['mtso']=='3'){
  if($_SESSION['mlcategory']=='1'){
    $params = $user->downloadirast();
  }else if($_SESSION['mlcategory']=='2'){
    $params = $user->downloadpic();
  }else if($_SESSION['mlcategory']=='3'){
    $params = $user->downloadch();
  }else{
    $params = $user->download();
  };
}else{
  if($_SESSION['mlcategory']=='1'){
    $params = $user->matelistallirast();
  }else if($_SESSION['mlcategory']=='2'){
    $params = $user->matelistallpic();
  }else if($_SESSION['mlcategory']=='3'){
    $params = $user->matelistallch();
  }else{
    $params = $user->matelistall();
  };

};







?>





<div class="matelisme">
  <div class="sortbtnerea">
    <select class="sort-btn" name ="sort" onChange="location.href=value">
      <option value="" >並び替え▼</option>
      <option value="./MPintersection0.php" >投稿が新しい順▼</option>
      <option value="./MPintersection1.php">投稿が古い順▼</option>
      <option value="./MPintersection2.php">人気順▼</option>
      <option value="./MPintersection3.php">ダウンロード順▼</option>
    </select>
  </div>



<div class="catece">
  <p>カテゴリ絞り込み</p>
  <form method="GET">
    <div>
      <input type="hidden" name="categoryid" value="0">
      <button type="submit" formaction="./MPcatech.php" class="allce">全て</button>
    </div>
  </form>
  <form method="GET">
    <div>
      <input type="hidden" name="categoryid" value="1">
      <button type="submit" formaction="./MPcatech.php" class="irce" onclick="location.href='./materiallist.php'">イラスト・画像</button>
    </div>
  </form>
  <form method="GET">
    <div>
      <input type="hidden" name="categoryid" value="2">
      <button type="submit" formaction="./MPcatech.php" class="pice" onclick="location.href='./materiallist.php">写真</button>
    </div>
  </form>
  <form method="GET">
    <div>
      <input type="hidden" name="categoryid" value="3">
      <button type="submit" formaction="./MPcatech.php" class="woce" onclick="location.href='./materiallist.php">文字・テンプレート</button>
    </div>
  </div>
</form>

  <div class="matesea">
    <form action="materiallist.php" method="POST">
      <input type="search" name="mlkey" value="<?php if(isset($_SESSION['mlkey']) ){ echo htmlspecialchars($_SESSION['mlkey'], ENT_QUOTES, 'UTF-8'); } ?>"
      placeholder="素材を検索" >
      <input type="submit" name="submit" value="検索">
    </form>
  </div>
</div>


<ul id="id01" class="sortlist">
  <?php $count=0; ?>
  <?php foreach($params['materialtable']  as $mate): ?>
   <div class="matelist">
     <li class="matenara">
       <div class="nakakomi">
         <div clas="materialthumbnail">
           <?php echo'<a class="hiddenthumbnail" href="./materialdetail.php?id='.$mate['ID'].'">
             <div radius="4" class="matelistthumb">
               <img src="../../Mimg\\'.$mate['Lname'].'" class="matetimg">
             </div>
           </a>'?>
         </div>
         <div class="titlebtnset">
           <a class="matename" href="./materialdetail.php?id=<?php echo$mate['ID']?>"><?php echo$mate['name']?></a>

           <form class="goodcount" action ="#" method="POST">
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
           </form>
         </div>
       </div>
     </li>
   </div>
   <?php $count =$count+1 ?>
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
  if(isset($_SESSION['mlkey'])){
    unset($_SESSION['mlkey']);
  };


  ?>


</div>




<?php
include('MPfooter.php');
?>
