<?php
     function tcd_head() {
       $options = get_desing_plus_option();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/design-plus.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sns-botton.css?ver=<?php echo version_num(); ?>">

<?php if( !is_no_responsive() ) { // stylesheet for responsive design ?>
<link rel="stylesheet" media="screen and (max-width:1220px)" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1220px)" href="<?php echo get_template_directory_uri(); ?>/css/footer-bar.css?ver=<?php echo version_num(); ?>">
<?php }; ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/comment.js?ver=<?php echo version_num(); ?>"></script>

<?php if( !is_no_responsive() ) { // jscript for responsive design ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript_responsive.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/footer-bar.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>

<?php if($options['header_fix'] == 'type2') { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/header_fix.js?ver=<?php echo version_num(); ?>"></script>
<?php }; ?>

<style type="text/css">
<?php
     // フォント・ロゴ関連の設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     if (strtoupper(get_locale()) == 'JA') { // if wordpress is japanese mode
?>

<?php if($options['font_type'] == 'type1') { ?>
body, input, textarea { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['font_type'] == 'type2') { ?>
body, input, textarea { font-family: "Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif; }
<?php } else { ?>
body, input, textarea { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; ?>

<?php if($options['headline_font_type'] == 'type1') { ?>
.rich_font { font-family: Arial, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif; font-weight: normal; }
<?php } elseif($options['headline_font_type'] == 'type2') { ?>
.rich_font { font-family: "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight: 100; }
<?php } else { ?>
.rich_font { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php }; ?>

<?php }; // END if japanese mode ?>

body { font-size:<?php echo $options['content_font_size']; ?>px; }

<?php if($options['use_logo_image'] != 'yes'){ ?>
.pc #header .logo { font-size:<?php echo esc_html($options['logo_font_size']); ?>px; }
.mobile #header .logo { font-size:<?php echo esc_html($options['logo_font_size_mobile']); ?>px; }
<?php }; ?>

<?php if( is_single() || is_page() ) { ?>
#post_title { font-size:<?php echo esc_html($options['title_font_size']); ?>px; }
.post_content { font-size:<?php echo esc_html($options['content_font_size']); ?>px; }
<?php // パスワード保護 ?>
.c-pw__btn { background: #<?php echo esc_html($options['pickedcolor1']); ?>; }
.post_content a, .post_content a:hover { color: #<?php echo esc_html($options['content_link_color']); ?>; }
<?php }; ?>

<?php
     if( is_404()) {
       $title_font_size_pc = ( ! empty( $options['header_txt_size_404'] ) ) ? $options['header_txt_size_404'] : 38;
       $sub_title_font_size_pc = ( ! empty( $options['header_sub_title_size_404'] ) ) ? $options['header_sub_title_size_404'] : 16;
       $title_font_size_mobile = ( ! empty( $options['header_txt_size_404_mobile'] ) ) ? $options['header_txt_size_404_mobile'] : 28;
       $sub_title_font_size_mobile = ( ! empty( $options['header_sub_txt_size_404_mobile'] ) ) ? $options['header_sub_txt_size_404_mobile'] : 14;
?>
.pc #header_image_for_404 .headline { font-size:<?php echo esc_html($title_font_size_pc); ?>px; }
.pc #header_image_for_404 .sub_title { font-size:<?php echo esc_html($sub_title_font_size_pc); ?>px; }
.mobile #header_image_for_404 .headline { font-size:<?php echo esc_html($title_font_size_mobile); ?>px; }
.mobile #header_image_for_404 .sub_title { font-size:<?php echo esc_html($sub_title_font_size_mobile); ?>px; }
<?php }; ?>

<?php
     // サムネイルのアニメーション設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

     if($options['hover_type']=="type1"){ // type1 zoom effect------------------------------------------------------------
?>
#related_post li a.image, .styled_post_list1 .image, .styled_post_list2 .image, .styled_post_list3 .image, .post_list .image, .page_post_list .image {
  overflow: hidden;
}
#related_post li a.image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .styled_post_list3 .image img, .post_list .image img, .page_post_list .image img {
  width:100%; height:auto;
  -webkit-transition: all 0.75s ease; -moz-transition: all 0.75s ease; transition: all 0.75s ease;
  -webkit-backface-visibility:hidden; backface-visibility:hidden;
}
#related_post li a.image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .styled_post_list3 .image:hover img, .post_list .image:hover img, .page_post_list .image:hover img {
  -webkit-transform: scale(<?php echo $options['hover1_zoom']; ?>); -moz-transform: scale(<?php echo $options['hover1_zoom']; ?>); -ms-transform: scale(<?php echo $options['hover1_zoom']; ?>); -o-transform: scale(<?php echo $options['hover1_zoom']; ?>); transform: scale(<?php echo $options['hover1_zoom']; ?>);
}
<?php
     } elseif($options['hover_type']=="type2"){ // type2 slide effect -------------------------------------------------------
?>
#related_post li a.image, .styled_post_list1 .image, .styled_post_list2 .image, .styled_post_list3 .image, .post_list .image, .page_post_list .image {
  overflow: hidden;
}
#related_post li a.image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .styled_post_list3 .image img, .post_list .image img, .page_post_list .image img {
  -webkit-backface-visibility: hidden; backface-visibility: hidden;
  width:-webkit-calc(100% + 30px); width:-moz-calc(100% + 30px); width:calc(100% + 30px); height:auto;
  -webkit-transform: translate3d(-15px, -10px, 0); -webkit-transition-property: opacity, translate3d; -webkit-transition: 0.5s; -moz-transform: translate3d(-15px, -10px, 0); -moz-transition-property: opacity, translate3d; -moz-transition: 0.5s; -ms-transform: translate3d(-15px, -10px, 0); -ms-transition-property: opacity, translate3d; -ms-transition: 0.5s; -o-transform: translate3d(-15px, -10px, 0); -o-transition-property: opacity, translate3d; -o-transition: 0.5s; transform: translate3d(-15px, -10px, 0); transition-property: opacity, translate3d; transition: 0.5s;
}
#related_post li a.image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .styled_post_list3 .image:hover img, .post_list .image:hover img, .page_post_list .image:hover img {
  opacity:<?php echo $options['hover2_opacity']; ?>;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translate3d(0, -10px, 0); -moz-transform: translate3d(0, -10px, 0); -ms-transform: translate3d(0, -10px, 0); -o-transform: translate3d(0, -10px, 0); transform: translate3d(0, -10px, 0);
  <?php else: ?>
  -webkit-transform: translate3d(-30px, -10px, 0); -moz-transform: translate3d(-30px, -10px, 0); -ms-transform: translate3d(-30px, -10px, 0); -o-transform: translate3d(-30px, -10px, 0); transform: translate3d(-30px, -10px, 0);
  <?php endif; ?>
}
<?php
     } elseif($options['hover_type']=="type3"){ // type3 fade out effect--------------------------------------------------------
?>
#related_post li .image, .styled_post_list1 .image, .styled_post_list2 .image, .styled_post_list3 .image, .post_list .image, .page_post_list .image {
  background: #<?php echo $options['hover3_bgcolor']; ?>
}
#related_post li a.image img, .styled_post_list1 .image img, .styled_post_list2 .image img, .styled_post_list3 .image img, .post_list .image img, .page_post_list .image img {
  -webkit-backface-visibility: hidden; backface-visibility: hidden; -webkit-transition-property: opacity; -webkit-transition: 0.5s;
  -moz-transition-property: opacity; -moz-transition: 0.5s; -ms-transition-property: opacity; -ms-transition: 0.5s; -o-transition-property: opacity; -o-transition: 0.5s; transition-property: opacity; transition: 0.5s;
  width:100%; height:auto;
}
#related_post li a.image:hover img, .styled_post_list1 .image:hover img, .styled_post_list2 .image:hover img, .styled_post_list3 .image:hover img, .post_list .image:hover img, .page_post_list .image:hover img {
  opacity: <?php echo $options['hover3_opacity']; ?>;
  width:100%; height:auto;
}
<?php
     };

     // 色の設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     $color1 = esc_html($options['pickedcolor1']);
