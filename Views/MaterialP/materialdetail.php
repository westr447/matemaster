<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');
$user = new UserController();
$params = $user->materialdeteal();
$a=$params['materialtable'];
if($a['wideL']==''||$a['heightL']==''){
  $a['wideL']=0;
  $a['heightL']=0;
};

if($a['wideM']==''||$a['heightM']==''){
  $a['wideM']=0;
  $a['heightM']=0;
};
if($a['wides']==''||$a['heights']==''){
  $a['wides']=0;
  $a['heights']=0;
};
if (!function_exists('is_nullorempty')) {
        /**
         * validate string. null is true, "" is true, 0 and "0" is false, " " is false.
         */
        function is_nullorempty($obj)
        {
            if($obj === 0 || $obj === "0"){
                return false;
            }

            return empty($obj);
        }
    }
if (!function_exists('is_nullorwhitespace')) {
        /**
         * validate string. null is true, "" is true, 0 and "0" is false, " " is true.
         */
        function is_nullorwhitespace($obj)
        {
            if(is_nullorempty($obj) === true){
                return true;
            }

            if(is_string($obj) && mb_ereg_match("^(\s|　)+$", $obj)){
                return true;
            }

            return false;
        }
    };
    

?>
 <div class="mpdmain">
   <div class="mpica">
     <div class="mpicb">
       <img  src="../../Mimg\<?php echo$a['Lname']?>" class="mpic">
     </div>
     <div class="sizedl">
       <div class="size">
         <div class="sizelms">
           <p class="sizelmsn">
             <?php if($a['wideL']=='0'||$a['heightL']=='0') {
               echo '素材サイズ大';
             }else{
               echo $a['wideL']. '×'. $a['heightL'];
             };
             $count = '1';
             $jsonmateid = json_encode($a['ID']);
             ?>
           </p>
           <script type="text/javascript">

           $(document).on('click','.dl',function(e){
             e.stopPropagation();
               let $this = $(this),
                   materialID = JSON.parse(<?php echo$jsonmateid ?>);
               $.ajax({
                   type: 'POST',
                   url: 'matedl.php',
                   dataType: 'html',
                   data: { materialID: materialID}
               }).done(function(data){
                   location.reload();
               }).fail(function() {
                 location.reload();
               });
             });
           </script>

             <a href="../../Mimg\<?php echo$a['Lname']?>" download="<?php echo$a['Lname']?>">
               <button class="dl">
                 素材DL
               </button>
             </a>


         </div>
         <?php
         if($a['Mname']){
           echo '<div class="sizelms">
             <p class="sizelmsn">';
               if($a['wideM']=='0'||$a['heightM']=='0') {
                 echo '素材サイズ中';
               }else{
                 echo $a['wideM']. '×'. $a['heightM'];
               };
               echo'</p>
               <a href="../../Mimg\\'.$a['Mname'].'" download="'.$a['Mname'].'">
                 <button class="dl">
                   素材DL
                 </button>
               </a>
             </div>';
             };

             if($a['Sname']){
               echo '<div class="sizelms">
                 <p class="sizelmsn">';
                   if($a['wides']=='0'||$a['heights']=='0') {
                     echo '素材サイズ小';
                   }else{
                     echo $a['wides']. '×'. $a['heights'];
                   };
                   echo'</p>
                   <a href="../../Mimg\\'.$a['Sname'].'" download="'.$a['Sname'].'">
                     <button class="dl">
                       素材DL
                     </button>
                   </a>
                 </div>';
                 };
                 ?>
       </div>
       <div class="dbtn">
         <?php
         $_SESSION['materialID'] = $a['ID'];
         $_SESSION['fuseid']=$a['userid'];
         $mark =$user->checkmark();
         $markp = $mark['favoritematerialtable'];
         $good = $user->checkgoodcon();
         $goodp=$good['likematerialtable'];
         $markuser = $user->checkmarkuser();
         $marku =$markuser['favoriteusertable'];
         $jsonid = json_encode($_SESSION['ID']);
         $jsonid2 = json_encode($a['userid']);

         ?>

         <div class="matebtnsetdeteal">
           <script type="text/javascript">

           $(document).on('click','#bookmarkbtn',function(e){
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
           <button type="button" name="bookmark" id="bookmarkbtn" class="bookmarkbtn">
           <?php if(!$markp): ?>
             <img src="../../img\bookmark.png">
           <?php else: ?>
             <img src="../../img\bookmark2.png">
           <?php endif; ?>
           </button>
         </div>
         <div class="matebtnsetdeteal">
           <script type="text/javascript">

           $(document).on('click','#goodbtn',function(e){
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

           <button type="button" name="good" id="goodbtn" class="goodbtn3" >
             <?php if(!$goodp): ?>
               <img src="../../img\ハート.png">
             <?php else: ?>
               <img src="../../img\ハート2.png">
             <?php endif; ?>

           </button>
         </div>
         <script type="text/javascript">

         $(document).on('click','.bookmarkbtn',function(e){
           e.stopPropagation();
             let $this = $(this),
                 userid = JSON.parse(<?php echo$jsonid2 ?>);
             $.ajax({
                 type: 'POST',
                 url: 'MPbookmarku.php',
                 dataType: 'html',
                 data: { userid: userid}
             }).done(function(data){
                 location.reload();
             }).fail(function() {
               location.reload();
             });
           });
         </script>

         <div class="matebtnsetdeteal">
           <button type="button" name="bku" class="bookmarkbtn" >
             <?php if(!$marku): ?>
               <img src="../../img\favuserplus.png">
             <?php else: ?>
               <img src="../../img\favuserplus2.png">
             <?php endif; ?>

           </button>

         </div>
       </div>
     </div>
   </div>
   <div class="mpx">
     <div class="mpex">
       <p class="mpext">
        <?=htmlspecialchars($a['explanation'], ENT_QUOTES,"UTF-8") ?>
       </p>
     </div>
     <div class="extags">
       <div class="catetagtex2">
         <p>タグ</p>
       </div>
       <div class="excategorytag">
         <p class="excategory">
           <?php
           if($a['categoryid']=='1'){
             echo 'イラスト・画像';
           }else if($a['categoryid']=='2'){
             echo '写真';
           }else if($a['categoryid']=='3'){
             echo '文字・テンプレート';
           } ?>
         </p>
         <?php
         if($a['tag1']){
           echo'<div class="extag">
             <button class="tagbtn" onclick="location.href=\'./materiallist.php\'">';
             echo$a['tag1'];
             echo'</button>
             </div>';
         };
         if($a['tag2']){
           echo'<div class="extag">
             <button class="tagbtn" onclick="location.href=\'./materiallist.php\'">';
             echo$a['tag2'];
             echo'</button>
             </div>';
         };
         if($a['tag3']){
           echo'<div class="extag">
             <button class="tagbtn" onclick="location.href=\'./materiallist.php\'">';
             echo$a['tag3'];
             echo'</button>
             </div>';
         };
         ?>
       </div>
   </div>
   <div class="tatebtn">
     <form method="GET">
       <input type="hidden" name="userid" value="<?php echo$a['userid']?>">
       <button type="submit" formaction="./MPauser.php?userid='<?php echo$a['userid']?>'" id="goauser">制作者ページへ</button>
     </form>

     <button class="returnmatelist2" onclick="location.href='./materiallist.php'">素材一覧へ</button>
     <button class="returntop" onclick="location.href='./index.php'">TOP</button>
   </div>
  </div>
</div>
<?php
include('MPfooter.php');
?>
