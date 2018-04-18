<?php
/**
 * Theme Customizer.
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function seos_photography_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	function seos_photography_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/kirki/' );
}
add_filter( 'kirki/config', 'seos_photography_kirki_configuration' );

/***********************************************************************************
 * Home Page Image
***********************************************************************************/	

		
		
/********** Home Page Image **********/
		
		$wp_customize->add_section( 'seos_photography_front_page_image' , array(
			'title'       => __( 'Home Page Image', 'seos-photography' ),
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'seos-photography' ),
			'priority'		=> 2,
		) );

		$wp_customize->add_setting( 'hide_home_image', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_home_image', array(
			'section'   => 'seos_photography_front_page_image',
			'label'     => 'Hide Home Page Image',
			'type'      => 'checkbox'
			 )
		);	
	 
		$wp_customize->add_setting( 'front_page_image', array (
			'default' => get_template_directory_uri() .'/images/header.jpg',
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'front_page_image', 
			array(
					'default-image' => get_template_directory_uri() . '/images/header.jpg',	
				'label'      => __( 'Image:', 'seos-photography' ),
				'description' => __( 'Load IMG from your media:', 'seos-photography' ),
				'section'    => 'seos_photography_front_page_image',
				'settings'   => 'front_page_image',
			) ) );


/********************************************
* Header Background
*********************************************/

		$wp_customize->add_setting('header_background_color1', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color1', array(
		'label' => __('Header Background', 'seos-photography'),        
		'section' => 'colors',
		'settings' => 'header_background_color1'
		)));
		
/***********************************************************************************
 * Home Page Buttons
***********************************************************************************/	

		
		$wp_customize->add_panel( 'seos_photography_buttons' , array(
			'title'       => __( 'Home Page Buttons', 'seos-photography' ),
			'priority'		=> 3,
		) );
		
