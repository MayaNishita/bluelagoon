<?php 
/***********************************************************
* setup theme_customizer
***********************************************************/
function wcct_customize_register( $wp_customize ) {
	/* Logo Image
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[logo]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'control_logo',
		array(
			'label'			=> __( 'Logo image', 'welcart_basic_carina' ),
			'section'		=> 'title_tagline',
			'settings'		=> 'basic_type_options[logo]',
			'priority'		=> 1,
			'description'	=> __( 'If the logo image has not been registered, see the site title.', 'welcart_basic_carina' ),
		)
	) );

	/* SNS button
	------------------------------------------------------*/
	/* facebook */
	$wp_customize->add_setting( 'basic_type_options[facebook_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_facebook_id', array(
		'label'				=> __( 'Display facebook', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[facebook_id]',
		'type'				=> 'text',
		'priority'			=> 131,
		'description'		=> __( 'Enter the your page name.', 'welcart_basic_carina' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[facebook_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_facebook_button', array(
		'label'				=> __( 'Show facebook', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[facebook_button]',
		'type'				=> 'checkbox',
		'priority'			=> 132,
	) );
	/* Twitter */
	$wp_customize->add_setting( 'basic_type_options[twitter_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_twitter_id', array(
		'label'				=> __( 'Display twitter', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[twitter_id]',
		'type'				=> 'text',
		'priority'			=> 133,
		'description'		=> __( 'Enter the user name.', 'welcart_basic_carina' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[twitter_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_twitter_button', array(
		'label'				=> __( 'Show twitter', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[twitter_button]',
		'type'				=> 'checkbox',
		'priority'			=> 134,
	) );
	/* Instagram */
	$wp_customize->add_setting( 'basic_type_options[instagram_id]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_instagram_id', array(
		'label'				=> __( 'Display instagram', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[instagram_id]',
		'type'				=> 'text',
		'priority'			=> 135,
		'description'		=> __( 'Enter the user name.', 'welcart_basic_carina' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[instagram_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_instagram_button', array(
		'label'				=> __( 'Show instagram', 'welcart_basic_carina' ),
		'section'			=> 'title_tagline',
		'settings'			=> 'basic_type_options[instagram_button]',
		'type'				=> 'checkbox',
		'priority'			=> 136,
	) );

	/* Custom Color Main
	------------------------------------------------------*/
	/* Main Text Color */
	$wp_customize->add_setting( 'main_text_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'main_text_color',
		)
	) );
	/* Main Border Color */
	$wp_customize->add_setting( 'main_border_color', array(
		'default'			=> '#ccc',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_border_color',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'main_border_color',
		)
	) );
	/* Main Table Heading Color */
	$wp_customize->add_setting( 'main_th_color', array(
		'default'			=> '#ddd',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_th_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'main_th_color',
		)
	) );
	$wp_customize->add_setting( 'main_th_text_color', array(
		'default'			=> '#555',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_th_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'main_th_text_color',
		)
	) );
	/* Main Button Color */
	$wp_customize->add_setting( 'main_btn_color', array(
		'default'			=> '#d3222a',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_btn_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'main_btn_color',
		)
	) );
	$wp_customize->add_setting( 'main_btn_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_btn_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'main_btn_text_color',
		)
	) );
	/* Sub Button Color */
	$wp_customize->add_setting( 'sub_btn_color', array(
		'default'			=> '#ddd',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_btn_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_btn_color',
		)
	) );
	$wp_customize->add_setting( 'sub_btn_text_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_btn_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_btn_text_color',
		)
	) );
	/* Cart Button Color */
	$wp_customize->add_setting( 'cart_btn_color', array(
		'default'			=> '#d3222a',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'cart_btn_color',
		array(
			'label'			=> __( 'Background color' ),
			'section' 		=> 'colors',
			'settings'		=> 'cart_btn_color',
		)
	) );
	$wp_customize->add_setting( 'cart_btn_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'cart_btn_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'cart_btn_text_color',
		)
	) );
	$wp_customize->add_setting( 'contact_btn_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'contact_btn_color',
		array(
			'label'			=> __( 'Background color' ),
			'section' 		=> 'colors',
			'settings'		=> 'contact_btn_color',
		)
	) );
	$wp_customize->add_setting( 'contact_btn_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'contact_btn_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'contact_btn_text_color',
		)
	) );
	/* Main Businessday Color */
	$wp_customize->add_setting( 'main_biz_color', array(
		'default'			=> '#ffbfc9',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_biz_color',
		array(
			'label'			=> __( 'Holiday color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'main_biz_color',
		)
	) );

	/* Custom Color Product Color
	------------------------------------------------------*/
	$wp_customize->add_setting( 'opt_new_bg_color', array(
		'default'			=> '#ed8a9a',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_new_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_new_bg_color',
		)
	) );
	$wp_customize->add_setting( 'opt_new_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_new_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_new_text_color',
		)
	) );
	$wp_customize->add_setting( 'opt_reco_bg_color', array(
		'default'			=> '#4eb6a5',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_reco_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_reco_bg_color',
		)
	) );
	$wp_customize->add_setting( 'opt_reco_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_reco_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_reco_text_color',
		)
	) );
	$wp_customize->add_setting( 'opt_stock_bg_color', array(
		'default'			=> '#4e9fb6',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_stock_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_stock_bg_color',
		)
	) );
	$wp_customize->add_setting( 'opt_stock_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_stock_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_stock_text_color',
		)
	) );
	$wp_customize->add_setting( 'opt_sale_bg_color', array(
		'default'			=> '#a64eb6',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_sale_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_sale_bg_color',
		)
	) );
	$wp_customize->add_setting( 'opt_sale_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'opt_sale_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'opt_sale_text_color',
		)
	) );

	/* Custom Color Sub
	------------------------------------------------------*/
	/* Sub Background Color */
	$wp_customize->add_setting( 'sub_bg_color', array(
		'default'			=> '#ddd',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_bg_color',
		)
	) );
	/* Sub Text Color */
	$wp_customize->add_setting( 'sub_text_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_text_color',
		)
	) );
	/* Sub Border Color */
	$wp_customize->add_setting( 'sub_border_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_border_color',
		array(
			'label'			=> __( 'Border color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_border_color',
		)
	) );
	/* Sub Table Heading Color */
	$wp_customize->add_setting( 'sub_th_color', array(
		'default'			=> '#bbb',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_th_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_th_color',
		)
	) );
	$wp_customize->add_setting( 'sub_th_text_color', array(
		'default'			=> '#333',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_th_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_th_text_color',
		)
	) );
	/* Sub Businessday Color */
	$wp_customize->add_setting( 'sub_biz_color', array(
		'default'			=> '#ffbfc9',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'sub_biz_color',
		array(
			'label'			=> __( 'Holiday color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'sub_biz_color',
		)
	) );

	/* Custom Color Footer
	------------------------------------------------------*/
	/* Footer Background Color */
	$wp_customize->add_setting( 'footer_bg_color', array(
		'default'			=> '#131313',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_bg_color',
		array(
			'label'			=> __( 'Background color' ),
			'section'		=> 'colors',
			'settings'		=> 'footer_bg_color',
		)
	) );
	/* Footer Text Color */
	$wp_customize->add_setting( 'footer_text_color', array(
		'default'			=> '#fff',
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_text_color',
		array(
			'label'			=> __( 'Text color', 'welcart_basic_carina' ),
			'section'		=> 'colors',
			'settings'		=> 'footer_text_color',
		)
	) );

	/* Home Product List Title
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[home_cat_title]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_home_cat_title', array(
		'label'				=> __( 'Display the category title', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[home_cat_title]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=> 112,
	) );

	/* Position of Sidebar
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[sidebar]', array(
		'default'			=> 'left-set',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_sidebar', array(
		'label'				=> __( 'Sidebar position', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[sidebar]',
		'type'				=> 'radio',
		'choices'			=> array(
								'right-set' => __( 'Right sidebar', 'welcart_basic_carina' ),
								'left-set'  => __( 'Left sidebar', 'welcart_basic_carina' ),
							),
		'active_callback'	=> 'callback_is_twocolumn',
		'priority'			=> 140,
		'description'		=> __('Please select the position where you want to display.', 'welcart_basic_carina'),
	) );

	/* Display items
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_soldout]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_soldout', array(
		'label'				=> __( 'Display the Soldout', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_soldout]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemlist',
		'priority'			=> 150,
	) );
	$wp_customize->add_setting( 'basic_type_options[display_inquiry]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_inquiry', array(
		'label'				=> __( 'Display the inquiry text', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_inquiry]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_display_inquiry',
		'priority'			=> 151,
	) );
	$wp_customize->add_setting( 'basic_type_options[display_inquiry_text]', array(
		'default'			=> __( 'Contacting this item', 'welcart_basic_carina' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_display_inquiry_text', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_inquiry_text]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_display_inquiry',
		'priority'			=> 152,
		'description'		=> __( 'Enter the message you want to display.', 'welcart_basic_carina' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[display_produt_tag]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_display_produt_tag', array(
		'label'				=> __( 'Display the produt tag', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_produt_tag]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemlist',
		'priority'			=> 154,
	) );

	/* Home Information
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[display_info]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_display_info', array(
		'label'				=> __( 'Display information' , 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[display_info]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'is_front_page',
		'priority'			=>  160,
	) );
	$wp_customize->add_setting( 'basic_type_options[info_cat]', array(
		'default'			=> wcct_get_info_default(),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );	
	$wp_customize->add_control( 'info_cat', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[info_cat]',
		'type'   			=> 'select',
		'choices' 			=> wcct_get_info_categories(),
		'active_callback'	=> 'callback_display_information',
		'priority'			=> 161,
		'description'		=> __( 'Please select a category to be displayed.', 'welcart_basic_carina' ),
	) );
	$wp_customize->add_setting( 'basic_type_options[info_num]', array(
		'default'    => 10,
		'type'       => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'info_num', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[info_num]',
		'type'				=> 'number',
		'input_attrs'		=> array( 'min' => '1' ),
		'active_callback'	=> 'callback_display_information',
		'priority'			=> 162,
		'description'		=> __( 'Please select a display number.', 'welcart_basic_carina' ),
	));

	/* Name change of the cart button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[cart_button]', array(
		'default'			=> __( 'Add to Shopping Cart', 'usces' ),
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'control_cart_button', array(
		'label'				=> __( 'The cart button', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[cart_button]',
		'type'				=> 'text',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 170,
	) );
	
	/* Display the inquiry button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[inquiry_link]', array(
		'default'			=> 0,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	) );
	$wp_customize->add_control( 'control_inquiry_link', array(
		'label'				=> __( 'The inquiry button', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[inquiry_link]',
		'type'				=> 'dropdown-pages',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 180,
		'description'		=> __('Display the inquiry button when the product is sold out.<br />Please select Page.', 'welcart_basic_carina'),
	) );
	$wp_customize->add_setting( 'basic_type_options[inquiry_link_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_inquiry_link_button', array(
		'label'				=> __( 'Display the inquiry button', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[inquiry_link_button]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 190,
	) );
	
	/* Displays the reviews
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[review]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_review', array(
		'label'				=> __( 'Show product reviews', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[review]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_itemsingle',
		'priority'			=> 200,
	) );
	
	/* The continue shopping button
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[continue_shopping_button]', array(
		'default'			=> false,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_continue_shopping_button', array(
		'label'				=> __( 'Change the destination link', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[continue_shopping_button]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_cartpage',
		'priority'			=> 140,
	) );
	$wp_customize->add_setting( 'basic_type_options[continue_shopping_url]', array(
		'default'			=> '',
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_url',
	) );
	$wp_customize->add_control( 'control_continue_shopping_url', array(
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[continue_shopping_url]',
		'type'				=> 'url',
		'active_callback'	=> 'callback_continue_shopping',
		'priority'			=> 141,
		'description'		=> __( 'Destination URL', 'welcart_basic_carina' ),
	) );

	/* Display Category Image
	------------------------------------------------------*/
	$wp_customize->add_setting( 'basic_type_options[cat_image]', array(
		'default'			=> true,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'wcct_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'control_cat_image', array(
		'label'				=> __( 'Displayed over the image', 'welcart_basic_carina' ),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'basic_type_options[cat_image]',
		'type'				=> 'checkbox',
		'active_callback'	=> 'callback_is_category',
		'priority'			=> 141,
	) );

	/* Sanitize
	------------------------------------------------------*/
	function wcct_sanitize_checkbox( $input ){
		if( $input == true ){
			return true;
		} else {
			return false;
		}
	}

	/* Callback
	------------------------------------------------------*/
	function callback_is_twocolumn() {
		return !is_front_page() && !is_home() && !welcart_basic_is_cart_page() && !welcart_basic_is_member_page() && !( is_single() && usces_is_item() );
	}
	function callback_is_itemlist() {
		return is_front_page() || is_home() || is_archive() || is_search();
	}
	function callback_is_itemsingle() {
		return is_single() && usces_is_item();
	}
	function callback_is_cartpage() {
		return welcart_basic_is_cart_page();
	}
	function callback_is_category() {
		return is_category();
	}
	function callback_display_inquiry( $control ) {
		if( !is_front_page() && !is_home() && !is_archive() && !is_search() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_soldout]' )->value() )
			return true;
	}
	function callback_continue_shopping( $control ) {
		if( !welcart_basic_is_cart_page() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[continue_shopping_button]' )->value() )
			return true;
	}
	function callback_display_information( $control ) {
		if( !is_front_page() && !is_home() )
			return false;
		
		if ( $control->manager->get_setting( 'basic_type_options[display_info]' )->value() )
			return true;
	}
}
add_action( 'customize_register', 'wcct_customize_register' );


/* Customizer CSS
------------------------------------------------------*/
function wcct_customize_css() {
	if( 'customize.php' == basename( $_SERVER['PHP_SELF'] ) ) {
		?>
<style type="text/css">
#customize-control-control_facebook_id:before {
	content: "<?php _e( 'Display SNS mark', 'welcart_basic_carina' ); ?>";
}
#customize-control-background_color:before {
	content: "<?php _e( 'Main area', 'welcart_basic_carina' ); ?>";
}
#customize-control-main_th_color:before {
	content: "<?php _e( 'Table heading color', 'welcart_basic_carina' ); ?>";
}
#customize-control-main_btn_color:before {
	content: "<?php _e( 'Main button color', 'welcart_basic_carina' ); ?>";
}
#customize-control-sub_btn_color:before {
	content: "<?php _e( 'Sub button color', 'welcart_basic_carina' ); ?>";
}
#customize-control-cart_btn_color:before {
	content: "<?php _e( 'Cart button color', 'welcart_basic_carina' ); ?>";
}
#customize-control-contact_btn_color:before {
	content: "<?php _e( 'Contact button color', 'welcart_basic_carina' ); ?>";
}
#customize-control-main_biz_color:after {
	content: "<?php _e( 'Product tag color', 'welcart_basic_carina' ); ?>";
}
#customize-control-opt_new_bg_color:before {
	content: "<?php _e( 'New tag color', 'welcart_basic_carina' ); ?>";
}
#customize-control-opt_reco_bg_color:before {
	content: "<?php _e( 'Recommend tag color', 'welcart_basic_carina' ); ?>";
}
#customize-control-opt_stock_bg_color:before {
	content: "<?php _e( 'Stock tag color', 'welcart_basic_carina' ); ?>";
}
#customize-control-opt_sale_bg_color:before {
	content: "<?php _e( 'Sale tag color', 'welcart_basic_carina' ); ?>";
}
#customize-control-sub_bg_color:before {
	content: "<?php _e( 'Sub area', 'welcart_basic_carina' ); ?>";
}
#customize-control-sub_th_color:before {
	content: "<?php _e( 'Table heading color', 'welcart_basic_carina' ); ?>";
}
#customize-control-footer_bg_color:before {
	content: "<?php _e( 'Footer area', 'welcart_basic_carina' ); ?>";
}
#customize-control-control_display_soldout:before {
	content: "<?php _e( 'Display in the commodity block', 'welcart_basic_carina' ); ?>";
}
#customize-control-control_review:before {
	content: "<?php _e( 'Display product reviews', 'welcart_basic_carina' ); ?>";
}
#customize-control-control_continue_shopping_button:before {
	content: "<?php _e( 'Link for a continue shopping button', 'welcart_basic_carina' ); ?>";
}
#customize-control-control_display_info:before {
	content: "<?php _e( 'Information article', 'welcart_basic_carina' ); ?>";
}
#customize-control-control_cat_image:before {
	content: "<?php _e( 'Category name position', 'welcart_basic_carina' ); ?>";
}
</style>
		<?php
	}
}
add_action( 'admin_print_styles' , 'wcct_customize_css' );

