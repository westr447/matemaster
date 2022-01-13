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
    var_dump($a);
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
             ?>
           </p>
           <div class="dl">
             素材DL
           </div>
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
               <div class="dl">
                 素材DL
               </div>
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
                   <div class="dl">
                     素材DL
                   </div>
                 </div>';
                 };
                 ?>
       </div>
       <div class="dbtn">
         <div class="matebtnsetdeteal"><button class="bookmarkbtn" onclick="location.href='./MPbookmark.php'"><img src="../../img\bookmark.png"></button></div>
         <div class="matebtnsetdeteal"><button class="goodbtn2" onclick="location.href='./MPuserpage.php'"><img src="../../img\ハート.png"></button></div>
         <div class="matebtnsetdeteal"><button class="bookmarkbtn" onclick="location.href='./MPuserpage.php'"><img src="../../img\favuserplus.png"></button></div>
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
     <button class="goauser" onclick="location.href='./MPuserpage.php'">ユーザーページ</button>
     <button class="returnmatelist2" onclick="location.href='./materialma.php'">素材管理へ</button>
     <button class="returntop" onclick="location.href='./index.php'">TOP</button>
   </div>
  </div>
</div>
<?php
include('MPfooter.php');
?>
