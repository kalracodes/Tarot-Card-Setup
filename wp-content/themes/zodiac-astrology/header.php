<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Zodiac Astrology
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('zodiac_astrology_preloader', true) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'zodiac-astrology' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'zodiac_astrology_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<header id="header" class="w-100 left-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="logo">
          <?php zodiacastrology_the_custom_logo(); ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <?php if ( get_theme_mod('zodiacastrology_title_enable',true) != "") { ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a class="text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
              <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
              <?php endif; ?>
            <?php } ?>
          <?php endif; ?>
          <?php $zodiac_astrology_description = get_bloginfo( 'description', 'display' );
            if ( $zodiac_astrology_description || is_customize_preview() ) : ?>
            <?php if ( get_theme_mod('zodiacastrology_tagline_enable',false) != "") { ?>
            <p class="site-tagline"><?php echo esc_html( $zodiac_astrology_description ); ?></p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
    <div class="col-lg-9 col-md-8 menubox">
      <div class="w-auto gap-3 social-icon my-3">
        <?php if ( get_theme_mod('zodiacastrology_fb_link') != "") { ?>
          <a title="<?php echo esc_attr('facebook', 'zodiac-astrology'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('zodiacastrology_fb_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
            <i class="fab fa-facebook" aria-hidden="true"></i>
          </a>
        <?php } ?>
        <?php if ( get_theme_mod('zodiacastrology_twitt_link') != "") { ?>
          <a title="<?php echo esc_attr('twitter', 'zodiac-astrology'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('zodiacastrology_twitt_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
            <i class="fab fa-twitter" aria-hidden="true"></i>
          </a>
        <?php } ?>
        <?php if ( get_theme_mod('zodiacastrology_linked_link') != "") { ?>
          <a title="<?php echo esc_attr('linkedin', 'zodiac-astrology'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('zodiacastrology_linked_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
            <i class="fab fa-linkedin" aria-hidden="true"></i>
          </a>
        <?php } ?>
        <?php if ( get_theme_mod('zodiacastrology_insta_link') != "") { ?>
          <a title="<?php echo esc_attr('instagram', 'zodiac-astrology'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('zodiacastrology_insta_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
            <i class="fab fa-instagram" aria-hidden="true"></i>
          </a>
        <?php } ?>
      </div>
        <div class="w-auto <?php echo esc_attr(zodiac_astrology_sticky_menu()); ?>">
          <div class="toggle-nav text-center text-md-end py-2">
            <?php if(has_nav_menu('primary')){ ?>
              <button role="tab"><?php esc_html_e('MENU','zodiac-astrology'); ?></button>
            <?php }?>
          </div>
          <div id="mySidenav" class="nav sidenav text-end">
            <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','zodiac-astrology' ); ?>">
              <ul class="mobile_nav">
                <?php 
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu' ,
                    'items_wrap' => '%3$s',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                 ?>
              </ul>
              <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','zodiac-astrology'); ?></a>
            </nav>
          </div>
        </div>
    </div>
  </div>
</header>