/***********************************************************
* Display theme option
***********************************************************/
function wcct_get_options( $key = '' ) {
	if( empty( $key ) )
		return;
	
	$options = get_option( 'basic_type_options' );
	
	if( !is_admin() ) {	
		if( !isset( $options['logo'] ) ) $options['logo'] = '';
		if( !isset( $options['facebook_id'] ) ) $options['facebook_id'] = '';
		if( !isset( $options['facebook_button'] ) ) $options['facebook_button'] = false;
		if( !isset( $options['twitter_id'] ) ) $options['twitter_id'] = '';
		if( !isset( $options['twitter_button'] ) ) $options['twitter_button'] = false;
		if( !isset( $options['instagram_id'] ) ) $options['instagram_id'] = '';
		if( !isset( $options['instagram_button'] ) ) $options['instagram_button'] = false;
		if( !isset( $options['home_cat_title'] ) ) $options['home_cat_title'] = false;
		if( !isset( $options['display_soldout'] ) ) $options['display_soldout'] = true;
		if( !isset( $options['sidebar'] ) ) $options['sidebar'] = 'left-set';
		if( !isset( $options['display_inquiry'] ) ) $options['display_inquiry'] = true;
		if( !isset( $options['display_inquiry_text'] ) ) $options['display_inquiry_text'] = __( 'Contacting this item' , 'welcart_basic_carina' );
		if( !isset( $options['display_produt_tag'] ) ) $options['display_produt_tag'] = true;
		if( !isset( $options['cart_button'] ) ) $options['cart_button'] = __( 'Add to Shopping Cart', 'usces' );
		if( !isset( $options['inquiry_link'] ) ) $options['inquiry_link'] = 0;
		if( !isset( $options['inquiry_link_button'] ) ) $options['inquiry_link_button'] = false;
		if( !isset( $options['review'] ) ) $options['review'] = false;
		if( !isset( $options['continue_shopping_button'] ) ) $options['continue_shopping_button'] = false;
		if( !isset( $options['continue_shopping_url'] ) ) $options['continue_shopping_url'] = '';
		if( !isset( $options['display_info'] ) ) $options['display_info'] = true;
		if( !isset( $options['info_cat'] ) ) $options['info_cat'] = wcct_get_info_default();
		if( !isset( $options['info_num'] ) ) $options['info_num'] = 10;
		if( !isset( $options['cat_image'] ) ) $options['cat_image'] = true;
	}
	
	if( empty( $options[$key] ) )
		return;
	
	return $options[$key];
}
function wcct_options( $key = '' ) {
	echo wcct_get_options( $key );
}

