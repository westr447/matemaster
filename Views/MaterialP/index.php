<?php

include('MPheader.php');
require_once(ROOT_PATH .'Controllers/Controllers/UserController.php');

$user = new UserController();





if(isset($_POST['flg'])){
  $_SESSION['flg']=$_POST['flg'];
  if($_SESSION['flg']==100){
    $params = $user->log();
    if(password_verify($_POST['password'], $params['usertable'][0]['password'])){
      $ok = '1';
    }else{
      $ok = '0';
    };
    if($params['usertable'][0]['authority'] == '1' && $ok =='1'){
      $_SESSION['userauthority'] = 1;
      $_SESSION['username'] = $params['usertable'][0]['username'];
      $_SESSION['email'] = $params['usertable'][0]['email'];
      $_SESSION['password'] = $params['usertable'][0]['password'];
      $_SESSION['ID'] = $params['usertable'][0]['ID'];
      $_SESSION['flg']=$_POST['flg'];
      $_SESSION['mtso']=0;
      $_SESSION['mlcategory']=0;
      $_SESSION['mlkey']="";
      $_SESSION['mebreak']=0;
      $_SESSION['meid']="";
      $_SESSION['key']=1;
    }else if($params['usertable'][0]['authority'] == '0' && $ok =='1'){
      $_SESSION['userauthority'] = 0;
      $_SESSION['username'] = $params['usertable'][0]['username'];
      $_SESSION['email'] = $params['usertable'][0]['email'];
      $_SESSION['password'] = $params['usertable'][0]['password'];
      $_SESSION['ID'] = $params['usertable'][0]['ID'];
      $_SESSION['flg'] = $_POST['flg'];
      $_SESSION['mtso']=0;
      $_SESSION['mlcategory']=0;
      $_SESSION['mlkey']="";
      $_SESSION['mebreak']=0;
      $_SESSION['meid']="";
      $_SESSION['key'] = 1;
    }else{
      $_SESSION['userauthority'] = 3;
      header('Location: ./MPlogin.php');
      exit();
    }
  }else if($_SESSION['flg']==150){
    $params = $user->log2();
    if(password_verify($_POST['password'], $params['usertable'][0]['password'])){
      $ok = '1';
    }else{
      $ok = '0';
    };

    if($params['usertable'][0]['authority'] == '1' && $ok =='1'){
      $_SESSION['userauthority'] = 1;
      $_SESSION['username'] = $params['usertable'][0]['username'];
      $_SESSION['email'] = $params['usertable'][0]['email'];
      $_SESSION['password'] = $params['usertable'][0]['password'];
      $_SESSION['ID'] = $params['usertable'][0]['ID'];
      $_SESSION['flg']=$_POST['flg'];
      $_SESSION['mtso']=0;
      $_SESSION['mlcategory']=0;
      $_SESSION['mlkey']="";
      $_SESSION['mebreak']=0;
      $_SESSION['meid']="";
      $_SESSION['key']=1;
    }else if($params['usertable'][0]['authority'] == '0' && $ok =='1'){
      $_SESSION['userauthority'] = 0;
      $_SESSION['username'] = $params['usertable'][0]['username'];
      $_SESSION['email'] = $params['usertable'][0]['email'];
      $_SESSION['password'] = $params['usertable'][0]['password'];
      $_SESSION['ID'] = $params['usertable'][0]['ID'];
      $_SESSION['flg'] = $_POST['flg'];
      $_SESSION['mtso']=0;
      $_SESSION['mlcategory']=0;
      $_SESSION['mlkey']="";
      $_SESSION['mebreak']=0;
      $_SESSION['meid']="";
      $_SESSION['key'] = 1;
    }else{
      $_SESSION['userauthority'] = 3;
      header('Location: MPusernamefg.php');
      exit();
    }
  }
}else if(!isset($_SESSION) && $guest =='1'){
  $_SESSION['userauthority'] = 2;
};





$_POST = array();
$params = $user->pop2();
if(isset($_SESSION['mlkey'])){
  unset($_SESSION['mlkey']);
};

?>
 <h1>人気</h1>
 <div class="tops">
   <div class="topsam">
     <ul id="id01" class="sortlist">
       <?php foreach($params['materialtable']  as $mate): ?>
        <div class="matelist">
          <li class="matenara">
            <div class="nakakomi">
              <div clas="materialthumbnail">
                <?php echo'<a class="hiddenthumbnail" href="./materialdetail.php?id='.$mate['ID'].'">
                  <div radius="4" class="matelistthumb2">
                    <img src="../../Mimg\\'.$mate['Lname'].'" class="matetimg">
                  </div>
                </a>'?>
              </div>
            </div>
          </li>
        </div>
      <?php endforeach; ?>
     </ul>
   </div>
 </div>
 <div class="rightl">
   <div class="right2">
     <form method="POST" id="bf" action="./materiallist.php">
       <input type="hidden" value="pop" name="listchange" >
       <a href ="javascript:bf.submit()">人気素材をもっと見る</a>
     </form>
   </div>
 </div>
 <?php
 $params = $user->matelistall2();
 ?>
 <h1>新着</h1>
 <div class="tops">
   <div class="topsam">
     <ul id="id01" class="sortlist">
       <?php foreach($params['materialtable']  as $mate): ?>
        <div class="matelist">
          <li class="matenara">
            <div class="nakakomi">
              <div clas="materialthumbnail">
                <?php echo'<a class="hiddenthumbnail" href="./materialdetail.php?id='.$mate['ID'].'">
                  <div radius="4" class="matelistthumb2">
                    <img src="../../Mimg\\'.$mate['Lname'].'" class="matetimg">
                  </div>
                </a>'?>
              </div>
            </div>
          </li>
        </div>
      <?php endforeach; ?>
     </ul>
   </div>
 </div>
 <div class="rightl">
   <div class="right2">
     <a href ="./materiallist.php">新着素材をもっと見る</a>
   </div>
 </div>
 <?php
 $params = $user->reqestall2();
 ?>
 <h1>新着リクエスト</h1>
 <ul  id="id02" class="sortlist">
   <?php foreach($params['requesttable']  as $mate): ?>
     <form method="GET" name="reqdpost" id="bfo2" action="MPrequestd.php">
       <li class="goreqd">
         <?php echo '<a href ="./MPrequestd.php?id='.$mate['ID'].'"> '.$mate['title'].'</a>'?>
       </li>
     </form>
   <?php endforeach; ?>
 </ul>
 <div class="rightl">
   <div class="right2">
     <a href ="./MPrequestlist.php">新着リクエストをもっと見る</a>
   </div>
 </div>

<?php
include('MPfooter.php');
?>
