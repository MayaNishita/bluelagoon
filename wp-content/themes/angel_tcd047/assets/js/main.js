$(document).ready(function(){

    $('.main-navigation a[href*=#]:not([href=#]), .onPageNav').click(function() {
       
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
				$(".navbar-collapse.collapse.in").removeClass("in");
                $('html,body').animate({
                    //scrollTop: target.offset().top - 55
					scrollTop: target.offset().top + 5
                }, 1000, function(){
                  
                });
                return false;
            }
        }
    });

    //fixed bootstrap scroll spy
    $('#main-nav-collapse').on('activate.bs.scrollspy', function () {
  		$(".navbar-nav > li[class='active'] > a").focus();
	});

});

/* Scroll to top */
$(window).scroll(function() {
	var $toTop = $('#totop');
	if ($(this).scrollTop() > 100) {
		$toTop.fadeIn();
	} else {
		$toTop.fadeOut();
	}
});
$("a[href='#totop']").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
});

$(function() {
    // ナビゲーションのリンクを指定
   var navLink = $('#gnav li a');
   var navLink_2 = $('#gnav li');
 
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
               navLink_2.removeClass('active');
               navLink_2.eq(i).addClass('active');
                i == contentsArr.length;
            }
       };
  }
 
   // ページ読み込み時とスクロール時に、現在地をチェックする
  $(window).on('load scroll', function() {
      currentCheck();
 });
 
 // ナビゲーションをクリックした時のスムーズスクロール
 // navLink.click(function() {
 //     $('html,body').animate({
 //         scrollTop: $($(this).attr('href')).offset().top
 //      }, 300);
  //      return false;
  // })
});