<?php
	
	$advance_portfolio_theme_color_first = get_theme_mod('advance_portfolio_theme_color_first');

	$custom_css = '';

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='.read-moresec a.button, .second-border a:hover, #footer input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale,  #comments input[type="submit"].submit, #footer .tagcloud a:hover,.meta-nav:hover,#comments a.comment-reply-link,.tags p a:hover,#menu-sidebar input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$custom_css .=' nav.woocommerce-MyAccount-navigation ul li, #banner .social-media i:hover{';
			$custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).'!important;';
		$custom_css .='}';
	}

	if($advance_portfolio_theme_color_first != false){
		$custom_css .='.social-media i:hover,#footer h3,.woocommerce-message::before, h1.entry-title,#footer h3.widget-title a, #footer li a:hover, .primary-navigation li a:hover,.metabox a:hover,#sidebar ul li a:hover,.sf-arrows ul li > .sf-with-ul:focus:after,.sf-arrows ul li:hover > .sf-with-ul:after,.sf-arrows .sfHover > .sf-with-ul:after,.sf-arrows ul .sf-with-ul:after,.tags i{';
			$custom_css .='color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='#footer input[type="search"], #footer input[type="submit"], #footer .tagcloud a:hover,.second-border a:hover,.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_portfolio_theme_color_first).' !important;';
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

// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_portfolio_theme_color_second != false || $advance_portfolio_theme_color_first != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_portfolio_theme_color_second).' 0%, '.esc_html($advance_portfolio_theme_color_first).' 120%);
		} ';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_portfolio_theme_options','Default');
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
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='right:0;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='right:0;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
	}

	// css
	$show_header = get_theme_mod( 'advance_portfolio_page_settings', true);
		if($show_header == false){
			$custom_css .='.page-template-custom-front-page #header{';
				$custom_css .='position:static; background-color: #ffdd65;';
			$custom_css .='}';
		}
	