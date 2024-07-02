<?php

	$zodiac_astrology_custom_css = '';

	// slider hide css
	$zodiacastrology_hide_categorysec = get_theme_mod( 'zodiacastrology_hide_categorysec', false);
	if($zodiacastrology_hide_categorysec == false){
		$zodiac_astrology_custom_css .='page-template-template-home-page .main-nav ul li a{';
			$zodiac_astrology_custom_css .='color:#262626;';
		$zodiac_astrology_custom_css .='}';
	}