?>

a:hover, .post_list_headline, #page_header .headline, #related_post li .title a:hover, .side_widget .styled_post_list1 .title:hover, .widget_tab_post_list_button a, .side_headline, .footer_headline, #related_post .headline, #comment_headline, .page_post_list .meta a:hover, .page_post_list .headline,
  .pc #global_menu > ul > li.current-menu-item > a, #header_menu li.current-menu-item a, #footer_menu li.current-menu-item a, #footer_slider .slick-arrow:hover:before, #footer_slider_wrap .headline, #bread_crumb li.last, #profile_page_top .user_name, .styled_post_list2 .meta a:hover, .styled_post_list3 .meta li a:hover,
    .pc #header .logo a:hover, #comment_header ul li a:hover, .pc #global_menu > ul > li.active > a, #header_text .logo a:hover, #bread_crumb li.home a:hover:before, #bread_crumb li a:hover, .tcdw_menu_widget .menu_headline, .post_list .meta a:hover, #header_slider .category a:hover, .post_list .large_item .title a:hover, #post_title_area .meta li a:hover
      { color:#<?php echo $color1; ?>; }

.pc #global_menu a:hover, .pc #global_menu > ul > li.active > a, #return_top a:hover, .next_page_link a:hover, .collapse_category_list li a:hover .count, .slick-arrow:hover, .page_navi a:hover, .page_navi p.back a:hover,
  #wp-calendar td a:hover, #wp-calendar #prev a:hover, #wp-calendar #next a:hover, .widget_search #search-btn input:hover, .widget_search #searchsubmit:hover, .side_widget.google_search #searchsubmit:hover,
    #submit_comment:hover, #comment_header ul li a:hover, #comment_header ul li.comment_switch_active a, #comment_header #comment_closed p, #post_pagination a:hover,
      #header_slider .slick-dots button:hover::before, #header_slider .slick-dots .slick-active button::before, .mobile a.menu_button:hover, .mobile #global_menu li a:hover,
        .tcd_user_profile_widget .button a:hover, .mobile #return_top a
          { background-color:#<?php echo $color1; ?> !important; }

#comment_textarea textarea:focus, #guest_info input:focus, #comment_header ul li a:hover, #comment_header ul li.comment_switch_active a, #comment_header #comment_closed p, .page_navi a:hover, .page_navi p.back a:hover, #post_pagination a:hover, .pc #global_menu a:hover, .pc #global_menu > ul > li.active > a, .pc #global_menu > ul > li:last-child > a:hover, .pc #global_menu > ul > li.active:last-child > a
  { border-color:#<?php echo $color1; ?>; }

.pc #global_menu > ul > li:hover + li a { border-left-color:#<?php echo $color1; ?>;}

#comment_header ul li.comment_switch_active a:after, #comment_header #comment_closed p:after
  { border-color:#<?php echo $color1; ?> transparent transparent transparent; }

.collapse_category_list li a:before { border-color: transparent transparent transparent #<?php echo $color1; ?>; }

<?php
     // 固定ヘッダー・グローバルメニューの色設定（hoverは上記に記述） ------------------------------------------------
     $header_bg_color_base = esc_html($options['header_bg_color']);
     $header_bg_color_base = hex2rgb($header_bg_color_base);
     $header_bg_color = implode(",",$header_bg_color_base);
?>
.pc #global_menu > ul > li > a, .pc .header_fix #header {
  background-color:rgba(<?php echo $header_bg_color; ?>,<?php echo esc_html($options['header_bg_opacity']); ?>);
  border-color:#<?php echo esc_html($options['header_border_color']); ?>;
  color:#<?php echo esc_html($options['header_text_color']); ?>;
}
.pc .header_fix #global_menu > ul > li > a { background:none; }
.pc #global_menu > ul > li:last-child > a {
  border-color:#<?php echo esc_html($options['header_border_color']); ?>;
}
.pc .home #global_menu > ul > li.current-menu-item > a {
  color:#<?php echo esc_html($options['header_text_color']); ?>;
}
<?php if( !is_no_responsive() ) { ?>
@media screen and (max-width:1220px) {
  #header_inner {
    background-color:rgba(<?php echo $header_bg_color; ?>,<?php echo esc_html($options['header_bg_opacity']); ?>);
    border-color:#<?php echo esc_html($options['header_border_color']); ?>;
  }
  a.menu_button:before, #logo_text a {
    color:#<?php echo esc_html($options['header_text_color']); ?>;
  }
}
<?php }; ?>

