<?php
	
	$advance_coaching_theme_color = get_theme_mod('advance_coaching_theme_color');

	$custom_css = '';

	if($advance_coaching_theme_color != false){
		$custom_css .='.read-moresec a:hover, .logo, .top-header .time, .request-btn a i, #slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i, #slider .inner_carousel .read-btn a i, #coaching .read-more a i, .read-more-btn a i, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], #comments a.comment-reply-link, .tags p a:hover,.meta-nav:hover,#menu-sidebar input[type="submit"], .toggle-menu i, input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message::before, h1.entry-title,h1.page-title, h2.woocommerce-loop-product__title,.metabox a, .metabox i, .metabox .entry-comments, .tags i, .tags p a, .contact_data .mail i,#sidebar ul li a:hover,.meta-nav, .page-template-custom-front-page .search-box i, .page-box .metabox a, .entry-content a, .comment-body p a, .entry-content code{';
			$custom_css .='color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message, .primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#footer input[type="search"],.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).'!important;';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_coaching_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_coaching_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_coaching_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%; padding-right: 15px !important; padding-left: 15px !important; margin-right: auto !important; margin-left: auto !important;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='right: 0';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0;';
		$custom_css .='}';
		$custom_css .='.request-btn a{';
			$custom_css .='padding:14px 10px';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='right: 0; left:0;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .menu-bar{';
			$custom_css .='padding-left:15px;';
		$custom_css .='}';
	}

	$show_header = get_theme_mod( 'advance_coaching_display_topbar', true);
	if($show_header == false){
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='margin-top: 0;';
		$custom_css .='}';
	}

	$show_slider = get_theme_mod( 'advance_coaching_slider_hide', true);
	if($show_slider == false){
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='background-color:#051f31; position: static;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .menu-bar{';
			$custom_css .='background-color:transparent;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .primary-navigation a, .page-template-custom-front-page .sf-arrows .sf-with-ul:after, .page-template-custom-front-page .contact_data .mail p{';
			$custom_css .='color:#fff;';
		$custom_css .='}';
	}
