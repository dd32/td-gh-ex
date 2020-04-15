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

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_startup_slider_content_alignment','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'advance_startup_slider_image_opacity','0.4');
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

	/*-------------------------- Button Settings option------------------*/

	$advance_startup_button_padding_top_bottom = get_theme_mod('advance_startup_button_padding_top_bottom');
	$advance_startup_button_padding_left_right = get_theme_mod('advance_startup_button_padding_left_right');
	if($advance_startup_button_padding_top_bottom != false || $advance_startup_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"],#category .explore-btn a, #we_provide .theme_button a{';
			$custom_css .='padding-top: '.esc_html($advance_startup_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_startup_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_startup_button_padding_left_right).'px; padding-right: '.esc_html($advance_startup_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_startup_button_border_radius = get_theme_mod('advance_startup_button_border_radius');
	if($advance_startup_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"], #category .explore-btn a, #we_provide .theme_button a{';
			$custom_css .='border-radius: '.esc_html($advance_startup_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'advance_startup_responsive_sticky_header',true);
	if($stickyheader == true && get_theme_mod( 'advance_startup_sticky_header') == false){
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

	$stickyheader = get_theme_mod( 'advance_startup_responsive_slider',true);
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

	$metabox = get_theme_mod( 'advance_startup_responsive_metabox',true);
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

	$sidebar = get_theme_mod( 'advance_startup_responsive_sidebar',true);
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

	/*------------ Woocommerce Settings  --------------*/

	$advance_startup_top_bottom_product_button_padding = get_theme_mod('advance_startup_top_bottom_product_button_padding', 10);
	if($advance_startup_top_bottom_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-top: '.esc_html($advance_startup_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_startup_top_bottom_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_startup_left_right_product_button_padding = get_theme_mod('advance_startup_left_right_product_button_padding', 16);
	if($advance_startup_left_right_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-left: '.esc_html($advance_startup_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_startup_left_right_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_startup_product_button_border_radius = get_theme_mod('advance_startup_product_button_border_radius', 30);
	if($advance_startup_product_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($advance_startup_product_button_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_startup_show_related_products = get_theme_mod('advance_startup_show_related_products',true);
	if($advance_startup_show_related_products == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$advance_startup_show_wooproducts_border = get_theme_mod('advance_startup_show_wooproducts_border', true);
	if($advance_startup_show_wooproducts_border == false){
		$custom_css .='.woocommerce .products li{';
			$custom_css .='border: none;';
		$custom_css .='}';
	}

	$advance_startup_top_bottom_wooproducts_padding = get_theme_mod('advance_startup_top_bottom_wooproducts_padding',0);
	if($advance_startup_top_bottom_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($advance_startup_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_startup_top_bottom_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_startup_left_right_wooproducts_padding = get_theme_mod('advance_startup_left_right_wooproducts_padding',0);
	if($advance_startup_left_right_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($advance_startup_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_startup_left_right_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_startup_wooproducts_border_radius = get_theme_mod('advance_startup_wooproducts_border_radius',0);
	if($advance_startup_wooproducts_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($advance_startup_wooproducts_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_startup_wooproducts_box_shadow = get_theme_mod('advance_startup_wooproducts_box_shadow',0);
	if($advance_startup_wooproducts_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($advance_startup_wooproducts_box_shadow).'px '.esc_html($advance_startup_wooproducts_box_shadow).'px '.esc_html($advance_startup_wooproducts_box_shadow).'px #e4e4e4;';
		$custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/

	$theme_lay = get_theme_mod( 'advance_startup_background_skin_mode','Transparent Background');
    if($theme_lay == 'With Background'){
		$custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$custom_css .='background-color: #fff;';
		$custom_css .='}';
	}else if($theme_lay == 'Transparent Background'){
		$custom_css .='.page-box-single,#we_provide, .cat-posts{';
			$custom_css .='background-color: transparent;';
		$custom_css .='}';
	}