<?php

     // top page -------------------------------------------------------
     if(is_front_page()) {
       if($options['show_index_slider'] == 1) {
         $text_color = $options['index_slider_button_color'];
         $text_color_hover = $options['index_slider_button_color_hover'];
         $bg_color = $options['index_slider_button_bg_color'];
         $bg_color_hover = $options['index_slider_button_bg_color_hover'];
         $hex_bg_color_base = hex2rgb($bg_color);
         $hex_bg_color = implode(",",$hex_bg_color_base);
         $bg_color_opacity = $options['index_slider_button_bg_opacity'];
         echo "#header_slider .button { background:rgba(" . $hex_bg_color . "," . esc_html($bg_color_opacity) . "); color:#" . esc_html($text_color) . "; }\n";
         echo "#header_slider .button:hover { background:#" . esc_html($bg_color_hover) . "; color:#" . esc_html($text_color_hover) . "; }\n";
         echo "#header_slider .caption .button:hover:after { color:#" . esc_html($text_color_hover) . "; }\n";
       };
       if($options['show_index_banner_content'] == 1) {
         $text_color = $options['index_banner_content_color'];
         $text_color_hover = $options['index_banner_content_color_hover'];
         $bg_color = $options['index_banner_content_bg_color'];
         $bg_color_hover = $options['index_banner_content_bg_color_hover'];
         $hex_bg_color_base = hex2rgb($bg_color);
         $hex_bg_color = implode(",",$hex_bg_color_base);
         $bg_color_opacity = $options['index_banner_content_bg_opacity'];
         echo "#header_banner_content .button { background:rgba(" . $hex_bg_color . "," . esc_html($bg_color_opacity) . "); color:#" . esc_html($text_color) . "; }\n";
         echo "#header_banner_content .button:hover { background:#" . esc_html($bg_color_hover) . "; color:#" . esc_html($text_color_hover) . "; }\n";
         echo "#header_banner_content .caption .button:hover:after { color:#" . esc_html($text_color_hover) . "; }\n";
       };
     };

     // loading screen -----------------------------------------
     get_template_part('functions/loader');

