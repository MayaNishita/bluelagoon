<?php
/**
 * video functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Video
 */


/*********************************************************************************************************
* Basics
**********************************************************************************************************/

if ( ! function_exists( 'seos_photography_setup' ) ) :

function seos_photography_setup() {

	load_theme_textdomain( 'seos-photography', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
			
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'seos-photography' ),
	) );
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'seos_photography_custom_background_args', array(
		'default-color' => '',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'seos_photography_setup' );
	
function seos_photography_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seos_photography_content_width', 640 );
}
add_action( 'after_setup_theme', 'seos_photography_content_width', 0 );

/**
 * Register widget area.
 */
function seos_photography_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'seos-photography' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'seos-photography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		
}

add_action( 'widgets_init', 'seos_photography_widgets_init' );

/************************** Includes ******************************/

		require get_template_directory() . '/kirki/kirki.php';
		require get_template_directory() . '/inc/custom-header.php';
		require get_template_directory() . '/inc/template-tags.php';
		require get_template_directory() . '/inc/extras.php';
		require get_template_directory() . '/inc/customizer.php';
		require get_template_directory() . '/inc/jetpack.php';
		require get_template_directory() . '/js/viewportchecker.php';
		require get_template_directory() . '/inc/functions-header.php';
	
/**
 * Enqueue scripts and styles.
 */
function seos_photography_scripts() {
	wp_enqueue_style( 'seos-photography-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery');
	
	wp_enqueue_style( 'seos_photography_animation_menu', get_template_directory_uri() . '/css/flipInX.css');
	
	wp_enqueue_style( 'seos_photography_animata_css', get_template_directory_uri() . '/css/animate.css');
	
	wp_enqueue_style( 'seos_scroll_css', get_template_directory_uri() . '/css/scroll-effect.css');

	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js');
	
	wp_enqueue_script( 'seos-photography-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_style( 'seos-photography-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
		
	wp_enqueue_script( 'seos-photography-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'seos-photography-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
			
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'seos_photography_scripts' );


function seos_photography_admin_scripts() {

	wp_enqueue_style( 'seos_photography_admin', get_template_directory_uri() . '/css/admin.css');

}

add_action( 'admin_enqueue_scripts', 'seos_photography_admin_scripts' );


/*********************************************************************************************************
* Excerpt
**********************************************************************************************************/
	
function seos_photography_excerpt_more( $seos_photography_link ) {
	if ( is_admin() ) {
		return $seos_photography_link;
	}

	$seos_photography_link = sprintf( '<p class="link-more"><a href="%1$s" class="read-more">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'seos-photography' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $seos_photography_link;
}
add_filter( 'excerpt_more', 'seos_photography_excerpt_more' );


/***********************************************************************************
 * SEOS Photography Buy
***********************************************************************************/

		function seos_photography_support($wp_customize){
			class Seos_Business_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos_photography-info"> 
					<div class="button media-button button-primary button-large media-button-select">
						<a style="color: #fff;" href="<?php echo esc_url( 'https://seosthemes.com/free-wordpress-photography-theme/' ); ?>" title="<?php esc_attr_e( 'Update Pro', 'seos-photography' ); ?>" target="_blank">
						<?php _e( 'SEOS Photography Update Pro', 'seos-photography' ); ?>
						</a>
					</div>
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'seos_photography_support');

		function customize_styles_seos_photography( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-section-seos_photography_buy_section .accordion-section-title,
				#customize-theme-controls #accordion-section-seos_photography_buy_section > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.seos_photography-info button a {
					color: #FFFFFF;
				}	
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'customize_styles_seos_photography');

		if ( ! function_exists( 'seos_photography_buy' ) ) :
			function seos_photography_buy( $wp_customize ) {
			$wp_customize->add_section( 'seos_photography_buy_section', array(
				'title'			=> __('SEOS  Photography Update Pro', 'seos-photography'),
				'description'	=> __('	Learn more about SEOS  Photography. ','seos-photography'),
				'priority'		=> 1,
			));
			$wp_customize->add_setting( 'seos_photography_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Seos_Business_Customize(
					$wp_customize,'seos_photography_setting', array(
						'label'		=> __('SEOS  Photography Update Pro', 'seos-photography'),
						'section'	=> 'seos_photography_buy_section',
						'settings'	=> 'seos_photography_setting',
					)
				)
			);
		}
		endif;
		 
		add_action('customize_register', 'seos_photography_buy');