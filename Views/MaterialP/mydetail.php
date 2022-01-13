<?php
include('MPheader.php');
?>
 <div class="mpdmain">
   <div class="mpica">
     <div class="mpicb">
       <img class="mpic" src="../../img\1l.png" >
     </div>
     <div class="sizedl">
       <div class="size">
         <div class="sizelms">
           <p class="sizelmsn">
             素材サイズL
           </p>
           <a href= "../../img\1l.png">
             <div class="dl">
               素材DL
             </div>
           </a>
           <form method="POST" id="bfo2">
             <input type="hidden" name="ID" value="<?php $_POST['ID']?>">
             <button type="submit" id="materialdel" form="bfo2" formaction="materialdel.php">この素材を削除する</button>
           </form>
         </div>
         <div class="sizelms">
           <p class="sizelmsn">
             素材サイズM
           </p>
           <a href= "../../img\1m.png">
             <div class="dl">
               素材DL
             </div>
           </a>
         </div>
         <div class="sizelms">
           <p class="sizelmsn">
             素材サイズS
           </p>
           <a href= "../../img\1s.png">
             <div class="dl">
               素材DL
             </div>
           </a>
         </div>
       </div>
     </div>
   </div>
   <div class="mpx">
     <div class="mpex">
       <p class="mpext">
          あいうえおかきくけこさしすせそたちつてと<br>
          2<br>
          3<br>
          4<br>
          5<br>
          6<br>
          7<br>
          8<br>
          9<br>
          10
       </p>
     </div>
     <div class="extags">
       <div class="catetagtex">
         <p>タグ</p>
       </div>
       <div class="excategorytag">
         <p class="excategory">
           文字・テンプレート
         </p>
         <div class="extag">
           <button class="tagbtn" onclick="location.href='./materiallist.php'">あいうえおかきくけこさしすせそたちつてと</button>
         </div>
         <div class="extag">
           <button class="tagbtn" onclick="location.href='./materiallist.php'">あいうえおかきくけこさしすせそたちつてと</button>
         </div>
         <div class="extag">
           <button class="tagbtn" onclick="location.href='./materiallist.php'">あいうえおかきくけこさしすせそたちつてと</button>
         </div>
       </div>
   </div>
   <div class="tatebtn">
     <button class="goauser" onclick="location.href='./MPauser.php'">制作者ページへ</button>
     <button class="returnmatelist2" onclick="location.href='./materiallist.php'">素材一覧へ</button>
     <button class="returntop" onclick="location.href='./index.php'">TOP</button>
   </div>
  </div>
</div>
<?php
include('MPfooter.php');
?>
