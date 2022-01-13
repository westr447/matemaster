<?php
include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');


$uploadfile = 'Mimg';

if($_POST['wide(L)']==''||$_POST['height(L)']==''){
  $_POST['wide(L)']=0;
  $_POST['height(L)']=0;
};

if($_POST['wide(M)']==''||$_POST['height(M)']==''){
  $_POST['wide(M)']=0;
  $_POST['height(M)']=0;
};
if($_POST['wide(S)']==''||$_POST['height(S)']==''){
  $_POST['wide(S)']=0;
  $_POST['height(S)']=0;
};

$user = new UserController();
$now = date("YmdHis");
$errs = array();
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
    }

    if(!isset($_SESSION['userauthority'])){
      header('Location: MPnlogin.php');
    };
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(($_FILES['materialL']['error'] === 2)&&($_FILES['materialL']['type']!== 'image/jpeg' && $_FILES['materialL']['type']!== 'image/png')){
        $_SESSION['err'] = c;
      }else if($_FILES['materialL']['error'] === 2){
        $_SESSION['err'] = a;
      }else if($_FILES['materialL']['type']!== 'image/jpeg' && $_FILES['materialL']['type']!== 'image/png'){
        $_SESSION['err'] = b;
      }
    }else{
      header('Location: MPnlogin.php');
    };


// $_FILESデータを変数pictureに入れる
if($_FILES){
  foreach($_FILES['materialL'] as $key => $var){
    $picture[$key] = $var;
  };
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  list($mime,$ext) = explode("/",finfo_file($finfo, $picture["tmp_name"]));
  if($mime!="image"){
      $errs['materialL'] = "画像を選択してください";
      unset($picture);
  };
  // $_FILES内のファイルデータを名前を変えて仮のディレクトリ（tmp）に移す
  move_uploaded_file($picture['tmp_name'], "tmp/".$now."_materialL.".$ext);
  // アウトプット用の変数に画像データを格納
  $output_file['name'] = $now.$picture['name'];
  // アウトプット用の変数のtmp_nameの値を仮のディレクトリ内のファイル名に設定する
  $output_file['tmp_name'] = "tmp/".$now."_materialL.".$ext;
  // アウトプット用の変数のurlに確認画面で表示するための画像urlを格納する
  $output_file['url'] = "../../tmp/".$now."_materialL.".$ext;
  finfo_close($finfo);
  if($_POST['category']== '1'){
    $cat1 ='イラスト・画像';
  }else if($_POST['category']== '2'){
    $cat1 ='写真';
  }else{
    $cat1 ='文字・テンプレート';
  };
  if($_POST['tag20'] && !($_POST['tag1']) && !($_POST['tag30'])) {
    $_POST['tag1']=$_POST['tag20'];
    $a=$_POST['tag1'];
  }else if($_POST['tag20'] && !($_POST['tag1']) && $_POST['tag30']){
    $_POST['tag1']=$_POST['tag20'];
    $_POST['tag2']=$_POST['tag30'];
    $a=$_POST['tag1'];
    $b=$_POST['tag2'];
  }else if($_POST['tag30'] && !($_POST['tag1']) && !($_POST['tag20'])){
    $_POST['tag1']=$_POST['tag30'];
    $a=$_POST['tag1'];
  }else{
    $_POST['tag2']=$_POST['tag20'];
    $_POST['tag3']=$_POST['tag30'];
    $a=$_POST['tag1'];
    $b=$_POST['tag2'];
    $c=$_POST['tag3'];
  };
}else{
  header('Location: materialpost.php');
};

