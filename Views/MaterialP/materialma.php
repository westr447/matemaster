<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$params = $user->mymatelistall();
?>

<ul id="id01" class="sortlist">
  <?php foreach($params['materialtable']  as $mate): ?>
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
             <?php echo'<a href="./MPdel.php?ID='.$mate['ID'].'"onClick="return up()">
               <button class="bookmarkbtn" name="matesakujo" ><img src="../../img\batu.png"></button>
             </a>';
             ?>
           </div>
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
