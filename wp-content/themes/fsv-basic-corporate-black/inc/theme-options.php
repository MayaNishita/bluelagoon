<?php
/**
 * FSV BASIC Theme Options
 *
 * @package WordPress
 * @subpackage FSV BASIC
 * @since FSV BASIC 1.1
 */

/**
 * Register the form setting for our fsvbasic_options array.
 * This function is attached to the admin_init action hook.
 *
 * @since FSV BASIC 1.0
 */
function fsvbasic_theme_options_init() {

	register_setting(
		'fsvbasic_options',       // Options group
		'fsvbasic_theme_options', // Database option, see fsvbasic_get_theme_options()
		'fsvbasic_theme_options_validate' // The sanitization callback, see fsvbasic_theme_options_validate()
	);

}
add_action( 'admin_init', 'fsvbasic_theme_options_init' );

/**
 * Change the capability required to save the 'fsvbasic_options' options group.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function fsvbasic_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_fsvbasic_options', 'fsvbasic_option_page_capability' );

/**
 * Return an array of color schemes registered for FSV BASIC.
 *
 * @since FSV BASIC 1.0
 */
/*function fsvbasic_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' => 'light',
			'label' => __( 'Light', 'fsvbasic' ),
		),
		'dark' => array(
			'value' => 'dark',
			'label' => __( 'Dark', 'fsvbasic' ),
		),
		'pastel' => array(
			'value' => 'pastel',
			'label' => __( 'Pastel', 'fsvbasic' ),
		),
	);

	return apply_filters( 'fsvbasic_color_schemes', $color_scheme_options );
}*/

/**
 * Return the default options for FSV BASIC.
 *
 * @return array An array of default theme options.
 *
 * @since FSV BASIC 1.1
 */
function fsvbasic_get_default_theme_options() {

	$default_theme_options = array(
		/* 'color_scheme' => 'light',*/
		'header_logo' => '',
		'link_sitemap' => 'http://',
		'link_contact' => 'mailto:',
		'head_large_text' => 'TEL:0120-00-0000',
		'head_text' => 'texttexttexttexttext',
		// 'head_text2' => 'light',

		'slide1_url' => '#',
		'slide1_pic' => get_template_directory_uri() . '/images/header_001.jpg',
		'slide1_cap' => 'slide1 caption',
		'slide2_url' => '#',
		'slide2_pic' => get_template_directory_uri() . '/images/header_002.jpg',
		'slide2_cap' => 'slide2 caption',

		'slide3_url' => '#',
		'slide3_pic' => get_template_directory_uri() . '/images/header_003.jpg',
		'slide3_cap' => 'slide3 caption',

		'slide4_url' => '#',
		'slide4_pic' => get_template_directory_uri() . '/images/header_004.jpg',
		'slide4_cap' => 'slide4 caption',

		'slide5_url' => '#',
		'slide5_pic' => get_template_directory_uri() . '/images/header_005.jpg',
		'slide5_cap' => 'slide5 caption',

		'welcome_title' => 'Welcome Title',
		'welcome_text' => 'Welcome To Our Site!',

		'foot_text' => 'Copyright',
	);

	return apply_filters( 'fsvbasic_default_theme_options', $default_theme_options );
}

/**
 * Return the options array for FSV BASIC.
 *
 * @since FSV BASIC 1.0
 */
function fsvbasic_get_theme_options() {
	return get_option( 'fsvbasic_corporate_black_theme_options', fsvbasic_get_default_theme_options() );
}

/**
 * Sanitize and validate form input.
 *
 * @see fsvbasic_theme_options_init()
 * @todo set up Reset Options action
 *
 * @since FSV BASIC 1.0
 */
