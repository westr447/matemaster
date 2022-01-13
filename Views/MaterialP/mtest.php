<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>MaterialPoint</title>
  <link rel="stylesheet" type="text/css" href="../../CSS\mp.css">
  <link rel="stylesheet" href="../../CSS\validationEngine.jquery.css">
  <script type="text/javascript"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../../js\jquery.validationEngine-ja.js" charset="UTF-8"></script>
  <script src="../../js\jquery.validationEngine.js"></script>
  <script type="text/javascript">
    jQuery(function(){
      jQuery("#bfo").validationEngine(
        'attach', {
          promptPosition: "bottomRight:10px"
        }
      );
    });
  </script>
  <script type="text/javascript">
    jQuery(function(){
      jQuery("#bfo2").validationEngine(
        'attach', {
          promptPosition: "bottomLeft:10px"
        }
      );
    });
  </script>


</head>
<body>
  <div>2つ上のフォルダの中の中の中
    <img src="../../tmp/rensyu.png" width = "100px" height = "100px">
    <img src="../../Mimg/mkou.png" width = "100px" height = "100px">
    <img src="./rensyu3.png" width = "100px" height = "100px">
  </div>
  <div id="parent" class="daddy">
    <div id="sample">
      <span>1</span>
      <span>2</span>
      <span>3</span>
      <span>4</span>
      <span>5</span>
    </div>
  </div>
  <section class="post" data-postid="<?php echo sanitize($p_id); ?>">
    <div class="btn-good <?php if(isGood($_SESSION['user_id'], $dbPostData['id'])) echo 'active'; ?>">
        <!-- 自分がいいねした投稿にはハートのスタイルを常に保持する -->
        <i class="fa-heart fa-lg px-16
        <?php
            if(isGood($_SESSION['user_id'],$dbPostData['id'])){ //いいね押したらハートが塗りつぶされる
                echo ' active fas';
            }else{ //いいねを取り消したらハートのスタイルが取り消される
                echo ' far';
            }; ?>"></i><span><?php echo $dbPostGoodNum; ?></span>


    </div>
</section>
