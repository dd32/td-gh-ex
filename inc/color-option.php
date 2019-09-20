<?php
	
	$bb_wedding_bliss_theme_color_first = get_theme_mod('bb_wedding_bliss_theme_color_first');

	$custom_css = '';

	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.pagination a:hover, .pagination .current, #header .nav ul.sub-menu li a:hover, #footer input[type="submit"], .primary-navigation ul ul a, .blogbutton-small:hover, .blogbutton-small, span.meta-nav  {';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.social-media i:hover, #header .nav ul li a:active, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li a, #slider .inner_carousel h2 a, #sidebar h3, #sidebar input[type="submit"], span.tagged_as a, #footer li a:hover,.primary-navigation a:hover, #love-Story h3, .heading-line h3, input[type="submit"], .our-services .page-box h4 a:hover{';
			$custom_css .='color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='a:focus{';
			$custom_css .='outline: 1px dotted '.esc_html($bb_wedding_bliss_theme_color_first).'!important;';
		$custom_css .='}';
	}
	
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.serach_inner form.search-form {';
			$custom_css .='border-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}

	$bb_wedding_bliss_theme_color_second = get_theme_mod('bb_wedding_bliss_theme_color_second');

	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .abovecopyright, #sidebar h3, #sidebar input[type="submit"], .pagination a, .pagination span, input[type="submit"], .hvr-sweep-to-right:before{';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.blogbutton-small, input.search-field {';
			$custom_css .='border-color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.pagination .current, .blogbutton-small, .our-services .page-box h4 a {';
			$custom_css .='color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}