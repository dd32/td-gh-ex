<?php
	
	$advance_coaching_theme_color = get_theme_mod('advance_coaching_theme_color');

	$custom_css = '';

	if($advance_coaching_theme_color != false){
		$custom_css .='.read-moresec a:hover, .logo, .top-header .time, .request-btn a i, #slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i, #slider .inner_carousel .read-btn a i, #coaching .read-more a i, .read-more-btn a i, span.meta-nav, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='input[type="submit"], .contact_data .mail i, .search-box i, #footer h3, #footer a.rsswidget, a.showcoupon,.woocommerce-message::before, h1.entry-title,h1.page-title, h2.woocommerce-loop-product__title{';
			$custom_css .='color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#footer input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).'!important;';
		$custom_css .='}';
	}