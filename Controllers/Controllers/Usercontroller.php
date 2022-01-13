<?php
require_once(ROOT_PATH .'/Models/Models/MPc.php');



class UserController {
    private $request;
    private $MPc;



    public function __construct() {
        //リクエストパラメータの取得
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;

        //モデルオブジェクトの生成
        $this->MPc = new MPc();
        //別モデルと連携
        $dbh = $this->MPc->get_db_handler();

    }

    public function index() {


      $mpc = $this->MPc->findAll();

      $out = [
        'contacts' => $mpc

      ];
    return $out;
  }




    public function edit(){
      if(empty($this->request['get']['id'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->findById($this->request['get']['id']);
      $result = [
        'contacts' => $mpc,
      ];
      return $result;
    }


    public function passre(){
      if(empty($this->request['post']['email'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->passr($this->request['post']['email']);
      $result = [
        'usertable' => $mpc,
      ];
      return $result;
    }

    public function alluser(){
      $mpc = $this->MPc->au();
      $result = [
        'usertable' => $mpc,
      ];
      return $result;
    }

    public function userdel(){
      $mpc = $this->MPc->udel($this->request['get']['ID']);
      $result = [
        'usertable' => $mpc,
      ];
      return $result;
    }




    public function del(){
      if(empty($this->request['get']['ID'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->matedel($this->request['get']['ID']);
      $result = [
        'materialtable' => $mpc,
      ];

      return $result;
    }

    public function likematerialdel(){
      if(empty($this->request['get']['ID'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->likematedel($this->request['get']['ID']);
      $result = [
        'materialtable' => $mpc,
      ];

      return $result;
    }//お気に入り素材解除


    public function soukon(){
      if(empty($this->request['post']['name'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->findById4($this->request['post']['name']);
      $result = [
        'contacts' => $mpc,
      ];
      return $result;
    }

    public function log(){
      $mpc = $this->MPc->logins($this->request['post']);
      $params = [
        'usertable' => $mpc

      ];
      return $params;
    }

    public function log2(){
      $mpc = $this->MPc->logins2($this->request['post']);
      $params = [
        'usertable' => $mpc,

      ];
      return $params;
    }

    public function newuser(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->newuserc($this->request['post']);
      $params = [
        'usertable' => $mpc,

      ];
      return $params;
    }


    public function post3(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->pos3($this->request['post']);
      $params = [
        'materialtable' => $mpc,

      ];
      return $params;
    }

    public function post2(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->pos3($this->request['post']);
      $params = [
        'materialtable' => $mpc,

      ];
      return $params;
    }

    public function post1(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->pos3($this->request['post']);
      $params = [
        'materialtable' => $mpc,

      ];
      return $params;
    }

    public function matelistall(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistall($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function partmatelistall(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->pamlistall($page);
      $materialcount = $this->MPc->cmcount();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function matelistall2(){
      $page = 0;
      $mpc = $this->MPc->mlistall2();
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 5,
      ];
      return $params;
    }

    public function mymatelistall(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mymateall($page);
      $materialcount = $this->MPc->mycount();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function mymatelistall2(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mymateall2($page);
      $materialcount = $this->MPc->mycount();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 4,
      ];
      return $params;
    }//ブックマークユーザー用

    public function bookmarkall(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->bkmall($page);
      $materialcount = $this->MPc->mycount();
      $params = [
        'favoritematerialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function bookuser(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->booku($page);
      $materialcount = $this->MPc->mycount();
      $params = [
        'usertable' => $mpc,
        'pages' => $materialcount / 2,
      ];
      return $params;
    }

    public function matelistallirast(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallirast($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function matelistallpic(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallpic($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function matelistallch(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallch($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function matelistallr(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallr($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function matelistallrirast(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallrirast($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function matelistallrpic(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallrpic($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function matelistallrch(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->mlistallrch($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function pop(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->po($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function pop2(){
      $page = 0;
      $mpc = $this->MPc->po2();
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 5,
      ];
      return $params;
    }
    public function popirast(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->poirast($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function poppic(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->popic($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function popch(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->poch($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function download(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->do($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function downloadirast(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->doirast($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function downloadpic(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->dopic($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }
    public function downloadch(){
      $page = 0;
      if(isset($this->request['get']['page'])){
        $page = $this->request['get']['page'];
      }
      $mpc = $this->MPc->doch($page);
      $materialcount = $this->MPc->countAll();
      $params = [
        'materialtable' => $mpc,
        'pages' => $materialcount / 10,
      ];
      return $params;
    }

    public function materialdeteal(){

      $mpc = $this->MPc->madt();
      $params = [
        'materialtable' => $mpc,
      ];
      return $params;
    }


    public function checkgoodcon(){


      $mpc = $this->MPc->checkgood();
      $good = [
        'likematerialtable' => $mpc,
      ];
      return $good;
    }

    public function checkmark(){


      $mpc = $this->MPc->checkma();
      $mark = [
        'favoritematerialtable' => $mpc,
      ];
      return $mark;
    }

    public function checkmarkuser(){
      $mpc = $this->MPc->checkmau();
      $mark = [
        'favoriteusertable' => $mpc,
      ];
      return $mark;
    }


    public function goodaction(){

      $mpc = $this->MPc->goodact();
      $params = [
        'materialtable' => $mpc,
      ];
      return $params;
    }

    public function nogoodaction(){

      $mpc = $this->MPc->nogoodact();
      $params = [
        'materialtable' => $mpc,
      ];
      return $params;
    }

    public function markaction(){

      $mpc = $this->MPc->markact();
      $params = [
        'favoritematerialtabl' => $mpc,
      ];
      return $params;
    }

    public function markuaction(){
      $mpc = $this->MPc->markuact();
      $params = [
        'favoriteusertabl' => $mpc,
      ];
      return $params;
    }

    public function nomarkaction(){

      $mpc = $this->MPc->nomarkact();
      $params = [
        'favoritematerialtabl' => $mpc,
      ];
      return $params;
    }

    public function nomarkuaction(){
      $mpc = $this->MPc->nomarkuact();
      $params = [
        'favoriteusertabl' => $mpc,
      ];
      return $params;
    }

    public function reqestmes(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->rm($this->request['post']);
      $params = [
        'requesttable' => $mpc,

      ];
      return $params;
    }

    public function reqestall(){

      $mpc = $this->MPc->reqall();
      $params = [
        'requesttable' => $mpc,
      ];
      return $params;
    }

    public function reqestall2(){
      $page = 0;
      $mpc = $this->MPc->reqall2();
      $materialcount = $this->MPc->countAll();
      $params = [
        'requesttable' => $mpc,
        'pages' => $materialcount / 3,
      ];
      return $params;
    }

    public function reqestallr(){

      $mpc = $this->MPc->reqallr();
      $params = [
        'requesttable' => $mpc,
      ];
      return $params;
    }

    public function reqestdeteal(){

      $mpc = $this->MPc->reqd($_GET['id']);
      $params = [
        'requesttable' => $mpc,
      ];
      return $params;
    }

    public function receiveuser(){
      $mpc = $this->MPc->ruser();
      $params = [
        'usertable' => $mpc,
      ];
      return $params;
    }

    public function senduser(){
      $mpc = $this->MPc->suser();
      $params = [
        'usertable' => $mpc,
      ];
      return $params;
    }


    public function messend(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      };

      $mpc = $this->MPc->msend($this->request['post']);
      $params = [
        'messagetable' => $mpc
      ];
      return $params;
    }
    public function messend2(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      };

      $mpc = $this->MPc->msend2($this->request['post']);
      $params = [
        'messagetable' => $mpc
      ];
      return $params;
    }


    public function dlcount(){
      $mpc = $this->MPc->dlc($this->request['post']);
      $params = [
        'materialtable' => $mpc
      ];
      return $params;
    }


    public function mebreak(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      };

      $mpc = $this->MPc->mbreak($this->request['post']);
      $params = [
        'messagetable' => $mpc
      ];
      return $params;
    }
    public function mebreak2(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      };

      $mpc = $this->MPc->mbreak2($this->request['post']);
      $params = [
        'messagetable' => $mpc
      ];
      return $params;
    }
    public function mebreak3(){
      if(empty($this->request['post'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      };

      $mpc = $this->MPc->mbreak3($this->request['post']);
      $params = [
        'messagetable' => $mpc
      ];
      return $params;
    }

    public function sendmessageall(){

      $mpc = $this->MPc->sendmall();
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function sendmessageallr(){

      $mpc = $this->MPc->sendmallr();
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function sendmessagedeteal(){

      $mpc = $this->MPc->sendmed($_GET['id']);
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function sendmessagedeteal2(){

      $mpc = $this->MPc->sendmed2();
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function receivemessagedeteal(){

      $mpc = $this->MPc->reseivemed($_GET['id']);
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function sendmessagedel(){
      if(empty($this->request['get']['ID'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->sendmedel($this->request['get']['ID']);
      $result = [
        'materialtable' => $mpc,
      ];

      return $result;
    }

    public function receivemessagedel(){
      if(empty($this->request['get']['ID'])){
        echo '指定のパラメータが不正です。このページを表示できません。';
        exit;
      }

      $mpc = $this->MPc->recmedel($this->request['get']['ID']);
      $result = [
        'materialtable' => $mpc,
      ];

      return $result;
    }

    public function receivemessageall(){

      $mpc = $this->MPc->receivemall();
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }

    public function receivemessageallr(){

      $mpc = $this->MPc->receivemallr();
      $params = [
        'messagetable' => $mpc,
      ];
      return $params;
    }


  }
 ?>
