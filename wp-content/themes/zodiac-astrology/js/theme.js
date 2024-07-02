jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

// sticky header
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('.is-sticky-on').addClass('sticky-head');
  }
  else {
    jQuery('.is-sticky-on').removeClass('sticky-head');
  }
});

jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    zodiacastrology_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function zodiacastrology_trapFocus( element, namespace ) {
  var zodiacastrology_focusableEls = element.find( 'a, button' );
  var zodiacastrology_firstFocusableEl = zodiacastrology_focusableEls[0];
  var zodiacastrology_lastFocusableEl = zodiacastrology_focusableEls[zodiacastrology_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  zodiacastrology_firstFocusableEl.focus();

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) {
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === zodiacastrology_firstFocusableEl ) {
        zodiacastrology_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === zodiacastrology_lastFocusableEl ) {
        zodiacastrology_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

jQuery(document).ready(function() {
  jQuery('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    // touchDrag: true,
    nav: false,
    dots: true,
    rtl:true,
    items: 1,
  })
});

/* ===============================================
  SCROLL TOP
============================================= */

jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
  });
