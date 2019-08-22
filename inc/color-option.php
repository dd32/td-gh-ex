<?php
	
	$advance_fitness_gym_theme_color = get_theme_mod('advance_fitness_gym_theme_color');

	$custom_css = '';

	if($advance_fitness_gym_theme_color != false){
		$custom_css .='a.button, .account a i, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #fitness-togym .wlcm-hr, .second-border a:hover, span.meta-nav, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='input[type="submit"], #slider .inner_carousel h2, #footer h3, .woocommerce-message::before, h1.entry-title,h1.page-title, #slider .inner_carousel h2, input[type="submit"],#header .top-contact i, h3.widget-title a, #footer li a:hover{';
			$custom_css .='color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#footer input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.main-menu .nav ul li a:hover{';
			$custom_css .='color: '.esc_html($advance_fitness_gym_theme_color).'!important;';
		$custom_css .='}';
	}
