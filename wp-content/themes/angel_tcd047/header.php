<?php $options = get_desing_plus_option(); ?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php
     $options = get_desing_plus_option();
     if($options['use_ogp']) {
?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php }; ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<?php if ( is_no_responsive() && wp_is_mobile() ) : ?>
<meta name="viewport" content="width=1250">
<?php else : ?>
<meta name="viewport" content="width=device-width">
<?php endif; ?>
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<?php if($options['use_ogp']) { ogp(); }; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
     if ( $options['favicon'] ) {
       $favicon_image = wp_get_attachment_image_src( $options['favicon'], 'full');
       if(!empty($favicon_image)) {
?>
<link rel="shortcut icon" href="<?php echo esc_url($favicon_image[0]); ?>">
<?php }; }; ?>
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- PC Header Fixed -->
<script>
jQuery(document).ready(function($){
  var $win = $(window),
      $header = $('header'),
      animationClass = 'is-animation';

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > 100 ) {
      $header.addClass(animationClass);
    } else {
      $header.removeClass(animationClass);
    }
  });
});
</script>
<!-- END PC Header Fixed -->
</head>
<body id="body" <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.11&appId=199017733483260';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php if ($options['use_load_icon']) { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
  <?php if ($options['load_icon'] == 'type3') { ?>
  <i></i><i></i><i></i><i></i>
  <?php } ?>
 </div>
</div>
<div id="site_wrap">
<?php } ?>

 <div id="header">
  <div id="header_inner" class="clearfix">
   <?php header_logo(); ?>
   <?php
        // global menu
        if (has_nav_menu('global-menu')) {
   ?>
   <div id="global_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
    <?php
         // header menu (for mobile)
         if (has_nav_menu('header-menu')&&is_mobile()) {
    ?>
      <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' , 'container' => '' ) ); ?>
    <?php }; ?>
   </div>
   <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
   <?php }; ?>
   <?php
        // header menu (right top / for PC)
        if (has_nav_menu('header-menu')&&!is_mobile()) {
   ?>
   <div id="header_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' , 'container' => '' ) ); ?>
   </div>
   <?php }; ?>
   <?php
        // social button (left top)
        if ($options['show_rss'] || $options['twitter_url'] || $options['facebook_url'] || $options['insta_url'] || $options['pint_url'] || $options['mail_url']) {
   ?>
   <ul id="header_social_link" class="social_link clearfix">
    <?php if ($options['twitter_url']) : ?><li class="twitter"><a class="target_blank" href="<?php echo esc_url($options['twitter_url']); ?>">Twitter</a></li><?php endif; ?>
    <?php if ($options['facebook_url']) : ?><li class="facebook"><a class="target_blank" href="<?php echo esc_url($options['facebook_url']); ?>">Facebook</a></li><?php endif; ?>
    <?php if ($options['insta_url']) : ?><li class="insta"><a class="target_blank" href="<?php echo esc_url($options['insta_url']); ?>">Instagram</a></li><?php endif; ?>
    <?php if ($options['pint_url']) : ?><li class="pint"><a class="target_blank" href="<?php echo esc_url($options['pint_url']); ?>">Pinterest</a></li><?php endif; ?>
    <?php if ($options['mail_url']) : ?><li class="mail"><a class="target_blank" href="<?php echo esc_url($options['mail_url']); ?>">Contact</a></li><?php endif; ?>
    <?php if ($options['show_rss']) : ?><li class="rss"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">RSS</a></li><?php endif; ?>
   </ul>
   <?php }; ?>
  </div>
 </div><!-- END #header -->
<!-- PC Header -->
<header>
  <h1><a href="http://kurocobushi.xsrv.jp/" title="EPIC SNOWBOARDING MAGAZINE"><img src="http://kurocobushi.xsrv.jp/wp-content/uploads/2017/11/epic-logo-2.png?1511236221" alt="EPIC SNOWBOARDING MAGAZINE" title="EPIC SNOWBOARDING MAGAZINE" width="240" height="96" /></a></h1>
</header>
<!-- END PC Header -->
<!-- Side Nav -->
<div class="container"> 
  <!-- head_menu -->
  <div class="head_menu">
    <div id="menu"> <a href="#" id="menu-btn">
      <div><i></i></div>
      </a>
      <div id="menu-content">
        <div class="menu-content-inner">
          <div class="menu-content-main">
            <ul>
              <li><a href="/category/videos/"><span>VIDEOS</span></a>
                <ul>
                  <li><a href="/category/videos/clips/">CLIPS</a><span>注目のスノーボード動画を独自目線で紹介</span></li>
                  <li><a href="/category/videos/hookups/">HOOK UPS</a><span>注目スノーボーダーのフッテージを独占公開</span></li>
                  <li><a href="/category/videos/toptobottom/">TOP TO BOTTOM</a><span>1本のラインで魅せるアイデンティティ</span></li>
                </ul>
              </li>
              <li><a href="#news"><span>ARTICLES</span></a>
                <ul>
                  <li><a href="/category/articles/core/">CORE</a><span>ライダーやブランドの信念を紐解く特集企画</span></li>
                  <li><a href="/category/articles/focus/">FOCUS</a><span>シーンで起こっている出来事にフォーカス</span></li>
                  <li><a href="/category/articles/expression/">EXPRESSION</a><span>スノーボーダーたちのマインドに迫る</span></li>

                  <li><a href="/category/articles/proline/">PROLINE</a><span>スノーボーダーの本性を垣間見るプロフィール</span></li>
                  <li><a href="/category/articles/editorslog/">EDITOR'S LOG</a><span>編集部によるコラム</span></li>

                  <li><a href="/category/articles/column/">COLUMN</a><span>スノーボーダーによるコラム</span></li>

                </ul>
              </li>
              <li><a href="#business"><span>PRODUCTS</span></a>
                <ul>
                  <li><a href="/category/products/featuredproducts/">FEATURED PRODUCTS</a><span>こだわりのプロダクトを徹底解剖</span></li>
                  <li><a href="/category/products/newproducts/">PRODUCTS</a><span>最新の注目プロダクトを紹介</span></li>
                  <li><a href="/category/products/brandcatalog/">BRAND CATALOG</a><span>人気ブランドの最新カタログ</span></li>
                </ul>
              </li>
              <li><a href="#recruit"><span>INFORMATION</span></a>
                <ul>
                  <li><a href="/category/information/news/">NEWS</a><span>スノーボードシーンの最新ニュース</span></li>
                  <li><a href="/category/information/events/">EVENTS</a><span>イベント情報とレポート</span></li>
                </ul>
              </li>
              <li><a href="#about"><span>LIFE LOG</span></a>
                <ul>
                  <li><a href="/category/lifelog/douraku/">DOURAKU</a><span>スノーボーダーの生態</span></li>
                </ul>
              </li>            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /head_menu --> 
</div>
<!--/container-->
<!-- END Side Nav -->
 <?php
      // index slider ---------------------------------------------------------------------------
      if(is_front_page()) {
        if($options['show_index_slider'] == 1) {
 ?>


 <?php
        }; // END if show index slider
      }; // END if is front page
 ?>

 <div id="main_contents" class="clearfix">

<?php 
      /* */ if(is_mobile()) { echo '<a href="https://epic-snowboardingmagazine.com/videos/clips/zipangu-atsushi-hasegawa-fullpart/"><img src="http://kurocobushi.xsrv.jp/wp-content/uploads/2017/12/rk1-sm-banner.jpg" width=100%></a>'; }; /* */
      if(is_front_page()) { echo do_shortcode('[smartslider3 slider=4]');};
?>