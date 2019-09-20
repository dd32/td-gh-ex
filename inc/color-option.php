<?php
	
	$advance_business_theme_color = get_theme_mod('advance_business_theme_color');

	$custom_css = '';

	if($advance_business_theme_color != false){
		$custom_css .='a.button, .search-box i, #slider .carousel-control-next-icon i:hover,#slider .carousel-control-prev-icon i:hover, #slider .inner_carousel .know-btn a:hover, hr.project-hr, .second-border a:hover, span.meta-nav, #footer input[type="submit"], .copyright,#footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], a.button, .pagination span, .pagination a, .primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='input[type="submit"],.contact i, #footer h3,.woocommerce-message::before, h3.widget-title a, #footer li a:hover, .primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a, .primary-navigation a:hover, .entry-content a{';
			$custom_css .='color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='#footer input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.main-menu-navigation .primary-navigation ul li a:hover{';
			$custom_css .='color: '.esc_html($advance_business_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_business_theme_color).'!important;';
		$custom_css .='}';
	}