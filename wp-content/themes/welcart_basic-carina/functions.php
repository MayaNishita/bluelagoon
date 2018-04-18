<?php

if ( !defined('USCES_VERSION') ) return;

/***********************************************************
* includes
***********************************************************/
require( dirname( __FILE__ ) . '/inc/theme-customizer.php' );
require( get_stylesheet_directory() . '/inc/front-customized.php' );
require( get_stylesheet_directory() . '/inc/term-customized.php' );

/***********************************************************
* welcart_setup
***********************************************************/
function wcct_setup() {
	load_child_theme_textdomain( 'welcart_basic_carina', get_stylesheet_directory() . '/languages' );

	register_default_headers( array(
		'wcct-default'	=> array(
			'url'			=> '%2$s/images/image-top.jpg',
			'thumbnail_url'	=> '%2$s/images/image-top.jpg',
		)
	) );

	add_theme_support('post-thumbnails');

	add_theme_support( 'custom-background', array(
		'default-color' => 'fff',
		'default-image' => get_stylesheet_directory_uri(). '/images/carina-bg.gif',
	) );

}
add_action( 'after_setup_theme', 'wcct_setup' );

/***********************************************************
* Custom Header
***********************************************************/
function wcct_custom_header_args( $array ) {
	$array['default-image']	= get_stylesheet_directory_uri(). '/images/image-top.jpg';
	$array['width']			= '2000';
	$array['height']		= '850';
	
	return $array;
}
add_filter( 'welcart_basic_custom_header_args', 'wcct_custom_header_args' );

/***********************************************************
* Theme Version
***********************************************************/
function wcct_version(){
	$theme		= wp_get_theme( 'welcart_basic-carina' );
	$theme_ver	= !empty($theme) ? $theme->get('Version') : '0';
	$theme_name	= !empty($theme) ? $theme->get('Name') : '';
	echo "<!-- {$theme_name} : v{$theme_ver} -->\n";
}
add_action( 'wp_footer', 'wcct_version', 11 );

/***********************************************************
* widget-area
***********************************************************/
function wcct_widgets_init() {
	register_sidebar( array(
		'name'			=> __( 'Widget area under the category list', 'welcart_basic_carina' ),
		'id'			=> 'carina-top',
		'description'	=> __( 'You can display the widget under the category list. Please use to display the banner and product list.', 'welcart_basic_carina' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget_title">',
		'after_title'	=> '</h2>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Widget area under the item list', 'welcart_basic_carina' ),
		'id'			=> 'carina-middle',
		'description'	=> __( 'You can display the widget under the item list. Please use to display the banner and product list.', 'welcart_basic_carina' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget_title">',
		'after_title'	=> '</h2>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Widget area under the post list', 'welcart_basic_carina' ),
		'id'			=> 'carina-bottom',
		'description'	=> __( 'You can display the widget under the post list. Please use to display the banner and product list.', 'welcart_basic_carina' ),
		'before_widget'	=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget_title">',
		'after_title'	=> '</h2>',
	) );
}
/***********************************************************
* meta slider widget-area 追記したエリア
***********************************************************/
add_action( 'widgets_init', 'wcct_widgets_init' );
register_sidebar(array(
     'name' => 'metaslider' ,
     'id' => 'topslider' ,
     'before_widget' => '<div class="metaslider">',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
/***********************************************************
* wp_enqueue_scripts
***********************************************************/
function wcct_enqueue_styles() {
	global $usces, $is_IE;
	
	$template_dir = get_template_directory_uri();
	$stylesheet_dir = get_stylesheet_directory_uri();

	wp_enqueue_style( 'parent-style', $template_dir . '/style.css' );
	wp_enqueue_style( 'parent-welcart-style', $template_dir . '/usces_cart.css', array(), '1.0' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Quattrocento+Sans|Parisienne', array() );

	if( defined( 'WCEX_MSA_VERSION' ) ) {
		wp_enqueue_style( 'parent-msa', $template_dir . '/wcex_multi_shipping.css', array('msa_style'), WCEX_MSA_VERSION, false );	
	}
	if( defined( 'WCEX_ORDER_LIST_WIDGET' ) ) {
		wp_enqueue_style( 'parent-olwidget', $template_dir . '/wcex_olwidget.css', array(), '1.0');	
	}
	if( defined( 'WCEX_WIDGET_CART' ) ) {
		wp_enqueue_style( 'parent-widget_cart', $template_dir . '/wcex_widget_cart.css', array(), '1.0');
	}
	if( defined( 'WCEX_SLIDE_SHOWCASE' ) ) {
		wp_enqueue_style( 'parent-slide_showcase', $template_dir . '/slide_showcase.css', array(), '1.0');
	}
	if( defined( 'WCEX_AUTO_DELIVERY' ) ) {
		wp_enqueue_style( 'parent-auto_delivery', $template_dir . '/auto_delivery.css', array(), '1.0');
	}
	if( defined( 'WCEX_SKU_SELECT' ) ) {
		wp_enqueue_style( 'parent-sku_select', $template_dir . '/wcex_sku_select.css', array(), '1.0');
	}
	
	if( defined('WCEX_POPLINK') && welcart_basic_is_poplink_page() ) {
		wp_enqueue_style( 'wcct_poplink', $stylesheet_dir . '/css/poplink.css', array('wc_basic_poplink'), '1.0' );
	}
	
	wp_enqueue_script( 'wcct-customized', $stylesheet_dir . '/js/wcct-customized.js', array(), '1.0' );
	wp_enqueue_script( 'wcct-menu', $stylesheet_dir . '/js/wcct-menu.js', array(), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'wcct_enqueue_styles' , 9 );

/***********************************************************
* excerpt
***********************************************************/
remove_filter( 'the_excerpt', 'wpautop' );

function wcct_the_excerpt( $postContent ) {
	if( is_home() || is_front_page() ) {
		$postContent = wp_trim_words( $postContent, 100 );
	}
	
	return $postContent;
}
add_filter( 'the_excerpt', 'wcct_the_excerpt' );

function wcct_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wcct_excerpt_more' );

/***********************************************************
* 追記新商品スライダー
***********************************************************/

function slider_scripts(){
wp_enqueue_script( 'slider', get_template_directory_uri() .'/slider.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'slider_scripts' );
