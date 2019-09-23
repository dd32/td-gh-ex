<?php
	
	$bb_mobile_application_theme_color = get_theme_mod('bb_mobile_application_theme_color');

	$custom_css = '';

	if($bb_mobile_application_theme_color != false){
		$custom_css .='#header, .search-form input.search-submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #slider .know-btn a,.read-more-box, .inner, #footer input[type="submit"], #footer .tagcloud a:hover, #sidebar input[type="submit"], #sidebar h3,.pagination span, .pagination .current, .pagination a:hover{';
			$custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.woocommerce-message::before, #footer h3, td#prev a, .rssSummary, a.rsswidget, .copyright-wrapper li a:hover, .primary-navigation ul ul a, .new-text h3 a, div#comments a, .nav-next span, .nav-previous a, .primary-navigation ul ul a, .woocommerce-info a, .entry-content p a, a.added_to_cart.wc-forward, span.tagged_as a {';
			$custom_css .='color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.new-text{';
			$custom_css .='border-left-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='#footer .tagcloud a{';
			$custom_css .='border-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='#footer h3{';
			$custom_css .='border-bottom-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, .primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).'!important;';
		$custom_css .='}';
	}
