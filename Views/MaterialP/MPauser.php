<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
if(isset($_GET['userid'])){
  $_SESSION['cid']=$_GET['userid'];
};
$user = new UserController();
$params = $user->partmatelistall();
?>
<div class="auserlink">
  <a href="./MPauser.php" class="goauser">お気に入りユーザーに追加</a>
  <form method="GET">
    <input type="hidden" name="userid" value="<?php echo$a['userid']?>">
    <?php echo'<a href="./MPme.php?cid='.$_SESSION['cid'].'"  class="goauser">リクエストメッセージを作成</a>'?>
  </form>

</div>
<ul id="id01" class="sortlist">
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
           <form class="goodcount" action ="#" method="post">
             <div class="titlebtn">
               <input type="hidden" value=<?php $mate['ID']?> name="materialid" >
               <button class="goodbtn" onclick="location.href='./MPuserpage.php'"><img src="../../img\ハート.png"></button>
               <button class="bookmarkbtn" onclick="location.href='./MPuserpage.php'"><img src="../../img\bookmark.png"></button>
             </div>
           </form>
         </div>
       </div>
     </li>
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


<?php
include('MPfooter.php');
?>
