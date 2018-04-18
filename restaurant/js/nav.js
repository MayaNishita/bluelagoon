// JavaScript Document
//ハンバーガーメニュー

$(function() {
	$(".menu-trigger").click(function () {
	  $(this).toggleClass("active");
	  $(this).next().toggleClass("onanimation");
	  $('ul li').hide();
	  $('ul li').each(function(i) {
	 	 $(this).delay(80 * i).fadeIn(500);
	  });
	});
});

$(function() {
	$(".sp a").click(function () {
	  $("p.menu-trigger").removeClass("active");
	  $("p.menu-trigger").next().removeClass("onanimation");
	  $('ul li').hide();
	  $('ul li').each(function(i) {
	 	 $(this).delay(80 * i).fadeOut(500);
	  });
	});
});


/*
$(function() {
    // ナビゲーションのリンクを指定
   var navLink = $('.g-nav li a');

    // 各コンテンツのページ上部からの開始位置と終了位置を配列に格納しておく
   var contentsArr = new Array();
  for (var i = 0; i < navLink.length; i++) {
       // コンテンツのIDを取得
      var targetContents = navLink.eq(i).attr('href');
      // ページ内リンクでないナビゲーションが含まれている場合は除外する
      if(targetContents.charAt(0) == '#') {
         // ページ上部からコンテンツの開始位置までの距離を取得
            var targetContentsTop = $(targetContents).offset().top;
         // ページ上部からコンテンツの終了位置までの距離を取得
            var targetContentsBottom = targetContentsTop + $(targetContents).outerHeight(true) - 1;
         // 配列に格納
            contentsArr[i] = [targetContentsTop, targetContentsBottom]
      }
   };

  // 現在地をチェックする
   function currentCheck() {
       // 現在のスクロール位置を取得
        var windowScrolltop = $(window).scrollTop();
        for (var i = 0; i < contentsArr.length; i++) {
           // 現在のスクロール位置が、配列に格納した開始位置と終了位置の間にあるものを調べる
          if(contentsArr[i][0] <= windowScrolltop && contentsArr[i][1] >= windowScrolltop) {
                // 開始位置と終了位置の間にある場合、ナビゲーションにclass="current"をつける
               navLink.removeClass('current');
               navLink.eq(i).addClass('current');
                i == contentsArr.length;
            }
       };
  }

   // ページ読み込み時とスクロール時に、現在地をチェックする
  $(window).on('load scroll', function() {
      currentCheck();
 });

 $(function(){
        // #で始まるリンクをクリックしたら実行
        $('a[href^="#"]').click(function() {
          var speed = 700;
          var href= $(this).attr("href");//a[href^="#"]のアドレス取得して変数hrefに代入
          var target = $(href == "#" || href == "" ? 'html' : href);//$(href == "#" || href == "" ? 'html' : href);三項演算子　変数targetに代入
          var position = target.offset().top;
          $('body,html').animate({scrollTop:position}, speed, 'swing');
        });
 });
});
*/
