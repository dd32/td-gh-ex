<?php
	
	$advance_business_theme_color = get_theme_mod('advance_business_theme_color');

	$custom_css = '';

	if($advance_business_theme_color != false){
		$custom_css .='.search-box i, #slider .carousel-control-next-icon i:hover,#slider .carousel-control-prev-icon i:hover, #slider .inner_carousel .know-btn a:hover, hr.project-hr, .second-border a:hover,  #footer input[type="submit"], .copyright,#footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], a.button,.meta-nav:hover{';
			$custom_css .='background-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='input[type="submit"],.contact i,.woocommerce-message::before, #footer h3.widget-title a, #footer li a:hover,.primary-navigation a:hover, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul a, .sf-arrows ul .sf-with-ul:after, .primary-navigation ul ul li:hover > a, .primary-navigation a:focus,#sidebar ul li a:hover, .page-box h2 a:hover, .metabox a:hover{';
			$custom_css .='color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.woocommerce-message,.primary-navigation ul ul li:first-child{';
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

// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_business_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_business_theme_color).' 120%);
		}';
	}
	$custom_css .='}';