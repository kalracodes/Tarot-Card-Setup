<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Zodiac Astrology
 */

get_header(); ?>

<div id="content" >
  <?php
    $zodiac_astrology_hidcatslide = get_theme_mod('zodiacastrology_hide_categorysec', false);
    $zodiacastrology_slidersection = get_theme_mod('zodiacastrology_slidersection');

    if ($zodiac_astrology_hidcatslide && $zodiacastrology_slidersection) { ?>
    <section id="slider">
      <div class="owl-carousel owl-theme">
        <?php if( get_theme_mod('zodiacastrology_slidersection',false) ) { ?>
          <?php $zodiac_astrology_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('zodiacastrology_slidersection',false)));
            while( $zodiac_astrology_queryvar->have_posts() ) : $zodiac_astrology_queryvar->the_post(); ?>
          <div class="item">
            <div class="content d-flex align-items-center position-relative" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
              <div class="container position-relative" style="z-index: 1;">
                <?php
                          $trimexcerpt = get_the_excerpt();
                          $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 15 );
                          echo ' <p class="text-slider text-white mb-4 text-start">' . esc_html( $shortexcerpt ) . '</p>'; 
                        ?>
                  <h1 class="title-slider text-white mb-4 text-start"><a href="<?php echo esc_url( get_permalink() );?>">
                  <?php the_title(); ?></a>
                  </h1>
                  <div class="gap-4 text-start">
                    <?php if ( get_theme_mod('zodiacastrology_button2_text','Contact Us') != "" && get_theme_mod('zodiac_astrology_button_link_slider') != '') { ?>
                      <a href="<?php echo esc_url(get_theme_mod('zodiac_astrology_button_link_slider','')); ?>" class="button-slider cont-us btn fs-5 px-4 py-2 text-white mb-2" style="background-color: #46567a;">
                        <?php echo esc_html(get_theme_mod('zodiacastrology_button2_text',__('Contact Us','zodiac-astrology'))); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('zodiacastrology_button2_text',__('Contact Us','zodiac-astrology'))); ?></span>
                      </a>
                    <?php }?>

                    <?php if ( get_theme_mod('zodiacastrology_button_text','Read More') != "") { ?>
                      <a href="<?php echo esc_url(get_theme_mod('zodiac_astrology_button_link_slider1')!= '') ? esc_url(get_theme_mod('zodiac_astrology_button_link_slider1')) : esc_url(get_permalink()); ?>" class="button-slider redmor btn fs-5 px-4 py-2 text-white me-2 mb-2" style="background-color: #af8451;">
                      <?php echo esc_html(get_theme_mod('zodiacastrology_button_text',__('Read More','zodiac-astrology'))); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('zodiacastrology_button_text',__('Read More','zodiac-astrology'))); ?></span>
                    </a>
                    <?php }?>
                  </div>
              </div>
              <div class="overlayer"></div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
        <?php } ?>
      </div>
    </section>
  <?php } ?>

  <?php
    $zodiacastrology_hidepageboxes = get_theme_mod('zodiacastrology_disabled_pgboxes', false);
    $zodiacastrology_services_cat = get_theme_mod('zodiacastrology_services_cat', false);
    if( $zodiacastrology_hidepageboxes && $zodiacastrology_services_cat){
  ?>
    
  <section id="service" class="py-5">
    <div class="text-center w-50 mx-auto d-block">
      <h3 class="section-title fs-1 mb-4 fw-bolder text-uppercase" style="color: #ec7a00;">
      <?php echo esc_html(get_theme_mod('zodiacastrology_service_subheading')); ?>
      </h3>
    </div>
    <div class="pt-3">
      <div class="container">
        <div class="row">
        <?php if( get_theme_mod('zodiacastrology_services_cat',false) ) { ?>
          <?php $zodiac_astrology_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('zodiacastrology_services_cat',false)));
            while( $zodiac_astrology_queryvar->have_posts() ) : $zodiac_astrology_queryvar->the_post(); ?>

          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 colume-row">
            <div class="services-box rounded-4 d-flex" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
              <div class="content px-4 py-4 w-100 h-100">
                <div>
                  <h4 class="text-uppercase fw-semibold text-white fs-3 w-50 d-block mb-3"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h4>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                    echo '<p class="text-center fs-5 fw-light mb-0">' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                </div>
              </div>
            </div>
          </div>

          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <?php }?>


  <?php
    $zodiacastrology_bloghidepageboxes = get_theme_mod('zodiacastrology_disabled_blogpgboxes', false);
    $zodiacastrology_blog_cat = get_theme_mod('zodiacastrology_blog_cat', false);
    if( $zodiacastrology_bloghidepageboxes && $zodiacastrology_blog_cat){
  ?>

  <section id="blog" class="py-5">
    <div class="text-center w-50 mx-auto d-block">
      <h5 class="mb-3 fs-5 fw-bold" style="color: #46557a;">
      <?php echo esc_html(get_theme_mod('zodiacastrology_blog_heading')); ?>
      </h5>
      <h6 class="section-title fs-1 mb-4 fw-bolder" style="color: #ec7a00;">
      <?php echo esc_html(get_theme_mod('zodiacastrology_blog_subheading')); ?>
      </h6>
    </div>

    <div class="pt-3">
      <div class="container">
        <div class="row">

        <?php if( get_theme_mod('zodiacastrology_blog_cat',false) ) { ?>
          <?php $zodiac_astrology_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('zodiacastrology_blog_cat',false)));
            while( $zodiac_astrology_queryvar->have_posts() ) : $zodiac_astrology_queryvar->the_post(); ?>
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 colume-row">
            <div class="blog-box">
              <div class="blog-image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
              <div class="blog-content p-4 bg-white">
                <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                  <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-calendar blog-icon fs-5" style="color: #ec7a00;"></i>
                    <p class="fs-6 mb-0 fw-normal" style="color: #46557a;"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></p>
                  </div>
                  <div class="d-flex gap-2 align-items-center">
                    <i class="fas fa-comment-dots blog-icon fs-5" style="color: #ec7a00;"></i>
                    <p class="fs-6 mb-0 fw-normal" style="color: #46557a;"><?php echo esc_html(get_comments_number($post->ID)); ?></p>
                  </div>
                </div>
                <h6 class="blog-title fs-4" style="color: #46557a;"><a href="<?php echo esc_url( get_permalink() );?>">
                <?php the_title(); ?></a>
                </h6>
                <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                    echo '<p class="blog-description mb-3 lh-sm" style="color: #46557a;">' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                <a href="<?php the_permalink(); ?>" class="text-uppercase text-decoration-none fw-bold" style="color: #ec7a00;"><?php echo esc_html('..... Read More','zodiac-astrology'); ?></a>
              </div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </section>
  <?php }?>
</div>

<?php get_footer(); ?>