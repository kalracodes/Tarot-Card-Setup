<?php
/**
 * Zodiac Astrology Theme Customizer
 *
 * @package Zodiac Astrology
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zodiacastrology_customize_register( $wp_customize ) {

	function zodiacastrology_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('zodiac-astrology-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('zodiac_astrology_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'zodiac_astrology_sanitize_integer'
	));
	$wp_customize->add_control(new Zodiac_Astrology_Slider_Custom_Control( $wp_customize, 'zodiac_astrology_logo_width',array(
		'label'	=> esc_html__('Logo Width','zodiac-astrology'),
		'section'=> 'title_tagline',
		'settings'=>'zodiac_astrology_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// color site title
	$wp_customize->add_setting('zodiacastrology_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sitetitle_color', array(
	   'settings' => 'zodiacastrology_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('zodiacastrology_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'zodiacastrology_sanitize_checkbox',
	));
	$wp_customize->add_control( 'zodiacastrology_title_enable', array(
	   'settings' => 'zodiacastrology_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','zodiac-astrology'),
	   'type'      => 'checkbox'
	));


	// color site tagline
	$wp_customize->add_setting('zodiacastrology_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sitetagline_color', array(
	   'settings' => 'zodiacastrology_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('zodiacastrology_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'zodiacastrology_sanitize_checkbox',
	));
	$wp_customize->add_control( 'zodiacastrology_tagline_enable', array(
	   'settings' => 'zodiacastrology_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','zodiac-astrology'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('zodiac_astrology_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'zodiac-astrology'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    // shop page sidebar alignment
    $wp_customize->add_setting('zodiac_astrology_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'zodiac_astrology_sanitize_choices',
	));
	$wp_customize->add_control('zodiac_astrology_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'zodiac-astrology'),
		'section'        => 'zodiac_astrology_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'zodiac-astrology'),
			'Right Sidebar' => __('Right Sidebar', 'zodiac-astrology'),
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'zodiacastrology_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'zodiac-astrology' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('zodiac_astrology_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','zodiac-astrology'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','zodiac-astrology'),
		'priority'	=> 1,
		'panel' => 'zodiacastrology_panel_area',
	));

	$wp_customize->add_setting('zodiac_astrology_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox',
	));
	$wp_customize->add_control( 'zodiac_astrology_box_layout', array(
	   'section'   => 'zodiac_astrology_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','zodiac-astrology'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('zodiac_astrology_preloader',array(
		'default' => true,
		'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox',
	));
	$wp_customize->add_control( 'zodiac_astrology_preloader', array(
	   'section'   => 'zodiac_astrology_site_layoutsec',
	   'label'	=> __('Check to Show preloader','zodiac-astrology'),
	   'type'      => 'checkbox'
 	));

	// Header Section
	$wp_customize->add_section('zodiacastrology_header_section', array(
        'title' => __('Manage Header Section', 'zodiac-astrology'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','zodiac-astrology'),
        'priority' => null,
		'panel' => 'zodiacastrology_panel_area',
 	));

 	$wp_customize->add_setting('zodiac_astrology_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox',
	));

	$wp_customize->add_control( 'zodiac_astrology_stickyheader', array(
	   'section'   => 'zodiacastrology_header_section',
	   'label'	=> __('Check To Show Sticky Header','zodiac-astrology'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('zodiacastrology_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_fb_link', array(
	   'settings' => 'zodiacastrology_fb_link',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Facebook Link', 'zodiac-astrology'),
	   'type'      => 'url'
	));


	// color facebook
	$wp_customize->add_setting('zodiacastrology_fb_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_fb_color', array(
	   'settings' => 'zodiacastrology_fb_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Facebook Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('zodiacastrology_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_twitt_link', array(
	   'settings' => 'zodiacastrology_twitt_link',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Twitter Link', 'zodiac-astrology'),
	   'type'      => 'url'
	));

	// color twitt
	$wp_customize->add_setting('zodiacastrology_twitt_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_twitt_color', array(
	   'settings' => 'zodiacastrology_twitt_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Twitter Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('zodiacastrology_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_linked_link', array(
	   'settings' => 'zodiacastrology_linked_link',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Linkdin Link', 'zodiac-astrology'),
	   'type'      => 'url'
	));

	// color linked
	$wp_customize->add_setting('zodiacastrology_linked_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_linked_color', array(
	   'settings' => 'zodiacastrology_linked_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Linked Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('zodiacastrology_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_insta_link', array(
	   'settings' => 'zodiacastrology_insta_link',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Instagram Link', 'zodiac-astrology'),
	   'type'      => 'url'
	));

	// color insta
	$wp_customize->add_setting('zodiacastrology_insta_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_insta_color', array(
	   'settings' => 'zodiacastrology_insta_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Instagram Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	// header menu
	$wp_customize->add_setting('zodiacastrology_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_menu_color', array(
	   'settings' => 'zodiacastrology_menu_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Menu Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	// header menu hover color
	$wp_customize->add_setting('zodiacastrology_menuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_menuhrv_color', array(
	   'settings' => 'zodiacastrology_menuhrv_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('Menu Hover Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// header sub menu color
	$wp_customize->add_setting('zodiacastrology_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_submenu_color', array(
	   'settings' => 'zodiacastrology_submenu_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('SubMenu Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// header sub menu bg color
	$wp_customize->add_setting('zodiacastrology_submenubg_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_submenubg_color', array(
	   'settings' => 'zodiacastrology_submenubg_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('SubMenu BG Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// header sub menu hover color
	$wp_customize->add_setting('zodiacastrology_submenuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_submenuhrv_color', array(
	   'settings' => 'zodiacastrology_submenuhrv_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('SubMenu Hover Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// header sub menu border color
	$wp_customize->add_setting('zodiacastrology_submenuborder_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_submenuborder_color', array(
	   'settings' => 'zodiacastrology_submenuborder_color',
	   'section'   => 'zodiacastrology_header_section',
	   'label' => __('SubMenu Border Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('zodiacastrology_one_cols_section',array(
		'title'	=> __('Manage Slider Section','zodiac-astrology'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 850).','zodiac-astrology'),
		'priority'	=> null,
		'panel' => 'zodiacastrology_panel_area'
	));

	//Hide Section
	$wp_customize->add_setting('zodiacastrology_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'zodiacastrology_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_hide_categorysec', array(
	   'settings' => 'zodiacastrology_hide_categorysec',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label'     => __('Check To Enable This Section','zodiac-astrology'),
	   'type'      => 'checkbox'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'zodiacastrology_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Zodiacastrology_Category_Dropdown_Custom_Control( $wp_customize, 'zodiacastrology_slidersection', array(
		'section' => 'zodiacastrology_one_cols_section',
	   'label'     => __('Select Category to display Slider','zodiac-astrology'),
		'settings'   => 'zodiacastrology_slidersection',
	) ) );

	$wp_customize->add_setting('zodiacastrology_button_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_button_text', array(
	   'settings' => 'zodiacastrology_button_text',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Add Button Text', 'zodiac-astrology'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('zodiac_astrology_button_link_slider1',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('zodiac_astrology_button_link_slider1',array(
        'label' => esc_html__('Add Button Link 1','zodiac-astrology'),
        'section'=> 'zodiacastrology_one_cols_section',
        'type'=> 'url'
    ));

	$wp_customize->add_setting('zodiacastrology_button2_text',array(
		'default' => 'Contact Us',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_button2_text', array(
	   'settings' => 'zodiacastrology_button2_text',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Add Button 2 Text', 'zodiac-astrology'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('zodiac_astrology_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('zodiac_astrology_button_link_slider',array(
        'label' => esc_html__('Add Button Link 2','zodiac-astrology'),
        'section'=> 'zodiacastrology_one_cols_section',
        'type'=> 'url'
    ));

    //Slider height
    $wp_customize->add_setting('zodiac_astrology_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('zodiac_astrology_slider_img_height',array(
        'label' => __('Slider Image Height','zodiac-astrology'),
        'description'   => __('Add the slider image height here (eg. 600px)','zodiac-astrology'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'zodiac-astrology' ),
        ),
        'section'=> 'zodiacastrology_one_cols_section',
        'type'=> 'text'
    ));

	// color slider title
	$wp_customize->add_setting('zodiacastrology_slidertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_slidertitle_color', array(
	   'settings' => 'zodiacastrology_slidertitle_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Title Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// color slider description
	$wp_customize->add_setting('zodiacastrology_sliderdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sliderdescription_color', array(
	   'settings' => 'zodiacastrology_sliderdescription_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Description Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// color slider button1 text
	$wp_customize->add_setting('zodiacastrology_sliderbutton1text_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_sliderbutton1text_color', array(
	   'settings' => 'zodiacastrology_sliderbutton1text_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Button 1 Text Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// color slider button1
	$wp_customize->add_setting('zodiacastrology_sliderbutton1_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sliderbutton1_color', array(
	   'settings' => 'zodiacastrology_sliderbutton1_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Button 1 Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// color slider button2 text
	$wp_customize->add_setting('zodiacastrology_sliderbutton2text_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sliderbutton2text_color', array(
	   'settings' => 'zodiacastrology_sliderbutton2text_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Button 2 Text Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// color slider button2
	$wp_customize->add_setting('zodiacastrology_sliderbutton2_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_sliderbutton2_color', array(
	   'settings' => 'zodiacastrology_sliderbutton2_color',
	   'section'   => 'zodiacastrology_one_cols_section',
	   'label' => __('Button 2 Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'zodiac_astrology_slider_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('zodiac_astrology_slider_settings_upgraded_features', array(
	    'type'=> 'hidden',
	    'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	        <a target='_blank' href='". esc_url('https://www.theclassictemplates.com/products/premium-astrology-wordpress-theme/') ." '>Upgrade to Pro</a></span>",
	    'section' => 'zodiacastrology_one_cols_section'
	));

	// Services Section
	$wp_customize->add_section('zodiacastrology_below_slider_section', array(
		'title'	=> __('Manage Services Section','zodiac-astrology'),
		'description'	=> __('<p class="sec-title">Manage Services Section</p> Select Pages from the dropdown for Services.','zodiac-astrology'),
		'priority'	=> null,
		'panel' => 'zodiacastrology_panel_area',
	));

	$wp_customize->add_setting('zodiacastrology_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'zodiacastrology_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_disabled_pgboxes', array(
	   'settings' => 'zodiacastrology_disabled_pgboxes',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label'     => __('Check To Enable This Section','zodiac-astrology'),
	   'type'      => 'checkbox'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'zodiacastrology_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Zodiacastrology_Category_Dropdown_Custom_Control( $wp_customize, 'zodiacastrology_services_cat', array(
		'section' => 'zodiacastrology_below_slider_section',
	   'label'     => __('Select Category to display Services','zodiac-astrology'),
		'settings'   => 'zodiacastrology_services_cat',
	) ) );

	//  service heading color
	$wp_customize->add_setting('zodiacastrology_serviceheading_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_serviceheading_color', array(
	   'settings' => 'zodiacastrology_serviceheading_color',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label' => __('Heading Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('zodiacastrology_service_subheading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_service_subheading', array(
	   'settings' => 'zodiacastrology_service_subheading',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label' => __('Sub Heading', 'zodiac-astrology'),
	   'type'      => 'text'
	));

	//  service subheading color
	$wp_customize->add_setting('zodiacastrology_servicesubheading_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_servicesubheading_color', array(
	   'settings' => 'zodiacastrology_servicesubheading_color',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label' => __('SubHeading Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  service title color
	$wp_customize->add_setting('zodiacastrology_servicetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_servicetitle_color', array(
	   'settings' => 'zodiacastrology_servicetitle_color',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label' => __('Title Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  service description color
	$wp_customize->add_setting('zodiacastrology_servicedescription_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_servicedescription_color', array(
	   'settings' => 'zodiacastrology_servicedescription_color',
	   'section'   => 'zodiacastrology_below_slider_section',
	   'label' => __('Description Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'zodiac_astrology_secondsec_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('zodiac_astrology_secondsec_settings_upgraded_features', array(
	  'type'=> 'hidden',
	  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	      <a target='_blank' href='". esc_url('https://www.theclassictemplates.com/products/premium-astrology-wordpress-theme/') ." '>Upgrade to Pro</a></span>",
	  'section' => 'zodiacastrology_below_slider_section'
	));

	// blog Section
	$wp_customize->add_section('zodiacastrology_below_blog_section', array(
		'title'	=> __('Manage Blog Section','zodiac-astrology'),
		'description'	=> __('<p class="sec-title">Manage Blog Section</p> Select Pages from the dropdown for blog.','zodiac-astrology'),
		'priority'	=> null,
		'panel' => 'zodiacastrology_panel_area',
	));

	$wp_customize->add_setting('zodiacastrology_disabled_blogpgboxes',array(
		'default' => false,
		'sanitize_callback' => 'zodiacastrology_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_disabled_blogpgboxes', array(
	   'settings' => 'zodiacastrology_disabled_blogpgboxes',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label'     => __('Check To Enable This Section','zodiac-astrology'),
	   'type'      => 'checkbox'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'zodiacastrology_blog_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Zodiacastrology_Category_Dropdown_Custom_Control( $wp_customize, 'zodiacastrology_blog_cat', array(
		'section' => 'zodiacastrology_below_blog_section',
	   'label'     => __('Select Category to display Blog','zodiac-astrology'),
		'settings'   => 'zodiacastrology_blog_cat',
	) ) );

	$wp_customize->add_setting('zodiacastrology_blog_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_blog_heading', array(
	   'settings' => 'zodiacastrology_blog_heading',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Heading', 'zodiac-astrology'),
	   'type'      => 'text'
	));

	//  blog heading color
	$wp_customize->add_setting('zodiacastrology_blogheading_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogheading_color', array(
	   'settings' => 'zodiacastrology_blogheading_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Heading Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('zodiacastrology_blog_subheading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_blog_subheading', array(
	   'settings' => 'zodiacastrology_blog_subheading',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Sub Heading', 'zodiac-astrology'),
	   'type'      => 'text'
	));

	//  blog subheading color
	$wp_customize->add_setting('zodiacastrology_blogsubheading_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogsubheading_color', array(
	   'settings' => 'zodiacastrology_blogsubheading_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('SubHeading Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  blog title color
	$wp_customize->add_setting('zodiacastrology_blogtitle_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogtitle_color', array(
	   'settings' => 'zodiacastrology_blogtitle_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Title Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  blog description color
	$wp_customize->add_setting('zodiacastrology_blogdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogdescription_color', array(
	   'settings' => 'zodiacastrology_blogdescription_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Description Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// blog button color
	$wp_customize->add_setting('zodiacastrology_blogbutton_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogbutton_color', array(
	   'settings' => 'zodiacastrology_blogbutton_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Button Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// blog datecomm color
	$wp_customize->add_setting('zodiacastrology_blogdatecomm_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control('zodiacastrology_blogdatecomm_color', array(
	   'settings' => 'zodiacastrology_blogdatecomm_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Date & comment Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// blog datecommicon color
	$wp_customize->add_setting('zodiacastrology_blogdatecommicon_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_blogdatecommicon_color', array(
	   'settings' => 'zodiacastrology_blogdatecommicon_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Date Icon Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	// blog boxbg color
	$wp_customize->add_setting('zodiacastrology_blogboxbg_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'zodiacastrology_blogboxbg_color', array(
	   'settings' => 'zodiacastrology_blogboxbg_color',
	   'section'   => 'zodiacastrology_below_blog_section',
	   'label' => __('Box BG Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'zodiac_astrology_thirdsec_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('zodiac_astrology_thirdsec_settings_upgraded_features', array(
	  'type'=> 'hidden',
	  'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	      <a target='_blank' href='". esc_url('https://www.theclassictemplates.com/products/premium-astrology-wordpress-theme/') ." '>Upgrade to Pro</a></span>",
	  'section' => 'zodiacastrology_below_blog_section'
	));

	//Blog post
	$wp_customize->add_section('zodiac_astrology_blog_post_settings',array(
        'title' => __('Manage Post Section', 'zodiac-astrology'),
        'priority' => null,
        'panel' => 'zodiacastrology_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('zodiac_astrology_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'zodiac_astrology_sanitize_choices'
	));
	$wp_customize->add_control('zodiac_astrology_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'zodiac-astrology'),
     'description'   => __('This option work for blog page, archive page and search page.', 'zodiac-astrology'),
     'section' => 'zodiac_astrology_blog_post_settings',
     'choices' => array(
         'full' => __('Full','zodiac-astrology'),
         'left' => __('Left','zodiac-astrology'),
         'right' => __('Right','zodiac-astrology'),
         'three-column' => __('Three Columns','zodiac-astrology'),
         'four-column' => __('Four Columns','zodiac-astrology'),
         'grid' => __('Grid Layout','zodiac-astrology')
     ),
	) );

	$wp_customize->add_setting('zodiac_astrology_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'zodiac_astrology_sanitize_choices'
	));
	$wp_customize->add_control('zodiac_astrology_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','zodiac-astrology'),
        'section' => 'zodiac_astrology_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','zodiac-astrology'),
            'Excerpt Content' => __('Excerpt Content','zodiac-astrology'),
            'Full Content' => __('Full Content','zodiac-astrology'),
        ),
	) );

	$wp_customize->add_setting('zodiac_astrology_blog_post_thumb',array(
        'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('zodiac_astrology_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'zodiac-astrology'),
        'section'     => 'zodiac_astrology_blog_post_settings',
    ));

	// Footer Section
	$wp_customize->add_section('zodiacastrology_footer', array(
		'title'	=> __('Manage Footer Section','zodiac-astrology'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','zodiac-astrology'),
		'priority'	=> null,
		'panel' => 'zodiacastrology_panel_area',
	));

	$wp_customize->add_setting('zodiac_astrology_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'zodiac_astrology_footer_bg_image',array(
        'label' => __('Footer Background Image','zodiac-astrology'),
        'section' => 'zodiacastrology_footer',
        'priority' => 1,
    )));

	$wp_customize->add_setting('zodiac_astrology_footer_widget', array(
	    'default' => false,
	    'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox',
	));
	$wp_customize->add_control('zodiac_astrology_footer_widget', array(
	    'settings' => 'zodiac_astrology_footer_widget', // Corrected setting name
	    'section'   => 'zodiacastrology_footer',
	    'label'     => __('Check to Enable Footer Widget', 'zodiac-astrology'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('zodiacastrology_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'zodiacastrology_copyright_line', array(
	   'section' 	=> 'zodiacastrology_footer',
	   'label'	 	=> __('Copyright Line','zodiac-astrology'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('zodiacastrology_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footercoypright_color', array(
	   'settings' => 'zodiacastrology_footercoypright_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('Coypright Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  footer coyprighthrv color
	$wp_customize->add_setting('zodiacastrology_footercoyprighthrv_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footercoyprighthrv_color', array(
	   'settings' => 'zodiacastrology_footercoyprighthrv_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('Coypright Hover Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  footer bg color
	$wp_customize->add_setting('zodiacastrology_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footerbg_color', array(
	   'settings' => 'zodiacastrology_footerbg_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('BG Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('zodiacastrology_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footertitle_color', array(
	   'settings' => 'zodiacastrology_footertitle_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('Title Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('zodiacastrology_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footerdescription_color', array(
	   'settings' => 'zodiacastrology_footerdescription_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('Description Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('zodiacastrology_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'zodiacastrology_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'zodiacastrology_footerlist_color', array(
	   'settings' => 'zodiacastrology_footerlist_color',
	   'section'   => 'zodiacastrology_footer',
	   'label' => __('List Color', 'zodiac-astrology'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('zodiac_astrology_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'zodiac_astrology_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'zodiac_astrology_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'zodiac-astrology' ),
        'section'        => 'zodiacastrology_footer',
        'settings'       => 'zodiac_astrology_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('zodiac_astrology_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'zodiac_astrology_sanitize_choices'
    ));
    $wp_customize->add_control('zodiac_astrology_scroll_position',array(
        'type' => 'radio',
        'section' => 'zodiacastrology_footer',
        'label'	 	=> __('Scroll To Top Positions','zodiac-astrology'),
        'choices' => array(
            'Right' => __('Right','zodiac-astrology'),
            'Left' => __('Left','zodiac-astrology'),
            'Center' => __('Center','zodiac-astrology')
        ),
    ) );

    $wp_customize->add_setting( 'zodiac_astrology_footer_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('zodiac_astrology_footer_settings_upgraded_features', array(
	    'type'=> 'hidden',
	    'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	        <a target='_blank' href='". esc_url('https://www.theclassictemplates.com/products/premium-astrology-wordpress-theme/') ." '>Upgrade to Pro</a></span>",
	    'section' => 'zodiacastrology_footer'
	));


}
add_action( 'customize_register', 'zodiacastrology_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zodiacastrology_customize_preview_js() {
	wp_enqueue_script( 'zodiacastrology_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'zodiacastrology_customize_preview_js' );
