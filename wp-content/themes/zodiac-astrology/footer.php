<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Zodiac Astrology
 */
?>
<div id="footer">

  <?php 
    $zodiac_astrology_footer_widget_enabled = get_theme_mod('zodiac_astrology_footer_widget', false);
    
    if ($zodiac_astrology_footer_widget_enabled !== false && $zodiac_astrology_footer_widget_enabled !== '') { ?>
      <div class="footer-widget">
        <div class="container">
          <div class="row py-3 footer-content">
            <?php dynamic_sidebar('footer-nav'); ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="clear"></div>

  <div class="copywrap text-center">
    <div class="container">
      <a href="<?php echo esc_url(ZODIACASTROLOGY_FOOTER_LINK); ?>" target="_blank"><?php echo esc_html(get_theme_mod('zodiacastrology_copyright_line',__('Zodiac Astrology WordPress Theme','zodiac-astrology'))); ?></a> <?php echo esc_html('By Classic Templates','zodiac-astrology'); ?>
    </div>
  </div>

</div>

<?php if(get_theme_mod('zodiac_astrology_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'zodiac-astrology'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
