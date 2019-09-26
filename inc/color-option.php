<?php
	
	$advance_portfolio_theme_color_first = get_theme_mod('advance_portfolio_theme_color_first');

	$custom_css = '';

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='a.button, .second-border a:hover, span.meta-nav, #footer input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale, .primary-navigation ul ul, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, #footer .tagcloud a:hover{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #banner .social-media i:hover{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).'!important;';
		$custom_css .='}';
	}

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='input[type="submit"], .social-media i:hover, #header .primary-navigation ul li a:hover,#header .primary-navigation ul li a:active, #footer h3,.woocommerce-message::before, h1.entry-title,h3.widget-title a, #footer li a:hover, .primary-navigation ul ul a, .primary-navigation li a:hover, .entry-content p a{';
			$custom_css .='color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='#footer input[type="search"], #footer input[type="submit"], #footer .tagcloud a:hover{';
			$custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}

/*---------------------------Theme color option-------------------*/

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
			$custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_second).';';
		$custom_css .='}';
	}
	