/********** Button 1 **********/

		$wp_customize->add_setting( 'hide_buttn_1', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_buttn_1', array(
			'section'   => 'seos_photography_section_buttons',
			'label'     => 'Hide Button 1',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_section( 'seos_photography_section_buttons' , array(
			'title'       => __( 'Home Page Button 1', 'seos-photography' ),
			'panel' => 'seos_photography_buttons',
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'seos_photography_button_text1', array (
			'default' => 'Read More',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_button_text1', array(
			'label'    => __( 'Button Text 1:', 'seos-photography' ),
			'section'  => 'seos_photography_section_buttons',
			'description' => __( 'Add Text. The buttons will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_button_text1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'seos_photography_button_url1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_button_url1', array(
			'label'    => __( 'Button URL:', 'seos-photography' ),
			'section'  => 'seos_photography_section_buttons',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-photography' ),			
			'settings' => 'seos_photography_button_url1',
		) ) );
				
/********** Button 2 **********/

		$wp_customize->add_setting( 'hide_buttn_2', array(
		'default'        => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_buttn_2', array(
			'section'   => 'seos_photography_section_buttons2',
			'label'     => 'Hide Button 2',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_section( 'seos_photography_section_buttons2' , array(
			'title'       => __( 'Home Page Button 2', 'seos-photography' ),
			'panel' => 'seos_photography_buttons',
			'priority'		=> 3,
		) );
		
		$wp_customize->add_setting( 'seos_photography_button_text2', array (
			'default' => 'Read More',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_button_text2', array(
			'label'    => __( 'Button Text 2:', 'seos-photography' ),
			'section'  => 'seos_photography_section_buttons2',
			'description' => __( 'Add Text. The buttons will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_button_text2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'seos_photography_button_url2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_button_url2', array(
			'label'    => __( 'Button URL:', 'seos-photography' ),
			'section'  => 'seos_photography_section_buttons2',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-photography' ),			
			'settings' => 'seos_photography_button_url2',
		) ) );
		
/***********************************************************************************
 * Home Page Images
***********************************************************************************/	
		
		$wp_customize->add_panel( 'seos_photography_homa_image_panel' , array(
			'title'       => __( 'Home Page Photography', 'seos-photography' ),
			'description' => __( 'Select IMG and Recent News will be activated in your home page.', 'seos-photography' ),
			'priority'		=> 3,
		) );
		
		
/********** Image 1 **********/
		 
		$wp_customize->add_section( 'seos_photography_section_1' , array(
			'title'       => __( 'Image 1', 'seos-photography' ),
			'panel' => 'seos_photography_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'seos-photography' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_1', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_1', array(
			'section'   => 'seos_photography_section_1',
			'label'     => 'Hide Default Image 1',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'seos_photography_img1', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'seos_photography_img1', 
			array(
				'label'      => __( 'Image:', 'seos-photography' ),
				'description' => __( 'Load IMG from your media:', 'seos-photography' ),
				'section'    => 'seos_photography_section_1',
				'settings'   => 'seos_photography_img1',
			) ) );
			
		$wp_customize->add_setting( 'seos_photography_title1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_title1', array(
			'label'    => __( 'Image Title:', 'seos-photography' ),
			'section'  => 'seos_photography_section_1',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_title1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'seos_photography_text1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_text1', array(
			'label'    => __( 'Image Text:', 'seos-photography' ),
			'section'  => 'seos_photography_section_1',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_text1',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'seos_photography_url1', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_url1', array(
			'label'    => __( 'Image URL:', 'seos-photography' ),
			'section'  => 'seos_photography_section_1',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-photography' ),			
			'settings' => 'seos_photography_url1',
		) ) );
			
		
/********** Image 2 **********/
		
		$wp_customize->add_section( 'seos_photography_section_2' , array(
			'title'       => __( 'Image 2', 'seos-photography' ),
			'panel' => 'seos_photography_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'seos-photography' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_2', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_2', array(
			'section'   => 'seos_photography_section_2',
			'label'     => 'Hide Default Image 2',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'seos_photography_img2', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'seos_photography_img2', 
			array(
				'label'      => __( 'Image:', 'seos-photography' ),
				'description' => __( 'Load IMG from your media:', 'seos-photography' ),
				'section'    => 'seos_photography_section_2',
				'settings'   => 'seos_photography_img2',
			) ) );
			
		$wp_customize->add_setting( 'seos_photography_title2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_title2', array(
			'label'    => __( 'Image Title:', 'seos-photography' ),
			'section'  => 'seos_photography_section_2',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_title2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'seos_photography_text2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_text2', array(
			'label'    => __( 'Image Text:', 'seos-photography' ),
			'section'  => 'seos_photography_section_2',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_text2',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'seos_photography_url2', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_url2', array(
			'label'    => __( 'Image URL:', 'seos-photography' ),
			'section'  => 'seos_photography_section_2',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-photography' ),			
			'settings' => 'seos_photography_url2',
		) ) );
		
/********** Image 3 **********/
		
		$wp_customize->add_section( 'seos_photography_section_3' , array(
			'title'       => __( 'Image 3', 'seos-photography' ),
			'panel' => 'seos_photography_homa_image_panel',
			'description' => __( 'Select IMG. The image will be activated in your home page.', 'seos-photography' ),
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'hide_img_3', array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'hide_img_3', array(
			'section'   => 'seos_photography_section_3',
			'label'     => 'Hide Default Image 3',
			'type'      => 'checkbox'
			 )
		 );	
		 
		$wp_customize->add_setting( 'seos_photography_img3', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
			$wp_customize, 
			'seos_photography_img3', 
			array(
				'label'      => __( 'Image:', 'seos-photography' ),
				'description' => __( 'Load IMG from your media:', 'seos-photography' ),
				'section'    => 'seos_photography_section_3',
				'settings'   => 'seos_photography_img3',
			) ) );
			
		$wp_customize->add_setting( 'seos_photography_title3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_title3', array(
			'label'    => __( 'Image Title:', 'seos-photography' ),
			'section'  => 'seos_photography_section_3',
			'description' => __( 'The title of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_title3',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'seos_photography_text3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_text3', array(
			'label'    => __( 'Image Text:', 'seos-photography' ),
			'section'  => 'seos_photography_section_3',
			'description' => __( 'Content of your Image. Will be activated in your home page:', 'seos-photography' ),
			'settings' => 'seos_photography_text3',
			'type' => 'textarea',
		) ) );
			
		$wp_customize->add_setting( 'seos_photography_url3', array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'seos_photography_url3', array(
			'label'    => __( 'Image URL:', 'seos-photography' ),
			'section'  => 'seos_photography_section_3',
			'description' => __( 'Copy and paste the URL from your media:', 'seos-photography' ),			
			'settings' => 'seos_photography_url3',
		) ) );
		
		
/********** Images **********/

		for($i=4;$i<=36;$i++) {
		$wp_customize->add_section( 'seos_photography_section_'.$i , array(
			'title'       => __( '🔒 Image '.$i, 'seos-photography' ),
			'panel' => 'seos_photography_homa_image_panel',
			'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
			'priority'		=> 3,
		) );

		$wp_customize->add_setting( 'img'.$i, array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		 ) );

		$wp_customize->add_control( 'img'.$i, array(
			'section'   => 'seos_photography_section_'.$i,
			'label'     => 'Hide Default Image '.$i,
			'type'      => 'radio'
			 )
		 );	
			
		}
}
add_action( 'customize_register', 'seos_photography_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function seos_photography_customize_preview_js() {
	wp_enqueue_script( 'seos_photography_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'seos_photography_customize_preview_js' );


Kirki::add_panel( 'seos_photography_panel', array(
    'priority'    => 4,
    'title'       => __( 'Theme Options 🔒', 'seos-photography' ),
    'description' => __( 'Theme Options', 'seos-photography' ),
) );

/***********************************************
Testimonial Slider
************************************************/

Kirki::add_section( 'photography_8', array(
    'title'          => __( 'Testimonial Slider 🔒', 'seos-photography' ),
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_8'
) );

Kirki::add_field( 'options_8', array(
	'type'        => 'radio',
	'settings'    => 'options_8',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),		
	'section'     => 'photography_8',
) );

/**********************************************/

Kirki::add_section( 'section1', array(
    'title'          => __( 'Custom CSS 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'css_custom', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'css_custom', array(
	'type'        => 'radio',
	'settings'    => 'css_custom',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section1',
) );


/**********************************************/

Kirki::add_section( 'section2', array(
    'title'          => __( 'Disable All Comments 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option2', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option2', array(
	'type'        => 'radio',
	'settings'    => 'option2',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section2',
) );


/**********************************************/

Kirki::add_section( 'section3', array(
    'title'          => __( 'Hide Content and Sidebar Home Page 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option3', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option3', array(
	'type'        => 'radio',
	'settings'    => 'option3',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section3',
) );


/**********************************************/

Kirki::add_section( 'section5', array(
    'title'          => __( 'Hide All Page and Post Titles 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option5', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option5', array(
	'type'        => 'radio',
	'settings'    => 'option5',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section5',
) );


/**********************************************/

Kirki::add_section( 'section6', array(
    'title'          => __( 'All Google Fonts 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option6', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option6', array(
	'type'        => 'radio',
	'settings'    => 'option6',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section6',
) );


/**********************************************/

Kirki::add_section( 'section7', array(
    'title'          => __( 'Mobile Call Now 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option7', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option7', array(
	'type'        => 'radio',
	'settings'    => 'option7',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section7',
) );

/**********************************************/

Kirki::add_section( 'section8', array(
    'title'          => __( 'Read More Button Options 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'option8', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'option8', array(
	'type'        => 'radio',
	'settings'    => 'option8',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'section8',
) );

/***********************************************
Panel Animations
************************************************/

Kirki::add_panel( 'seos_photography_panel_animations', array(
    'priority'    => 5,
    'title'       => __( 'Animations 🔒', 'seos-photography' ),
    'description' => __( 'Animations', 'seos-photography' ),
) );

/**********************************************/

Kirki::add_section( 'animation1', array(
    'title'          => __( 'Sub Menu Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani1', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani1', array(
	'type'        => 'radio',
	'settings'    => 'ani1',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation1',
) );


/**********************************************/

Kirki::add_section( 'animation2', array(
    'title'          => __( 'Site Title Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani2', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani2', array(
	'type'        => 'radio',
	'settings'    => 'ani2',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation2',
) );

/**********************************************/

Kirki::add_section( 'animation3', array(
    'title'          => __( 'Home Page Button 1 Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani3', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani3', array(
	'type'        => 'radio',
	'settings'    => 'ani3',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation3',
) );

/**********************************************/

Kirki::add_section( 'animation4', array(
    'title'          => __( 'Home Page Button 2 Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani4', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani4', array(
	'type'        => 'radio',
	'settings'    => 'ani4',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation4',
) );

/**********************************************/

Kirki::add_section( 'animation5', array(
    'title'          => __( 'Home Page Photography Animation 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani5', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani5', array(
	'type'        => 'radio',
	'settings'    => 'ani5',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation5',
) );

/**********************************************/

Kirki::add_section( 'animation6', array(
    'title'          => __( 'About US Post Type Animation 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani6', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani6', array(
	'type'        => 'radio',
	'settings'    => 'ani6',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation6',
) );

/**********************************************/

Kirki::add_section( 'animation7', array(
    'title'          => __( 'Photography Post Type Animation 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani7', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani7', array(
	'type'        => 'radio',
	'settings'    => 'ani7',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation7',
) );

/**********************************************/

Kirki::add_section( 'animation8', array(
    'title'          => __( 'Sidebar Animation 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani8', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani8', array(
	'type'        => 'radio',
	'settings'    => 'ani8',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation8',
) );

/**********************************************/

Kirki::add_section( 'animation9', array(
    'title'          => __( 'Content Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani9', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani9', array(
	'type'        => 'radio',
	'settings'    => 'ani9',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation9',
) );

/**********************************************/

Kirki::add_section( 'animation10', array(
    'title'          => __( 'Footer Animations 🔒', 'seos-photography' ),
    'panel'          => 'seos_photography_panel_animations', // Not typically needed.
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'ani10', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'ani10', array(
	'type'        => 'radio',
	'settings'    => 'ani10',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'animation10',
) );


/***********************************************
WooCommerce Options
************************************************/

Kirki::add_section( 'woo_options', array(
    'title'          => __( 'WooCommerce Options 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'woo1'
) );

Kirki::add_field( 'woo1', array(
	'type'        => 'radio',
	'settings'    => 'woo1',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'woo_options',
) );

/***********************************************
Social Icons
************************************************/

Kirki::add_section( 'social_icons', array(
    'title'          => __( 'Social Icons 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'woo1'
) );

Kirki::add_field( 'woo1', array(
	'type'        => 'radio',
	'settings'    => 'woo1',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'social_icons',
) );

/***********************************************
Photography Custom Post Type
************************************************/

Kirki::add_section( 'photography_1', array(
    'title'          => __( 'Photography Custom Post Type 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_1'
) );

Kirki::add_field( 'options_1', array(
	'type'        => 'radio',
	'settings'    => 'options_1',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'photography_1',
) );

/***********************************************
About US Custom Post Type
************************************************/

Kirki::add_section( 'photography_2', array(
    'title'          => __( 'About US Custom Post Type 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_2'
) );

Kirki::add_field( 'options_2', array(
	'type'        => 'radio',
	'settings'    => 'options_2',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'photography_2',
) );

/***********************************************
Header Options
************************************************/

Kirki::add_section( 'seos_photography_kirki_section7', array(
    'title'          => __( 'Header Options', 'seos-photography' ),
    'description'    => __( 'Header Options', 'seos-photography' ),
    'priority'       => 55,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_config( 'header_logo_image', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'header_logo_image', array(
	'type'        => 'image',
	'settings'    => 'header_logo_image',
	'label'       => __( 'Header Logo', 'seos-photography' ),
	'description' => __( 'Add Logo', 'seos-photography' ),
	'section'     => 'seos_photography_kirki_section7',
	'default'     => '',
	'priority'    => 10,
) );

Kirki::add_config( 'overlay', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'overlay', array(
	'type'        => 'switch',
	'settings'    => 'overlay',
	'label'       => __( 'Hide Overlay', 'seos-photography' ),
	'section'     => 'seos_photography_kirki_section7',
	'default'     => ' ',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'ON', 'seos-photography' ),
		'' => esc_attr__( 'OFF', 'seos-photography' ),
	),
) );

Kirki::add_config( 'hide_header', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'hide_header', array(
	'type'        => 'switch',
	'settings'    => 'hide_header',
	'label'       => __( 'Hide Header', 'seos-photography' ),
	'section'     => 'seos_photography_kirki_section7',
	'default'     => ' ',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'ON', 'seos-photography' ),
		'' => esc_attr__( 'OFF', 'seos-photography' ),
	),
) );


Kirki::add_config( 'title_font_size', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'title_font_size', array(
	'type'        => 'number',
	'settings'    => 'title_font_size',
	'label'       => esc_attr__( 'Title Font Size', 'seos-photography' ),
	'section'     => 'seos_photography_kirki_section7',
	'default'     => 42,
	'choices'     => array(
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	),
) );

Kirki::add_config( 'description_font_size', array(
	'capability'	=> 'edit_theme_options'
) );

Kirki::add_field( 'description_font_size', array(
	'type'        => 'number',
	'settings'    => 'description_font_size',
	'label'       => esc_attr__( 'Description Font Size', 'seos-photography' ),
	'section'     => 'seos_photography_kirki_section7',
	'default'     => 13,
	'choices'     => array(
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	),
) );


/***********************************************
Sidebar Options
************************************************/

Kirki::add_section( 'photography_5', array(
    'title'          => __( 'Sidebar Options 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_5'
) );

Kirki::add_field( 'options_5', array(
	'type'        => 'radio',
	'settings'    => 'options_5',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'photography_5',
) );

/***********************************************
Footer Options
************************************************/

Kirki::add_section( 'photography_6', array(
    'title'          => __( 'Footer Options 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_6'
) );

Kirki::add_field( 'options_6', array(
	'type'        => 'radio',
	'settings'    => 'options_6',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'photography_6',
) );

/***********************************************
Back To Top Button Options
************************************************/

Kirki::add_section( 'photography_7', array(
    'title'          => __( 'Back To Top Button Options 🔒', 'seos-photography' ),
    'priority'       => 7,
    'capability'     => 'edit_theme_options',
) );

Kirki::add_config( 'seos_display_woo_cart', array(
	'capability'	=> 'options_7'
) );

Kirki::add_field( 'options_7', array(
	'type'        => 'radio',
	'settings'    => 'options_7',
    'description'    => __( '<a target="_blank" href="http://seosthemes.info/seos-photography-wordpress-theme/">Preview Pro Version</a>', 'seos-photography' ),	
	'section'     => 'photography_7',
) );



/*****************************************************
Styles
*****************************************************/

	function seos_photography_styles() { ?>
		<style>	
			<?php if(get_theme_mod('header_background_color1')) { ?> .header-back { background: <?php echo get_theme_mod('header_background_color1'); ?>;} <?php } ?>
			<?php if(get_theme_mod('hide_header')) { ?> header .header-img { display: none !important;} <?php } ?>
			<?php if(get_theme_mod('overlay')) { ?> .dotted { background-image: none !important;} <?php } ?>
			<?php if(get_theme_mod('title_font_size')) { ?> header .header-img .site-title a, header .site-branding .site-title { font-size: <?php echo get_theme_mod('title_font_size'); ?>px !important; } <?php } ?>
			<?php if(get_theme_mod('description_font_size')) { ?> header .header-img .site-description, header  .site-branding .site-description { font-size: <?php echo get_theme_mod('description_font_size'); ?>px !important; } <?php } ?>

			<?php if ( is_front_page() && is_home()) { ?>
				<?php if(get_theme_mod('seos_photography_hide_conten_home')) { ?> .site-content { display: none !important; } <?php } ?>
			<?php } ?>
			


			
		</style> 
	<?php }
	add_action('wp_head','seos_photography_styles');
	
/**************************************
Sidebar Options
**************************************/

if(get_theme_mod('sidebar_width')) {
	

	function seos_photography_sidebar_width () { 
	$seos_content_width = 96;
	$seos_photography_sidebar_width = get_theme_mod('sidebar_width');
	$dark_sidebar_sum = $seos_content_width - $seos_photography_sidebar_width;

	?>
		<style>
			#content aside {width: <?php echo get_theme_mod('sidebar_width'); ?>%;}
			#content main {width: <?php echo $dark_sidebar_sum; ?>%;}
		</style>
		
	<?php }

	add_action('wp_head','seos_photography_sidebar_width');
	
}