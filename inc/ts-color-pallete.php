<?php
	
	$advance_education_theme_color = get_theme_mod('advance_education_theme_color');

	$custom_css = '';

	if($advance_education_theme_color != false){
		$custom_css .=' input[type="submit"], .read-moresec a:hover, .top-header .account-btn a:hover, .time, #slider i, #slider .inner_carousel .readbtn a, .read-more-btn a,  #footer input[type="submit"], .copyright, #footer .tagcloud a:hover,.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='h1,h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .logo a, .top-header .account-btn a, .mail i,.phone i, .search-box i, #slider .inner_carousel .readbtn a:hover, #courses h3 i, .cat-posts a, .page-box h4, .read-more-btn a:hover, .page-box .metabox,.page-box-single .metabox, section h4, #comments a time, .woocommerce-message::before, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, h1.entry-title,h1.page-title, .pagination span,.pagination a, .pagination .current, #sidebar h3.widget-title a,.metabox a, .new-text a, #footer li a:hover, p.logged-in-as a, single.page-box-single h3 a, .entry-content p a, div#div-comment-1 a, .nav-next a, #courses h2 i, .comment-meta a, h2.entry-title, h2.page-title, nav-links span{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.cat_body, h3.title-btn{';
			$custom_css .='border-right-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.top-header .account-btn a, .serach_inner form.search-form, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover, .cat-posts a, .read-more-btn a, .read-more-btn a:hover, #footer input[type="search"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, .pagination a:hover, .pagination .current{';
			$custom_css .='border-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.logo p,page-box-single h1, #sidebar ul li a:active, #sidebar ul li a:focus, .read-more-btn a:hover{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}

	if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
			box-shadow: -12px 12px 0 0 '.esc_html($advance_education_theme_color).';
		}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
			box-shadow: 0 3px 3px '.esc_html($advance_education_theme_color).';
		}';
	}

// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_education_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_education_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_education_theme_options','Default');
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
		$custom_css .='.page-template-custom-front-page .top-header{';
			$custom_css .='margin: 0 10px;';
		$custom_css .='}';
	}

// css
	$show_header = get_theme_mod( 'advance_education_slider_hide', true);
		if($show_header == false){
			$custom_css .='.page-template-custom-front-page .header-nav #header{';
				$custom_css .='margin-top: 3.7em;';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page #header-top, .page-template-custom-front-page .top-header{';
				$custom_css .='top: 0;background: #f5f5f5;';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page .logo{';
				$custom_css .='padding:8px 0;box-shadow:none;position:static;';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page .main-menu{';
				$custom_css .='border-bottom: 1px solid #cc3333; box-shadow: 0px 2px 10px -2px #bbb;';
			$custom_css .='}';
		}
	$show_header = get_theme_mod( 'advance_education_display_topbar', true);
		if($show_header == true){
			$custom_css .='.page-template-custom-front-page .header-nav #header{';
				$custom_css .=';';
			$custom_css .='}';
		}else if($show_header == false){
			$custom_css .='.page-template-custom-front-page .header-nav #header{';
				$custom_css .='margin-top: 0;';
			$custom_css .='}';
		}