if(!($_FILES['materialM']['size']== '0')){
  foreach($_FILES['materialM'] as $key => $var){
      $picture2[$key] = $var;
  };
  $finfo2 = finfo_open(FILEINFO_MIME_TYPE);
  list($mime,$ext) = explode("/",finfo_file($finfo2, $picture2["tmp_name"]));
  if($mime!="image"){
      $errs['materialM'] = "画像を選択してください";
      unset($picture2);
  }
  // $_FILES内のファイルデータを名前を変えて仮のディレクトリ（tmp）に移す
  move_uploaded_file($picture2['tmp_name'], "tmp/".$now."_materialM.".$ext);
  // アウトプット用の変数に画像データを格納
  $output_file2['name'] = $now.$picture2['name'];
  // アウトプット用の変数のtmp_nameの値を仮のディレクトリ内のファイル名に設定する
  $output_file2['tmp_name'] = "tmp/".$now."_materialM.".$ext;
  // アウトプット用の変数のurlに確認画面で表示するための画像urlを格納する
  $output_file2['url'] = "../../tmp/".$now."_materialM.".$ext;
  finfo_close($finfo2);
};

if(!($_FILES['materialS']['size']== '0')){
  foreach($_FILES['materialS'] as $key => $var){
      $picture3[$key] = $var;
  };
  $finfo3 = finfo_open(FILEINFO_MIME_TYPE);
  list($mime,$ext) = explode("/",finfo_file($finfo3, $picture3["tmp_name"]));
  if($mime!="image"){
      $errs['materialS'] = "画像を選択してください";
      unset($picture3);
  }
  // $_FILES内のファイルデータを名前を変えて仮のディレクトリ（tmp）に移す
  move_uploaded_file($picture3['tmp_name'], "tmp/".$now."_materialS.".$ext);
  // アウトプット用の変数に画像データを格納
  $output_file3['name'] = $now.$picture3['name'];
  // アウトプット用の変数のtmp_nameの値を仮のディレクトリ内のファイル名に設定する
  $output_file3['tmp_name'] = "tmp/".$now."_materialS.".$ext;
  // アウトプット用の変数のurlに確認画面で表示するための画像urlを格納する
  $output_file3['url'] = "../../tmp/".$now."_materialS.".$ext;
  finfo_close($finfo3);
};

if(!($_FILES['materialS']['size']== '0')){
  echo 'OK';
};



