<?php
	
	$advance_business_theme_color = get_theme_mod('advance_business_theme_color');

	$custom_css = '';

	if($advance_business_theme_color != false){
		$custom_css .='.search-box i, #slider .carousel-control-next-icon i:hover,#slider .carousel-control-prev-icon i:hover, #slider .inner_carousel .know-btn a:hover, hr.project-hr, .second-border a:hover,  #footer input[type="submit"], .copyright,#footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], a.button,.meta-nav:hover{';
			$custom_css .='background-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='input[type="submit"],.contact i,.woocommerce-message::before, #footer h3.widget-title a, #footer li a:hover,.primary-navigation a:hover, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul a, .sf-arrows ul .sf-with-ul:after, .primary-navigation ul ul li:hover > a, .primary-navigation a:focus,#sidebar ul li a:hover, .page-box h2 a:hover, .metabox a:hover{';
			$custom_css .='color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.woocommerce-message,.primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='#footer input[type="search"]{';
			$custom_css .='border-color: '.esc_html($advance_business_theme_color).';';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='.main-menu-navigation .primary-navigation ul li a:hover{';
			$custom_css .='color: '.esc_html($advance_business_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_business_theme_color).'!important;';
		$custom_css .='}';
	}

// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_business_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_business_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_business_theme_options','Default');
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
		$custom_css .='.page-template-custom-front-page .main-header{';
			$custom_css .='margin:0 10px;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='right:0;';
		$custom_css .='}';
	}

//css
	$show_header = get_theme_mod( 'advance_business_slider_hide', true);
		if($show_header == false){
			$custom_css .='.contact-box{';
				$custom_css .='margin-top: 0; position: static;';
			$custom_css .='}';
			$custom_css .='.page-template-custom-front-page #header{';
				$custom_css .='position: static;border-bottom: 1px solid #000;';
			$custom_css .='}';
		}

	$show_header = get_theme_mod( 'advance_business_sticky_header', true);
		if($show_header == true){
			$custom_css .='.page-template-custom-front-page .fixed-header #header{';
				$custom_css .=' box-shadow: 2px 2px 10px 0px #2d2d2d; background-color:#fff;';
			$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_business_slider_content_alignment','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:13%; right:40%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:40%; right:13%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'advance_business_slider_image_opacity','0.3');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*------------ Button Settings option ------------------*/

	$advance_business_button_padding_top_bottom = get_theme_mod('advance_business_button_padding_top_bottom');
	$advance_business_button_padding_left_right = get_theme_mod('advance_business_button_padding_left_right');
	if($advance_business_button_padding_top_bottom != false || $advance_business_button_padding_left_right != false){
		$custom_css .='.new-text .second-border a, #slider .inner_carousel .know-btn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='padding-top: '.esc_html($advance_business_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_business_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_business_button_padding_left_right).'px; padding-right: '.esc_html($advance_business_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_business_button_border_radius = get_theme_mod('advance_business_button_border_radius');
	if($advance_business_button_border_radius != false){
		$custom_css .='.new-text .second-border a,#slider .inner_carousel .know-btn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='border-radius: '.esc_html($advance_business_button_border_radius).'px;';
		$custom_css .='}';
	}

