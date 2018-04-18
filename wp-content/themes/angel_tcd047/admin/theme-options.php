<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * オプション初期値
 * @var array 
 */
global $dp_default_options;
$dp_default_options = array(
// 基本設定
	'pickedcolor1' => 'EA5D6E',
	'content_link_color' => 'EA5D6E',
	'font_type' => 'type1',
	'headline_font_type' => 'type2',
	'hover_type' => 'type1',
	'hover1_zoom' => '1.2',
	'hover2_direct' => 'type1',
	'hover2_opacity' => '0.5',
	'hover3_opacity' => '0.5',
	'hover3_bgcolor' => 'FFFFFF',
	'responsive' => 'yes',
	'use_emoji' => 1,
	'css_code' => '',
	'use_ogp' => 0,
	'fb_admin_id' => '',
	'ogp_image' => '',
	'use_twitter_card' => 0,
	'twitter_account_name' => '',
	'column_float' => 0,
	'favicon' => false,
	'use_load_icon' => '',
	'load_time' => '3000',
	'load_icon' => 'type1',
	'loader_color1' => 'EA5D6E',
	'loader_color2' => 'C24B59',
	'no_image1' => false,
	'no_image2' => false,
	'no_image3' => false,
	'header_image_404' => '',
	'header_txt_404' => '',
	'header_sub_txt_404' => '',
	'header_txt_size_404' => 38,
	'header_sub_txt_size_404' => 16,
	'header_txt_size_404_mobile' => 28,
	'header_sub_txt_size_404_mobile' => 14,
	'header_txt_color_404' => 'FFFFFF',
	'dropshadow_404_h' => 2,
	'dropshadow_404_v' => 2,
	'dropshadow_404_b' => 2,
	'dropshadow_404_c' => '888888',
// ロゴ
	'use_logo_image' => 'no',
	'logo_font_size' => 31,
	'logo_font_size_mobile' => 18,
	'show_tagline' => 1,
	'tagline_font_size' => 14,
	'header_logo_image' => false,
	'header_logo_image_mobile' => false,
	'header_logo_retina' => '',
	'header_logo_retina_mobile' => '',
// トップページのスライダー
	'show_index_slider' => 0,
	'index_slider_num' => 3,
	'index_slider_type' => 'type1',
	'index_slider_post_type' => 'recent_post',
	'index_slider_post_type_order' => 'date1',
	'index_slider_use_retina' => 0,
	'slider_time' => '7000',
	'index_slider_font_size' => 18,
	'index_slider_image1' => '',
	'index_slider_image2' => '',
	'index_slider_image3' => '',
	'index_slider_image4' => '',
	'index_slider_image5' => '',
	'index_slider_catch1' => '',
	'index_slider_catch2' => '',
	'index_slider_catch3' => '',
	'index_slider_catch4' => '',
	'index_slider_catch5' => '',
	'index_slider_url1' => '',
	'index_slider_url2' => '',
	'index_slider_url3' => '',
	'index_slider_url4' => '',
	'index_slider_url5' => '',
	'index_slider_target1' => 1,
	'index_slider_target2' => 1,
	'index_slider_target3' => 1,
	'index_slider_target4' => 1,
	'index_slider_target5' => 1,
	'index_slider_button_label1' => '',
	'index_slider_button_label2' => '',
	'index_slider_button_label3' => '',
	'index_slider_button_label4' => '',
	'index_slider_button_label5' => '',
	'index_slider_button_color' => 'FFFFFF',
	'index_slider_button_color_hover' => '333333',
	'index_slider_button_bg_color' => '333333',
	'index_slider_button_bg_color_hover' => 'FFFFFF',
	'index_slider_button_bg_opacity' => '1.0',
// トップページのバナー
	'show_index_banner_content' => 0,
	'index_banner_content_type' => 'type1',
	'index_banner_content_post_type' => 'recent_post',
	'index_banner_content_post_type_order' => 'date1',
	'index_banner_content_use_retina' => 0,
	'index_banner_content_image1' => '',
	'index_banner_content_image2' => '',
	'index_banner_content_catch1' => '',
	'index_banner_content_catch2' => '',
	'index_banner_content_url1' => '',
	'index_banner_content_url2' => '',
	'index_banner_content_target1' => 1,
	'index_banner_content_target2' => 1,
	'index_banner_content_color' => 'FFFFFF',
	'index_banner_content_color_hover' => '333333',
	'index_banner_content_bg_color' => '333333',
	'index_banner_content_bg_color_hover' => 'FFFFFF',
	'index_banner_content_bg_opacity' => '1.0',
	'index_banner_font_size' => 14,
// トップページのおすすめ記事
	'show_index_featured_post' => 0,
	'index_featured_post_headline' => 'FEATURED POSTS',
	'index_featured_post_headline_font_size' => 20,
	'index_featured_post_type' => 'recommend_post',
	'index_featured_post_show_excerpt' => 1,
	'index_featured_post_show_date' => 1,
	'index_featured_post_show_category' => 1,
	'index_featured_post_use_retina' => 0,
// トップページのBlogコンテンツ
	'show_index_blog_list' => 0,
	'index_blog_headline' => 'NEWS POSTS',
	'index_blog_headline_font_size' => 20,
	'index_blog_show_excerpt' => 1,
	'index_blog_show_date' => 1,
	'index_blog_show_category' => 1,
	'index_blog_use_retina' => 0,
	'index_blog_ad_no_border1' => 0,
	'index_blog_ad_no_border2' => 0,
	'index_blog_ad_code1' => '',
	'index_blog_ad_image1' => false,
	'index_blog_ad_url1' => '',
	'index_blog_ad_code2' => '',
	'index_blog_ad_image2' => false,
	'index_blog_ad_url2' => '',
// ブログコンテンツ
	'archive_blog_show_excerpt' => 1,
	'archive_blog_show_date' => 1,
	'archive_blog_show_category' => 1,
	'archive_blog_use_retina' => 0,
	'archive_blog_ad_no_border1' => 0,
	'archive_blog_ad_no_border2' => 0,
	'archive_blog_ad_code1' => '',
	'archive_blog_ad_image1' => false,
	'archive_blog_ad_url1' => '',
	'archive_blog_ad_code2' => '',
	'archive_blog_ad_image2' => false,
	'archive_blog_ad_url2' => '',
// 固定ページ
	'page_headline_font_size' => '42',
	'page_ad_code1' => '',
	'page_ad_image1' => false,
	'page_ad_url1' => '',
	'page_ad_code2' => '',
	'page_ad_image2' => false,
	'page_ad_url2' => '',
	'page_post_list_headline' => 'FEATURED POSTS',
	'page_post_list_headline_font_size' => 20,
	'page_post_list_type' => 'recent_post',
	'page_post_list_order' => 'date1',
	'page_post_list_num' => 4,
	'page_post_list_show_cat' => 1,
	'page_post_list_show_date' => 1,
// 記事ページ
	'title_font_size' => '32',
	'content_font_size' => '14',
	'show_date' => 1,
	'show_category' => 1,
	'show_tag' => 1,
	'show_comment' => 1,
	'show_author' => 1,
	'show_trackback' => 1,
	'show_related_post' => 1,
	'show_next_post' => 1,
	'show_thumbnail' => 1,
	'related_use_retina' => 0,
// シェアボタン
	'show_sns_top' => 1,
	'show_sns_btm' => 1,
	'sns_type_top' => 'type1',
	'sns_type_btm' => 'type1',
	'show_twitter_top' => 1,
	'show_fblike_top' => 1,
	'show_fbshare_top' => 1,
	'show_google_top' => 1,
	'show_hatena_top' => 1,
	'show_pocket_top' => 1,
	'show_feedly_top' => 1,
	'show_rss_top' => 1,
	'show_pinterest_top' => 1,
	'show_twitter_btm' => 1,
	'show_fblike_btm' => 1,
	'show_fbshare_btm' => 1,
	'show_google_btm' => 1,
	'show_hatena_btm' => 1,
	'show_pocket_btm' => 1,
	'show_feedly_btm' => 1,
	'show_rss_btm' => 1,
	'show_pinterest_btm' => 1,
	'twitter_info' => '',
// 記事ページのバナー
	'single_ad_code1' => '',
	'single_ad_image1' => false,
	'single_ad_url1' => '',
	'single_ad_code2' => '',
	'single_ad_image2' => false,
	'single_ad_url2' => '',
	'single_ad_code3' => '',
	'single_ad_image3' => false,
	'single_ad_url3' => '',
	'single_ad_code4' => '',
	'single_ad_image4' => false,
	'single_ad_url4' => '',
	'single_ad_code5' => '',
	'single_ad_image5' => false,
	'single_ad_url5' => '',
	'single_ad_no_border5' => 0,
	'single_mobile_ad_code1' => '',
	'single_mobile_ad_image1' => false,
	'single_mobile_ad_url1' => '',
	'single_mobile_ad_code2' => '',
	'single_mobile_ad_image2' => false,
	'single_mobile_ad_url2' => '',
// ヘッダー
	'header_fix' => 'type1',
	'mobile_header_fix' => 'type1',
	'twitter_url' => '',
	'facebook_url' => '',
	'insta_url' => '',
	'pint_url' => '',
	'mail_url' => '',
	'show_rss' => 1,
	'header_bg_color' => 'FBFBFB',
	'header_bg_opacity' => '1',
	'header_text_color' => '333333',
	'header_border_color' => 'DDDDDD',
// フッター
	'show_footer_slider' => 0,
	'footer_slider_post_type' => 'recommend_post',
	'footer_slider_headline' => 'FEATURED POST',
	'footer_slider_num' => 10,
// フッターの固定メニュー
	'footer_bar_display' => 'type3',
	'footer_bar_tp' => 0.8,
	'footer_bar_bg' => 'FFFFFF',
	'footer_bar_border' => 'DDDDDD',
	'footer_bar_color' => '000000',
	'footer_bar_btns' => array(
		array(
			'type' => 'type1',
			'label' => '',
			'url' => '',
			'number' => '',
			'target' => 0,
			'icon' => 'file-text'
		)
	),
// ページ保護
	'pw_label' => '',
	'pw_align' => 'type1',
	'pw_name1' => '',
	'pw_name2' => '',
	'pw_name3' => '',
	'pw_name4' => '',
	'pw_name5' => '',
	'pw_btn_display1' => '',
	'pw_btn_display2' => '',
	'pw_btn_display3' => '',
	'pw_btn_display4' => '',
	'pw_btn_display5' => '',
	'pw_btn_label1' => '',
	'pw_btn_label2' => '',
	'pw_btn_label3' => '',
	'pw_btn_label4' => '',
	'pw_btn_label5' => '',
	'pw_btn_url1' => '',
	'pw_btn_url2' => '',
	'pw_btn_url3' => '',
	'pw_btn_url4' => '',
	'pw_btn_url5' => '',
	'pw_btn_target1' => 0,
	'pw_btn_target2' => 0,
	'pw_btn_target3' => 0,
	'pw_btn_target4' => 0,
	'pw_btn_target5' => 0,
	'pw_editor1' => '',
	'pw_editor2' => '',
	'pw_editor3' => '',
	'pw_editor4' => '',
	'pw_editor5' => ''
);

/**
 * Design Plusのオプションを返す
 * @global array $dp_default_options
 * @return array 
 */
function get_desing_plus_option(){
	global $dp_default_options;
	return shortcode_atts($dp_default_options, get_option('dp_options', array()));
}


// 登録
function theme_options_init(){
  register_setting( 'design_plus_options', 'dp_options', 'theme_options_validate' );
}


// ロード
function theme_options_add_page() {
  add_theme_page( __( 'Theme Options', 'tcd-w' ), __( 'TCD Theme Options', 'tcd-w' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


// hover effect
global $hover_type_options;
$hover_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Zoom', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Slide', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'Fade', 'tcd-w' ))
);
global $hover2_direct_options;
$hover2_direct_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Left to Right', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Right to Left', 'tcd-w' ))
);


//フォントタイプ
global $font_type_options;
$font_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Meiryo', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'YuGothic', 'tcd-w' )),
  'type3' => array('value' => 'type3','label' => __( 'YuMincho', 'tcd-w' ))
);


// ヘッダーの固定設定
global $header_fix_options;
$header_fix_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Normal header', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Fix at top after page scroll', 'tcd-w' )),
);


// ソーシャルボタンの設定
// 記事上ボタンタイプ
global $sns_type_top_options;
$sns_type_top_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'style1', 'tcd-w' )),
  'type2' => array( 'value' => 'type2', 'label' => __( 'style2', 'tcd-w' )),
  'type3' => array( 'value' => 'type3', 'label' => __( 'style3', 'tcd-w' )),
  'type4' => array( 'value' => 'type4', 'label' => __( 'style4', 'tcd-w' )),
  'type5' => array( 'value' => 'type5', 'label' => __( 'style5', 'tcd-w' ))
);
// 記事下ボタンタイプ
global $sns_type_btm_options;
$sns_type_btm_options = array(
  'type1' => array( 'value' => 'type1', 'label' => __( 'style1', 'tcd-w' )),
  'type2' => array( 'value' => 'type2', 'label' => __( 'style2', 'tcd-w' )),
  'type3' => array( 'value' => 'type3', 'label' => __( 'style3', 'tcd-w' )),
  'type4' => array( 'value' => 'type4', 'label' => __( 'style4', 'tcd-w' )),
  'type5' => array( 'value' => 'type5', 'label' => __( 'style5', 'tcd-w' ))
);


// レスポンシブの設定
global $responsive_options;
$responsive_options = array(
  'yes' => array('value' => 'yes','label' => __( 'Use responsive design', 'tcd-w' )),
  'no' => array('value' => 'no','label' => __( 'Do not use responsive design', 'tcd-w' ))
);


// ローディングアイコンの最大表示時間の設定
global $load_time_options;
$load_time_options = array(
  '3' => array('value' => '3000','label' => __( '3 second', 'tcd-w' )),
  '4' => array('value' => '4000','label' => __( '4 second', 'tcd-w' )),
  '5' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
  '6' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
  '7' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
  '8' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
  '9' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
  '10' => array('value' => '10000','label' => __( '10 second', 'tcd-w' )),
);


// ローディングアイコンの種類の設定
global $load_icon_type;
$load_icon_type = array(
 'type1' => array('value' => 'type1','label' => __( 'Circle', 'tcd-w' )),
 'type2' => array('value' => 'type2','label' => __( 'Square', 'tcd-w' )),
 'type3' => array('value' => 'type3','label' => __( 'Dot', 'tcd-w' ))
);


// フッターの固定メニュー 表示タイプ
global $footer_bar_display_options;
$footer_bar_display_options = array(
 'type1' => array('value' => 'type1', 'label' => __( 'Fade In', 'tcd-w' )),
 'type2' => array('value' => 'type2', 'label' => __( 'Slide In', 'tcd-w' )),
 'type3' => array('value' => 'type3', 'label' => __( 'Hide', 'tcd-w' ))
);


// フッターの固定メニュー ボタンのタイプ
global $footer_bar_button_options;
$footer_bar_button_options = array(
  'type1' => array('value' => 'type1', 'label' => __( 'Default', 'tcd-w' )),
  'type2' => array('value' => 'type2', 'label' => __( 'Share', 'tcd-w' )),
  'type3' => array('value' => 'type3', 'label' => __( 'Telephone', 'tcd-w' ))
);


// フッターの固定メニューのアイコン
global $footer_bar_icon_options;
$footer_bar_icon_options = array(
  'file-text' => array('value' => 'file-text', 'label' => __( 'Document', 'tcd-w' )),
  'share-alt' => array('value' => 'share-alt', 'label' => __( 'Share', 'tcd-w' )),
  'phone' => array('value' => 'phone', 'label' => __( 'Telephone', 'tcd-w' )),
  'envelope' => array('value' => 'envelope', 'label' => __( 'Envelope', 'tcd-w' )),
  'tag' => array('value' => 'tag', 'label' => __( 'Tag', 'tcd-w' )),
  'pencil' => array('value' => 'pencil', 'label' => __( 'Pencil', 'tcd-w' ))
);


// 記事タイプ
global $post_type_options;
$post_type_options = array(
  'recent_post' => array('value' => 'recent_post','label' => __( 'Recent post', 'tcd-w' )),
  'recommend_post' => array('value' => 'recommend_post','label' => __( 'Recommend post1', 'tcd-w' )),
  'recommend_post2' => array('value' => 'recommend_post2','label' => __( 'Recommend post2', 'tcd-w' ))
);


