<?php

	$automobile_car_dealer_first_color = get_theme_mod('automobile_car_dealer_first_color');

	$custom_css ='';
	/*------------------------------ Global First Color -----------*/

	if($automobile_car_dealer_first_color != false){
		$custom_css .='input[type="submit"]:hover, #sidebar button, .slide-button i, .appointbtn, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .postbtn i, .blog-section .section-title a:after, .page-content .read-moresec a.button:hover, #comments input[type="submit"].submit:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, #sidebar .tagcloud a, .widget_calendar tbody a, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"], .footer-wp .tagcloud a:hover , .pagination a:hover, .pagination .current, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #navbar-header .socialbox, #navbar-header .socialbox{';
				$custom_css .='background-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='a, #header .socialbox i:hover, .metabox a:hover, .postbtn a, .nav-previous a ,.nav-next a, p.logged-in-as a, nav.navigation.post-navigation a:hover , .tags a, #sidebar ul li a:hover, .footer-wp li a:hover, h2.entry-title, h2.page-title, #project i, .woocommerce-message::before, .woocommerce-info a, td.product-name a, a.shipping-calculator-button, span.posted_in a, code, .primary-navigation a:hover{';
				$custom_css .='color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='#blog_sec .sticky, .page-content .read-moresec a.button:hover{';
				$custom_css .='border-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='.woocommerce-message{';
				$custom_css .='border-top-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
