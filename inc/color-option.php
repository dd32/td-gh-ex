<?php
	
	$bb_wedding_bliss_theme_color_first = get_theme_mod('bb_wedding_bliss_theme_color_first');

	$custom_css = '';

	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.pagination a:hover, .pagination .current, #header .nav ul.sub-menu li a:hover, #footer input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.social-media i:hover, #header .nav ul li a:active,
	#header .nav ul li a:hover,#header .nav ul li a, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li a, .heading-line h3, #love-Story h3, #slider .inner_carousel h2 a, #sidebar h3, #sidebar input[type="submit"], .woocommerce a, span.posted_in a, span.tagged_as a{';
			$custom_css .='color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='{';
			$custom_css .='border-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}

	$bb_wedding_bliss_theme_color_second = get_theme_mod('bb_wedding_bliss_theme_color_second');

	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #header .nav ul, .abovecopyright, .page-template-custom-front-page #header, #header, #sidebar h3, #sidebar input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}
	