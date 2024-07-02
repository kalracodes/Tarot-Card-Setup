<?php
/**
 * @package Zodiac Astrology
 * Setup the WordPress core custom header feature.
 *
 * @uses zodiacastrology_header_style()
 */
function zodiacastrology_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'zodiacastrology_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 400,
		'wp-head-callback'       => 'zodiacastrology_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'zodiacastrology_custom_header_setup' );

if ( ! function_exists( 'zodiacastrology_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see zodiacastrology_custom_header_setup().
 */
function zodiacastrology_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		#header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
			background-size: cover;
		}

	<?php endif; ?>	

	#header p.text-white {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sitetitle_color')); ?> !important;
	}

	#header .text-white h1 a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sitetagline_color')); ?> !important;
	}

	#header .fa-facebook {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_fb_color')); ?>;
	}

	#header .fa-twitter { 
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_twitt_color')); ?>;
	}

	#header .fa-linkedin  {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_linked_color')); ?>;
	}

	#header .fa-instagram  {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_insta_color')); ?>;
	}

	

	.main-nav ul li a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_menu_color')); ?>;
	}



	.main-nav a:hover, .current_page_item a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_menuhrv_color')); ?>;
	}


	.main-nav ul ul a{
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_submenu_color')); ?>;
	}

	.main-nav ul ul {
		background: <?php echo esc_attr(get_theme_mod('zodiacastrology_submenubg_color')); ?>;
	}

	.main-nav ul ul a:hover {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_submenuhrv_color')); ?>;
	}

	.main-nav ul ul li {
		border-color: <?php echo esc_attr(get_theme_mod('zodiacastrology_submenuborder_color')); ?>;
	}


	#slider h1.title-slider {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_slidertitle_color')); ?> !important;
	}

	#slider p.text-slider {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sliderdescription_color')); ?> !important;
	}


	#slider .redmor {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sliderbutton1text_color')); ?> !important;
	}

	#slider .redmor {
		background-color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sliderbutton1_color')); ?> !important;
	}

	#slider .cont-us {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sliderbutton2text_color')); ?> !important;
	}

	#slider .cont-us {
		background-color: <?php echo esc_attr(get_theme_mod('zodiacastrology_sliderbutton2_color')); ?> !important;
	}



	
	#service .text-center h2 {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_serviceheading_color')); ?> !important;
	}

	#service .text-center h3.section-title {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_servicesubheading_color')); ?> !important;
	}

	#service .services-box h4 {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_servicetitle_color')); ?> !important;
	}

	#service .services-box p {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_servicedescription_color')); ?> !important;
	}


	#blog h5 {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogheading_color')); ?> !important;
	}

	#blog h6{
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogsubheading_color')); ?> !important;
	}

	#blog .blog-title {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogtitle_color')); ?> !important;
	}

	#blog .blog-content .blog-description {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogdescription_color')); ?> !important;
	}

	#blog .blog-content a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogbutton_color')); ?> !important;
	}

	#blog .blog-content i {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogdatecommicon_color')); ?> !important;
	}

	#blog .blog-content {
		background: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogboxbg_color')); ?> !important;
	}

	#blog .blog-content p {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_blogdatecomm_color')); ?> !important;
	}


	.copywrap a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footercoypright_color')); ?>;
	}

	.copywrap a:hover {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footercoyprighthrv_color')); ?>;
	}


	#footer h6 {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footertitle_color')); ?> !important;

	}

	#footer p {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footerdescription_color')); ?> !important;

	}

	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footerlist_color')); ?>;

	}


	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('zodiacastrology_footerbg_color')); ?>;
	}
	

	</style>
	<?php 
}
endif;