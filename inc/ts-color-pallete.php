<?php
	
/*---------------------------Theme color option-------------------*/
	$advance_startup_theme_color_first = get_theme_mod('advance_startup_theme_color_first');

	$custom_css = '';

	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .inner_carousel .readbtn a, #we_provide h3:before, #we_provide .theme_button a:hover ,.read-more-btn a:hover, .copyright, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar input[type="submit"]:hover, #menu-sidebar input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_first).' !important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i{';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_first).' !important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul a:hover{';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_first).'';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .inner_carousel .readbtn a{';
			$custom_css .='border-color: '.esc_html($advance_startup_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul li:first-child{';
			$custom_css .='border-color: '.esc_html($advance_startup_theme_color_first).';';
		$custom_css .='}';
	}
	/*------------------Theme color option-------------------*/
	$advance_startup_theme_color_second = get_theme_mod('advance_startup_theme_color_second');

	if($advance_startup_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, .read-moresec a:hover, .talk-btn a:hover,  #footer input[type="submit"], #footer .tagcloud a:hover, .woocommerce span.onsale, #sidebar .tagcloud a:hover,.page-template-custom-front-page .main-menu .menu-color,input[type="submit"], .tags p a:hover, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='h4,h5,h6,.read-moresec a,.metabox i, section h4,#comments a time,.woocommerce-message::before,.woocommerce .quantity .qty, #sidebar caption, h1.entry-title,.new-text p a, h3.widget-title a,.new-text h2 a, article.page-box-single h3 a, div#comments a, a.added_to_cart.wc-forward, .meta-nav, .tags i, .entry-content li code, #sidebar ul li:hover,#sidebar ul li:active, #sidebar ul li:focus,.metabox span a:hover{';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.talk-btn a:hover, #footer input[type="search"], .woocommerce .quantity .qty, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .tags p a:hover, .tags p a{';
			$custom_css .='border-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='#sidebar ul li a:hover,#sidebar ul li:active, #sidebar ul li:focus {';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false || $advance_startup_theme_color_first != false){
		$custom_css .='#we_provide h3:before{
		background: linear-gradient(130deg, '.esc_html($advance_startup_theme_color_second).' 40%, '.esc_html($advance_startup_theme_color_first).' 77%)!important;
		}';
	}
	if($advance_startup_theme_color_second){
		$custom_css .='.page-template-custom-front-page .main-menu .menu-color{
		background: linear-gradient(90deg, #fff 94%, '.esc_html($advance_startup_theme_color_second).' 19%);
		}';
	}
	if($advance_startup_theme_color_second != false || $advance_startup_theme_color_first != false){
		$custom_css .='#we_provide .theme_button a:hover, .read-more-btn a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar input[type="submit"]:hover, .copyright, #slider{
		background-image: linear-gradient(130deg, '.esc_html($advance_startup_theme_color_second).' 40%, '.esc_html($advance_startup_theme_color_first).' 77%);
		}';
	}


// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_startup_theme_color_first != false || $advance_startup_theme_color_second != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a{
	background-image: linear-gradient(-90deg, '.esc_html($advance_startup_theme_color_first).' 0%, '.esc_html($advance_startup_theme_color_second).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_startup_theme_options','Default');
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
		$custom_css .='.page-template-custom-front-page #header-top{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header-top{';
			$custom_css .='max-width: 1110px; ';
		$custom_css .='}';
	}

	// css

	$show_header = get_theme_mod( 'advance_startup_slider_hide', true);
		if($show_header == false){
			$custom_css .='.page-template-custom-front-page #header-top{';
				$custom_css .=';';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page #header-top{';
				$custom_css .='position: static;background: rgba(0, 0, 0, 1);';
			$custom_css .='}';
		}
		if($show_header == false){
			$custom_css .='.page-template-custom-front-page .main-menu{';
				$custom_css .=';';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page .main-menu{';
				$custom_css .='margin:0; border-bottom-color: #906b00;border-bottom: 1px solid #906b00;padding:0;';
			$custom_css .='}';
		}

		$show_header = get_theme_mod( 'advance_startup_title', true);
		if($show_header == false){
			$custom_css .='#we_provide{';
				$custom_css .='padding:0;';
			$custom_css .='}';
		}