<?php
	
	$bb_mobile_application_theme_color = get_theme_mod('bb_mobile_application_theme_color');

	$custom_css = '';

	if($bb_mobile_application_theme_color != false){
		$custom_css .='#header, .search-form input.search-submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #slider .know-btn a,.read-more-box, .inner, #footer input[type="submit"], #footer .tagcloud a:hover, #sidebar input[type="submit"], #sidebar h3,.pagination span, .pagination .current, .pagination a:hover,#comments input[type="submit"].submit,.meta-nav:hover,.tags p a:hover,#sidebar .tagcloud a:hover,#comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.woocommerce-message::before, #footer h3, td#prev a, .copyright-wrapper li a:hover, .nav-previous a, .tags i,.metabox a:hover{';
			$custom_css .='color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.primary-navigation ul ul a{';
			$custom_css .='color: '.esc_html($bb_mobile_application_theme_color).'!important;';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.new-text{';
			$custom_css .='border-left-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='#footer .tagcloud a,.primary-navigation ul ul,.tags p a:hover{';
			$custom_css .='border-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='#footer h3{';
			$custom_css .='border-bottom-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.page-template-custom-front-page .primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($bb_mobile_application_theme_color).'!important;';
		$custom_css .='}';
	}
	
	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($bb_mobile_application_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($bb_mobile_application_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'bb_mobile_application_width_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:95.8%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:100%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97%;';
		$custom_css .='} }';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width:86.4%;';
		$custom_css .='}';
		$custom_css .='#header{';
			$custom_css .='padding-left:20px;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:95.8%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:100%;';
		$custom_css .='} }';
	}