/***********************************************************
* Information Select & Default
***********************************************************/
function wcct_get_info_categories() {
	$target_arg		= array(
						'exclude_tree'	=>	usces_get_cat_id( 'item' ),
					);
	$target_terms	= get_terms( 'category', $target_arg );
	$info_terms		= array();
	
	foreach( $target_terms as $term ){
		$info_terms[ $term->slug ] = $term->name;
	}
	
	return $info_terms;
}
function wcct_get_info_default() {
	$info_terms = wcct_get_info_categories();
    reset( $info_terms );
    return key( $info_terms );
}

/***********************************************************
* RGB Color
***********************************************************/
function wcct_rgb($hex) {
	$hex = str_replace("#", "", $hex);
	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb;
}

/***********************************************************
* Custom Color
***********************************************************/
function wcct_customizer_footer_styles() {
	/* Main Color ------------------------------------------------------*/
	$main_bg         = '#' . get_background_color();
	$main_text       = get_theme_mod( 'main_text_color', '#333' );
	$main_text_hov   = 'rgba( ' . implode(", ", wcct_rgb( $main_text ) ) . ', .6 )';
	$main_border     = get_theme_mod( 'main_border_color', '#ccc' );
	$main_border_hov = 'rgba( ' . implode(", ", wcct_rgb( $main_border ) ) . ', .6 )';
	$main_th_bg      = get_theme_mod( 'main_th_color', '#ddd' );
	$main_th_text    = get_theme_mod( 'main_th_text_color', '#555' );
	$main_biz        = get_theme_mod( 'main_biz_color', '#ffbfc9' );

	/* Button Color ------------------------------------------------------*/
	$main_btn_color         = get_theme_mod( 'main_btn_color', '#d3222a' );
	$main_btn_color_hov     = 'rgba( ' . implode(", ", wcct_rgb( $main_btn_color ) ) . ', .6 )';
	$main_btn_text_color    = get_theme_mod( 'main_btn_text_color', '#fff' );
	$sub_btn_color          = get_theme_mod( 'sub_btn_color', '#ddd' );
	$sub_btn_color_hov      = 'rgba( ' . implode(", ", wcct_rgb( $sub_btn_color ) ) . ', .6 )';
	$sub_btn_text_color     = get_theme_mod( 'sub_btn_text_color', '#333' );
	$cart_btn_color         = get_theme_mod( 'cart_btn_color', '#d3222a' );
	$cart_btn_color_hov     = 'rgba( ' . implode(", ", wcct_rgb( $cart_btn_color ) ) . ', .6 )';
	$cart_btn_text_color    = get_theme_mod( 'cart_btn_text_color', '#fff' );
	$contact_btn_color      = get_theme_mod( 'contact_btn_color', '#333' );
	$contact_btn_color_hov  = 'rgba( ' . implode(", ", wcct_rgb( $contact_btn_color ) ) . ', .6 )';
	$contact_btn_text_color = get_theme_mod( 'contact_btn_text_color', '#fff' );

	/* Product tag Color ------------------------------------------------------*/
	$opt_new_bg_color     = get_theme_mod( 'opt_new_bg_color', '#ed8a9a' );
	$opt_new_text_color   = get_theme_mod( 'opt_new_text_color', '#fff' );
	$opt_reco_bg_color    = get_theme_mod( 'opt_reco_bg_color', '#4eb6a5' );
	$opt_reco_text_color  = get_theme_mod( 'opt_reco_text_color', '#fff' );
	$opt_stock_bg_color   = get_theme_mod( 'opt_stock_bg_color', '#4e9fb6' );
	$opt_stock_text_color = get_theme_mod( 'opt_stock_text_color', '#fff' );
	$opt_sale_bg_color    = get_theme_mod( 'opt_sale_bg_color', '#a64eb6' );
	$opt_sale_text_color  = get_theme_mod( 'opt_sale_text_color', '#fff' );
	
	/* Sub Color ------------------------------------------------------*/
	$sub_bg       = get_theme_mod( 'sub_bg_color', '#ddd' );
	$sub_bg_hov   = 'rgba( ' . implode(", ", wcct_rgb( $sub_bg ) ) . ', .6 )';
	$sub_text     = get_theme_mod( 'sub_text_color', '#333' );
	$sub_text_hov = 'rgba( ' . implode(", ", wcct_rgb( $sub_text ) ) . ', .6 )';
	$sub_border   = get_theme_mod( 'sub_border_color', '#fff' );
	$sub_th_bg    = get_theme_mod( 'sub_th_color', '#bbb' );
	$sub_th_text  = get_theme_mod( 'sub_th_text_color', '#333' );
	$sub_biz      = get_theme_mod( 'sub_biz_color', '#ffbfc9' );
	
	/* Footer Color ------------------------------------------------------*/
	$footer_bg       = get_theme_mod( 'footer_bg_color', '#131313' );
	$footer_text     = get_theme_mod( 'footer_text_color', '#fff' );
	$footer_text_hov = 'rgba( ' . implode(", ", wcct_rgb( $footer_text ) ) . ', .6 )';
?>
<style type="text/css">
<?php /* Main Color ------------------------------------------------------*/ ?>
.pagination_wrapper li a,
#cart_table td.msa-destination,
#cart_table td.msa-postage-title,
#cart_table td.msa-postage-detail {
	background-color: <?php echo $main_bg; ?>;
}
.menu-trigger span,
.menu-trigger.active span,
.pagination_wrapper li .current,
div.cart_navi li.current,
.entry-content h4,
.item-description h4 {
	background-color: <?php echo $main_text; ?>;
}
.pagination_wrapper li a:hover {
	background-color: <?php echo $main_text_hov; ?>;
}
#site-navigation li:before,
#site-navigation li a:before,
#site-navigation li:after,
#site-navigation li a:after {
	background-color: <?php echo $main_border; ?>;
}
#secondary .widget_welcart_calendar .businessday {
	background-color: <?php echo $main_biz; ?>;
}
#secondary .widget_calendar th,
#secondary .widget_welcart_calendar th,
.customer_form th,
#cart_table th,
#confirm_table .ttl h3,
#confirm_table tr.ttl td,
#confirm_table th,
#wc_member_msa table th,
#memberinfo #history_head th,
#memberinfo .retail th,
#delivery-info #multi_cart_table th,
.entry-content th,
.item-description th,
.item-info .item-sku th,
#itempage table.dlseller th {
	background-color: <?php echo $main_th_bg; ?>;
	color: <?php echo $main_th_text; ?>;
}
body,
a,
del,
.incart-btn a,
.incart-btn i:before ,
.pagination_wrapper li a,
dl.item-sku dd label,
.customer_form td,
div.cart_navi li,
.entry-meta .date:before,
.entry-meta .cat:before,
.entry-meta .tag:before,
.entry-meta .author:before {
	color: <?php echo $main_text; ?>;
}
a:hover,
.incart-btn a:hover {
	color: <?php echo $main_text_hov; ?>;
}
.pagination_wrapper li .current,
div.cart_navi li.current,
.entry-content h4,
.item-description h4 {
	color: <?php echo $main_bg; ?>;
}
header,
#primary input[type="text"],
#primary input[type="password"],
#primary input[type="email"],
#primary input[type="tel"],
#primary input[type="search"],
#primary input[type="url"],
#primary select,
#primary textarea,
.sns,
.snav .search-box i,
.snav .membership i,
#secondary h3,
div.cart_navi li,
div.cart_navi li.current,
#cart_table th,
#cart_table td,
#confirm_table th,
#confirm_table td,
#point_table td,
.tab-list,
.tab-list li::after,
#primary .widget_calendar th,
#primary .widget_welcart_calendar th,
#primary .widget_calendar td,
#primary .widget_welcart_calendar td,
dl.item-sku,
#site-navigation ul ul,
.post-li article,
.post-li article:first-child,
.entry-meta,
.comments-area,
#respond .form-submit,
#secondary .widget_welcart_featured .featured_list,
#secondary .widget_welcart_bestseller li,
#secondary .widget_calendar th,
#secondary .widget_calendar td ,
#secondary .widget_welcart_calendar th,
#secondary .widget_welcart_calendar td,
#secondary .widget_wcex_olwidget table,
#secondary .widget_wcex_olwidget td,
#wc_login .member-box,
#wc_member .member-box,
#wc_login .loginbox input.loginmail,
#wc_login .loginbox input.loginpass,
#wc_member .loginbox input.loginmail,
#wc_member .loginbox input.loginpass,
.customer_form th,
.customer_form td,
#cart #coupon_table td,
#point_table td input[type="text"],
#memberinfo th,
#memberinfo td,
#memberinfo #history_head th,
#memberinfo .retail th,
#memberinfo #history_head td,
#memberinfo .retail td,
#memberinfo .customer_form th,
#memberinfo .customer_form td,
#wc_member_msa table th,
#wc_member_msa table td,
#wc_member_msa table .space,
.msa_field_block .msa_title,
.msa_field_block .msa_field,
.comment-area li,
#customer-info h5,
.entry-content h2,
.item-description h2,
.entry-content h3,
.item-description h3,
.entry-content th,
.entry-content td,
.item-description th,
.item-description td,
dl.item-sku dd input[type=radio]:checked + label,
dl.item-sku dd label:hover,
.item-info .item-sku th,
.item-info .item-sku tbody tr th,
.item-info .item-sku th:last-child,
.item-info .item-sku td, .item-info
.item-sku td:last-child,
.item-info .skuform.multiple-sku,
#itempage table.dlseller,
#itempage table.dlseller th,
#itempage table.dlseller td {
	border-color: <?php echo $main_border; ?>;
}
dl.item-sku dd label {
	border-color: <?php echo $main_border_hov; ?>;
}
.pagination_wrapper li .current,
.pagination_wrapper li a {
	border-color: <?php echo $main_text; ?>;
}
.tab-list li::before {
	border-color: <?php echo $main_border; ?> transparent <?php echo $main_bg; ?>;
}
<?php /* Button Color ------------------------------------------------------*/ ?>
input[type=button],
input[type=submit],
.entry-content input[type=submit],
.item-description input[type=submit],
.widget_welcart_login input#member_loginw,
.widget_welcart_login input#member_login,
.widget_welcart_search #searchsubmit,
.send input.to_customerinfo_button,
.send input.to_memberlogin_button,
.send input.to_deliveryinfo_button,
.send input.to_confirm_button,
.send input#purchase_button,
.member-page .send input,
#wc_customer .send input.to_reganddeliveryinfo_button,
#wc_login .loginbox #member_login,
#wc_member .loginbox #member_login,
#wc_login .loginbox .new-entry #nav a,
#wc_member .loginbox .new-entry #nav a,
#wc_lostmemberpassword #member_login,
#wc_changepassword #member_login,
#add_destination,
#edit_destination,
#new_destination,
#determine,
input[type=button].allocation_edit_button,
.inqbox .send input,
#point_table td input.use_point_button,
#cart #coupon_table td .use_coupon_button,
#wc_reviews .reviews_btn a,
#wdgctToCheckout a,
#mobile-menu .membership a.usces_login_a,
.menu-on #mobile-menu .membership a.usces_login_a,
#mobile-menu .membership a.usces_logout_a,
.menu-on #mobile-menu .membership a.usces_logout_a,
#memberinfo table.retail .redownload_link a	{
	background-color: <?php echo $main_btn_color; ?>;
	color: <?php echo $main_btn_text_color; ?>;
}
input[type=button]:hover,
input[type=submit]:hover,
.entry-content input[type=submit]:hover,
.item-description input[type=submit]:hover,
.widget_welcart_login input#member_loginw:hover,
.widget_welcart_login input#member_login:hover,
.widget_welcart_search #searchsubmit:hover,
.send input.to_customerinfo_button:hover,
.send input.to_memberlogin_button:hover,
.send input.to_deliveryinfo_button:hover,
.send input.to_confirm_button:hover,
.send input#purchase_button:hover,
.member-page .send input:hover,
#wc_customer .send input.to_reganddeliveryinfo_button:hover,
#wc_login .loginbox #member_login:hover,
#wc_member .loginbox #member_login:hover,
#wc_login .loginbox .new-entry #nav a:hover,
#wc_member .loginbox .new-entry #nav a:hover,
#wc_lostmemberpassword #member_login:hover,
#wc_changepassword #member_login:hover,
#add_destination:hover,
#edit_destination:hover,
#new_destination:hover,
#determine:hover,
input[type=button].allocation_edit_button:hover,
.inqbox .send input:hover,
#point_table td input.use_point_button:hover,
#cart #coupon_table td .use_coupon_button:hover,
#wc_reviews .reviews_btn a:hover,
#wdgctToCheckout a:hover,
#mobile-menu .membership a.usces_login_a:hover,
.menu-on #mobile-menu .membership a.usces_login_a:hover,
#mobile-menu .membership a.usces_logout_a:hover,
.menu-on #mobile-menu .membership a.usces_logout_a:hover,
#memberinfo table.retail .redownload_link a:hover {
	background-color: <?php echo $main_btn_color_hov; ?>;
	color: <?php echo $main_btn_text_color; ?>;
}
input[type=reset],
.member-page #nav a,
#wc_lostmemberpassword #nav a,
#wc_newcompletion #memberpages p a,
#wc_lostcompletion #memberpages p a,
#wc_changepasscompletion #memberpages p a,
#wc_newcompletion .send a,
#wc_lostcompletion .send input,
#wc_lostcompletion .send a,
#wc_changepasscompletion .send a,
.member_submenu a,
.gotoedit a,
.member-page #memberinfo .send input.top,
.member-page #memberinfo .send input.deletemember,
#wc_cart #cart .upbutton input,
#cart .action input.delButton,
input.continue_shopping_button,
input.back_cart_button,
input.back_to_customer_button,
input.back_to_delivery_button,
#wc_ordercompletion .send a,
#del_destination,
.ui-dialog .ui-dialog-buttonpane button,
#searchbox input.usces_search_button,
.open_allocation_bt,
input[type=submit].reset_coupon_button,
#wdgctToCart a,
#mobile-menu .membership a,
.menu-on #mobile-menu .membership a,
.menu-on .widget_welcart_login a {
	background-color: <?php echo $sub_btn_color; ?>;
	color: <?php echo $sub_btn_text_color; ?>;
}
input[type=reset]:hover,
.member-page #nav a:hover,
#wc_lostmemberpassword #nav a:hover,
#wc_newcompletion #memberpages p a:hover,
#wc_lostcompletion #memberpages p a:hover,
#wc_changepasscompletion #memberpages p a:hover,
#wc_newcompletion .send a:hover,
#wc_lostcompletion .send input:hover,
#wc_lostcompletion .send a:hover,
#wc_changepasscompletion .send a:hover,
.member_submenu a:hover,
.gotoedit a:hover,
.member-page #memberinfo .send input.top:hover,
.member-page #memberinfo .send input.deletemember:hover,
#wc_cart #cart .upbutton input:hover,
#cart .action input.delButton:hover,
input.continue_shopping_button:hover,
input.back_cart_button:hover,
input.back_to_customer_button:hover,
input.back_to_delivery_button:hover,
#wc_ordercompletion .send a:hover,
#del_destination:hover,
.ui-dialog .ui-dialog-buttonpane button:hover,
#searchbox input.usces_search_button:hover,
.open_allocation_bt:hover,
input[type=submit].reset_coupon_button:hover,
#wdgctToCart a:hover,
#mobile-menu .membership a:hover,
.menu-on #mobile-menu .membership a:hover,
.menu-on .widget_welcart_login a:hover {
	background-color: <?php echo $sub_btn_color_hov; ?>;
	color: <?php echo $sub_btn_text_color; ?>;
}
.item-info .skubutton,
.incart-btn .total-quant {
	background-color: <?php echo $cart_btn_color; ?>;
	color: <?php echo $cart_btn_text_color; ?>;
}
.item-info .skubutton:hover {
	background-color: <?php echo $cart_btn_color_hov; ?>;
	color: <?php echo $cart_btn_text_color; ?>;
}
.contact-item a {
	background-color: <?php echo $contact_btn_color; ?>;
	color: <?php echo $contact_btn_text_color; ?>;
}
.contact-item a:hover {
	background-color: <?php echo $contact_btn_color_hov; ?>;
	color: <?php echo $contact_btn_text_color; ?>;
}

