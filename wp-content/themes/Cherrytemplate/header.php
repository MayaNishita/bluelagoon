<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Cherrys Company Inc.</title>
<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Oswald|Yellowtail" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabigothic.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Slabo+13px" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<!-- jQuery library (served from Google) -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider/jquery.bxslider.min.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider').bxSlider({
                    auto: true,
                });
          });
    </script>
<!-- bxSlider Javascript file -->
 <script>
    $(function() {
        var $header = $('#top-head');
        // Nav Fixed
        $(window).scroll(function() {
            if ($(window).scrollTop() > 250) {
                $header.addClass('fixed');
            } else {
                $header.removeClass('fixed');
            }
        });
        // Nav Toggle Button
        $('#nav-toggle').click(function(){
            $header.toggleClass('open');
        });
    });
  </script>
  <script>
  // グローバル変数
var syncerTimeout = null ;

// 一連の処理
$( function()
{
  // スクロールイベントの設定
  $( window ).scroll( function()
  {
    // 1秒ごとに処理
    if( syncerTimeout == null )
    {
      // セットタイムアウトを設定
      syncerTimeout = setTimeout( function(){

        // 対象のエレメント
        var element = $( '#page-top' ) ;

        // 現在、表示されているか？
        var visible = element.is( ':visible' ) ;

        // 最上部から現在位置までの距離を取得して、変数[now]に格納
        var now = $( window ).scrollTop() ;

        // 最下部から現在位置までの距離を計算して、変数[under]に格納
        var under = $( 'body' ).height() - ( now + $(window).height() ) ;

        // 最上部から現在位置までの距離(now)が500以上かつ
        // 最下部から現在位置までの距離(under)が0px以上かつ…
        if( now > 500 && 0 < under )
        {
          // 非表示状態だったら
          if( !visible )
          {
            // [#page-top]をゆっくりフェードインする
            element.fadeIn( 'slow' ) ;
          }
        }

        // 500px以下かつ
        // 表示状態だったら
        else if( visible )
        {
          // [#page-top]をゆっくりフェードアウトする
          element.fadeOut( 'slow' ) ;
        }

        // フラグを削除
        syncerTimeout = null ;
      } , 1000 ) ;
    }
  } ) ;

  // クリックイベントを設定する
  $( '#move-page-top' ).click(
    function()
    {
      // スムーズにスクロールする
      $( 'html,body' ).animate( {scrollTop:0} , 'slow' ) ;
    }
  ) ;
} ) ;

 </script>
</head>

<body id="top">
<header id="top-head">
  <div class="inner">
    <div id="mobile-head">
      <a href="index.html"><h1 class="logo"><img src="images/cherrysLogo.gif" width="185px" height="" alt="チェリーズカンパニー" /></h1></a>
      <div id="nav-toggle">
  <div>
              <span></span>
              <span></span>
              <span></span>
          </div>
      </div>
</div><!---mobile-head end -->
    <nav id="global-nav" role="navigation">
      <div id="gnav-container">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'global',
        'container'      => 'div',
        'depth'          => 1,
      ) );
      ?>
      </div>
    </nav>
  </div><!---inner end-->
</header>