?>

<?php
     //フッターバー --------------------------------------------
     if(is_mobile()) {
       if($options['footer_bar_display'] == 'type1' || $options['footer_bar_display'] == 'type2') {
?>
.dp-footer-bar { background: <?php echo 'rgba('.implode(',', hex2rgb($options['footer_bar_bg'])).', '.esc_html($options['footer_bar_tp']).');'; ?> border-top: solid 1px #<?php echo esc_html($options['footer_bar_border']); ?>; color: #<?php echo esc_html($options['footer_bar_color']); ?>; display: flex; flex-wrap: wrap; }
.dp-footer-bar a { color: #<?php echo esc_html($options['footer_bar_color']); ?>; }
.dp-footer-bar-item + .dp-footer-bar-item { border-left: solid 1px #<?php echo esc_html($options['footer_bar_border']); ?>; }
<?php
       };
     };
?>

<?php if($options['css_code']) { echo $options['css_code']; };?>

</style>

<?php
     // JavaScriptの設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

     // top page -------------------------------------------------------
     if(is_front_page()) {

       // index slider --------------------------------------------------
       if($options['show_index_slider'] == 1) {
         wp_enqueue_style('slick-style', apply_filters('page_builder_slider_slick_style_url', get_template_directory_uri().'/js/slick.css'), '', '1.0.0');
         wp_enqueue_script('slick-script', apply_filters('page_builder_slider_slick_script_url', get_template_directory_uri().'/js/slick.min.js'), '', '1.0.0', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  $('#header_slider').on('init', function(event, slick){
    $('#header_slider .item1').addClass('first_active');
  });

  $('#header_slider').on('afterChange', function(event, slick, currentSlide){
    $('#header_slider .item1').removeClass('first_active');
  });

  $('#header_slider').slick({
    dots: true,
    arrows: false,
    pauseOnHover: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    autoplay: true,
    vertical: true,
    easing: 'easeOutExpo',
    speed: 1000,
    autoplaySpeed: <?php if($options['slider_time']) { echo esc_html($options['slider_time']); } else { echo '7000'; }; ?>
  });

});
</script>
<?php
       }; // END show index slider
     }; // END top page

     // footer slider ---------------------------------------------------
     if($options['show_footer_slider'] == 1) {
       wp_enqueue_style('slick-style', apply_filters('page_builder_slider_slick_style_url', get_template_directory_uri().'/js/slick.css'), '', '1.0.0');
       wp_enqueue_script('slick-script', apply_filters('page_builder_slider_slick_script_url', get_template_directory_uri().'/js/slick.min.js'), '', '1.0.0', true);
?>
<script type="text/javascript">
jQuery(document).ready(function($){

  $('#footer_slider').slick({
    dots: false,
    arrows: true,
    pauseOnHover: true,
    slidesToShow: 6,
    slidesToScroll: 1,
    adaptiveHeight: false,
    autoplay: true,
    easing: 'easeOutExpo',
    speed: 1000,
    prevArrow : '<div class="slick-prev"><span>Prev</span></div>',
    nextArrow : '<div class="slick-next"><span>Next</span></div>',
<?php if( ! is_no_responsive() ) { // change navigation number for responsive design ?>
    responsive: [
      {
        breakpoint: 770,
        settings: { slidesToShow: 4, arrows: false }
      },
      {
        breakpoint: 660,
        settings: { slidesToShow: 3, arrows: false }
      }
    ]
<?php }; ?>
  });

});
</script>
<?php
     }; // END show footer slider

     // infinity scroll -------------------------------------------------------------------------------------
     if(is_front_page() || is_archive() || is_search()) {
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.infinitescroll.min.js<?php version_num(); ?>"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $('#ajax_load_post_list').infinitescroll({
      navSelector  : '#load_post',
      nextSelector : '#load_post a',
      itemSelector : '.ajax_item',
      animate      : true,
      extraScrollPx: 300,
      errorCallback: function() { 
          $('#infscr-loading').animate({opacity: 0.8},1000).fadeOut('normal');
      },
      loading: {
          msgText : '<?php _e('Loading post...', 'tcd-w');  ?>',
          finishedMsg : '<?php _e('No more post', 'tcd-w');  ?>',
          img : '<?php bloginfo('template_url'); ?>/img/common/loader.gif'
      }
    },function(arrayOfNewElems){
        $(arrayOfNewElems).hide();
        $(arrayOfNewElems).fadeIn('slow');
        $('#load_post a').show();
    });
    $(window).unbind('.infscr');
    $('#load_post a').click(function(){
      $('#load_post a').hide();
      $('#ajax_load_post_list').infinitescroll('retrieve');
      $('#load_post').show();
      return false;
    });
  });
</script>
<?php }; ?>

<?php
     }; // END function tcd_head()
     add_action("wp_head", "tcd_head");
?>
