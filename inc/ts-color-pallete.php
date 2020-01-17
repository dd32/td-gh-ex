<?php
	
	$advance_fitness_gym_theme_color = get_theme_mod('advance_fitness_gym_theme_color');

	$custom_css = '';

	if($advance_fitness_gym_theme_color != false){
		$custom_css .='a.button, .account a i, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #fitness-togym .wlcm-hr, .second-border a:hover,#footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"],#menu-sidebar input[type="submit"],.meta-nav:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover,input[type="submit"],#comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .=' #footer h3, .woocommerce-message::before, h1.entry-title,h1.page-title, #slider .inner_carousel h1,#header .top-contact i, #footer h3.widget-title a, #footer li a:hover, .primary-navigation a:hover, .primary-navigation ul ul a, h2.entry-title, h2.page-title, .primary-navigation ul ul li:hover > a, .primary-navigation ul li a:hover,.metabox a:hover, #sidebar ul li a:hover,.tags i{';
			$custom_css .='color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.woocommerce-message, .primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#footer input[type="search"], .second-border a:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover{';
			$custom_css .='border-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).'!important;';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_fitness_gym_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info {
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_fitness_gym_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_fitness_gym_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}

	// css

	$show_header = get_theme_mod( 'advance_fitness_gym_slider_hide', true);
		if($show_header == false){
			$custom_css .='.fitnes-post{';
				$custom_css .=';';
			$custom_css .='}';
			$custom_css .='.fitnes-post{';
				$custom_css .='margin-top: 0%;padding:0;';
			$custom_css .='}';
		}