?>
<form method="POST" id="bfo2" enctype="multipart/form-data">
  <div class="mpdmain">
    <div class="mpica">
      <div class="mpicb">
        <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']; ?>">
        <img class="mpic" src="<?php echo$output_file['url']?>" >
        <?php foreach($output_file as $key => $var): ?>
          <input type="hidden" name="materialL[tmpname]" value="<?php echo $output_file['tmp_name']; ?>">
          <input type="hidden" name="Lname" value="<?php echo $output_file['name']; ?>">
        <?php endforeach; ?>
        <?php if(!($_FILES['materialM']['size']== '0')):
          foreach($output_file2 as $key =>$var): ?>
          <input type="hidden" name="materialM[tmpname]" value="<?php echo $output_file2['tmp_name']; ?>">
          <input type="hidden" name="Mname" value="<?php echo $output_file2['name']; ?>">
          <?php endforeach;
        endif; ?>
        <?php
        if(!($_FILES['materialS']['size']== '0')):
          foreach($output_file3 as $key => $var): ?>
          <input type="hidden" name="materialS[tmpname]" value="<?php echo $output_file3['tmp_name']; ?>">
          <input type="hidden" name="Sname" value="<?php echo $output_file3['name']; ?>">
          <?php endforeach;
        endif; ?>
      </div>
      <div class="sizedl">
        <div class="size">
          <div class="sizelms">
            <p class="sizelmsn">
              <?php if($_POST['wide(L)']=='0'||$_POST['height(L)']=='0') {
                echo '素材サイズ大';
              }else{
                echo $_POST['wide(L)']. '×'. $_POST['height(L)'];
              };
              ?>
            </p>
            <a href= "../../img\1l.png">
              <div class="dl">
                素材DL
                <input type="hidden" name="name" value="<?php echo$_POST['name']?>">
                <input type="hidden" name="wideL" value="<?php echo$_POST['wide(L)']?>">
                <input type="hidden" name="heightL" value="<?php echo$_POST['height(L)']?>">
              </div>
            </a>
          </div>
          <?php
          if(!($_FILES['materialM']['size']== '0')){
            print'<div class="sizelms">
              <p class="sizelmsn">';
              if($_POST['wide(M)']=='0'||$_POST['height(M)']=='0') {
                echo '素材サイズ中';
              }else{
                echo $_POST['wide(M)']. '×'. $_POST['height(M)'];
              };
              print'</p>
              <a href= "../../img\1m.png">
                <div class="dl">
                  素材DL
                  <input type="hidden" name="wideM" value="'.$_POST['wide(M)'].'">
                  <input type="hidden" name="heightM" value="'.$_POST['height(M)'].'">
                </div>
              </a>

            </div>';
          };
          ?>
          <?php
          if(!($_FILES['materialS']['size']== '0')){
            print'<div class="sizelms">
              <p class="sizelmsn">';
              if($_POST['wide(S)']=='0'||$_POST['height(S)']=='0') {
                echo '素材サイズ小';
              }else{
                echo $_POST['wide(S)']. '×'. $_POST['height(S)'];
              };
              print'</p>
              <a href= "../../img\1m.png">
                <div class="dl">
                  素材DL

                  <input type="hidden" name="wideS" value="'.$_POST['wide(S)'].'">
                  <input type="hidden" name="heightS" value="'.$_POST['height(S)'].'">
                </div>
              </a>

            </div>';
          };
          ?>
        </div>
      </div>
    </div>
    <div class="mpx">
      <div class="mpex">
        <p class="mpext">
          <?=htmlspecialchars($_POST['explanation'], ENT_QUOTES,"UTF-8") ?>
        </p>
        <input type="hidden" name="explanation" value="<?php echo$_POST['explanation']?>">
      </div>
      <div class="extags">
        <div class="catetagtex">
          <p>タグ</p>
        </div>
        <div class="excategorytag">
          <p class="excategory">
            <?php echo $cat1 ?>
          </p>
          <input type="hidden" name="categoryid" value="<?php echo$_POST['category']?>">
          <?php
          if($_POST['tag3']){
            echo'<div class="extag">
              <button class="tagbtn" onclick="location.href=.$a">'.$a.'</button>
              <input type="hidden" name="tag1" value="'.$a.'">
            </div>
            <div class="extag">
              <button class="tagbtn" onclick="location.href=.$b">'.$b.'</button>
              <input type="hidden" name="tag2" value="'.$b.'">
            </div>
            <div class="extag">
              <button class="tagbtn" onclick="location.href=.$c">'.$c.'</button>
              <input type="hidden" name="tag3" value="'.$c.'">
            </div>';
          }else if($_POST['tag2']){
            echo'<div class="extag">
            <button class="tagbtn" onclick="location.href=.$a">'.$a.'</button>
            <input type="hidden" name="tag1" value="'.$a.'">
          </div>
          <div class="extag">
            <button class="tagbtn" onclick="location.href=.$b">'.$b.'</button>
            <input type="hidden" name="tag2" value="'.$b.'">
          </div>';
          }else if($_POST['tag1']){
            echo'<div class="extag">
            <button class="tagbtn" onclick="location.href=.$a">'.$a.'</button>
            <input type="hidden" name="tag1" value="'.$a.'">
          </div>';
          };
          ?>
        </div>
    </div>
   </div>
 </div>
 <div class="tatebtn">
   <button class="returnpr2" type="button" onclick="history.back(-1);return false;">戻る</button>
   <button type="submit" id="materialpostfinish" form="bfo2" formaction="materialpostfinish.php">投稿する</button>
   <button class="returntop" onclick="location.href='./index.php'">TOP</button>
 </div>
</form>
<div class ="foot2"></div>
</div>

</body>

</html>
