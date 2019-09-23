<?php
	
	$aagaz_startup_theme_color = get_theme_mod('aagaz_startup_theme_color');

	$custom_css = '';

	if($aagaz_startup_theme_color != false){
		$custom_css .='.topbar, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, .readbutton a, .aboutbtn a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .post-link a, .post-info, #sidebox h2, button.search-submit:hover, .search-form button.search-submit, .copyright, .widget .tagcloud a:hover,.widget .tagcloud a:focus,.widget.widget_tag_cloud a:hover,.widget.widget_tag_cloud a:focus,.wp_widget_tag_cloud a:hover,.wp_widget_tag_cloud a:focus, .main-navigation li li a:hover,.main-navigation li li a.focus, button,input[type="button"],input[type="submit"], .prev.page-numbers:focus,.prev.page-numbers:hover,.next.page-numbers:focus,.next.page-numbers:hover{';
			$custom_css .='background-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.main-navigation li li:focus > a, .main-navigation a:hover, .main-navigation ul ul li a, .main-navigation li li:focus > a, .woocommerce-message::before, .nav-subtitle{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.main-navigation ul ul, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, #about .abt-image{';
			$custom_css .='border-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='#about .about-text hr, .woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.main-navigation a:hover{';
			$custom_css .='border-bottom-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.site-footer ul li a:hover{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).'!important;';
		$custom_css .='}';
	}