function fsvbasic_theme_options_validate( $input ) {

	$output = $defaults = fsvbasic_get_default_theme_options();

	// Color scheme must be in our array of color scheme options
	/*if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], fsvbasic_color_schemes() ) )
		$output['color_scheme'] = $input['color_scheme'];*/

	$output['header_logo'] = $input['header_logo'];

	$output['link_sitemap'] = $input['link_sitemap'];
	$output['link_contact'] = $input['link_contact'];
	$output['head_large_text'] = $input['head_large_text'];
	$output['head_text'] = $input['head_text'];
	// $output['head_text2'] = $input['head_text2'];


	$output['slide1_url'] = $input['slide1_url'];
	$output['slide1_pic'] = $input['slide1_pic'];
	$output['slide1_cap'] = $input['slide1_cap'];

	$output['slide2_url'] = $input['slide2_url'];
	$output['slide2_pic'] = $input['slide2_pic'];
	$output['slide2_cap'] = $input['slide2_cap'];

	$output['slide3_url'] = $input['slide3_url'];
	$output['slide3_pic'] = $input['slide3_pic'];
	$output['slide3_cap'] = $input['slide3_cap'];

	$output['slide4_url'] = $input['slide4_url'];
	$output['slide4_pic'] = $input['slide4_pic'];
	$output['slide4_cap'] = $input['slide4_cap'];

	$output['slide5_url'] = $input['slide5_url'];
	$output['slide5_pic'] = $input['slide5_pic'];
	$output['slide5_cap'] = $input['slide5_cap'];

	$output['welcome_title'] = $input['welcome_title'];
	$output['welcome_text'] = $input['welcome_text'];

	$output['foot_text'] = $input['foot_text'];

	return apply_filters( 'fsvbasic_theme_options_validate', $output, $input, $defaults );
}

/**
 * Enqueue the styles for the current color scheme.
 *
 * @since FSV BASIC 1.0
 */
/*function fsvbasic_enqueue_color_scheme() {
	$options = fsvbasic_get_theme_options();
	$color_scheme = $options['color_scheme'];

	if ( 'dark' == $color_scheme ) :

		wp_enqueue_style( 'dark', get_template_directory_uri() . '/css/dark.css', array(), null );

	elseif ( 'pastel' == $color_scheme ) :

		wp_enqueue_style( 'pastel', get_template_directory_uri() . '/css/pastel.css', array(), null );

	endif;

	do_action( 'fsvbasic_enqueue_color_scheme', $color_scheme );
}
add_action( 'wp_enqueue_scripts', 'fsvbasic_enqueue_color_scheme' );*/

/**
 * Register postMessage support.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 *
 * @since FSV BASIC 1.1
 */
