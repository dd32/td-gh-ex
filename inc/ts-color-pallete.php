<?php
	
	$advance_ecommerce_store_theme_color = get_theme_mod('advance_ecommerce_store_theme_color');

	$custom_css = '';

	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#sidebar .tagcloud a:hover,.top-menu,.main-menu, .account a i, span.cart-value, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, .product-service, .second-border a:hover, #footer input[type="submit"], .copyright, woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], .pagination a:hover, .pagination .current, .woocommerce span.onsale, #footer .tagcloud a:hover, input[type="submit"],#res-sidebar input[type="submit"],#comments a.comment-reply-link ,.tags p a:hover,#sidebar .tagcloud a{';
			$custom_css .='background-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#footer h3, .woocommerce-message::before, #footer h3,.woocommerce-message::before, .primary-navigation ul ul a, .primary-navigation a:hover, #footer li a:hover,.primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation a:focus,.sf-arrows ul .sf-with-ul:after, .sf-arrows ul li > .sf-with-ul:focus:after,.sf-arrows ul li:hover > .sf-with-ul:after,.sf-arrows .sfHover > .sf-with-ul:after,.primary-navigation li a:hover, .primary-navigation li:hover a,.tags i,.metabox a:hover,#footer a.rsswidget{';
			$custom_css .='color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='.woocommerce-message, hr.slidehr,.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='#footer .tagcloud a:hover,.page-box, #footer input[type="search"],.primary-navigation ul{';
			$custom_css .='border-color: '.esc_html($advance_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($advance_ecommerce_store_theme_color != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li, #comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($advance_ecommerce_store_theme_color).'!important;';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_ecommerce_store_theme_color){
	$custom_css .='#res-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul,#contact-info{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_ecommerce_store_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_ecommerce_store_theme_options','Default');
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
		$custom_css .='#header{';
			$custom_css .='right:0';
		$custom_css .='}';
	}

	/*---------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_ecommerce_store_slider_content_alignment','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
		$custom_css .='hr.slidehr{';
			$custom_css .='margin: 0 auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
		$custom_css .='hr.slidehr{';
			$custom_css .='margin: 0 0 0 auto;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'advance_ecommerce_store_slider_image_opacity','0.7');
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

	/*------------------------------ Button Settings option-----------------------*/

	$advance_ecommerce_store_button_padding_top_bottom = get_theme_mod('advance_ecommerce_store_button_padding_top_bottom');
	$advance_ecommerce_store_button_padding_left_right = get_theme_mod('advance_ecommerce_store_button_padding_left_right');
	if($advance_ecommerce_store_button_padding_top_bottom != false || $advance_ecommerce_store_button_padding_left_right != false){
		$custom_css .='.second-border a, #slider .more-btn a, #comments .form-submit input[type="submit"], .product-page .woocommerce ul.products li.product .button{';
			$custom_css .='padding-top: '.esc_html($advance_ecommerce_store_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_ecommerce_store_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_ecommerce_store_button_padding_left_right).'px; padding-right: '.esc_html($advance_ecommerce_store_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_ecommerce_store_button_border_radius = get_theme_mod('advance_ecommerce_store_button_border_radius');
	if($advance_ecommerce_store_button_border_radius != false){
		$custom_css .='.second-border a,#slider .more-btn a, #comments .form-submit input[type="submit"], .product-page .woocommerce ul.products li.product .button{';
			$custom_css .='border-radius: '.esc_html($advance_ecommerce_store_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'advance_ecommerce_store_responsive_sticky_header',true);
	if($stickyheader == true && get_theme_mod( 'advance_ecommerce_store_sticky_header') == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'advance_ecommerce_store_responsive_slider',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'advance_ecommerce_store_responsive_metabox',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.metabox{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.metabox{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'advance_ecommerce_store_responsive_sidebar',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}





