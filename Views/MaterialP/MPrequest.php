<?php
include('MPheader.php');
if(($_SESSION['userauthority'] == '2') || !isset($_SESSION['userauthority'])){
    header('Location: MPnlogin.php');
	};

$now = date("YmdHis");
?>
<form method="POST" id="bfo2">
  <div class="mpreq">
    <h2>リクエストで使用するタグを変更する場合は下記のテキストフォームを編集してください。</h2>
    <div class="postrtag">
      <div class="formpost">
          <input id="pforma" type="text" name="Rtag" value="#r<?php echo$now ?>" placeholder="#r<?php echo$now ?>"  autocomplte="off" class="validate[required,maxSize[20]]">
      </div>
    </div>
  </div>
  <div class="area2">
    <div class="mppost">
     <input id="pform2a"  placeholder="タイトルを入力してください" type="text" name="title" autocomplte="off" class="validate[required,minSize[1],maxSize[20]]">
    </div>


    <div class="formpost3">
        <textarea id="pform4" placeholder="メッセージを入力してください" type="textarea" name="message" cols="40" rows="5" autocomplte="off" class="validate[required,minSize[1],maxSize[200]]"></textarea>
    </div>
  </div>
  <div class="mpbtnlist">
    <button class="returnmatelist3" onclick="location.href='./MPrequestlist.php'">リクエスト一覧へ</button>
    <button type="submit" formaction="./MPrpp.php" form="bfo2" id="reqpwrap" >リクエスト内容確認ー画面へ</button>
  </div>

</form>

<?php
include('MPfooter.php');
?>
