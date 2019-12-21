<?php

	$advance_it_company_theme_color_first = get_theme_mod('advance_it_company_theme_color_first');

	$custom_css = '';

	if($advance_it_company_theme_color_first != false){
		$custom_css .='input[type="submit"], .social-icons i:hover, #slider .inner_carousel .readbtn a:hover, #slider .inner_carousel .readbtn a i, #work_cat h5, .cat-posts:hover, .read-more-btn a:hover, .read-more-btn a i, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar h3, #sidebar .tagcloud a:hover, #sidebar input[type="submit"],#sidebar input[type="submit"],#comments a.comment-reply-link, #menu-sidebar input[type="submit"], .pagination a:hover, .meta-nav:hover{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_first).'!important;';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='h4,h5,h6,  #slider .carousel-control-next-icon i, section h4, #footer h3, #comments a time, .woocommerce-message::before,.metabox i, #footer li a:hover,.primary-navigation ul ul a:focus,  .primary-navigation ul ul a:hover, .metabox a:hover, .mail i,.phone i,.address i{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='.serach_inner form.search-form, #footer input[type="search"], .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .pagination a:hover{';
			$custom_css .='border-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='.woocommerce-message ,.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	/*---------------------------Theme color option-------------------*/
	$advance_it_company_theme_color_second = get_theme_mod('advance_it_company_theme_color_second');

	if($advance_it_company_theme_color_second != false){
		$custom_css .='.search-box i, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover i, .read-more-btn a, .read-more-btn a:hover i, .read-moresec a:hover,.tags p a:hover, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .='.woocommerce .quantity .qty, .read-moresec a{';
			$custom_css .='border-color: '.esc_html($advance_it_company_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .='.woocommerce .quantity .qty, #work_cat h2, .new-text h2 a,.content-ts h1, .content-ts h3,.cart_totals h2, .read-moresec a, .tags i{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .=' #sidebar ul li a:hover,#sidebar ul li:active, #sidebar ul li:focus{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_second).'!important;';
		$custom_css .='}';
	}
	
// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_it_company_theme_color_second != false || $advance_it_company_theme_color_first != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .primary-navigation li a:focus, .primary-navigation li:hover a,#contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_it_company_theme_color_second).' 0%, '.esc_html($advance_it_company_theme_color_first).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_it_company_theme_options','Default');
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
	}


	$show_header = get_theme_mod( 'advance_it_company_display_topbar', true);
	if($show_header == false){
		$custom_css .='.main-menu{';
			$custom_css .='margin: 10px 0;';
		$custom_css .='}';
		$custom_css .='.logo{';
			$custom_css .='padding: 10px 0;';
		$custom_css .='}';
	}


	$show_slider = get_theme_mod( 'advance_it_company_slider_hide', true);
	if($show_slider == false){
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='border-bottom: 1px solid #272b46;';
		$custom_css .='}';
	}
