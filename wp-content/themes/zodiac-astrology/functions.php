<?php
/**
 * Zodiac Astrology functions and definitions
 *
 * @package Zodiac Astrology
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'zodiacastrology_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function zodiacastrology_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zodiac-astrology' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // zodiacastrology_setup
add_action( 'after_setup_theme', 'zodiacastrology_setup' );

function zodiacastrology_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' , ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function zodiacastrology_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'zodiac-astrology' ),
		'description'   => __( 'Appears on blog page sidebar', 'zodiac-astrology' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'zodiac-astrology' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'zodiac-astrology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'zodiac-astrology' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'zodiac-astrology' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'zodiac-astrology' ),
		'description'   => __( 'Appears on shop page', 'zodiac-astrology' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'zodiac-astrology' ),
		'description'   => __( 'Appears on footer', 'zodiac-astrology' ),
		'id'            => 'footer-nav',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-lg-3 col-mb-3 col-sm-6 col-xs-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title text-white fw-normal fs-4 mb-2">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'zodiacastrology_widgets_init' );

function zodiacastrology_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('zodiac-astrology-style', get_stylesheet_uri(), array() );
		wp_style_add_data('zodiac-astrology-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'zodiac-astrology-style',$zodiac_astrology_color_scheme_css );
	
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'zodiac-astrology-default', esc_url(get_template_directory_uri())."/css/default.css" );
	
	wp_enqueue_style( 'zodiac-astrology-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'zodiac-astrology-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'zodiac-astrology-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$zodiac_astrology_headings_font = esc_html(get_theme_mod('zodiac_astrology_headings_fonts'));
	$zodiac_astrology_body_font = esc_html(get_theme_mod('zodiac_astrology_body_fonts'));

	if ($zodiac_astrology_headings_font) {
	    wp_enqueue_style('zodiac-astrology-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($zodiac_astrology_headings_font));
	} else {
	    wp_enqueue_style('cinzel-decorative-headings', 'https://fonts.googleapis.com/css?family=Cinzel+Decorative:wght@400;700;900');
	}

	if ($zodiac_astrology_body_font) {
	    wp_enqueue_style('zodiac-astrology-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($zodiac_astrology_body_font));
	} else {
	    wp_enqueue_style('poppins-body', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'zodiacastrology_scripts' );

// Footer Link
define('ZODIACASTROLOGY_FOOTER_LINK',__('https://www.theclassictemplates.com/products/free-astrology-wordpress-theme','zodiac-astrology'));

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Theme Info.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';


if ( ! defined( 'ZODIACASTROLOGY_THEME_PAGE' ) ) {
define('ZODIACASTROLOGY_THEME_PAGE',__('https://www.theclassictemplates.com/collections/all','zodiac-astrology'));
}
if ( ! defined( 'ZODIACASTROLOGY_SUPPORT' ) ) {
define('ZODIACASTROLOGY_SUPPORT',__('https://wordpress.org/support/theme/zodiac-astrology','zodiac-astrology'));
}
if ( ! defined( 'ZODIACASTROLOGY_REVIEW' ) ) {
define('ZODIACASTROLOGY_REVIEW',__('https://wordpress.org/support/theme/zodiac-astrology/reviews/#new-post','zodiac-astrology'));
}
if ( ! defined( 'ZODIACASTROLOGY_PRO_DEMO' ) ) {
define('ZODIACASTROLOGY_PRO_DEMO',__('https://live.theclassictemplates.com/demo/zodiac-astrology','zodiac-astrology'));
}
if ( ! defined( 'ZODIACASTROLOGY_PREMIUM_PAGE' ) ) {
define('ZODIACASTROLOGY_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/premium-astrology-wordpress-theme/','zodiac-astrology'));
}
if ( ! defined( 'ZODIACASTROLOGY_THEME_DOCUMENTATION' ) ) {
define('ZODIACASTROLOGY_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/zodiac-astrology-free/','zodiac-astrology'));
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

if ( ! function_exists( 'zodiacastrology_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function zodiacastrology_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
