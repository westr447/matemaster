<?php
include('MPheader.php');

if(($_SESSION['userauthority'] == '2') || !isset($_SESSION['userauthority'])){
    header('Location: MPnlogin.php');
	};
  if(isset($_SESSION['mlkey'])){
    unset($_SESSION['mlkey']);
  };
?>
<script type="text/javascript">
if(<?php $_SESSION['mperr'] = '1' ?>){
    alert("素材投稿に失敗しました。");
    <?= $_SESSION['mperr'] = 0 ?>;
  }
}

</script>
<script type="text/javascript">
if(isset(<?php $_SESSION['err'] ?>) && <?php $_SESSION['err'] !== '0' ?>){
  var key ='<?= $_SESSION['err'] ?>';
  if(key = c){
    alert("ファイルサイズは6M以内にしてください。");
    alert("jpegファイルまたは、pngファイルを選択してください。");
    <?= $_SESSION['err'] = 0 ?>;
  }else if(key = a){
    alert("ファイルサイズは6M以内にしてください。");
    <?= $_SESSION['err'] = 0 ?>;
  }else if(key = b){
    alert("jpegファイルまたは、pngファイルを選択してください。");
    <?= $_SESSION['err'] = 0 ?>;
  }
}

</script>


<form method="POST" id="bfo2" enctype="multipart/form-data">
 <div class="mppost">
   <h2>カテゴリタグを必須で1つ選択してください。更にタグを4つまで付けることも可能です。</h2>
   <div class="posttags">
     <select id="tagselect" name ="category" class="validate[required]">
       <option value="">タグを選択してください▼</option>
       <option value="1">イラスト・画像</option>
       <option value="2">写真</option>
       <option value="3">文字・テンプレート</option>
     </select>
     <div class="formpost">
       <?php
       if(!isset($_POST['Rtag'])){
         echo'<input id="pforma" type="text" name="tag1" value="" autocomplte="off" class="validate[maxSize[20]]">';
       }else{
         echo'<input id="pforma" type="text" name="tag1" value="'.htmlspecialchars($_POST['Rtag'], ENT_QUOTES, 'UTF-8').'" autocomplte="off" class="validate[maxSize[20]]">';
       };
       ?>

     </div>
     <div class="formpost">
         <input id="pformb" type="text" name="tag20" autocomplte="off" class="validate[maxSize[20]]">
     </div>
     <div class="formpost">
         <input id="pformc" type="text" name="tag30" autocomplte="off" class="validate[maxSize[20]]">
     </div>
   </div>
 </div>
 <div class="area">
   <div class="mppost">
    <input id="pform2a" placeholder="タイトルを入力してください" type="text" name="name" autocomplte="off" class="validate[required,minSize[1],maxSize[20]]">
   </div>
   <p class="posttext">左から大きいサイズ順にファイルを選択してください。素材のサイズが2種類以下の場合は左詰めで選択してください。</p>
   <div class="filepost">
     <input type ="hidden" name ="maxsize"value="60000">
     <div class="left">
       <label for="mpost1" class="filelabelle">素材ファイルを選択してください</label><input id="mpost1" type="file" name="materialL" accept="image/*" class="validate[required]"><p class="unlef">選択されていません</p>
     </div>
     <div class="center">
       <label for="mpost2" class="filelabelcen">素材ファイルを選択してください</label><input id="mpost2" type="file" name="materialM" accept="image/*" class="validate[required]"><p class="uncen">選択されていません</p>
     </div>
     <div class="right">
       <label for="mpost3" class="filelabelrig">素材ファイルを選択してください</label><input id="mpost3" type="file" name="materialS" accept="image/*" class="validate[required]"><p class="unri">選択されていません</p>
     </div>
   </div>
   <p class="posttext">素材サイズを表示させることが出来ます。横(px)×縦(px)で記述してください。記述しない場合は左から素材大、素材中、素材小と表示されます。例　1920×1080</p>
   <div class="mppost2">
     <div class="formpost2">
         <input id="pform3a" type="number" name="wide(L)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
     <p class="kakeru">×</p>
     <div class="formpost2">
         <input id="pform3b" type="number" name="height(L)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
     <div class="formpost2">
         <input id="pform3c" type="number" name="wide(M)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
     <p class="kakeru">×</p>
     <div class="formpost2">
         <input id="pform3d" type="number" name="height(M)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
     <div class="formpost2">
         <input id="pform3e" type="number" name="wide(S)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
     <p class="kakeru">×</p>
     <div class="formpost2">
         <input id="pform3f" type="number" name="height(S)" autocomplte="off" class="validate[maxSize[5]]">
     </div>
   </div>
   <div class="formpost3">
       <textarea id="pform4" placeholder="メッセージを入力してください" type="textarea" name="explanation" cols="40" rows="5" value="<?php if( !empty($_POST['explanation']) ){ echo htmlspecialchars($_POST['explanation'], ENT_QUOTES, 'UTF-8'); } ?>" autocomplte="off"
         class="validate[required,minSize[1],maxSize[200]]"></textarea>
   </div>
 </div>
 <div class="mpbtnlist">
   <button class="returnmatelist" onclick="location.href='./materiallist.php'">素材一覧へ</button>
   <button class="returnuser2" onclick="location.href='./MPuserpage.php'">ユーザーページへ</button>

 </div>
 <button type="submit" formaction="./mpp.php" form="bfo2" id="gompp" >投稿プレビュー画面へ</button>
</form>

<script>
$('#mpost1').on('change', function () {
  var file = $(this).prop('files')[0];
  $('.unlef').text(file.name);
});
$('#mpost2').on('change', function () {
  var file = $(this).prop('files')[0];
  $('.uncen').text(file.name);
});
$('#mpost3').on('change', function () {
  var file = $(this).prop('files')[0];
  $('.unri').text(file.name);
});
</script>




<?php
include('MPfooter.php');
?>
