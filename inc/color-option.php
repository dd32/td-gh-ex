<?php
	
	$advance_ecommerce_store_theme_color = get_theme_mod('advance_ecommerce_store_theme_color');

	$custom_css = '';

	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#sidebar .tagcloud a:hover,.top-menu,.main-menu, .account a i, span.cart-value, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, .product-service, .second-border a:hover, span.meta-nav, #footer input[type="submit"], .copyright, woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], .pagination a:hover, .pagination .current, .woocommerce span.onsale, #footer .tagcloud a:hover, input[type="submit"] {';
			$custom_css .='background-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#footer h3, .woocommerce-message::before, #footer h3,.woocommerce-message::before, .primary-navigation ul ul a, .primary-navigation a:hover, #footer li a:hover, .entry-content a{';
			$custom_css .='color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='.woocommerce-message, hr.slidehr{';
			$custom_css .='border-top-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#footer .tagcloud a:hover,.page-box, #footer input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li, #comments input[type="submit"].submit, .primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($advance_ecommerce_store_theme_color).'!important;';
		$custom_css .='}';
	}