<?php /* Product Tag Color -------------------------------------------------------*/ ?>
.opt-tag .new {
	background-color: <?php echo $opt_new_bg_color; ?>;
	color: <?php echo $opt_new_text_color; ?>;
}
.opt-tag .recommend {
	background-color: <?php echo $opt_reco_bg_color; ?>;
	color: <?php echo $opt_reco_text_color; ?>;
}
.opt-tag .stock{
	background-color: <?php echo $opt_stock_bg_color; ?>;
	color: <?php echo $opt_stock_text_color; ?>;
}
.opt-tag .sale{
	background-color: <?php echo $opt_sale_bg_color; ?>;
	color: <?php echo $opt_sale_text_color; ?>;
}

<?php /* Sub Color -------------------------------------------------------*/ ?>
.site:before,
.footer-widget:before {
	background-image: -webkit-gradient(linear,0 0,100% 0, color-stop(.5,<?php echo $sub_bg; ?>), color-stop(.5,transparent),to(transparent));
	background-image: -moz-linear-gradient(left, <?php echo $sub_bg; ?> 50%, transparent 50%, transparent);
	background-image: -ms-linear-gradient(left, <?php echo $sub_bg; ?> 50%, transparent 50%, transparent);
	background-image: -o-linear-gradient(left, <?php echo $sub_bg; ?> 50%, transparent 50%, transparent);
	background-image: linear-gradient(left, <?php echo $sub_bg; ?> 50%, transparent 50%, transparent);	
}
.footer-widget,
.menu-on #mobile-menu,
.view-cart,
#wgct_alert.update_box,
#wgct_alert.completion_box,
.snav .membership.On ul,
.snav .search-box.On form {
	background-color: <?php echo $sub_bg; ?>;
}
.menu-on .menu-trigger span,
.menu-on .menu-trigger.active span {
	background-color: <?php echo $sub_text; ?>;
}
#tertiary .widget_welcart_calendar .businessday {
	background-color: <?php echo $sub_biz; ?>;
}
#tertiary .widget_calendar th,
#tertiary .widget_welcart_calendar th,
.widgetcart_rows th.item,
.widgetcart_rows th.quant,
.widgetcart_rows th.price,
.widgetcart_rows th.trush {
	background-color: <?php echo $sub_th_bg; ?>;
	color: <?php echo $sub_th_text; ?>;
}
.footer-widget,
.footer-widget a,
#mobile-menu,
#mobile-menu a,
.search-box .searchsubmit,
.search-box .searchsubmit:hover,
.widget_search .searchsubmit,
.widget_search .searchsubmit:hover,
.widgetcart-close-btn i,
.widgetcart_rows,
.widgetcart_rows a,
.widgetcart_rows th.total_price,
#wgct_alert.update_box,
#wgct_alert.completion_box,
.widgetcart-on .view-cart {
	color: <?php echo $sub_text; ?>;
}
#tertiary .widget_calendar th,
#tertiary .widget_welcart_calendar th,
#tertiary .widget_calendar td,
#tertiary .widget_welcart_calendar td,
#tertiary .widget_welcart_featured .featured_list,
#tertiary .widget_wcex_olwidget table,
#tertiary .widget_wcex_olwidget td,
.widgetcart_rows th.item,
.widgetcart_rows th.quant,
.widgetcart_rows th.price,
.widgetcart_rows th.trush,
.widgetcart_rows td.widgetcart_item,
.widgetcart_rows td.widgetcart_quant,
.widgetcart_rows td.widgetcart_price,
.widgetcart_rows td.widgetcart_trush,
#wgct_alert.update_box,
#wgct_alert.completion_box,
.menu-on #mobile-menu .search-box,
.menu-on #mobile-menu .snav .membership,
.menu-on #mobile-menu .sns {
	border-color: <?php echo $sub_border; ?>;
}

<?php /* Footer Color ----------------------------------------------------*/ ?>
footer,
footer a,
.copyright {
	background-color: <?php echo $footer_bg; ?>;
	color: <?php echo $footer_text; ?>;
}
footer a:hover {
	color: <?php echo $footer_text_hov; ?>;
}
footer nav ul li a {
	border-color: <?php echo $footer_text; ?>;
}
@media screen and (min-width: 62.5em) {
<?php /* Main Color ------------------------------------------------------*/ ?>
#mobile-menu,
#mobile-menu a,
#site-navigation li a {
	color: <?php echo $main_text; ?>;
}
#mobile-menu a:hover,
#site-navigation li a:hover {
	color: <?php echo $main_text_hov; ?>;
}
<?php /* Button Color ------------------------------------------------------*/ ?>
.widget_welcart_login a {
	background-color: <?php echo $sub_btn_color; ?>;
	color: <?php echo $sub_btn_text_color; ?>;
}
.widget_welcart_login a:hover {
	background-color: <?php echo $sub_btn_color_hov; ?>;
	color: <?php echo $sub_btn_text_color; ?>;
}
}
</style>
<?php
}
add_action( 'wp_footer', 'wcct_customizer_footer_styles' );