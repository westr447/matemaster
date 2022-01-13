$(function(){
    var $good = $('.goodbtn'), //いいねボタンセレクタ
                goodPostId; //投稿ID
    $good.on('click',function(e){
        e.stopPropagation();
        var $this = $(this);
        //カスタム属性（postid）に格納された投稿ID取得
        goodmateriaID = $this.parents('.post').data('materialID');
        $.ajax({
            type: 'POST',
            url: 'mategood.php', //post送信を受けとるphpファイル
            data: { materiaiID: goodmaterialID} //{キー:投稿ID}
        }).done(function(data){
            console.log('Ajax Success');
        }).fail(function(msg) {
            console.log('Ajax Error');
        });
    });
});
