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

