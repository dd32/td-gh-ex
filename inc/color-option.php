<?php
	
	$advance_portfolio_theme_color_first = get_theme_mod('advance_portfolio_theme_color_first');

	$custom_css = '';

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='a.button, .second-border a:hover, span.meta-nav, #footer input[type="submit"], .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #banner .social-media i:hover{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).'!important;';
		$custom_css .='}';
	}

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='input[type="submit"], .social-media i:hover, #header .nav ul li a:hover,#header .nav ul li a:active, #footer h3,a.showcoupon,.woocommerce-message::before, #sidebar h3, h1.entry-title,h1.page-title, h3.widget-title a{';
			$custom_css .='color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='#footer input[type="search"], #footer input[type="submit"], #footer .tagcloud a:hover{';
			$custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}

	$advance_portfolio_theme_color_second = get_theme_mod('advance_portfolio_theme_color_second');

	if($advance_portfolio_theme_color_second != false){
		$custom_css .='#header .horizontal, #header, #header .horizontal, #header, #banner .social-media i:hover, #header .horizontal, #header{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_second != false){
		$custom_css .='#banner .social-media i:hover, #banner .social-media i:hover{';
			$custom_css .='color: '.esc_html($advance_portfolio_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_second != false){
		$custom_css .='.page-box, .page-box, .page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_portfolio_theme_color_second).';';
		$custom_css .='}';
	}
	