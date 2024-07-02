<?php

  $zodiac_astrology_color_scheme_css = '';

  // slider hide css
  $zodiacastrology_hide_categorysec = get_theme_mod( 'zodiacastrology_hide_categorysec', false);
    $zodiacastrology_slidersection = get_theme_mod('zodiacastrology_slidersection');
  if($zodiacastrology_hide_categorysec != true || $zodiacastrology_slidersection != true){
    $zodiac_astrology_color_scheme_css .='.page-template-template-home-page .main-nav ul li a, .page-template-template-home-page #header .text-white {';
      $zodiac_astrology_color_scheme_css .='color:#fff !important;';
    $zodiac_astrology_color_scheme_css .='}';
    $zodiac_astrology_color_scheme_css .='.page-template-template-home-page .main-nav ul ul li a{';
      $zodiac_astrology_color_scheme_css .='color:#000 !important;';
    $zodiac_astrology_color_scheme_css .='}';
    $zodiac_astrology_color_scheme_css .=' .page-template-template-home-page #header {';
      $zodiac_astrology_color_scheme_css .='background-color: #ec7a00 !important;padding:3em;position:static !important;';
    $zodiac_astrology_color_scheme_css .='}';
  }

  //---------------------------------Logo-Max-height--------- 
  $zodiac_astrology_logo_width = get_theme_mod('zodiac_astrology_logo_width');

  if($zodiac_astrology_logo_width != false){

    $zodiac_astrology_color_scheme_css .='.logo .custom-logo-link img{';

      $zodiac_astrology_color_scheme_css .='width: '.esc_html($zodiac_astrology_logo_width).'px;';

    $zodiac_astrology_color_scheme_css .='}';
  }

  /*---------------------------Slider Height ------------*/

    $zodiac_astrology_slider_img_height = get_theme_mod('zodiac_astrology_slider_img_height');
    if($zodiac_astrology_slider_img_height != false){
        $zodiac_astrology_color_scheme_css .='#slider .content{';
            $zodiac_astrology_color_scheme_css .='height: '.esc_attr($zodiac_astrology_slider_img_height).' !important;';
        $zodiac_astrology_color_scheme_css .='}';
    }

  /*--------------------------- Footer background image -------------------*/

    $zodiac_astrology_footer_bg_image = get_theme_mod('zodiac_astrology_footer_bg_image');
    if($zodiac_astrology_footer_bg_image != false){
        $zodiac_astrology_color_scheme_css .='.footer-widget{';
            $zodiac_astrology_color_scheme_css .='background: url('.esc_attr($zodiac_astrology_footer_bg_image).')!important;';
        $zodiac_astrology_color_scheme_css .='}';
    }

  /*--------------------------- Scroll to top positions -------------------*/

    $zodiac_astrology_scroll_position = get_theme_mod( 'zodiac_astrology_scroll_position','Right');
    if($zodiac_astrology_scroll_position == 'Right'){
        $zodiac_astrology_color_scheme_css .='#button{';
            $zodiac_astrology_color_scheme_css .='right: 20px;';
        $zodiac_astrology_color_scheme_css .='}';
    }else if($zodiac_astrology_scroll_position == 'Left'){
        $zodiac_astrology_color_scheme_css .='#button{';
            $zodiac_astrology_color_scheme_css .='left: 20px;';
        $zodiac_astrology_color_scheme_css .='}';
    }else if($zodiac_astrology_scroll_position == 'Center'){
        $zodiac_astrology_color_scheme_css .='#button{';
            $zodiac_astrology_color_scheme_css .='right: 50%;left: 50%;';
        $zodiac_astrology_color_scheme_css .='}';
    }