function fsvbasic_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$options  = fsvbasic_get_theme_options();
	$defaults = fsvbasic_get_default_theme_options();

	// This function will be implemented in the future.

	/* $wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[color_scheme]', array(
		'default'    => $defaults['color_scheme'],
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	) );

	$schemes = fsvbasic_color_schemes();
	$choices = array();

	foreach ( $schemes as $scheme ) {
		$choices[ $scheme['value'] ] = $scheme['label'];
	}

	$wp_customize->add_control( 'fsvbasic_color_scheme', array(
		'label'    => __( 'Color Scheme', 'fsvbasic' ),
		'section'  => 'colors',
		'settings' => 'fsvbasic_corporate_black_theme_options[color_scheme]',
		'type'     => 'radio',
		'choices'  => $choices,
		'priority' => 5,
	) ); */

	// Header Logo Setting - Add Section
	$wp_customize->add_section( 'fsvbasic_header_logo' , array(
		'title'		=> __( 'Logo', 'fsvbasic' ),
		'priority'	=> 80,
	) );

	// Header Logo Setting - Header Logo Image Control
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[header_logo]' , array(
		'default'   => '',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_header_logo', array(
		'label'		=> __('Image Logo','fsvbasic'),
		'section'	=> 'fsvbasic_header_logo',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[header_logo]',
	) ) );


	// Header Text Area - Add Section
	$wp_customize->add_section( 'fsvbasic_header_settings' , array(
		'title'    => __( 'Header Text Area', 'fsvbasic' ),
		'priority' => 81,
	) );

	// Header Text Area - Link Sitemap
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[link_sitemap]' , array(
		'default'   => 'http://',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_link_sitemap' , array(
		'label'    => __('Header Sitemap Link URL', 'fsvbasic'),
		'section'  => 'fsvbasic_header_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[link_sitemap]',
		'type'     => 'text',
		'priority' => 1,
	) );

	// Header Text Area - Link Contact
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[link_contact]' , array(
		'default'   => 'mailto:',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_link_contact' , array(
		'label'    => __('Contact Page Link URL', 'fsvbasic'),
		'section'  => 'fsvbasic_header_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[link_contact]',
		'type'     => 'text',
		'priority' => 2,
	) );

	// Header Text Area - Large Text
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[head_large_text]' , array(
		'default'   => 'TEL:0120-00-0000',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'fsvbasic_text_sanitize',
	) );

	$wp_customize->add_control( 'fsvbasic_head_large_text' , array(
		'label'    => __('Header Information Text (Large Size)', 'fsvbasic'),
		'section'  => 'fsvbasic_header_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[head_large_text]',
		'type'     => 'text',
		'priority' => 3,
	) );

	// Header Text Area - Normal Text
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[head_text]' , array(
		'default'   => 'texttexttexttexttext',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'fsvbasic_text_sanitize',
	) );

	$wp_customize->add_control( 'fsvbasic_head_text' , array(
		'label'    => __('Header Information Text (Small Size)', 'fsvbasic'),
		'section'  => 'fsvbasic_header_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[head_text]',
		'type'     => 'text',
		'priority' => 4,
	) );

	// Slide Settings - Add Section
	$wp_customize->add_section( 'fsvbasic_slide_settings' , array(
		'title'    => __( 'Slide Settings', 'fsvbasic' ),
		'priority' => 83,
	) );

	// Slide Settings - Slide 1 URL
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide1_url]' , array(
		'default'   => '#',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_slide1_url' , array(
		'label'    => __( 'Slide1 Link URL', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide1_url]',
		'type'     => 'text',
		'priority' => 2,
	) );

	// Slide Settings - Slide 1 Picture
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide1_pic]' , array(
		'default'   => get_template_directory_uri() . '/images/header_001.jpg',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_slide1_pic', array(
		'label'		=> __( 'Slide1 Picture','fsvbasic' ),
		'section'	=> 'fsvbasic_slide_settings',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[slide1_pic]',
		'priority' => 1,
	) ) );

	// Slide Settings - Slide 1 Caption
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide1_cap]' , array(
		'default'   => 'slide1 caption',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_slide1_cap' , array(
		'label'    => __( 'Slide1 Caption', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide1_cap]',
		'type'     => 'text',
		'priority' => 3,
	) );

	// Slide Settings - Slide 2 URL
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide2_url]' , array(
		'default'   => '#',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_slide2_url' , array(
		'label'    => __( 'Slide2 Link URL', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide2_url]',
		'type'     => 'text',
		'priority' => 5,
	) );

	// Slide Settings - Slide 2 Picture
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide2_pic]' , array(
		'default'   => get_template_directory_uri() . '/images/header_002.jpg',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_slide2_pic', array(
		'label'		=> __( 'Slide2 Picture','fsvbasic' ),
		'section'	=> 'fsvbasic_slide_settings',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[slide2_pic]',
		'priority' => 4,
	) ) );

	// Slide Settings - Slide 2 Caption
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide2_cap]' , array(
		'default'   => 'slide2 caption',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_slide2_cap' , array(
		'label'    => __( 'Slide2 Caption', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide2_cap]',
		'type'     => 'text',
		'priority' => 6,
	) );

	// Slide Settings - Slide 3 URL
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide3_url]' , array(
		'default'   => '#',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_slide3_url' , array(
		'label'    => __( 'Slide3 Link URL', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide3_url]',
		'type'     => 'text',
		'priority' => 8,
	) );

	// Slide Settings - Slide 3 Picture
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide3_pic]' , array(
		'default'   => get_template_directory_uri() . '/images/header_003.jpg',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_slide3_pic', array(
		'label'		=> __( 'Slide3 Picture','fsvbasic' ),
		'section'	=> 'fsvbasic_slide_settings',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[slide3_pic]',
		'priority' => 7,
	) ) );

	// Slide Settings - Slide 3 Caption
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide3_cap]' , array(
		'default'   => 'slide3 caption',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_slide3_cap' , array(
		'label'    => __( 'Slide3 Caption', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide3_cap]',
		'type'     => 'text',
		'priority' => 9,
	) );

	// Slide Settings - Slide 4 URL
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide4_url]' , array(
		'default'   => '#',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_slide4_url' , array(
		'label'    => __( 'Slide4 Link URL', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide4_url]',
		'type'     => 'text',
		'priority' => 11,
	) );

	// Slide Settings - Slide 4 Picture
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide4_pic]' , array(
		'default'   => get_template_directory_uri() . '/images/header_004.jpg',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_slide4_pic', array(
		'label'		=> __( 'Slide4 Picture','fsvbasic' ),
		'section'	=> 'fsvbasic_slide_settings',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[slide4_pic]',
		'priority' => 10,
	) ) );

	// Slide Settings - Slide 4 Caption
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide4_cap]' , array(
		'default'   => 'slide4 caption',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_slide4_cap' , array(
		'label'    => __( 'Slide4 Caption', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide4_cap]',
		'type'     => 'text',
		'priority' => 12,
	) );

	// Slide Settings - Slide 5 URL
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide5_url]' , array(
		'default'   => '#',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'fsvbasic_slide5_url' , array(
		'label'    => __( 'Slide5 Link URL', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide5_url]',
		'type'     => 'text',
		'priority' => 14,
	) );

	// Slide Settings - Slide 5 Picture
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide5_pic]' , array(
		'default'   => get_template_directory_uri() . '/images/header_005.jpg',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fsvbasic_slide5_pic', array(
		'label'		=> __( 'Slide5 Picture','fsvbasic' ),
		'section'	=> 'fsvbasic_slide_settings',
		'settings'	=> 'fsvbasic_corporate_black_theme_options[slide5_pic]',
		'priority' => 13,
	) ) );

	// Slide Settings - Slide 5 Caption
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[slide5_cap]' , array(
		'default'   => 'slide5 caption',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_slide5_cap' , array(
		'label'    => __( 'Slide5 Caption', 'fsvbasic' ),
		'section'  => 'fsvbasic_slide_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[slide5_cap]',
		'type'     => 'text',
		'priority' => 15,
	) );


	// Welcome Message Area Component - Add Section
	$wp_customize->add_section( 'fsvbasic_welcome_settings' , array(
		'title'    => __( 'Welcome Message', 'fsvbasic' ),
		'priority' => 84,
	) );

	// Welcome Message Component - Title
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[welcome_title]' , array(
		'default'   => 'Welcome Title',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( 'fsvbasic_welcome_title' , array(
		'label'    => __('Welcome Message Title', 'fsvbasic'),
		'section'  => 'fsvbasic_welcome_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[welcome_title]',
		'type'     => 'text',
		'priority' => 1,
	) );

	// Welcome Message Component - Message Text
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[welcome_text]' , array(
		'default'   => 'Welcome To Our Site!',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'fsvbasic_text_sanitize',
	) );

	$wp_customize->add_control( 'fsvbasic_welcome_text' , array(
		'label'    => __('Welcome Message Text', 'fsvbasic'),
		'section'  => 'fsvbasic_welcome_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[welcome_text]',
		'type'     => 'text',
		'priority' => 2,
	) );

	// Footer Area Component - Add Section
	$wp_customize->add_section( 'fsvbasic_footer_settings' , array(
		'title'    => __( 'Footer', 'fsvbasic' ),
		'priority' => 121,
	) );

	// Footer Area Component - Footer Text
	$wp_customize->add_setting( 'fsvbasic_corporate_black_theme_options[foot_text]' , array(
		'default'   => 'Copyright',
		'type'      => 'option',
		'capability'=> 'edit_theme_options',
		'sanitize_callback' => 'fsvbasic_text_sanitize',
	) );

	$wp_customize->add_control( 'fsvbasic_foot_text' , array(
		'label'    => __('Footer Text', 'fsvbasic'),
		'section'  => 'fsvbasic_footer_settings',
		'settings' => 'fsvbasic_corporate_black_theme_options[foot_text]',
		'type'     => 'text',
		'priority' => 1,
	) );

}
add_action( 'customize_register', 'fsvbasic_customize_register' );

/**
 * Sanitizing Input Text.
 *
 * @since FSV BASIC 1.0
 */
function fsvbasic_text_sanitize( $value ) {

	$args = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'img' => array(
			'src' => array(),
			'height' => array(),
			'width' => array(),
			'alt' => array()
		),
	);

	return wp_kses( $value , $args );

}

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * @since FSV BASIC 1.0
 */
function fsvbasic_customize_preview_js() {
	wp_enqueue_script( 'fsvbasic-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141201', true );
}
add_action( 'customize_preview_init', 'fsvbasic_customize_preview_js' );