// 記事の並び順
global $post_type_order_options;
$post_type_order_options = array(
  'date1' => array('value' => 'date1','label' => __( 'Date (DESC)', 'tcd-w' )),
  'date2' => array('value' => 'date2','label' => __( 'Date (ASC)', 'tcd-w' )),
  'rand' => array('value' => 'rand','label' => __( 'Random', 'tcd-w' ))
);


// トップページのスライダーのタイミングの設定
global $slider_time_options;
$slider_time_options = array(
  '5000' => array('value' => '5000','label' => __( '5 second', 'tcd-w' )),
  '6000' => array('value' => '6000','label' => __( '6 second', 'tcd-w' )),
  '7000' => array('value' => '7000','label' => __( '7 second', 'tcd-w' )),
  '8000' => array('value' => '8000','label' => __( '8 second', 'tcd-w' )),
  '9000' => array('value' => '9000','label' => __( '9 second', 'tcd-w' )),
  '10000' => array('value' => '10000','label' => __( '10 second', 'tcd-w' ))
);


// トップページのスライダータイプ
global $index_slider_type_options;
$index_slider_type_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Type1 (You can specify slider image and URL individually.)', 'tcd-w' )),
  'type2' => array('value' => 'type2','label' => __( 'Type2 (Slider will be automatically displayed from choosen post list type.)', 'tcd-w' ))
);


// トップページのスライダーの数
global $index_slider_num_options;
$index_slider_num_options = array(
  '3' => array('value' => '3','label' => '3'),
  '4' => array('value' => '4','label' => '4'),
  '5' => array('value' => '5','label' => '5'),
  '6' => array('value' => '6','label' => '6'),
  '7' => array('value' => '7','label' => '7'),
  '8' => array('value' => '8','label' => '8')
);


// フッターのスライダーの数
global $footer_slider_num_options;
$footer_slider_num_options = array(
  '6' => array('value' => '6','label' => '6'),
  '7' => array('value' => '7','label' => '7'),
  '8' => array('value' => '8','label' => '8'),
  '9' => array('value' => '9','label' => '9'),
  '10' => array('value' => '10','label' => '10'),
  '11' => array('value' => '11','label' => '11'),
  '12' => array('value' => '12','label' => '12')
);


// 固定ページの記事一覧の数
global $page_post_list_num_options;
$page_post_list_num_options = array(
  '4' => array('value' => '4','label' => '4'),
  '8' => array('value' => '8','label' => '8'),
  '12' => array('value' => '12','label' => '12')
);


// ロゴに画像を使うか否か
global $logo_type_options;
$logo_type_options = array(
  'no' => array('value' => 'no', 'label' => __( 'Use text for logo', 'tcd-w' )),
  'yes' => array('value' => 'yes', 'label' => __( 'Use image for logo', 'tcd-w' ))
);

global $pw_align_options;
$pw_align_options = array(
  'type1' => array('value' => 'type1','label' => __( 'Align left', 'tcd-w' ) ),
  'type2' => array('value' => 'type2','label' => __( 'Align center', 'tcd-w' ) )
);

