<?php
add_theme_support( 'custom-header' );
register_nav_menu( 'header-nav','Header' );
register_nav_menu( 'footer-nav','Footer' );
function update_profile_fields( $contactmethods ) {
    //項目の削除
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    //項目の追加
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';

    return $contactmethods;
}
add_filter('user_contactmethods','update_profile_fields',10,1);
/***********************************************************
* widget-area
***********************************************************/

add_action( 'widgets_init', 'wcct_widgets_init' );
register_sidebar(array(
     'name' => 'slider' ,
     'id' => 'topslider' ,
     'before_widget' => '<div class="metaslider">',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, array( 'center', 'center')  ); // デフォルト投稿サムネイルサイズ (切り出しモード)
}

///////////////////////////////////////
// テーマカスタマイザーにロゴアップロード設定機能追加
///////////////////////////////////////
define('LOGO_SECTION', 'logo_section'); //セクションIDの定数化
define('LOGO_IMAGE_URL', 'logo_image_url'); //セッティングIDの定数化
function themename_theme_customizer( $wp_customize ) {
 $wp_customize->add_section( LOGO_SECTION , array(
 'title' => 'ロゴ画像', //セクション名
 'priority' => 30, //カスタマイザー項目の表示順
 'description' => 'サイトのロゴ設定。', //セクションの説明
 ) );

 $wp_customize->add_setting( LOGO_IMAGE_URL );
 $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, LOGO_IMAGE_URL, array(
 'label' => 'ロゴ', //設定ラベル
 'section' => LOGO_SECTION, //セクションID
 'settings' => LOGO_IMAGE_URL, //セッティングID
 'description' => '画像をアップロードするとヘッダーにあるデフォルトのサイト名と入れ替わります。',
 ) ) );

}
add_action( 'customize_register', 'themename_theme_customizer' );//カスタマイザーに登録

//ロゴイメージURLの取得
function get_the_logo_image_url(){
 return esc_url( get_theme_mod( LOGO_IMAGE_URL ) );
}