// テーマオプション画面の作成
function theme_options_do_page() {
  global $load_time_options, $load_icon_type, $hover_type_options, $hover2_direct_options, $font_type_options, $responsive_options, $header_fix_options, $sns_type_top_options, $sns_type_btm_options, $footer_bar_display_options, $footer_bar_icon_options, $footer_bar_button_options,
         $post_type_options, $post_type_order_options, $slider_time_options, $index_slider_type_options, $index_slider_num_options, $footer_slider_num_options, $logo_type_options, $header_content_type_options, $page_post_list_num_options, $dp_upload_error, $pw_align_options;
  $options = get_desing_plus_option();

  if ( ! isset( $_REQUEST['settings-updated'] ) )
    $_REQUEST['settings-updated'] = false;

?>

<div class="wrap">

 <?php screen_icon(); echo "<h2>" . __( 'TCD Theme Options', 'tcd-w' ) . "</h2>"; ?>

 <?php // 更新時のメッセージ
       if ( false !== $_REQUEST['settings-updated'] ) :
 ?>
 <div class="updated fade"><p><strong><?php _e('Updated', 'tcd-w');  ?></strong></p></div>
 <?php endif; ?>
 
 <?php /* ファイルアップロード時のメッセージ */ if(!empty($dp_upload_error['message'])): ?>
  <?php if($dp_upload_error['error']): ?>
   <div id="error" class="error"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php else: ?>
   <div id="message" class="updated fade"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php endif; ?>
 <?php endif; ?>

 <div id="my_theme_option" class="cf">

  <div id="my_theme_left">
   <ul id="theme_tab" class="cf">
    <li><a href="#tab-content1"><?php _e('Basic', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content2"><?php _e('Logo', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content3"><?php _e('Index', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content4"><?php _e('Blog', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content5"><?php _e('Page', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content6"><?php _e('Header', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content7"><?php _e('Footer', 'tcd-w');  ?></a></li>
    <li><a href="#tab-content8"><?php _e('Password protected pages', 'tcd-w');  ?></a></li>
   </ul>
  </div>

  <div id="my_theme_right">

  <form method="post" action="options.php" enctype="multipart/form-data">

  <?php settings_fields( 'design_plus_options' ); ?>

  <div id="tab-panel">

  <!-- #tab-content1 基本設定　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content1">

   <?php // サイトカラー ?>
   <div id="color_pattern">
    <div class="theme_option_field cf">
     <h3 class="theme_option_headline"><?php _e('Color setting', 'tcd-w');  ?></h3>
     <h4 class="theme_option_headline2"><?php _e('Primary color setting', 'tcd-w');  ?></h4>
     <input type="text" id="pickedcolor1" class="color" name="dp_options[pickedcolor1]" value="<?php esc_attr_e( $options['pickedcolor1'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('pickedcolor1').color.fromString('EA5D6E')">
     <h4 class="theme_option_headline2"><?php _e('Link text color in the article', 'tcd-w'); ?></h4>
     <input type="text" id="content_link_color" class="color" name="dp_options[content_link_color]" value="<?php echo esc_attr( $options['content_link_color'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w'); ?>" onClick="document.getElementById('content_link_color').color.fromString('EA5D6E')">
     <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
    </div>
   </div>

	<?php // ファビコン ?>
	<div class="theme_option_field cf">
  	<h3 class="theme_option_headline"><?php _e( 'Favicon setup', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Setting for the favicon displayed at browser address bar or tab.', 'tcd-w' ); ?></p>
    <div class="theme_option_input">
     <h4><?php _e( 'Favicon file', 'tcd-w' ); ?><?php _e( ' (Recommend image size. Width:16px, Height:16px)', 'tcd-w' ); ?></h4>
     <p><?php _e( 'You can use .ico, .png or .gif file, and we recommed you to use .ico file.', 'tcd-w' ); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js favicon">
       <input type="hidden" value="<?php echo esc_attr( $options['favicon'] ); ?>" id="favicon" name="dp_options[favicon]" class="cf_media_id">
       <div class="preview_field"><?php if($options['favicon']){ echo wp_get_attachment_image($options['favicon'], 'full'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['favicon']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
    </div>
   </div>

   <?php // フォントの種類 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font type', 'tcd-w');  ?></h3>
    <p><?php _e('Please set the font type of all text except for headline.', 'tcd-w'); ?></p>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $font_type_options as $option ) {
          $font_type_setting = $options['font_type'];
            if ( '' != $font_type_setting ) {
              if ( $options['font_type'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フォントの種類 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font type of headline', 'tcd-w');  ?></h3>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $font_type_options as $option ) {
          $font_type_setting = $options['headline_font_type'];
            if ( '' != $font_type_setting ) {
              if ( $options['headline_font_type'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[headline_font_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  <?php // hover エフェクト ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Hover effect', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Hover effect type', 'tcd-w'); ?></h4>
    <p><?php _e('Please set the hover effect for thumbnail images.', 'tcd-w'); ?></p>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $hover_type_options as $option ) {
          $hover_type_setting = $options['hover_type'];
            if ( '' != $hover_type_setting ) {
              if ( $options['hover_type'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     
     <input style="display:inline; margin: 5px 5px 5px 0;" type="radio" id="tab-<?php echo $option['value']; ?>" name="dp_options[hover_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
     <label style="display:inline;" class="description" for="tab-<?php echo $option['value']; ?>"><?php echo $option['label']; ?></label><br>
     
     <?php } ?>
    <div class="tab-box">
    	<div id="tabView1">
		    <h4 class="theme_option_headline2"><?php _e('Settings for Zoom effect', 'tcd-w'); ?></h4>
		    <p><?php _e('Please set the rate of magnification.', 'tcd-w'); ?></p>
		    <input id="dp_options[hover1_zoom]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover1_zoom]" value="<?php esc_attr_e( $options['hover1_zoom'] ); ?>" />
		    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
	    </div>
    	<div id="tabView2">
		    <h4 class="theme_option_headline2"><?php _e('Settings for Slide effect', 'tcd-w'); ?></h4>
		    <p><?php _e('Please set the direction of slide.', 'tcd-w'); ?></p>
		    <fieldset class="cf select_type2">
		     <?php
		          if ( ! isset( $checked ) )
		          $checked = '';
		          foreach ( $hover2_direct_options as $option ) {
		          $hover2_direct_setting = $options['hover2_direct'];
		            if ( '' != $hover2_direct_setting ) {
		              if ( $options['hover2_direct'] == $option['value'] ) {
		                $checked = "checked=\"checked\"";
		              } else {
		                $checked = '';
		              }
		           }
		     ?>
		     <label class="description" style="display:inline-block;margin-right:15px;">
		      <input type="radio" name="dp_options[hover2_direct]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
		      <?php echo $option['label']; ?>
		     </label>
		     <?php } ?>
		    </fieldset>
		    <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
		    <input id="dp_options[hover2_opacity]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover2_opacity]" value="<?php esc_attr_e( $options['hover2_opacity'] ); ?>" />
		    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
	    </div>
    	<div id="tabView3">
       <h4 class="theme_option_headline2"><?php _e('Settings for Fade effect', 'tcd-w'); ?></h4>
       <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
       <input id="dp_options[hover3_opacity]" class="hankaku" style="width:45px;" type="text" name="dp_options[hover3_opacity]" value="<?php esc_attr_e( $options['hover3_opacity'] ); ?>" />
       <p><?php _e('Please set the background color.', 'tcd-w'); ?></p>
       <input type="text" id="hover3_bgcolor" class="color" name="dp_options[hover3_bgcolor]" value="<?php esc_attr_e( $options['hover3_bgcolor'] ); ?>" />
       <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('hover3_bgcolor').color.fromString('FFFFFF')">
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
	    </div>
    </div>
    </fieldset>
   </div>

   <?php // Use OGP tag ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Facebook OGP setting', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><label><input id="dp_options[use_ogp]" name="dp_options[use_ogp]" type="checkbox" value="1" <?php checked( '1', $options['use_ogp'] ); ?> /> <?php _e('Use OGP', 'tcd-w');  ?></label></p>
     <p><?php _e('Your fb:admins ID', 'tcd-w');  ?> <input id="dp_options[fb_admin_id]" class="regular-text" type="text" name="dp_options[fb_admin_id]" value="<?php esc_attr_e( $options['fb_admin_id'] ); ?>" /></p>
     <p><?php _e('<a href="http://design-plus1.com/tcd-w/2016/07/facebook-3.html" target="_blank">Information about Facebook OGP and fb:admins ID</a>', 'tcd-w'); ?></p>
    </div>
    <h4 class="theme_option_headline2"><?php _e( 'OGP image', 'tcd-w' ); ?></h4>
    <p><?php _e( 'This image is displayed for OGP if the page does not have a thumbnail.', 'tcd-w' ); ?></p>
    <p><?php _e( 'Recommend image size. Width:1200px, Height:630px', 'tcd-w' ); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js">
      <input type="hidden" value="<?php echo esc_attr( $options['ogp_image'] ); ?>" id="ogp_image" name="dp_options[ogp_image]" class="cf_media_id">
      <div class="preview_field"><?php if ( $options['ogp_image'] ) { echo wp_get_attachment_image( $options['ogp_image'], 'medium'); } ?></div>
      <div class="button_area">
       <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['ogp_image'] ) { echo 'hidden'; } ?>">
      </div>
     </div>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // Twitter card ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Twitter Cards setting', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><label><input id="dp_options[use_twitter_card]" name="dp_options[use_twitter_card]" type="checkbox" value="1" <?php checked( '1', $options['use_twitter_card'] ); ?>> <?php _e( 'Use Twitter Cards', 'tcd-w' );  ?></label></p>
     <p><?php _e( 'Your Twitter account name (exclude @ mark)', 'tcd-w' ); ?><input id="dp_options[twitter_account_name]" class="regular-text" type="text" name="dp_options[twitter_account_name]" value="<?php esc_attr_e( $options['twitter_account_name'] ); ?>"></p>
     <p><a href="http://design-plus1.com/tcd-w/2016/11/twitter-cards.html" target="_blank"><?php _e( 'Information about Twitter Cards.', 'tcd-w' ); ?></a></p>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 絵文字の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Emoji setup', 'tcd-w');  ?></h3>
    <p><?php _e('We recommend to checkoff this option if you dont use any Emoji in your post content.', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[use_emoji]" name="dp_options[use_emoji]" type="checkbox" value="1" <?php checked( '1', $options['use_emoji'] ); ?> /> <?php _e('Use emoji', 'tcd-w');  ?></label></li>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ローディング画面の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Loading screen setting', 'tcd-w');  ?></h3>
    <p><label><input id="dp_options[use_load_icon]" name="dp_options[use_load_icon]" type="checkbox" value="1" <?php checked( '1', $options['use_load_icon'] ); ?> /> <?php _e('Use load icon.', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Type of loader', 'tcd-w');  ?></h4>
    <select  id="load_icon_type" name="dp_options[load_icon]">
     <?php
          foreach ( $load_icon_type as $option ) :
            if ( $options['load_icon'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $option['label'] . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Color setting', 'tcd-w');  ?></h4>
    <p>
     <input type="text" id="loader_color1" class="color" name="dp_options[loader_color1]" value="<?php esc_attr_e( $options['loader_color1'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('loader_color1').color.fromString('EA5D6E')">
    </p>
    <p>
     <input type="text" id="loader_color2" class="color" name="dp_options[loader_color2]" value="<?php esc_attr_e( $options['loader_color2'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('loader_color2').color.fromString('C24B59')">
    </p>
    <h4 class="theme_option_headline2"><?php _e('Maximum display time', 'tcd-w');  ?></h4>
    <p><?php _e('Please set the maximum display time of the loading screen.<br />Even if all the content is not loaded, loading screen will disappear automatically after a lapse of time you have set at follwing.', 'tcd-w'); ?></p>
    <select name="dp_options[load_time]">
     <?php
          foreach ( $load_time_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['load_time'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // レスポンシブ設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Responsive design setting', 'tcd-w');  ?></h3>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $responsive_options as $option ) {
          $responsive_setting = $options['responsive'];
            if ( '' != $responsive_setting ) {
              if ( $options['responsive'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[responsive]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // サイドバーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Sidebar', 'tcd-w');  ?></h3>
    <p><?php _e('This theme will display the sidebar to right column, but put the check bellow if you want to display to left.', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[column_float]" name="dp_options[column_float]" type="checkbox" value="1" <?php checked( '1', $options['column_float'] ); ?> /> <?php _e('Display the sidebar to left column', 'tcd-w');  ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // No Imageの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Original alternate image for featured image', 'tcd-w');  ?></h3>
    <p><?php _e('You can register original alternate image for featured image.', 'tcd-w');  ?></p>
    <?php for($i = 1; $i <= 3; $i++) : ?>
    <div class="sub_box cf"> 
     <h3 class="theme_option_subbox_headline"><?php printf(__('Alternate image%s setting', 'tcd-w'),$i);  ?></h3>
     <div class="sub_box_content">
      <?php if($i == 1) { ?>
      <h4 class="theme_option_headline2"><?php _e('Recommend image size. Width:150px Height:150px', 'tcd-w');  ?></h4>
      <p><?php _e('This image is used in footer slider and side widget', 'tcd-w');  ?></p>
      <?php } elseif($i == 2) { ?>
      <h4 class="theme_option_headline2"><?php _e('Recommend image size. Width:380px Height:200px', 'tcd-w');  ?></h4>
      <p><?php _e('This image is used in main post list', 'tcd-w');  ?></p>
      <?php } else { ?>
      <h4 class="theme_option_headline2"><?php _e('Recommend image size. Width:790px Height:417px', 'tcd-w');  ?></h4>
      <p><?php _e('This image is used in header slider and single page featured image.', 'tcd-w');  ?></p>
      <?php }; ?>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js no_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['no_image'.$i] ); ?>" id="no_image<?php echo $i; ?>" name="dp_options[no_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['no_image'.$i]){ echo wp_get_attachment_image($options['no_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['no_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php endfor; ?>
   </div>

   <?php // 404 ページ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Settings for 404 page', 'tcd-w' ); ?></h3>
    <h4 class="theme_option_headline2"><?php _e( 'Header image', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Recommend image size. Width:1150px, Height:650px', 'tcd-w' ); ?></p>
    <div class="image_box cf">
     <div class="cf cf_media_field hide-if-no-js header_image_404">
      <input type="hidden" value="<?php echo esc_attr( $options['header_image_404'] ); ?>" id="header_image_404" name="dp_options[header_image_404]" class="cf_media_id">
      <div class="preview_field"><?php if ( $options['header_image_404'] ) { echo wp_get_attachment_image( $options['header_image_404'], 'medium' ); } ?></div>
      <div class="button_area">
       <input type="button" value="<?php _e( 'Select Image', 'tcd-w' ); ?>" class="cfmf-select-img button">
       <input type="button" value="<?php _e( 'Remove Image', 'tcd-w' ); ?>" class="cfmf-delete-img button <?php if ( ! $options['header_image_404'] ) { echo 'hidden'; } ?>">
      </div>
     </div>
    </div>
    <h4 class="theme_option_headline2"><?php _e( 'Headline', 'tcd-w' ); ?></h4>
    <textarea id="dp_options[header_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_txt_404]"><?php echo esc_textarea( $options['header_txt_404'] ); ?></textarea>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of headline', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404]" value="<?php echo esc_attr( $options['header_txt_size_404'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of headline for mobile device', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_txt_size_404_mobile'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font color of headline', 'tcd-w' ); ?></h4>
    <input type="text" id="header_txt_color_404" class="color" name="dp_options[header_txt_color_404]" value="<?php esc_attr_e( $options['header_txt_color_404'] ); ?>">
    <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w' ); ?>" onClick="document.getElementById('header_txt_color_404').color.fromString('FFFFFF')">
    <h4 class="theme_option_headline2"><?php _e( 'Dropshadow of headline', 'tcd-w' ); ?></h4>
    <p><?php _e( 'Enter "0" if you don\'t want to use dropshadow.', 'tcd-w' ); ?></p>
    <ul class="headline_option">
     <li><label><?php _e( 'Dropshadow position (left)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_h]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_h]" value="<?php echo esc_attr( $options['dropshadow_404_h'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow position (top)', 'tcd-w'); ?></label><input id="dp_options[dropshadow_404_v]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_v]" value="<?php echo esc_attr( $options['dropshadow_404_v'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow size', 'tcd-w' ); ?></label><input id="dp_options[dropshadow_404_b]" class="font_size hankaku" type="text" name="dp_options[dropshadow_404_b]" value="<?php echo esc_attr( $options['dropshadow_404_b'] ); ?>"><span>px</span></li>
     <li><label><?php _e( 'Dropshadow color', 'tcd-w' ); ?></label><input type="text" id="dropshadow_404_c" class="color" name="dp_options[dropshadow_404_c]" value="<?php echo esc_attr( $options['dropshadow_404_c'] ); ?>"><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e( 'Default color', 'tcd-w'); ?>" onClick="document.getElementById('dropshadow_404_c').color.fromString('FFFFFF')"></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e( 'Sub title', 'tcd-w' ); ?></h4>
    <textarea id="dp_options[header_sub_txt_404]" class="large-text" cols="50" rows="2" name="dp_options[header_sub_txt_404]"><?php echo esc_textarea( $options['header_sub_txt_404'] ); ?></textarea>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_sub_txt_size_404]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404]" value="<?php echo esc_attr( $options['header_sub_txt_size_404'] ); ?>"><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e( 'Font size of sub title for mobile device', 'tcd-w' ); ?></h4>
    <p><input id="dp_options[header_sub_txt_size_404_mobile]" class="font_size hankaku" type="text" name="dp_options[header_sub_txt_size_404_mobile]" value="<?php echo esc_attr( $options['header_sub_txt_size_404_mobile'] ); ?>"><span>px</span></p>
    <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>">
   </div>

   <?php // ユーザーCSS用の自由記入欄 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Free input area for user definition CSS.', 'tcd-w');  ?></h3>
    <p><?php _e('Code example:<br /><strong>.example { font-size:12px; }</strong>', 'tcd-w');  ?></p>
    <textarea id="dp_options[css_code]" class="large-text" cols="50" rows="10" name="dp_options[css_code]"><?php echo esc_textarea( $options['css_code'] ); ?></textarea>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content1 -->




  <!-- #tab-content2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content2">

   <?php // ロゴのタイプ ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Logo type', 'tcd-w');  ?></h3>
    <fieldset class="cf select_type2" id="logo_type_select">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $logo_type_options as $option ) {
          $logo_type_setting = $options['use_logo_image'];
            if ( '' != $logo_type_setting ) {
              if ( $options['use_logo_image'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label id="use_logo_image_<?php echo esc_attr_e( $option['value'] ); ?>">
      <input type="radio" name="dp_options[use_logo_image]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダーのロゴ ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo', 'tcd-w');  ?></h3>
    <div class="logo_text_area" style="<?php if( $options['use_logo_image'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w');  ?></h4>
     <input id="dp_options[logo_font_size]" class="font_size hankaku" type="text" name="dp_options[logo_font_size]" value="<?php esc_attr_e( $options['logo_font_size'] ); ?>" /><span>px</span>
     <h4 class="theme_option_headline2"><?php _e('Font size for tagline', 'tcd-w');  ?></h4>
     <input id="dp_options[tagline_font_size]" class="font_size hankaku" type="text" name="dp_options[tagline_font_size]" value="<?php esc_attr_e( $options['tagline_font_size'] ); ?>" /><span>px</span>
     <p><label><input id="dp_options[show_tagline]" name="dp_options[show_tagline]" type="checkbox" value="1" <?php checked( '1', $options['show_tagline'] ); ?> /> <?php _e('Display tagline', 'tcd-w');  ?></label></p>
    </div>
    <div class="logo_image_area" style="<?php if( $options['use_logo_image'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w');  ?></h4>
     <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
     <p><?php _e('Recommend image size. Width:300px Height:120px (maximum height:140px)', 'tcd-w'); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js header_logo_image">
       <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image'] ); ?>" id="header_logo_image" name="dp_options[header_logo_image]" class="cf_media_id">
       <div class="preview_field"><?php if($options['header_logo_image']){ echo wp_get_attachment_image($options['header_logo_image'], 'full'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
     <p><?php _e('If you upload a logo image for retina display, please check the following check boxes','tcd-w'); ?></p>
     <p><label><input id="dp_options[header_logo_retina]" name="dp_options[header_logo_retina]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダーのロゴ（モバイル用） ----------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header logo for mobile device', 'tcd-w');  ?></h3>
    <div class="logo_text_area" style="<?php if( $options['use_logo_image'] != 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Font size for text logo', 'tcd-w');  ?></h4>
     <input id="dp_options[logo_font_size_mobile]" class="font_size hankaku" type="text" name="dp_options[logo_font_size_mobile]" value="<?php esc_attr_e( $options['logo_font_size_mobile'] ); ?>" /><span>px</span>
    </div>
    <div class="logo_image_area" style="<?php if( $options['use_logo_image'] == 'yes' ) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Image for logo', 'tcd-w');  ?></h4>
     <p><?php _e('If the image is not registered, text will be displayed instead.','tcd-w'); ?></p>
     <p><?php _e('Recommend image size. Width:240px Height:40px (maximum height:50px)', 'tcd-w'); ?></p>
     <div class="image_box cf">
      <div class="cf cf_media_field hide-if-no-js header_logo_image_mobile">
       <input type="hidden" value="<?php echo esc_attr( $options['header_logo_image_mobile'] ); ?>" id="header_logo_image_mobile" name="dp_options[header_logo_image_mobile]" class="cf_media_id">
       <div class="preview_field"><?php if($options['header_logo_image_mobile']){ echo wp_get_attachment_image($options['header_logo_image_mobile'], 'full'); }; ?></div>
       <div class="buttton_area">
        <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
        <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['header_logo_image_mobile']){ echo 'hidden'; }; ?>">
       </div>
      </div>
     </div>
     <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
     <p><label><input id="dp_options[header_logo_retina_mobile]" name="dp_options[header_logo_retina_mobile]" type="checkbox" value="1" <?php checked( '1', $options['header_logo_retina_mobile'] ); ?> /> <?php _e('Use retina display logo image', 'tcd-w');  ?></label></p>
    </div>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content2 -->




  <!-- #tab-content3 トップページ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content3">

   <?php // ヘッダースライダーの設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header slider setting', 'tcd-w');  ?></h3>
    <p><label><input id="dp_options[show_index_slider]" name="dp_options[show_index_slider]" type="checkbox" value="1" <?php checked( '1', $options['show_index_slider'] ); ?> /> <?php _e('Display header slider', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Slider type', 'tcd-w');  ?></h4>
    <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           $i = 1;
           foreach ( $index_slider_type_options as $option ) {
           $index_slider_type_setting = $options['index_slider_type'];
            if ( '' != $index_slider_type_setting ) {
              if ( $options['index_slider_type'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
            }
      ?>
      <label id="index_slider_type_button<?php echo $i; ?>" class="description">
       <input type="radio" name="dp_options[index_slider_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php $i++; } ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
    <p class="index_slider_use_retina_checkbox"><label><input id="dp_options[index_slider_use_retina]" name="dp_options[index_slider_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_slider_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <p class="index_slider_retina_image" style="<?php if($options['index_slider_use_retina'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:1640px, Height:1000px', 'tcd-w');  ?>
    </p>
    <p class="index_slider_normal_image" style="<?php if($options['index_slider_use_retina'] != 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:820px, Height:500px', 'tcd-w');  ?>
    </p>
    <div class="index_slider_type2_area" style="<?php if( $options['index_slider_type'] == 'type1') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
     <select name="dp_options[index_slider_post_type]">
      <?php
           foreach ( $post_type_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_slider_post_type'] == $option['value']) {
            $selected = 'selected="selected"';
           } else {
            $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Post order', 'tcd-w');  ?></h4>
     <select name="dp_options[index_slider_post_type_order]">
      <?php
           foreach ( $post_type_order_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_slider_post_type_order'] == $option['value']) {
            $selected = 'selected="selected"';
           } else {
            $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
     <select name="dp_options[index_slider_num]">
      <?php
           foreach ( $index_slider_num_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_slider_num'] == $option['value']) {
             $selected = 'selected="selected"';
           } else {
             $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
    </div><!-- END .index_slider_type1_area -->
    <div class="index_slider_type1_area" style="<?php if( $options['index_slider_type'] == 'type2') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Slider setting', 'tcd-w');  ?></h4>
     <?php for($i = 1; $i <= 5; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php printf(__('Slider%s setting', 'tcd-w'),$i);  ?></h3>
      <div class="sub_box_content">
       <?php // 画像 ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Slider image', 'tcd-w');  ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js index_slider_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['index_slider_image'.$i] ); ?>" id="index_slider_image<?php echo $i; ?>" name="dp_options[index_slider_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['index_slider_image'.$i]){ echo wp_get_attachment_image($options['index_slider_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_slider_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <?php // リンク ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Link URL', 'tcd-w');  ?></h4>
       <p><?php _e('Leave this field blank if you don\'t want to use link at image.', 'tcd-w');  ?></p>
       <input id="dp_options[index_slider_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_slider_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_slider_url'.$i] ); ?>" />
       <p><label><input id="dp_options[index_slider_target<?php echo $i; ?>]" name="dp_options[index_slider_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['index_slider_target'.$i] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
       <?php // タイトル ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
       <textarea id="dp_options[index_slider_catch<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[index_slider_catch<?php echo $i; ?>]"><?php echo esc_textarea( $options['index_slider_catch'.$i] ); ?></textarea>
       <?php // ボタンのラベル ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Button label', 'tcd-w');  ?></h4>
       <input id="dp_options[index_slider_button_label<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_slider_button_label<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_slider_button_label'.$i] ); ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
     <?php endfor; ?>
     <?php // ボタンの色の設定 ---------- ?>
     <h4 class="theme_option_headline2"><?php _e('Link button color setting', 'tcd-w');  ?></h4>
     <ul class="headline_option">
      <li><label><?php _e('Font color', 'tcd-w');  ?></label><input type="text" id="index_slider_button_color" class="color" name="dp_options[index_slider_button_color]" value="<?php esc_attr_e( $options['index_slider_button_color'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_slider_button_color').color.fromString('FFFFFF')"></li>
      <li><label><?php _e('Background color', 'tcd-w');  ?></label><input type="text" id="index_slider_button_bg_color" class="color" name="dp_options[index_slider_button_bg_color]" value="<?php esc_attr_e( $options['index_slider_button_bg_color'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_slider_button_bg_color').color.fromString('333333')"></li>
      <li><label><?php _e('Font hover color', 'tcd-w');  ?></label><input type="text" id="index_slider_button_color_hover" class="color" name="dp_options[index_slider_button_color_hover]" value="<?php esc_attr_e( $options['index_slider_button_color_hover'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_slider_button_color_hover').color.fromString('333333')"></li>
      <li><label><?php _e('Background hover color', 'tcd-w');  ?></label><input type="text" id="index_slider_button_bg_color_hover" class="color" name="dp_options[index_slider_button_bg_color_hover]" value="<?php esc_attr_e( $options['index_slider_button_bg_color_hover'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_slider_button_bg_color_hover').color.fromString('FFFFFF')"></li>
      <li><label><?php _e('Background transparency', 'tcd-w');  ?></label><input type="text" id="index_slider_button_bg_opacity" class="hankaku" name="dp_options[index_slider_button_bg_opacity]" value="<?php esc_attr_e( $options['index_slider_button_bg_opacity'] ); ?>" /></li>
     </ul>
     <p><?php _e('Please set the transparency value in the range of 0 (fully transparent) to 1.0 (completely opaque).<br />Default value is 1.0', 'tcd-w'); ?></p>
    </div><!-- END .index_slider_type1_area -->
    <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
    <p><input id="dp_options[index_slider_font_size]" class="font_size hankaku" type="text" name="dp_options[index_slider_font_size]" value="<?php esc_attr_e( $options['index_slider_font_size'] ); ?>" /><span>px</span></p>
    <?php // スピードの設定 ---------- ?>
    <h4 class="theme_option_headline2"><?php _e('Slider speed setting', 'tcd-w');  ?></h4>
    <select name="dp_options[slider_time]">
     <?php
          foreach ( $slider_time_options as $option ) :
            $label = $option['label'];
            $selected = '';
            if ( $options['slider_time'] == $option['value']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // ヘッダースライダーのバナー設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Banner content setting', 'tcd-w');  ?></h3>
    <p><?php _e('Banner content will be display on the right side of header slider.', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[show_index_banner_content]" name="dp_options[show_index_banner_content]" type="checkbox" value="1" <?php checked( '1', $options['show_index_banner_content'] ); ?> /> <?php _e('Display banner content', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Type of banner', 'tcd-w');  ?></h4>
    <fieldset class="cf select_type2">
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           $i = 1;
           foreach ( $index_slider_type_options as $option ) {
           $index_slider_type_setting = $options['index_banner_content_type'];
            if ( '' != $index_slider_type_setting ) {
              if ( $options['index_banner_content_type'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
            }
      ?>
      <label id="index_banner_content_type_button<?php echo $i; ?>" class="description">
       <input type="radio" name="dp_options[index_banner_content_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
      <?php $i++; } ?>
    </fieldset>
    <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
    <p class="index_banner_content_use_retina_checkbox"><label><input id="dp_options[index_banner_content_use_retina]" name="dp_options[index_banner_content_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_banner_content_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <p class="index_banner_content_retina_image" style="<?php if($options['index_banner_content_use_retina'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:760px, Height:500px', 'tcd-w');  ?>
    </p>
    <p class="index_banner_content_normal_image" style="<?php if($options['index_banner_content_use_retina'] != 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:380px, Height:250px', 'tcd-w');  ?>
    </p>
    <div class="index_banner_content_type2_area" style="<?php if( $options['index_banner_content_type'] == 'type1') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
     <select name="dp_options[index_banner_content_post_type]">
      <?php
           foreach ( $post_type_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_banner_content_post_type'] == $option['value']) {
            $selected = 'selected="selected"';
           } else {
            $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
     <h4 class="theme_option_headline2"><?php _e('Post order', 'tcd-w');  ?></h4>
     <select name="dp_options[index_banner_content_post_type_order]">
      <?php
           foreach ( $post_type_order_options as $option ) :
           $label = $option['label'];
           $selected = '';
           if ( $options['index_banner_content_post_type_order'] == $option['value']) {
            $selected = 'selected="selected"';
           } else {
            $selected = '';
           }
           echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
           endforeach;
      ?>
     </select>
    </div><!-- END .index_banner_content_type1_area -->
    <div class="index_banner_content_type1_area" style="<?php if( $options['index_banner_content_type'] == 'type2') { echo 'display:none;'; } else { echo 'display:block;'; }; ?>">
     <h4 class="theme_option_headline2"><?php _e('Banner content setting', 'tcd-w');  ?></h4>
     <?php for($i = 1; $i <= 2; $i++) : ?>
     <div class="sub_box cf"> 
      <h3 class="theme_option_subbox_headline"><?php printf(__('Banner%s setting', 'tcd-w'),$i);  ?></h3>
      <div class="sub_box_content">
       <?php // 画像 ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Banner image', 'tcd-w');  ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js index_banner_content_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['index_banner_content_image'.$i] ); ?>" id="index_banner_content_image<?php echo $i; ?>" name="dp_options[index_banner_content_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['index_banner_content_image'.$i]){ echo wp_get_attachment_image($options['index_banner_content_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_banner_content_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
       <?php // リンク ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Link URL', 'tcd-w');  ?></h4>
       <p><?php _e('Leave this field blank if you don\'t want to use link at image.', 'tcd-w');  ?></p>
       <input id="dp_options[index_banner_content_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_banner_content_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_banner_content_url'.$i] ); ?>" />
       <p><label><input id="dp_options[index_banner_content_target<?php echo $i; ?>]" name="dp_options[index_banner_content_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['index_banner_content_target'.$i] ); ?> /> <?php _e('Open link in new window', 'tcd-w');  ?></label></p>
       <?php // タイトル ---------- ?>
       <h4 class="theme_option_headline2"><?php _e('Catchphrase', 'tcd-w');  ?></h4>
       <textarea id="dp_options[index_banner_content_catch<?php echo $i; ?>]" class="large-text" cols="50" rows="2" name="dp_options[index_banner_content_catch<?php echo $i; ?>]"><?php echo esc_textarea( $options['index_banner_content_catch'.$i] ); ?></textarea>
      </div><!-- END .sub_box_content -->
     </div><!-- END .sub_box -->
    <?php endfor; ?>
    </div><!-- END .index_banner_content_type1_area -->
    <?php // ボタンの色の設定 ---------- ?>
    <h4 class="theme_option_headline2"><?php _e('Link button color setting', 'tcd-w');  ?></h4>
    <ul class="headline_option">
     <li><label><?php _e('Font color', 'tcd-w');  ?></label><input type="text" id="index_banner_content_color" class="color" name="dp_options[index_banner_content_color]" value="<?php esc_attr_e( $options['index_banner_content_color'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_banner_content_color').color.fromString('FFFFFF')"></li>
     <li><label><?php _e('Background color', 'tcd-w');  ?></label><input type="text" id="index_banner_content_bg_color" class="color" name="dp_options[index_banner_content_bg_color]" value="<?php esc_attr_e( $options['index_banner_content_bg_color'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_banner_content_bg_color').color.fromString('333333')"></li>
     <li><label><?php _e('Font hover color', 'tcd-w');  ?></label><input type="text" id="index_banner_content_color_hover" class="color" name="dp_options[index_banner_content_color_hover]" value="<?php esc_attr_e( $options['index_banner_content_color_hover'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_banner_content_color_hover').color.fromString('333333')"></li>
     <li><label><?php _e('Background hover color', 'tcd-w');  ?></label><input type="text" id="index_banner_content_bg_color_hover" class="color" name="dp_options[index_banner_content_bg_color_hover]" value="<?php esc_attr_e( $options['index_banner_content_bg_color_hover'] ); ?>" /><input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('index_banner_content_bg_color_hover').color.fromString('FFFFFF')"></li>
     <li><label><?php _e('Background transparency', 'tcd-w');  ?></label><input type="text" id="index_banner_content_bg_opacity" class="hankaku" name="dp_options[index_banner_content_bg_opacity]" value="<?php esc_attr_e( $options['index_banner_content_bg_opacity'] ); ?>" /></li>
    </ul>
    <p><?php _e('Please set the transparency value in the range of 0 (fully transparent) to 1.0 (completely opaque).<br />Default value is 1.0', 'tcd-w'); ?></p>
    <h4 class="theme_option_headline2"><?php _e('Font size of catchphrase', 'tcd-w');  ?></h4>
    <p><input id="dp_options[index_banner_font_size]" class="font_size hankaku" type="text" name="dp_options[index_banner_font_size]" value="<?php esc_attr_e( $options['index_banner_font_size'] ); ?>" /><span>px</span></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // おすすめ記事の設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Featured post list setting', 'tcd-w');  ?></h3>
    <p><label><input id="dp_options[show_index_featured_post]" name="dp_options[show_index_featured_post]" type="checkbox" value="1" <?php checked( '1', $options['show_index_featured_post'] ); ?> /> <?php _e('Display featred post list', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
    <input id="dp_options[index_featured_post_headline]" class="regular-text" type="text" name="dp_options[index_featured_post_headline]" value="<?php esc_attr_e( $options['index_featured_post_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
    <p><input id="dp_options[index_featured_post_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_featured_post_headline_font_size]" value="<?php esc_attr_e( $options['index_featured_post_headline_font_size'] ); ?>" /><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
    <select name="dp_options[index_featured_post_type]">
     <?php
          foreach ( $post_type_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['index_featured_post_type'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right:10px; ';
          if($option['value'] == 'recent_post'){ echo 'display:none;'; };
          echo '" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[index_featured_post_show_category]" name="dp_options[index_featured_post_show_category]" type="checkbox" value="1" <?php checked( '1', $options['index_featured_post_show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[index_featured_post_show_excerpt]" name="dp_options[index_featured_post_show_excerpt]" type="checkbox" value="1" <?php checked( '1', $options['index_featured_post_show_excerpt'] ); ?> /> <?php _e('Display excerpt', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[index_featured_post_show_date]" name="dp_options[index_featured_post_show_date]" type="checkbox" value="1" <?php checked( '1', $options['index_featured_post_show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
    <p><?php _e('Please upload large image before you use this option.<br />Recommend image size. Width:760px, Height:400px', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[index_featured_post_use_retina]" name="dp_options[index_featured_post_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_featured_post_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // Blog一覧の設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Blog list setting', 'tcd-w');  ?></h3>
    <p><label><input id="dp_options[show_index_blog_list]" name="dp_options[show_index_blog_list]" type="checkbox" value="1" <?php checked( '1', $options['show_index_blog_list'] ); ?> /> <?php _e('Display blog list', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
    <input id="dp_options[index_blog_headline]" class="regular-text" type="text" name="dp_options[index_blog_headline]" value="<?php esc_attr_e( $options['index_blog_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
    <p><input id="dp_options[index_blog_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[index_blog_headline_font_size]" value="<?php esc_attr_e( $options['index_blog_headline_font_size'] ); ?>" /><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[index_blog_show_category]" name="dp_options[index_blog_show_category]" type="checkbox" value="1" <?php checked( '1', $options['index_blog_show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[index_blog_show_excerpt]" name="dp_options[index_blog_show_excerpt]" type="checkbox" value="1" <?php checked( '1', $options['index_blog_show_excerpt'] ); ?> /> <?php _e('Display excerpt', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[index_blog_show_date]" name="dp_options[index_blog_show_date]" type="checkbox" value="1" <?php checked( '1', $options['index_blog_show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
    <p><?php _e('Please upload large image before you use this option.<br />Recommend image size. Width:760px, Height:400px', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[index_blog_use_retina]" name="dp_options[index_blog_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['index_blog_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Banner setting', 'tcd-w');  ?></h4>
    <?php for($i = 1; $i <= 2; $i++) : ?>
    <div class="sub_box cf"> 
     <h3 class="theme_option_subbox_headline"><?php _e('Banner', 'tcd-w'); echo $i; ?></h3>
     <div class="sub_box_content">
      <?php if($i == 1) { ?>
      <p><?php _e('This banner will be displayed after second post.', 'tcd-w');  ?></p>
      <?php } else { ?>
      <p><?php _e('This banner will be displayed after seventh post.', 'tcd-w');  ?></p>
      <?php }; ?>
      <p><label><input id="dp_options[index_blog_ad_no_border<?php echo $i; ?>]" name="dp_options[index_blog_ad_no_border<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['index_blog_ad_no_border'.$i] ); ?> /> <?php _e('Don\'t display border and space around banner.', 'tcd-w');  ?></label></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[index_blog_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[index_blog_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['index_blog_ad_code'.$i] ); ?></textarea>
      </div>
      <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:728px Height:90px', 'tcd-w'); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js index_blog_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['index_blog_ad_image'.$i] ); ?>" id="index_blog_ad_image<?php echo $i; ?>" name="dp_options[index_blog_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['index_blog_ad_image'.$i]){ echo wp_get_attachment_image($options['index_blog_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['index_blog_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
      </div>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[index_blog_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[index_blog_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['index_blog_ad_url'.$i] ); ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php endfor; ?>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content3 -->




  <!-- #tab-content4 ブログコンテンツ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content4">

   <?php // アーカイブページの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Archive page setting', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[archive_blog_show_excerpt]" name="dp_options[archive_blog_show_excerpt]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_show_excerpt'] ); ?> /> <?php _e('Display excerpt', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[archive_blog_show_date]" name="dp_options[archive_blog_show_date]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[archive_blog_show_category]" name="dp_options[archive_blog_show_category]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Option for Retina display', 'tcd-w');  ?></h4>
    <p class="archive_blog_retina_image" style="<?php if($options['archive_blog_use_retina'] == 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:760px, Height:500px', 'tcd-w');  ?>
    </p>
    <p class="archive_blog_normal_image" style="<?php if($options['archive_blog_use_retina'] != 1) { echo 'display:block;'; } else { echo 'display:none;'; }; ?>">
     <?php _e('Recommend image size. Width:380px, Height:250px', 'tcd-w');  ?>
    </p>
    <p><label><input class="archive_blog_use_retina_checkbox" id="dp_options[archive_blog_use_retina]" name="dp_options[archive_blog_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Banner setting', 'tcd-w');  ?></h4>
    <?php for($i = 1; $i <= 2; $i++) : ?>
    <div class="sub_box cf"> 
     <h3 class="theme_option_subbox_headline"><?php _e('Banner', 'tcd-w'); echo $i; ?></h3>
     <div class="sub_box_content">
      <?php if($i == 1) { ?>
      <p><?php _e('This banner will be displayed after 5th post.', 'tcd-w');  ?></p>
      <?php } else { ?>
      <p><?php _e('This banner will be displayed after 9th post.', 'tcd-w');  ?></p>
      <?php }; ?>
      <p><label><input id="dp_options[archive_blog_ad_no_border<?php echo $i; ?>]" name="dp_options[archive_blog_ad_no_border<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( '1', $options['archive_blog_ad_no_border'.$i] ); ?> /> <?php _e('Don\'t display border and space around banner.', 'tcd-w');  ?></label></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[archive_blog_ad_code<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[archive_blog_ad_code<?php echo $i; ?>]"><?php echo esc_textarea( $options['archive_blog_ad_code'.$i] ); ?></textarea>
      </div>
      <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:728px Height:90px', 'tcd-w'); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js archive_blog_ad_image<?php echo $i; ?>">
         <input type="hidden" value="<?php echo esc_attr( $options['archive_blog_ad_image'.$i] ); ?>" id="archive_blog_ad_image<?php echo $i; ?>" name="dp_options[archive_blog_ad_image<?php echo $i; ?>]" class="cf_media_id">
         <div class="preview_field"><?php if($options['archive_blog_ad_image'.$i]){ echo wp_get_attachment_image($options['archive_blog_ad_image'.$i], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['archive_blog_ad_image'.$i]){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
      </div>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[archive_blog_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[archive_blog_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['archive_blog_ad_url'.$i] ); ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <?php endfor; ?>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 記事ページの設定 -------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Post page setting', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Font size of post title', 'tcd-w');  ?></h4>
    <input id="dp_options[title_font_size]" class="font_size hankaku" type="text" name="dp_options[title_font_size]" value="<?php esc_attr_e( $options['title_font_size'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Font size of post contents', 'tcd-w');  ?></h4>
    <input id="dp_options[content_font_size]" class="font_size hankaku" type="text" name="dp_options[content_font_size]" value="<?php esc_attr_e( $options['content_font_size'] ); ?>" /><span>px</span>
    <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[show_date]" name="dp_options[show_date]" type="checkbox" value="1" <?php checked( '1', $options['show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_category]" name="dp_options[show_category]" type="checkbox" value="1" <?php checked( '1', $options['show_category'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_tag]" name="dp_options[show_tag]" type="checkbox" value="1" <?php checked( '1', $options['show_tag'] ); ?> /> <?php _e('Display tags', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_author]" name="dp_options[show_author]" type="checkbox" value="1" <?php checked( '1', $options['show_author'] ); ?> /> <?php _e('Display author', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_thumbnail]" name="dp_options[show_thumbnail]" type="checkbox" value="1" <?php checked( '1', $options['show_thumbnail'] ); ?> /> <?php _e('Display thumbnail', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_next_post]" name="dp_options[show_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_next_post'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_related_post]" name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( '1', $options['show_related_post'] ); ?> /> <?php _e('Display related post', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_comment]" name="dp_options[show_comment]" type="checkbox" value="1" <?php checked( '1', $options['show_comment'] ); ?> /> <?php _e('Display comment', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_trackback]" name="dp_options[show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['show_trackback'] ); ?> /> <?php _e('Display trackbacks', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Option for related post list', 'tcd-w');  ?></h4>
    <p><?php _e('Please upload large image before you use this option.<br />Recommend image size. Width:720px, Height:450px', 'tcd-w');  ?></p>
    <p><label><input id="dp_options[related_use_retina]" name="dp_options[related_use_retina]" type="checkbox" value="1" <?php checked( '1', $options['related_use_retina'] ); ?> /> <?php _e('Display large image for Retina display', 'tcd-w');  ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // NEWソーシャルボタン  ------------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Social button Setup', 'tcd-w');  ?></h3>
    <p><?php _e('Settings for social buttons displayed at post page', 'tcd-w');  ?></p>
    <h4 class="theme_option_headline2"><?php _e('Set of articles top buttons', 'tcd-w');  ?></h4>
    <label><input id="dp_options[show_sns_top]" name="dp_options[show_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['show_sns_top'] ); ?> /> <?php _e('Buttons to the article top', 'tcd-w');  ?></label>
    <h4 class="theme_option_headline2"><?php _e('Type of button on article top', 'tcd-w');  ?></h4>
    <ul class="cf">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $sns_type_top_options as $option ) {
            $sns_type_top_setting = $options['sns_type_top'];
            if ( '' != $sns_type_top_setting ) {
              if ( $options['sns_type_top'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
              $checked = '';
            }
          }
     ?>
     <li>
      <label>
       <input type="radio" name="dp_options[sns_type_top]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php _e($option['label'], 'tcd-w'); ?>
      </label>
     </li>
     <?php } ?>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Select the social button to show on article top', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[show_twitter_top]" name="dp_options[show_twitter_top]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_top'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_fblike_top]" name="dp_options[show_fblike_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_top'] ); ?> /> <?php _e('Display facebook like button -Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_fbshare_top]" name="dp_options[show_fbshare_top]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_top'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_google_top]" name="dp_options[show_google_top]" type="checkbox" value="1" <?php checked( '1', $options['show_google_top'] ); ?> /> <?php _e('Display google+ button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_hatena_top]" name="dp_options[show_hatena_top]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_top'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_pocket_top]" name="dp_options[show_pocket_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_top'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_feedly_top]" name="dp_options[show_feedly_top]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_top'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_rss_top]" name="dp_options[show_rss_top]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_top'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_pinterest_top]" name="dp_options[show_pinterest_top]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_top'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
    </ul>
    <hr />
    <h4 class="theme_option_headline2"><?php _e('Set of articles bottom buttons', 'tcd-w');  ?></h4>
    <label><input id="dp_options[show_sns_btm]" name="dp_options[show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_sns_btm'] ); ?> /> <?php _e('Buttons to the article bottom', 'tcd-w');  ?></label>
    <h4 class="theme_option_headline2"><?php _e('Type of button on article bottom', 'tcd-w');  ?></h4>
    <ul class="cf">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $sns_type_btm_options as $option ) {
            $sns_type_btm_setting = $options['sns_type_btm'];
            if ( '' != $sns_type_btm_setting ) {
              if ( $options['sns_type_btm'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
            }
     ?>
     <li>
      <label>
       <input type="radio" name="dp_options[sns_type_btm]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php _e($option['label'], 'tcd-w'); ?>
      </label>
     </li>
     <?php } ?>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Select the social button to show on article bottom', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[show_twitter_btm]" name="dp_options[show_twitter_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_twitter_btm'] ); ?> /> <?php _e('Display twitter button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_fblike_btm]" name="dp_options[show_fblike_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fblike_btm'] ); ?> /> <?php _e('Display facebook like button-Button type 5 (Default button) only', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_fbshare_btm]" name="dp_options[show_fbshare_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_fbshare_btm'] ); ?> /> <?php _e('Display facebook share button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_google_btm]" name="dp_options[show_google_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_google_btm'] ); ?> /> <?php _e('Display google+ button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_hatena_btm]" name="dp_options[show_hatena_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_hatena_btm'] ); ?> /> <?php _e('Display hatena button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_pocket_btm]" name="dp_options[show_pocket_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pocket_btm'] ); ?> /> <?php _e('Display pocket button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_feedly_btm]" name="dp_options[show_feedly_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_feedly_btm'] ); ?> /> <?php _e('Display feedly button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_rss_btm]" name="dp_options[show_rss_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_rss_btm'] ); ?> /> <?php _e('Display rss button', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[show_pinterest_btm]" name="dp_options[show_pinterest_btm]" type="checkbox" value="1" <?php checked( '1', $options['show_pinterest_btm'] ); ?> /> <?php _e('Display pinterest button', 'tcd-w');  ?></label></li>
    </ul>
    <h4 class="theme_option_headline2"><?php _e('Setting for the twitter button', 'tcd-w');  ?></h4>
    <label style="margin-top:20px;"><?php _e('Set of twitter account. (ex.designplus)', 'tcd-w');  ?></label>
    <input style="display:block; margin:.6em 0 1em;" id="dp_options[twitter_info]" class="regular-text" type="text" name="dp_options[twitter_info]" value="<?php esc_attr_e( $options['twitter_info'] ); ?>" />
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  <?php // 広告の登録1 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>1</h3>
   <p><?php _e('This banner will be displayed next to the title of the page.', 'tcd-w');  ?></p>
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code1]"><?php echo esc_textarea( $options['single_ad_code1'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image1">
        <input type="hidden" value="<?php echo esc_attr( $options['single_ad_image1'] ); ?>" id="single_ad_image" name="dp_options[single_ad_image1]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_ad_image1']){ echo wp_get_attachment_image($options['single_ad_image1'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_ad_image1']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_ad_url1]" class="regular-text" type="text" name="dp_options[single_ad_url1]" value="<?php esc_attr_e( $options['single_ad_url1'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code2]"><?php echo esc_textarea( $options['single_ad_code2'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image2">
        <input type="hidden" value="<?php echo esc_attr( $options['single_ad_image2'] ); ?>" id="single_ad_image2" name="dp_options[single_ad_image2]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_ad_image2']){ echo wp_get_attachment_image($options['single_ad_image2'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_ad_image2']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_ad_url2]" class="regular-text" type="text" name="dp_options[single_ad_url2]" value="<?php esc_attr_e( $options['single_ad_url2'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // 広告の登録2 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>2</h3>
   <p><?php _e('This banner will be displayed under contents.', 'tcd-w');  ?></p>
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Ads with border', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <p><label><input id="dp_options[single_ad_no_border5]" name="dp_options[single_ad_no_border5]" type="checkbox" value="1" <?php checked( '1', $options['single_ad_no_border5'] ); ?> /> <?php _e('Don\'t display border and space around banner.', 'tcd-w');  ?></label></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_ad_code5]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code5]"><?php echo esc_textarea( $options['single_ad_code5'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image5">
        <input type="hidden" value="<?php echo esc_attr( $options['single_ad_image5'] ); ?>" id="single_ad_image5" name="dp_options[single_ad_image5]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_ad_image5']){ echo wp_get_attachment_image($options['single_ad_image5'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_ad_image5']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_ad_url5]" class="regular-text" type="text" name="dp_options[single_ad_url5]" value="<?php esc_attr_e( $options['single_ad_url5'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // 広告の登録3 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Single page banner setup', 'tcd-w');  ?>3</h3>
   <p><?php _e('Please copy and paste the short code inside the content to show this banner.', 'tcd-w');  ?></p>
   <p><?php _e('Short code', 'tcd-w');  ?> : <input type="text" readonly="readonly" value="[s_ad]" /></p>
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_ad_code3]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code3]"><?php echo esc_textarea( $options['single_ad_code3'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image3">
        <input type="hidden" value="<?php echo esc_attr( $options['single_ad_image3'] ); ?>" id="single_ad_image3" name="dp_options[single_ad_image3]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_ad_image3']){ echo wp_get_attachment_image($options['single_ad_image3'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_ad_image3']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_ad_url3]" class="regular-text" type="text" name="dp_options[single_ad_url3]" value="<?php esc_attr_e( $options['single_ad_url3'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_ad_code4]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code4]"><?php echo esc_textarea( $options['single_ad_code4'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_ad_image4">
        <input type="hidden" value="<?php echo esc_attr( $options['single_ad_image4'] ); ?>" id="single_ad_image4" name="dp_options[single_ad_image4]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_ad_image4']){ echo wp_get_attachment_image($options['single_ad_image4'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_ad_image4']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_ad_url4]" class="regular-text" type="text" name="dp_options[single_ad_url4]" value="<?php esc_attr_e( $options['single_ad_url4'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  <?php // スマホ専用広告の登録 -------------------------------------------------------------------------------------------- ?>
  <div class="theme_option_field cf">
   <h3 class="theme_option_headline"><?php _e('Mobile device banner setup', 'tcd-w');  ?></h3>
   <p><?php _e('This banner will be displayed on mobile device.', 'tcd-w');  ?></p>
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Top banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_mobile_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code1]"><?php echo esc_textarea( $options['single_mobile_ad_code1'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image1">
        <input type="hidden" value="<?php echo esc_attr( $options['single_mobile_ad_image1'] ); ?>" id="single_mobile_ad_image" name="dp_options[single_mobile_ad_image1]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_mobile_ad_image1']){ echo wp_get_attachment_image($options['single_mobile_ad_image1'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_mobile_ad_image1']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_mobile_ad_url1]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url1]" value="<?php esc_attr_e( $options['single_mobile_ad_url1'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
   <div class="sub_box cf"> 
    <h3 class="theme_option_subbox_headline"><?php _e('Bottom banner', 'tcd-w');  ?></h3>
    <div class="sub_box_content">
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <textarea id="dp_options[single_mobile_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[single_mobile_ad_code2]"><?php echo esc_textarea( $options['single_mobile_ad_code2'] ); ?></textarea>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); ?></h4>
      <div class="image_box cf">
       <div class="cf cf_media_field hide-if-no-js single_mobile_ad_image2">
        <input type="hidden" value="<?php echo esc_attr( $options['single_mobile_ad_image2'] ); ?>" id="single_mobile_ad_image2" name="dp_options[single_mobile_ad_image2]" class="cf_media_id">
        <div class="preview_field"><?php if($options['single_mobile_ad_image2']){ echo wp_get_attachment_image($options['single_mobile_ad_image2'], 'medium'); }; ?></div>
        <div class="buttton_area">
         <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
         <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['single_mobile_ad_image2']){ echo 'hidden'; }; ?>">
        </div>
       </div>
      </div>
     </div>
     <div class="theme_option_content">
      <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <input id="dp_options[single_mobile_ad_url2]" class="regular-text" type="text" name="dp_options[single_mobile_ad_url2]" value="<?php esc_attr_e( $options['single_mobile_ad_url2'] ); ?>" />
      <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
     </div>
    </div><!-- END .sub_box_content -->
   </div><!-- END .sub_box -->
  </div><!-- END .theme_option_field -->

  </div><!-- END #tab-content4 -->




  <!-- #tab-content5 固定ページ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content5">

   <?php // 基本設定 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Basic setting', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Page title', 'tcd-w');  ?></h4>
    <p><?php _e('Font size', 'tcd-w');  ?> <input id="dp_options[page_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[page_headline_font_size]" value="<?php esc_attr_e( $options['page_headline_font_size'] ); ?>" /><span>px</span></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 広告の登録 -------------------------------------------------------------------------------------------- ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Banner setup', 'tcd-w');  ?></h3>
    <p><?php _e('If you want to display this banner, please check the checkbox on the edit page.', 'tcd-w');  ?></p>
    <div class="sub_box cf"> 
     <h3 class="theme_option_subbox_headline"><?php _e('Left banner', 'tcd-w');  ?></h3>
     <div class="sub_box_content">
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[page_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[page_ad_code1]"><?php echo esc_textarea( $options['page_ad_code1'] ); ?></textarea>
      </div>
      <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js page_ad_image1">
         <input type="hidden" value="<?php echo esc_attr( $options['page_ad_image1'] ); ?>" id="page_ad_image1" name="dp_options[page_ad_image1]" class="cf_media_id">
         <div class="preview_field"><?php if($options['page_ad_image1']){ echo wp_get_attachment_image($options['page_ad_image1'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['page_ad_image1']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
      </div>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[page_ad_url1]" class="regular-text" type="text" name="dp_options[page_ad_url1]" value="<?php esc_attr_e( $options['page_ad_url1'] ); ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
    <div class="sub_box cf"> 
     <h3 class="theme_option_subbox_headline"><?php _e('Right banner', 'tcd-w');  ?></h3>
     <div class="sub_box_content">
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Banner code', 'tcd-w');  ?></h4>
       <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
       <textarea id="dp_options[page_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[page_ad_code2]"><?php echo esc_textarea( $options['page_ad_code2'] ); ?></textarea>
      </div>
      <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register banner image.', 'tcd-w'); _e('Recommend image size. Width:300px Height:250px', 'tcd-w'); ?></h4>
       <div class="image_box cf">
        <div class="cf cf_media_field hide-if-no-js page_ad_image2">
         <input type="hidden" value="<?php echo esc_attr( $options['page_ad_image2'] ); ?>" id="page_ad_image2" name="dp_options[page_ad_image2]" class="cf_media_id">
         <div class="preview_field"><?php if($options['page_ad_image2']){ echo wp_get_attachment_image($options['page_ad_image2'], 'medium'); }; ?></div>
         <div class="buttton_area">
          <input type="button" value="<?php _e('Select Image', 'tcd-w'); ?>" class="cfmf-select-img button">
          <input type="button" value="<?php _e('Remove Image', 'tcd-w'); ?>" class="cfmf-delete-img button <?php if(!$options['page_ad_image2']){ echo 'hidden'; }; ?>">
         </div>
        </div>
       </div>
      </div>
      <div class="theme_option_content">
       <h4 class="theme_option_headline2"><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
       <input id="dp_options[page_ad_url2]" class="regular-text" type="text" name="dp_options[page_ad_url2]" value="<?php esc_attr_e( $options['page_ad_url2'] ); ?>" />
       <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
      </div>
     </div><!-- END .sub_box_content -->
    </div><!-- END .sub_box -->
   </div><!-- END .theme_option_field -->

   <?php // 記事一覧の設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Post list setting', 'tcd-w');  ?></h3>
    <p><?php _e('If you want to display this post list, please check the checkbox on the edit page.', 'tcd-w');  ?></p>
    <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
    <input id="dp_options[page_post_list_headline]" class="regular-text" type="text" name="dp_options[page_post_list_headline]" value="<?php esc_attr_e( $options['page_post_list_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Font size of headline', 'tcd-w');  ?></h4>
    <p><input id="dp_options[page_post_list_headline_font_size]" class="font_size hankaku" type="text" name="dp_options[page_post_list_headline_font_size]" value="<?php esc_attr_e( $options['page_post_list_headline_font_size'] ); ?>" /><span>px</span></p>
    <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
    <select name="dp_options[page_post_list_type]">
     <?php
          foreach ( $post_type_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['page_post_list_type'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right:10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Post order', 'tcd-w');  ?></h4>
    <select name="dp_options[page_post_list_order]">
     <?php
          foreach ( $post_type_order_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['page_post_list_order'] == $option['value']) {
           $selected = 'selected="selected"';
          } else {
           $selected = '';
          }
          echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
    <select name="dp_options[page_post_list_num]">
     <?php
          foreach ( $page_post_list_num_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['page_post_list_num'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
    <ul>
     <li><label><input id="dp_options[page_post_list_show_cat]" name="dp_options[page_post_list_show_cat]" type="checkbox" value="1" <?php checked( '1', $options['page_post_list_show_cat'] ); ?> /> <?php _e('Display category', 'tcd-w');  ?></label></li>
     <li><label><input id="dp_options[page_post_list_show_date]" name="dp_options[page_post_list_show_date]" type="checkbox" value="1" <?php checked( '1', $options['page_post_list_show_date'] ); ?> /> <?php _e('Display date', 'tcd-w');  ?></label></li>
    </ul>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content5 -->




  <!-- #tab-content6 ヘッダー　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content6">

   <?php // ヘッダーの固定設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header position', 'tcd-w');  ?></h3>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $header_fix_options as $option ) {
          $header_fix_setting = $options['header_fix'];
            if ( '' != $header_fix_setting ) {
              if ( $options['header_fix'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[header_fix]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // スマホヘッダーの固定設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Header position for mobile device', 'tcd-w'); ?></h3>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $header_fix_options as $option ) {
          $header_fix_setting = $options['mobile_header_fix'];
            if ( '' != $header_fix_setting ) {
              if ( $options['mobile_header_fix'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[mobile_header_fix]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // 色の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Color setting for fixed header', 'tcd-w');  ?></h3>
    <h4 class="theme_option_headline2"><?php _e('Background color setting', 'tcd-w');  ?></h4>
    <input type="text" id="header_bg_color" class="color" name="dp_options[header_bg_color]" value="<?php esc_attr_e( $options['header_bg_color'] ); ?>" />
    <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('header_bg_color').color.fromString('FBFBFB')">
    <h4 class="theme_option_headline2"><?php _e('Background transparency setting', 'tcd-w');  ?></h4>
    <p><?php _e('Please set the opacity. (0 - 1.0, e.g. 0.7)', 'tcd-w'); ?></p>
    <input id="dp_options[header_bg_opacity]" class="hankaku" style="width:45px;" type="text" name="dp_options[header_bg_opacity]" value="<?php esc_attr_e( $options['header_bg_opacity'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Border color setting', 'tcd-w');  ?></h4>
    <input type="text" id="header_border_color" class="color" name="dp_options[header_border_color]" value="<?php esc_attr_e( $options['header_border_color'] ); ?>" />
    <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('header_border_color').color.fromString('DDDDDD')">
    <h4 class="theme_option_headline2"><?php _e('Text color setting', 'tcd-w');  ?></h4>
    <input type="text" id="header_text_color" class="color" name="dp_options[header_text_color]" value="<?php esc_attr_e( $options['header_text_color'] ); ?>" />
    <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w');  ?>" onClick="document.getElementById('header_text_color').color.fromString('333333')">
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // SNSボタン ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('SNS button setting', 'tcd-w');  ?></h3>
    <p><?php _e('Enter url of your twitter, facebook, instagram, and contact page. Please leave the field empty if you don\'t want to display certain sns button.', 'tcd-w');  ?></p>
    <ul>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('Your Twitter URL', 'tcd-w');  ?></label>
      <input id="dp_options[twitter_url]" class="regular-text" type="text" name="dp_options[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('Your Facebook URL', 'tcd-w');  ?></label>
      <input id="dp_options[facebook_url]" class="regular-text" type="text" name="dp_options[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('Your Instagram URL', 'tcd-w');  ?></label>
      <input id="dp_options[insta_url]" class="regular-text" type="text" name="dp_options[insta_url]" value="<?php esc_attr_e( $options['insta_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('Your Pinterest URL', 'tcd-w');  ?></label>
      <input id="dp_options[pint_url]" class="regular-text" type="text" name="dp_options[pint_url]" value="<?php esc_attr_e( $options['pint_url'] ); ?>" />
     </li>
     <li>
      <label style="display:inline-block; min-width:140px;"><?php _e('Your Contact page URL (You can use mailto:)', 'tcd-w');  ?></label>
      <input id="dp_options[mail_url]" class="regular-text" type="text" name="dp_options[mail_url]" value="<?php esc_attr_e( $options['mail_url'] ); ?>" />
     </li>
    </ul>
    <hr />
    <p><label><input id="dp_options[show_rss]" name="dp_options[show_rss]" type="checkbox" value="1" <?php checked( '1', $options['show_rss'] ); ?> /> <?php _e('Display RSS button', 'tcd-w');  ?></label></p>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

  </div><!-- END #tab-content8 -->




  <!-- #tab-content7 フッター　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content7">


   <?php // フッタースライダーの設定 ------------------------------------------------------------ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Footer slider setting', 'tcd-w');  ?></h3>
    <p><label><input id="dp_options[show_footer_slider]" name="dp_options[show_footer_slider]" type="checkbox" value="1" <?php checked( '1', $options['show_footer_slider'] ); ?> /> <?php _e('Display footer slider', 'tcd-w');  ?></label></p>
    <h4 class="theme_option_headline2"><?php _e('Headline', 'tcd-w');  ?></h4>
    <input id="dp_options[footer_slider_headline]" class="regular-text" type="text" name="dp_options[footer_slider_headline]" value="<?php esc_attr_e( $options['footer_slider_headline'] ); ?>" />
    <h4 class="theme_option_headline2"><?php _e('Post type', 'tcd-w');  ?></h4>
    <select name="dp_options[footer_slider_post_type]">
     <?php
          foreach ( $post_type_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['footer_slider_post_type'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right:10px; ';
          if($option['value'] == 'recent_post'){ echo 'display:none;'; };
          echo '" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <h4 class="theme_option_headline2"><?php _e('Number of post to display', 'tcd-w');  ?></h4>
    <select name="dp_options[footer_slider_num]">
     <?php
          foreach ( $footer_slider_num_options as $option ) :
          $label = $option['label'];
          $selected = '';
          if ( $options['footer_slider_num'] == $option['value']) {
            $selected = 'selected="selected"';
          } else {
            $selected = '';
          }
          echo '<option style="padding-right: 10px;" value="' . esc_attr( $option['value'] ) . '" ' . $selected . '>' . $label . '</option>' ."\n";
          endforeach;
     ?>
    </select>
    <input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" />
   </div>

   <?php // フッターバーの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e( 'Setting of the footer bar for smart phone', 'tcd-w' ); ?></h3>
    <p><?php _e( 'Please set the footer bar which is displayed with smart phone.', 'tcd-w' ); ?>
    <h4 class="theme_option_headline2"><?php _e('Display type of the footer bar', 'tcd-w'); ?></h4>
    <fieldset class="cf select_type2">
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $footer_bar_display_options as $option ) {
          $footer_bar_display_setting = $options['footer_bar_display'];
            if ( '' != $footer_bar_display_setting ) {
              if ( $options['footer_bar_display'] == $option['value'] ) {
                $checked = "checked=\"checked\"";
              } else {
                $checked = '';
              }
           }
     ?>
     <label class="description">
      <input type="radio" name="dp_options[footer_bar_display]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php echo $checked; ?> />
      <?php echo $option['label']; ?>
     </label>
     <?php } ?>
    </fieldset>

    <h4 class="theme_option_headline2"><?php _e('Settings for the appearance of the footer bar', 'tcd-w'); ?></h4>
    <p>
     <?php _e('Background color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_bg" class="color" name="dp_options[footer_bar_bg]" value="<?php echo esc_attr( $options['footer_bar_bg'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w'); ?>" onClick="document.getElementById('footer_bar_bg').color.fromString('FFFFFF')">
    </p>
    <p>
     <?php _e('Border color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_border" class="color" name="dp_options[footer_bar_border]" value="<?php echo esc_attr( $options['footer_bar_border'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w'); ?>" onClick="document.getElementById('footer_bar_border').color.fromString('DDDDDD')">
    </p>
    <p>
     <?php _e('Font color', 'tcd-w'); ?>
     <input type="text" id="footer_bar_color" class="color" name="dp_options[footer_bar_color]" value="<?php echo esc_attr( $options['footer_bar_color'] ); ?>" />
     <input type="button" style="margin:0 0 0 5px;" class="button-secondary" value="<?php _e('Default color', 'tcd-w'); ?>" onClick="document.getElementById('footer_bar_color').color.fromString('000000')">
    </p>
    <p>
     <?php _e('Opacity of background', 'tcd-w'); ?>
     <input id="dp_options[footer_bar_tp]" class="font_size hankaku" type="text" name="dp_options[footer_bar_tp]" value="<?php echo esc_attr( $options['footer_bar_tp'] ); ?>" /><br>
     <?php _e('Please enter the number 0 - 1.0. (e.g. 0.8)', 'tcd-w'); ?>
    </p>

    <h4 class="theme_option_headline2"><?php _e('Settings for the contents of the footer bar', 'tcd-w'); ?></h4>
   	<p><?php _e( 'You can display the button with icon in footer bar. (We recommend you to set max 4 buttons.)', 'tcd-w' ); ?><br><?php _e( 'You can select button types below.', 'tcd-w' ); ?></p>
    <table class="table-border">
     <tr>
      <th><?php _e( 'Default', 'tcd-w' ); ?></th>
      <td><?php _e( 'You can set link URL.', 'tcd-w' ); ?></td>
     </tr>
     <tr>
      <th><?php _e( 'Share', 'tcd-w' ); ?></th>
      <td><?php _e( 'Share buttons are displayed if you tap this button.', 'tcd-w' ); ?></td>
     </tr>
     <tr>
      <th><?php _e( 'Telephone', 'tcd-w' ); ?></th>
      <td><?php _e( 'You can call this number.', 'tcd-w' ); ?></td>
     </tr>
    </table>
    <p><?php _e( 'Click "Add item", and set the button for footer bar. You can drag the item to change their order.', 'tcd-w' ); ?></p>
    <div class="repeater-wrapper">
     <div class="repeater sortable" data-delete-confirm="<?php _e( 'Delete?', 'tcd-w' ); ?>">
<?php
    if ( $options['footer_bar_btns'] ) :
      foreach ( $options['footer_bar_btns'] as $key => $value ) :  
?>
      <div class="sub_box repeater-item repeater-item-<?php echo esc_attr( $key ); ?>">
       <h4 class="theme_option_subbox_headline"><?php echo esc_attr( $value['label'] ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1" <?php checked( $value['target'], 1 ); ?>><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>
           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>" <?php selected( $value['type'], $option['value'] ); ?>><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="regular-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value="<?php echo esc_attr( $value['label'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-url" style="<?php if ( $value['type'] !== 'type1' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value="<?php echo esc_attr( $value['url'] ); ?>"></td>
         </tr>
         <tr class="footer-bar-number" style="<?php if ( $value['type'] !== 'type3' ) { echo 'display: none;'; } ?>">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value="<?php echo esc_attr( $value['number'] ); ?>"></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>" <?php checked( $option['value'], $value['icon'] ); ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
      endforeach;
    endif;

    $key = 'addindex';
    ob_start();
?>
      <div class="sub_box repeater-item repeater-item-<?php echo $key; ?>">
       <h4 class="theme_option_subbox_headline"><?php _e( 'New item', 'tcd-w' ); ?></h4>
       <div class="sub_box_content">
        <p class="footer-bar-target"><label><input name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][target]" type="checkbox" value="1"><?php _e( 'Open with new window', 'tcd-w' ); ?></label></p>
        <table class="table-repeater">
         <tr class="footer-bar-type">
          <th><label><?php _e( 'Button type', 'tcd-w' ); ?></label></th>
          <td>
           <select name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][type]">
            <?php foreach( $footer_bar_button_options as $option ) : ?>
            <option value="<?php echo esc_attr( $option['value'] ); ?>"><?php esc_html_e( $option['label'], 'tcd-w' ); ?></option>
            <?php endforeach; ?>
           </select>
          </td>
         </tr>
         <tr>
          <th><label for="dp_options[repeater_footer_bar_btn<?php echo esc_attr( $key ); ?>_label]"><?php _e( 'Button label', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_label]" class="regular-text repeater-label" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][label]" value=""></td>
         </tr>
         <tr class="footer-bar-url">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]"><?php _e( 'Link URL', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_url]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][url]" value=""></td>
         </tr>
         <tr class="footer-bar-number" style="display: none;">
          <th><label for="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]"><?php _e( 'Phone number', 'tcd-w' ); ?></label></th>
          <td><input id="dp_options[footer_bar_btn<?php echo esc_attr( $key ); ?>_number]" class="regular-text" type="text" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][number]" value=""></td>
         </tr>
         <tr>
          <th><?php _e( 'Button icon', 'tcd-w' ); ?></th>
          <td>
           <?php foreach( $footer_bar_icon_options as $option ) : ?>
           <p><label><input type="radio" name="dp_options[repeater_footer_bar_btns][<?php echo esc_attr( $key ); ?>][icon]" value="<?php echo esc_attr( $option['value'] ); ?>"<?php if ( 'file-text' == $option['value'] ) { echo ' checked="checked"'; } ?>><span class="icon icon-<?php echo esc_attr( $option['value'] ); ?>"></span><?php esc_html_e( $option['label'], 'tcd-w' ); ?></label></p>
           <?php endforeach; ?>
          </td>
         </tr>
        </table>
        <p class="delete-row right-align"><a href="#" class="button button-secondary button-delete-row"><?php _e( 'Delete item', 'tcd-w' ); ?></a></p>
       </div>
      </div>
<?php
    $clone = ob_get_clean();
?>
     </div><!-- END .repeater -->
     <a href="#" class="button button-secondary button-add-row" data-clone="<?php echo esc_attr( $clone ); ?>"><?php _e( 'Add item', 'tcd-w' ); ?></a>
    </div><!-- END .repeater-wrapper -->
    <input type="submit" class="button-ml" value="<?php _e( 'Save Changes', 'tcd-w' ); ?>"> 
   </div><!-- END .theme_option_field -->


  </div><!-- END #tab-content9 -->

	<!-- #tab-content8 保護ページ　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■  -->
  <div id="tab-content8">
  	<?php // 保護ページの設定 ?>
   	<div class="theme_option_field cf">
    	<h3 class="theme_option_headline"><?php _e( 'Password protected pages settings', 'tcd-w' ); ?></h3>
			<h4 class="theme_option_headline2"><?php _e( 'Password field and button align settings', 'tcd-w' ); ?></h4>
			<fieldset class="cf select_type2">
				<?php foreach ( $pw_align_options as $option ) : ?>
				<label class="description"><input type="radio" name="dp_options[pw_align]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php checked( $option['value'], $options['pw_align'] ); ?>><?php _e( $option['label'], 'tcd-w' ); ?></label>
				<?php endforeach; ?>
    	</fieldset>
			<h4 class="theme_option_headline2"><?php _e( 'Password field settings', 'tcd-w' ); ?></h4>
			<p><label><?php _e( 'Label', 'tcd-w' ); ?> <input type="text" name="dp_options[pw_label]" value="<?php echo esc_attr( $options['pw_label'] ); ?>"></label></p>
			<h4 class="theme_option_headline2"><?php _e( 'Contents to encourage member registration', 'tcd-w' ); ?></h4>
			<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
      <div class="sub_box">
      	<h5 class="theme_option_subbox_headline"><?php echo  __( 'Content', 'tcd-w' ) . $i; ?><span><?php if ( $options['pw_name' . $i] ) { echo ' : ' . esc_html( $options['pw_name' . $i] ); } ?></span></h4>
				<div class="sub_box_content">
					<p><label><?php _e( 'Name of contents', 'tcd-w' ); ?> <input type="text" class="theme_option_subbox_headline_label regular-text" name="dp_options[pw_name<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_name' . $i] ); ?>"></label></p>
							<p><?php _e( '"Name of contents" is used in edit post page.', 'tcd-w' ); ?></p>
							<h6 class="theme_option_headline2"><?php _e( 'Button settings', 'tcd-w' ); ?></h6>
							<p><label><input type="checkbox" name="dp_options[pw_btn_display<?php echo $i; ?>]" value="1" <?php checked( 1, $options['pw_btn_display' . $i] ); ?>> <?php _e( 'Display button', 'tcd-w' ); ?></label></p>
							<p><label><?php _e( 'Label', 'tcd-w' ); ?> <input type="text" class="regular-text" name="dp_options[pw_btn_label<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_btn_label' . $i] ); ?>"></label></p>
							<p><label>URL <input type="text" class="regular-text" name="dp_options[pw_btn_url<?php echo $i; ?>]" value="<?php echo esc_attr( $options['pw_btn_url' . $i] ); ?>"></label></p>
      				<p><label><input name="dp_options[pw_btn_target<?php echo $i; ?>]" type="checkbox" value="1" <?php checked( 1, $options['pw_btn_target' . $i] ); ?>> <?php _e( 'Open link in new window', 'tcd-w' ); ?></label></p>
							<h6 class="theme_option_headline2"><?php _e( 'Sentences to encourage member registration', 'tcd-w' ); ?></h6>
							<p><?php _e( '"Sentences to encourage member registration" is displayed under excerpts.', 'tcd-w' ); ?></p>
							<?php wp_editor( $options['pw_editor' . $i], 'pw_editor' . $i, array ( 'textarea_name' => 'dp_options[pw_editor' . $i . ']' ) ); ?>
						</div>
      </div>
			
			<?php endfor; ?>
    	<input type="submit" class="button-ml" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>">
   	</div>
  </div><!-- END #tab-content8 -->

  </div><!-- END #tab-panel -->

  </form>

  </div><!-- END #my_theme_right -->

 </div><!-- END #my_theme_option -->

</div><!-- END #wrap -->

<?php

 }


/**
 * チェック ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
 */
function theme_options_validate( $input ) {

 global $load_time_options, $load_icon_type, $hover_type_options, $hover2_direct_options, $font_type_options, $responsive_options, $header_fix_options, $sns_type_top_options, $sns_type_btm_options, $page_post_list_num_options,
        $post_type_options, $post_type_order_options, $slider_time_options, $index_slider_type_options, $index_slider_num_options, $footer_slider_num_options, $footer_bar_icon_options, $footer_bar_button_options, $footer_bar_display_options, $logo_type_options, $pw_align_options;

 //色の設定
 $input['pickedcolor1'] = wp_filter_nohtml_kses( $input['pickedcolor1'] );
 $input['content_link_color'] = wp_filter_nohtml_kses( $input['content_link_color'] );

 // フォントの種類
 if ( ! isset( $input['font_type'] ) )
   $input['font_type'] = null;
 if ( ! array_key_exists( $input['font_type'], $font_type_options ) )
   $input['font_type'] = null;
 if ( ! isset( $input['headline_font_type'] ) )
   $input['headline_font_type'] = null;
 if ( ! array_key_exists( $input['headline_font_type'], $font_type_options ) )
   $input['headline_font_type'] = null;

 // アニメーションhover effect
 if ( ! isset( $input['hover_type'] ) )
   $input['hover_type'] = null;
 if ( ! array_key_exists( $input['hover_type'], $hover_type_options ) )
   $input['hover_type'] = null;

 // アニメーションhover1
 $input['hover1_zoom'] = wp_filter_nohtml_kses( $input['hover1_zoom'] );
 // アニメーションhover2
 if ( ! isset( $input['hover2_direct'] ) )
   $input['hover2_direct'] = null;
 if ( ! array_key_exists( $input['hover2_direct'], $hover2_direct_options ) )
   $input['hover2_direct'] = null;
 $input['hover2_opacity'] = wp_filter_nohtml_kses( $input['hover2_opacity'] );
 // アニメーションhover3
 $input['hover3_opacity'] = wp_filter_nohtml_kses( $input['hover3_opacity'] );
 $input['hover3_bgcolor'] = wp_filter_nohtml_kses( $input['hover3_bgcolor'] );

 // ファビコン
 $input['favicon'] = wp_filter_nohtml_kses( $input['favicon'] );

 // Facebook OGPの設定
 if ( ! isset( $input['use_ogp'] ) )
   $input['use_ogp'] = null;
   $input['use_ogp'] = ( $input['use_ogp'] == 1 ? 1 : 0 );
 $input['ogp_image'] = wp_filter_nohtml_kses( $input['ogp_image'] );
 $input['fb_admin_id'] = wp_filter_nohtml_kses( $input['fb_admin_id'] );

 // Twitter Cardsの設定
 if ( ! isset( $input['use_twitter_card'] ) )
   $input['use_twitter_card'] = null;
   $input['use_twitter_card'] = ( $input['use_twitter_card'] == 1 ? 1 : 0 );
 $input['twitter_account_name'] = wp_filter_nohtml_kses( $input['twitter_account_name'] );

 // オリジナルスタイルの設定
 $input['css_code'] = $input['css_code'];

 // レスポンシブの設定
 if ( ! isset( $input['responsive'] ) )
   $input['responsive'] = null;
 if ( ! array_key_exists( $input['responsive'], $responsive_options ) )
   $input['responsive'] = null;

 // sidebarの設定
 if ( ! isset( $input['column_float'] ) )
   $input['column_float'] = null;
   $input['column_float'] = ( $input['column_float'] == 1 ? 1 : 0 );

 // No Imageの設定
 $input['no_image1'] = wp_filter_nohtml_kses( $input['no_image1'] );
 $input['no_image2'] = wp_filter_nohtml_kses( $input['no_image2'] );
 $input['no_image3'] = wp_filter_nohtml_kses( $input['no_image3'] );

 // 404 ページ
 $input['header_image_404'] = wp_filter_nohtml_kses( $input['header_image_404'] );
 $input['header_txt_404'] = wp_filter_nohtml_kses( $input['header_txt_404'] );
 $input['header_sub_txt_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_404'] );
 $input['header_txt_size_404'] = wp_filter_nohtml_kses( $input['header_txt_size_404'] );
 $input['header_sub_txt_size_404'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404'] );
 $input['header_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_txt_size_404_mobile'] );
 $input['header_sub_txt_size_404_mobile'] = wp_filter_nohtml_kses( $input['header_sub_txt_size_404_mobile'] );
 $input['header_txt_color_404'] = wp_filter_nohtml_kses( $input['header_txt_color_404'] );
 $input['dropshadow_404_h'] = wp_filter_nohtml_kses( $input['dropshadow_404_h'] );
 $input['dropshadow_404_v'] = wp_filter_nohtml_kses( $input['dropshadow_404_v'] );
 $input['dropshadow_404_b'] = wp_filter_nohtml_kses( $input['dropshadow_404_b'] );
 $input['dropshadow_404_c'] = wp_filter_nohtml_kses( $input['dropshadow_404_c'] );

 // 絵文字の設定
 if ( ! isset( $input['use_emoji'] ) )
   $input['use_emoji'] = null;
   $input['use_emoji'] = ( $input['use_emoji'] == 1 ? 1 : 0 );

 // ロードアイコンの設定
 if ( ! isset( $input['use_load_icon'] ) )
   $input['use_load_icon'] = null;
   $input['use_load_icon'] = ( $input['use_load_icon'] == 1 ? 1 : 0 );
 if ( ! isset( $input['load_time'] ) )
   $input['load_time'] = null;
 if ( ! array_key_exists( $input['load_time'], $load_time_options ) )
   $input['load_time'] = null;
 if ( ! isset( $input['load_icon'] ) )
   $input['load_icon'] = null;
 if ( ! array_key_exists( $input['load_icon'], $load_icon_type ) )
   $input['load_icon'] = 'type1';
 $input['loader_color1'] = wp_filter_nohtml_kses( $input['loader_color1'] );
 $input['loader_color2'] = wp_filter_nohtml_kses( $input['loader_color2'] );

 // ロゴ
 $input['logo_font_size'] = wp_filter_nohtml_kses( $input['logo_font_size'] );
 $input['header_logo_image'] = wp_filter_nohtml_kses( $input['header_logo_image'] );
 $input['header_logo_image_mobile'] = wp_filter_nohtml_kses( $input['header_logo_image_mobile'] );
 if ( ! isset( $input['header_logo_retina'] ) )
   $input['header_logo_retina'] = null;
   $input['header_logo_retina'] = ( $input['header_logo_retina'] == 1 ? 1 : 0 );
 if ( ! isset( $input['header_logo_retina_mobile'] ) )
   $input['header_logo_retina_mobile'] = null;
   $input['header_logo_retina_mobile'] = ( $input['header_logo_retina_mobile'] == 1 ? 1 : 0 );
 if ( ! isset( $input['use_logo_image'] ) )
   $input['use_logo_image'] = null;
 if ( ! array_key_exists( $input['use_logo_image'], $logo_type_options ) )
   $input['use_logo_image'] = null;
 $input['tagline_font_size'] = wp_filter_nohtml_kses( $input['tagline_font_size'] );
 if ( ! isset( $input['show_tagline'] ) )
   $input['show_tagline'] = null;
   $input['show_tagline'] = ( $input['show_tagline'] == 1 ? 1 : 0 );

 // トップページのスライダー
 if ( ! isset( $input['show_index_slider'] ) )
   $input['show_index_slider'] = null;
   $input['show_index_slider'] = ( $input['show_index_slider'] == 1 ? 1 : 0 );
 if ( ! isset( $value['index_slider_type'] ) )
   $value['index_slider_type'] = null;
 if ( ! array_key_exists( $value['index_slider_type'], $index_slider_type_options ) )
   $value['index_slider_type'] = null;
 if ( ! isset( $value['index_slider_post_type'] ) )
   $value['index_slider_post_type'] = null;
 if ( ! array_key_exists( $value['index_slider_post_type'], $post_type_options ) )
   $value['index_slider_post_type'] = null;
 if ( ! isset( $value['index_slider_post_type_order'] ) )
   $value['index_slider_post_type_order'] = null;
 if ( ! array_key_exists( $value['index_slider_post_type_order'], $post_type_order_options ) )
   $value['index_slider_post_type_order'] = null;
 if ( ! isset( $value['index_slider_num'] ) )
   $value['index_slider_num'] = null;
 if ( ! array_key_exists( $value['index_slider_num'], $index_slider_num_options ) )
   $value['index_slider_num'] = null;
 $input['index_slider_button_color'] = wp_filter_nohtml_kses( $input['index_slider_button_color'] );
 $input['index_slider_button_color_hover'] = wp_filter_nohtml_kses( $input['index_slider_button_color_hover'] );
 $input['index_slider_button_bg_color'] = wp_filter_nohtml_kses( $input['index_slider_button_bg_color'] );
 $input['index_slider_button_bg_color_hover'] = wp_filter_nohtml_kses( $input['index_slider_button_bg_color_hover'] );
 $input['index_slider_button_bg_opacity'] = wp_filter_nohtml_kses( $input['index_slider_button_bg_opacity'] );
 if ( ! isset( $input['index_slider_use_retina'] ) )
   $input['index_slider_use_retina'] = null;
   $input['index_slider_use_retina'] = ( $input['index_slider_use_retina'] == 1 ? 1 : 0 );
 $input['index_slider_image1'] = wp_filter_nohtml_kses( $input['index_slider_image1'] );
 $input['index_slider_image2'] = wp_filter_nohtml_kses( $input['index_slider_image2'] );
 $input['index_slider_image3'] = wp_filter_nohtml_kses( $input['index_slider_image3'] );
 $input['index_slider_image4'] = wp_filter_nohtml_kses( $input['index_slider_image4'] );
 $input['index_slider_image5'] = wp_filter_nohtml_kses( $input['index_slider_image5'] );
 $input['index_slider_catch1'] = wp_filter_nohtml_kses( $input['index_slider_catch1'] );
 $input['index_slider_catch2'] = wp_filter_nohtml_kses( $input['index_slider_catch2'] );
 $input['index_slider_catch3'] = wp_filter_nohtml_kses( $input['index_slider_catch3'] );
 $input['index_slider_catch4'] = wp_filter_nohtml_kses( $input['index_slider_catch4'] );
 $input['index_slider_catch5'] = wp_filter_nohtml_kses( $input['index_slider_catch5'] );
 $input['index_slider_button_label1'] = wp_filter_nohtml_kses( $input['index_slider_button_label1'] );
 $input['index_slider_button_label2'] = wp_filter_nohtml_kses( $input['index_slider_button_label2'] );
 $input['index_slider_button_label3'] = wp_filter_nohtml_kses( $input['index_slider_button_label3'] );
 $input['index_slider_button_label4'] = wp_filter_nohtml_kses( $input['index_slider_button_label4'] );
 $input['index_slider_button_label5'] = wp_filter_nohtml_kses( $input['index_slider_button_label5'] );
 $input['index_slider_url1'] = wp_filter_nohtml_kses( $input['index_slider_url1'] );
 $input['index_slider_url2'] = wp_filter_nohtml_kses( $input['index_slider_url2'] );
 $input['index_slider_url3'] = wp_filter_nohtml_kses( $input['index_slider_url3'] );
 $input['index_slider_url4'] = wp_filter_nohtml_kses( $input['index_slider_url4'] );
 $input['index_slider_url5'] = wp_filter_nohtml_kses( $input['index_slider_url5'] );
 $input['index_slider_target1'] = wp_filter_nohtml_kses( $input['index_slider_target1'] );
 $input['index_slider_target2'] = wp_filter_nohtml_kses( $input['index_slider_target2'] );
 $input['index_slider_target3'] = wp_filter_nohtml_kses( $input['index_slider_target3'] );
 $input['index_slider_target4'] = wp_filter_nohtml_kses( $input['index_slider_target4'] );
 $input['index_slider_target5'] = wp_filter_nohtml_kses( $input['index_slider_target5'] );
 if ( ! isset( $value['slider_time'] ) )
   $value['slider_time'] = null;
 if ( ! array_key_exists( $value['slider_time'], $slider_time_options ) )
   $value['slider_time'] = null;
 $input['index_slider_font_size'] = wp_filter_nohtml_kses( $input['index_slider_font_size'] );

 // トップページのバナー
 if ( ! isset( $input['show_index_banner_content'] ) )
   $input['show_index_banner_content'] = null;
   $input['show_index_banner_content'] = ( $input['show_index_banner_content'] == 1 ? 1 : 0 );
 if ( ! isset( $value['index_banner_content_type'] ) )
   $value['index_banner_content_type'] = null;
 if ( ! array_key_exists( $value['index_banner_content_type'], $index_slider_type_options ) )
   $value['index_banner_content_type'] = null;
 if ( ! isset( $value['index_banner_content_post_type'] ) )
   $value['index_banner_content_post_type'] = null;
 if ( ! array_key_exists( $value['index_banner_content_post_type'], $post_type_options ) )
   $value['index_banner_content_post_type'] = null;
 if ( ! isset( $value['index_banner_content_post_type_order'] ) )
   $value['index_banner_content_post_type_order'] = null;
 if ( ! array_key_exists( $value['index_banner_content_post_type_order'], $post_type_order_options ) )
   $value['index_banner_content_post_type_order'] = null;
 $input['index_banner_content_color'] = wp_filter_nohtml_kses( $input['index_banner_content_color'] );
 $input['index_banner_content_color_hover'] = wp_filter_nohtml_kses( $input['index_banner_content_color_hover'] );
 $input['index_banner_content_bg_color'] = wp_filter_nohtml_kses( $input['index_banner_content_bg_color'] );
 $input['index_banner_content_bg_color_hover'] = wp_filter_nohtml_kses( $input['index_banner_content_bg_color_hover'] );
 $input['index_banner_content_bg_opacity'] = wp_filter_nohtml_kses( $input['index_banner_content_bg_opacity'] );
 if ( ! isset( $input['index_banner_content_use_retina'] ) )
   $input['index_banner_content_use_retina'] = null;
   $input['index_banner_content_use_retina'] = ( $input['index_banner_content_use_retina'] == 1 ? 1 : 0 );
 $input['index_banner_content_image1'] = wp_filter_nohtml_kses( $input['index_banner_content_image1'] );
 $input['index_banner_content_image2'] = wp_filter_nohtml_kses( $input['index_banner_content_image2'] );
 $input['index_banner_content_catch1'] = wp_filter_nohtml_kses( $input['index_banner_content_catch1'] );
 $input['index_banner_content_catch2'] = wp_filter_nohtml_kses( $input['index_banner_content_catch2'] );
 $input['index_banner_content_url1'] = wp_filter_nohtml_kses( $input['index_banner_content_url1'] );
 $input['index_banner_content_url2'] = wp_filter_nohtml_kses( $input['index_banner_content_url2'] );
 if ( ! isset( $input['index_banner_content_target1'] ) )
   $input['index_banner_content_target1'] = null;
   $input['index_banner_content_target1'] = ( $input['index_banner_content_target1'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_banner_content_target2'] ) )
   $input['index_banner_content_target2'] = null;
   $input['index_banner_content_target2'] = ( $input['index_banner_content_target2'] == 1 ? 1 : 0 );
 $input['index_banner_font_size'] = wp_filter_nohtml_kses( $input['index_banner_font_size'] );

 // トップページのおすすめ記事
 if ( ! isset( $input['show_index_featured_post'] ) )
   $input['show_index_featured_post'] = null;
   $input['show_index_featured_post'] = ( $input['show_index_featured_post'] == 1 ? 1 : 0 );
 $input['index_featured_post_headline'] = wp_filter_nohtml_kses( $input['index_featured_post_headline'] );
 if ( ! isset( $value['index_featured_post_type'] ) )
   $value['index_featured_post_type'] = null;
 if ( ! array_key_exists( $value['index_featured_post_type'], $post_type_options ) )
   $value['index_featured_post_type'] = null;
 if ( ! isset( $input['index_featured_post_show_excerpt'] ) )
   $input['index_featured_post_show_excerpt'] = null;
   $input['index_featured_post_show_excerpt'] = ( $input['index_featured_post_show_excerpt'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_featured_post_show_date'] ) )
   $input['index_featured_post_show_date'] = null;
   $input['index_featured_post_show_date'] = ( $input['index_featured_post_show_date'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_featured_post_show_category'] ) )
   $input['index_featured_post_show_category'] = null;
   $input['index_featured_post_show_category'] = ( $input['index_featured_post_show_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_featured_post_use_retina'] ) )
   $input['index_featured_post_use_retina'] = null;
   $input['index_featured_post_use_retina'] = ( $input['index_featured_post_use_retina'] == 1 ? 1 : 0 );
 $input['index_featured_post_headline_font_size'] = wp_filter_nohtml_kses( $input['index_featured_post_headline_font_size'] );

 // トップページのBlog一覧
 if ( ! isset( $input['show_index_blog_list'] ) )
   $input['show_index_blog_list'] = null;
   $input['show_index_blog_list'] = ( $input['show_index_blog_list'] == 1 ? 1 : 0 );
 $input['index_blog_headline'] = wp_filter_nohtml_kses( $input['index_blog_headline'] );
 if ( ! isset( $input['index_blog_show_excerpt'] ) )
   $input['index_blog_show_excerpt'] = null;
   $input['index_blog_show_excerpt'] = ( $input['index_blog_show_excerpt'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_blog_show_date'] ) )
   $input['index_blog_show_date'] = null;
   $input['index_blog_show_date'] = ( $input['index_blog_show_date'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_blog_show_category'] ) )
   $input['index_blog_show_category'] = null;
   $input['index_blog_show_category'] = ( $input['index_blog_show_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_blog_use_retina'] ) )
   $input['index_blog_use_retina'] = null;
   $input['index_blog_use_retina'] = ( $input['index_blog_use_retina'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_blog_ad_no_border1'] ) )
   $input['index_blog_ad_no_border1'] = null;
   $input['index_blog_ad_no_border1'] = ( $input['index_blog_ad_no_border1'] == 1 ? 1 : 0 );
 if ( ! isset( $input['index_blog_ad_no_border2'] ) )
   $input['index_blog_ad_no_border2'] = null;
   $input['index_blog_ad_no_border2'] = ( $input['index_blog_ad_no_border2'] == 1 ? 1 : 0 );
 $input['index_blog_ad_code1'] = $input['index_blog_ad_code1'];
 $input['index_blog_ad_image1'] = wp_filter_nohtml_kses( $input['index_blog_ad_image1'] );
 $input['index_blog_ad_url1'] = wp_filter_nohtml_kses( $input['index_blog_ad_url1'] );
 $input['index_blog_ad_code2'] = $input['index_blog_ad_code2'];
 $input['index_blog_ad_image2'] = wp_filter_nohtml_kses( $input['index_blog_ad_image2'] );
 $input['index_blog_ad_url2'] = wp_filter_nohtml_kses( $input['index_blog_ad_url2'] );
 $input['index_blog_headline_font_size'] = wp_filter_nohtml_kses( $input['index_blog_headline_font_size'] );

 // 固定ページの設定
 $input['page_headline_font_size'] = wp_filter_nohtml_kses( $input['page_headline_font_size'] );
 $input['page_ad_code1'] = $input['page_ad_code1'];
 $input['page_ad_image1'] = wp_filter_nohtml_kses( $input['page_ad_image1'] );
 $input['page_ad_url1'] = wp_filter_nohtml_kses( $input['page_ad_url1'] );
 $input['page_ad_code2'] = $input['page_ad_code2'];
 $input['page_ad_image2'] = wp_filter_nohtml_kses( $input['page_ad_image2'] );
 $input['page_ad_url2'] = wp_filter_nohtml_kses( $input['page_ad_url2'] );
 $input['page_post_list_headline'] = wp_filter_nohtml_kses( $input['page_post_list_headline'] );
 if ( ! isset( $value['page_post_list_type'] ) )
   $value['page_post_list_type'] = null;
 if ( ! array_key_exists( $value['page_post_list_type'], $post_type_options ) )
   $value['page_post_list_type'] = null;
 if ( ! isset( $value['page_post_list_order'] ) )
   $value['page_post_list_order'] = null;
 if ( ! array_key_exists( $value['page_post_list_order'], $post_type_order_options ) )
   $value['page_post_list_order'] = null;
 if ( ! isset( $value['page_post_list_num'] ) )
   $value['page_post_list_num'] = null;
 if ( ! array_key_exists( $value['page_post_list_num'], $page_post_list_num_options ) )
   $value['page_post_list_num'] = null;
 if ( ! isset( $input['page_post_list_show_cat'] ) )
   $input['page_post_list_show_cat'] = null;
   $input['page_post_list_show_cat'] = ( $input['page_post_list_show_cat'] == 1 ? 1 : 0 );
 if ( ! isset( $input['page_post_list_show_date'] ) )
   $input['page_post_list_show_date'] = null;
   $input['page_post_list_show_date'] = ( $input['page_post_list_show_date'] == 1 ? 1 : 0 );

 // ブログアーカイブページ
 if ( ! isset( $input['archive_blog_show_excerpt'] ) )
   $input['archive_blog_show_excerpt'] = null;
   $input['archive_blog_show_excerpt'] = ( $input['archive_blog_show_excerpt'] == 1 ? 1 : 0 );
 if ( ! isset( $input['archive_blog_show_date'] ) )
   $input['archive_blog_show_date'] = null;
   $input['archive_blog_show_date'] = ( $input['archive_blog_show_date'] == 1 ? 1 : 0 );
 if ( ! isset( $input['archive_blog_show_category'] ) )
   $input['archive_blog_show_category'] = null;
   $input['archive_blog_show_category'] = ( $input['archive_blog_show_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['archive_blog_use_retina'] ) )
   $input['archive_blog_use_retina'] = null;
   $input['archive_blog_use_retina'] = ( $input['archive_blog_use_retina'] == 1 ? 1 : 0 );
 if ( ! isset( $input['archive_blog_ad_no_border1'] ) )
   $input['archive_blog_ad_no_border1'] = null;
   $input['archive_blog_ad_no_border1'] = ( $input['archive_blog_ad_no_border1'] == 1 ? 1 : 0 );
 if ( ! isset( $input['archive_blog_ad_no_border2'] ) )
   $input['archive_blog_ad_no_border2'] = null;
   $input['archive_blog_ad_no_border2'] = ( $input['archive_blog_ad_no_border2'] == 1 ? 1 : 0 );
 $input['archive_blog_ad_code1'] = $input['archive_blog_ad_code1'];
 $input['archive_blog_ad_image1'] = wp_filter_nohtml_kses( $input['archive_blog_ad_image1'] );
 $input['archive_blog_ad_url1'] = wp_filter_nohtml_kses( $input['archive_blog_ad_url1'] );
 $input['archive_blog_ad_code2'] = $input['archive_blog_ad_code2'];
 $input['archive_blog_ad_image2'] = wp_filter_nohtml_kses( $input['archive_blog_ad_image2'] );
 $input['archive_blog_ad_url2'] = wp_filter_nohtml_kses( $input['archive_blog_ad_url2'] );

 // ブログ記事ページのフォントサイズ
 $input['title_font_size'] = wp_filter_nohtml_kses( $input['title_font_size'] );
 $input['content_font_size'] = wp_filter_nohtml_kses( $input['content_font_size'] );
 if ( ! isset( $input['related_use_retina'] ) )
   $input['related_use_retina'] = null;
   $input['related_use_retina'] = ( $input['related_use_retina'] == 1 ? 1 : 0 );

 // ブログ記事ページの表示設定
 if ( ! isset( $input['show_date'] ) )
   $input['show_date'] = null;
   $input['show_date'] = ( $input['show_date'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_category'] ) )
   $input['show_category'] = null;
   $input['show_category'] = ( $input['show_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_tag'] ) )
   $input['show_tag'] = null;
   $input['show_tag'] = ( $input['show_tag'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_comment'] ) )
   $input['show_comment'] = null;
   $input['show_comment'] = ( $input['show_comment'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_trackback'] ) )
   $input['show_trackback'] = null;
   $input['show_trackback'] = ( $input['show_trackback'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_related_post'] ) )
   $input['show_related_post'] = null;
   $input['show_related_post'] = ( $input['show_related_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_next_post'] ) )
   $input['show_next_post'] = null;
   $input['show_next_post'] = ( $input['show_next_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_thumbnail'] ) )
   $input['show_thumbnail'] = null;
   $input['show_thumbnail'] = ( $input['show_thumbnail'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_author'] ) )
   $input['show_author'] = null;
   $input['show_author'] = ( $input['show_author'] == 1 ? 1 : 0 );

 // ソーシャルボタンの表示設定
 if ( ! isset( $input['sns_type_top'] ) )
   $input['sns_type_top'] = null;
 if ( ! array_key_exists( $input['sns_type_top'], $sns_type_top_options ) )
   $input['sns_type_top'] = null;
 if ( ! isset( $input['show_sns_top'] ) )
   $input['show_sns_top'] = null;
   $input['show_sns_top'] = ( $input['show_sns_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_twitter_top'] ) )
   $input['show_twitter_top'] = null;
   $input['show_twitter_top'] = ( $input['show_twitter_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_fblike_top'] ) )
   $input['show_fblike_top'] = null;
   $input['show_fblike_top'] = ( $input['show_fblike_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_fbshare_top'] ) )
   $input['show_fbshare_top'] = null;
   $input['show_fbshare_top'] = ( $input['show_fbshare_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_google_top'] ) )
   $input['show_google_top'] = null;
   $input['show_google_top'] = ( $input['show_google_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_hatena_top'] ) )
   $input['show_hatena_top'] = null;
   $input['show_hatena_top'] = ( $input['show_hatena_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_pocket_top'] ) )
   $input['show_pocket_top'] = null;
   $input['show_pocket_top'] = ( $input['show_pocket_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_feedly_top'] ) )
   $input['show_feedly_top'] = null;
   $input['show_feedly_top'] = ( $input['show_feedly_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_rss_top'] ) )
   $input['show_rss_top'] = null;
   $input['show_rss_top'] = ( $input['show_rss_top'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_pinterest_top'] ) )
   $input['show_pinterest_top'] = null;
   $input['show_pinterest_top'] = ( $input['show_pinterest_top'] == 1 ? 1 : 0 );

 if ( ! isset( $input['sns_type_btm'] ) )
   $input['sns_type_btm'] = null;
 if ( ! array_key_exists( $input['sns_type_btm'], $sns_type_btm_options ) )
   $input['sns_type_btm'] = null;
 if ( ! isset( $input['show_sns_btm'] ) )
   $input['show_sns_btm'] = null;
   $input['show_sns_btm'] = ( $input['show_sns_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_twitter_btm'] ) )
   $input['show_twitter_btm'] = null;
   $input['show_twitter_btm'] = ( $input['show_twitter_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_fblike_btm'] ) )
   $input['show_fblike_btm'] = null;
   $input['show_fblike_btm'] = ( $input['show_fblike_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_fbshare_btm'] ) )
   $input['show_fbshare_btm'] = null;
   $input['show_fbshare_btm'] = ( $input['show_fbshare_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_google_btm'] ) )
   $input['show_google_btm'] = null;
   $input['show_google_btm'] = ( $input['show_google_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_hatena_btm'] ) )
   $input['show_hatena_btm'] = null;
   $input['show_hatena_btm'] = ( $input['show_hatena_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_pocket_btm'] ) )
   $input['show_pocket_btm'] = null;
   $input['show_pocket_btm'] = ( $input['show_pocket_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_feedly_btm'] ) )
   $input['show_feedly_btm'] = null;
   $input['show_feedly_btm'] = ( $input['show_feedly_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_rss_btm'] ) )
   $input['show_rss_btm'] = null;
   $input['show_rss_btm'] = ( $input['show_rss_btm'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_pinterest_btm'] ) )
   $input['show_pinterest_btm'] = null;
   $input['show_pinterest_btm'] = ( $input['show_pinterest_btm'] == 1 ? 1 : 0 );

 // ブログ記事ページのバナー広告
 $input['single_ad_code1'] = $input['single_ad_code1'];
 $input['single_ad_image1'] = wp_filter_nohtml_kses( $input['single_ad_image1'] );
 $input['single_ad_url1'] = wp_filter_nohtml_kses( $input['single_ad_url1'] );
 $input['single_ad_code2'] = $input['single_ad_code2'];
 $input['single_ad_image2'] = wp_filter_nohtml_kses( $input['single_ad_image2'] );
 $input['single_ad_url2'] = wp_filter_nohtml_kses( $input['single_ad_url2'] );
 $input['single_ad_code3'] = $input['single_ad_code3'];
 $input['single_ad_image3'] = wp_filter_nohtml_kses( $input['single_ad_image3'] );
 $input['single_ad_url3'] = wp_filter_nohtml_kses( $input['single_ad_url3'] );
 $input['single_ad_code4'] = $input['single_ad_code4'];
 $input['single_ad_image4'] = wp_filter_nohtml_kses( $input['single_ad_image4'] );
 $input['single_ad_url4'] = wp_filter_nohtml_kses( $input['single_ad_url4'] );
 $input['single_ad_code5'] = $input['single_ad_code5'];
 $input['single_ad_image5'] = wp_filter_nohtml_kses( $input['single_ad_image5'] );
 $input['single_ad_url5'] = wp_filter_nohtml_kses( $input['single_ad_url5'] );
 $input['single_mobile_ad_code1'] = $input['single_mobile_ad_code1'];
 $input['single_mobile_ad_image1'] = wp_filter_nohtml_kses( $input['single_mobile_ad_image1'] );
 $input['single_mobile_ad_url1'] = wp_filter_nohtml_kses( $input['single_mobile_ad_url1'] );
 $input['single_mobile_ad_code2'] = $input['single_mobile_ad_code2'];
 $input['single_mobile_ad_image2'] = wp_filter_nohtml_kses( $input['single_mobile_ad_image2'] );
 $input['single_mobile_ad_url2'] = wp_filter_nohtml_kses( $input['single_mobile_ad_url2'] );
 if ( ! isset( $input['single_ad_no_border5'] ) )
   $input['single_ad_no_border5'] = null;
   $input['single_ad_no_border5'] = ( $input['single_ad_no_border5'] == 1 ? 1 : 0 );

 // ヘッダーの設定
 $input['header_fix'] = wp_filter_nohtml_kses( $input['header_fix'] );
 $input['mobile_header_fix'] = wp_filter_nohtml_kses( $input['mobile_header_fix'] );
 $input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
 $input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );
 $input['insta_url'] = wp_filter_nohtml_kses( $input['insta_url'] );
 $input['pint_url'] = wp_filter_nohtml_kses( $input['pint_url'] );
 $input['mail_url'] = wp_filter_nohtml_kses( $input['mail_url'] );
 if ( ! isset( $input['show_rss'] ) )
   $input['show_rss'] = null;
   $input['show_rss'] = ( $input['show_rss'] == 1 ? 1 : 0 );
 $input['header_bg_color'] = wp_filter_nohtml_kses( $input['header_bg_color'] );
 $input['header_bg_opacity'] = wp_filter_nohtml_kses( $input['header_bg_opacity'] );
 $input['header_text_color'] = wp_filter_nohtml_kses( $input['header_text_color'] );
 $input['header_border_color'] = wp_filter_nohtml_kses( $input['header_border_color'] );

 // フッターのスライダーの設定
 if ( ! isset( $input['show_footer_slider'] ) )
   $input['show_footer_slider'] = null;
   $input['show_footer_slider'] = ( $input['show_footer_slider'] == 1 ? 1 : 0 );
 $input['footer_slider_headline'] = wp_filter_nohtml_kses( $input['footer_slider_headline'] );
 if ( ! isset( $value['footer_slider_post_type'] ) )
   $value['footer_slider_post_type'] = null;
 if ( ! array_key_exists( $value['footer_slider_post_type'], $post_type_options ) )
   $value['footer_slider_post_type'] = null;
 if ( ! isset( $value['footer_slider_num'] ) )
   $value['footer_slider_num'] = null;
 if ( ! array_key_exists( $value['footer_slider_num'], $footer_slider_num_options ) )
   $value['footer_slider_num'] = null;

 // スマホ用固定フッターバーの設定
 $footer_bar_btns = array();
 if ( isset( $input['repeater_footer_bar_btns'] ) ):
	 foreach ( (array)$input['repeater_footer_bar_btns'] as $key => $value ) {
	  $footer_bar_btns[] = array(
	   'type' => ( isset( $input['repeater_footer_bar_btns'][$key]['type'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['type'], $footer_bar_button_options ) ) ? $input['repeater_footer_bar_btns'][$key]['type'] : 'type1',
	   'label' => isset( $input['repeater_footer_bar_btns'][$key]['label'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['label'] ) : '',
	   'url' => isset( $input['repeater_footer_bar_btns'][$key]['url'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['url'] ) : '',
	   'number' => isset( $input['repeater_footer_bar_btns'][$key]['number'] ) ? wp_filter_nohtml_kses( $input['repeater_footer_bar_btns'][$key]['number'] ) : '',
	   'target' => ! empty( $input['repeater_footer_bar_btns'][$key]['target'] ) ? 1 : 0,
	   'icon' => ( isset( $input['repeater_footer_bar_btns'][$key]['icon'] ) && array_key_exists( $input['repeater_footer_bar_btns'][$key]['icon'], $footer_bar_icon_options ) ) ? $input['repeater_footer_bar_btns'][$key]['icon'] : 'file-text'
	  );
	 }
 endif;
 $input['footer_bar_btns'] = $footer_bar_btns;

	// 保護ページ
	$input['pw_label'] = wp_filter_nohtml_kses( $input['pw_label'] );
 	if ( ! isset( $input['pw_align'] ) ) $input['pw_align'] = null;
 	if ( ! array_key_exists( $input['pw_align'], $pw_align_options ) ) $input['pw_align'] = null;
	for ( $i = 1; $i <= 5; $i++ ) {
		$input['pw_name' . $i] = wp_filter_nohtml_kses( $input['pw_name' . $i] );
		if ( ! isset( $input['pw_btn_display' . $i] ) ) $input['pw_btn_display' . $i] = null;
		$input['pw_btn_display' . $i] = ( $input['pw_btn_display' . $i] == 1 ? 1 : 0 );
		$input['pw_btn_label' . $i] = wp_filter_nohtml_kses( $input['pw_btn_label' . $i] );
		$input['pw_btn_url' . $i] = wp_filter_nohtml_kses( $input['pw_btn_url' . $i] );
		if ( ! isset( $input['pw_btn_target' . $i] ) ) $input['pw_btn_target' . $i] = null;
		$input['pw_btn_display' . $i] = ( $input['pw_btn_display' . $i] == 1 ? 1 : 0 );
		$input['pw_editor' . $i] = $input['pw_editor' . $i];
	}

 return $input;

}


?>
