<?php
	
	/*---------------------------Theme color option-------------------*/
	$advance_automobile_theme_color_first = get_theme_mod('advance_automobile_theme_color_first');

	$custom_css = '';

	if($advance_automobile_theme_color_first != false){
		$custom_css .='input[type="submit"], .top-header, #slider i, #slider .inner_carousel .read-btn a, .address, .owl-carousel .owl-nav .owl-prev i, .owl-carousel .owl-nav .owl-next i, #category .explore-btn a, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.copyright, #footer input[type="submit"], .read-more-btn a:hover, .main-navigation ul ul, #contact-info, #comments a.comment-reply-link, #footer form.woocommerce-product-search button, #footer .woocommerce a.button, #footer .widget_price_filter .price_slider_amount .button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='h1,h2,h4,h5,h6, input[type="search"], .read-moresec a, .address i,.time i, .owl-carousel .owl-nav .owl-prev i:hover, .owl-carousel .owl-nav .owl-next i:hover,  section h4, section .innerlightbox,.copyright, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, #content-ts h2, #content-ts h3,.copyright, h3.widget-title a, .nav-previous a, p.logged-in-as a, .nav-next a, .new-text p a, h2.woocommerce-loop-product__title, .content-ts h3, .content-ts h2,.woocommerce-info::before, .new-text h2 a, .primary-navigation ul ul li:hover > a , .metabox a:hover, #sidebar ul li a:hover,  #comments a, #category .text-content h3{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='.read-moresec a,  #footer input[type="search"], .woocommerce .quantity .qty{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='.woocommerce-info, .primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='#sidebar ul li a:hover, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	} 
	
	/*---------------------------Theme color option-------------------*/
	$advance_automobile_theme_color_second = get_theme_mod('advance_automobile_theme_color_second');

	if($advance_automobile_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, #slider .inner_carousel .read-btn a:hover, .time, #category .explore-btn a:hover, #footer, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], .read-more-btn a, .primary-navigation li a:hover, .primary-navigation li:hover a, #menu-sidebar input[type="submit"], #sidebar form.woocommerce-product-search button, .primary-navigation a:focus, .toggle-menu i{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .toggle a, .book-btn a{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.logo a,.search-box i, #slider .inner_carousel h2 , #slider .inner_carousel, .page-box .metabox,.page-box-single .metabox,.metabox a, .woocommerce-message::before, h1.entry-title,h1.page-title,  .page-box h4, .new-text h4 a,#slider .inner_carousel h1, #category h2, .primary-navigation a{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#header .main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.page-box, #sidebar aside, #sidebar input[type="search"],#sidebar form.woocommerce-product-search button{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.logo p, .page-box-single h3, #sidebar ul li a:active, span.post-title, p.logged-in-as a{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}

	// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_automobile_theme_color_first != false || $advance_automobile_theme_color_second != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info, .primary-navigation a:focus{
	background-image: linear-gradient(-90deg, '.esc_html($advance_automobile_theme_color_first).' 0%, '.esc_html($advance_automobile_theme_color_second).' 120%);
		} ';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_automobile_theme_lay = get_theme_mod( 'advance_automobile_theme_options','Default');
    if($advance_automobile_theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($advance_automobile_theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($advance_automobile_theme_lay == 'Box Container'){
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

	// css
	$advance_automobile_show_header = get_theme_mod( 'advance_automobile_slider_hide', false);
	if($advance_automobile_show_header == false){
		$custom_css .='#contact-details{';
			$custom_css .='margin: 25px 0;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header .main-menu{';
			$custom_css .='border-bottom: 1px solid #000;';
		$custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_automobile_theme_lay = get_theme_mod( 'advance_automobile_slider_content_alignment','Left');
    if($advance_automobile_theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:8%; right:45%;';
		$custom_css .='}';
	}else if($advance_automobile_theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($advance_automobile_theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:8%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_automobile_theme_lay = get_theme_mod( 'advance_automobile_slider_image_opacity','0.7');
	if($advance_automobile_theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($advance_automobile_theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*------------- Button Settings option-------------------*/
	$advance_automobile_button_padding_top_bottom = get_theme_mod('advance_automobile_button_padding_top_bottom');
	$advance_automobile_button_padding_left_right = get_theme_mod('advance_automobile_button_padding_left_right');
	if($advance_automobile_button_padding_top_bottom != false || $advance_automobile_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .read-btn a, #comments .form-submit input[type="submit"],#category .explore-btn a{';
			$custom_css .='padding-top: '.esc_html($advance_automobile_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_automobile_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_automobile_button_padding_left_right).'px; padding-right: '.esc_html($advance_automobile_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_automobile_button_border_radius = get_theme_mod('advance_automobile_button_border_radius');
	if($advance_automobile_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .read-btn a, #comments .form-submit input[type="submit"], #category .explore-btn a{';
			$custom_css .='border-radius: '.esc_html($advance_automobile_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------Responsive Setting -----------------*/
	$advance_automobile_stickyheader = get_theme_mod( 'advance_automobile_responsive_sticky_header', false);
	if($advance_automobile_stickyheader == true && get_theme_mod( 'advance_automobile_sticky_header', false) == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($advance_automobile_stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($advance_automobile_stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$advance_automobile_slider = get_theme_mod( 'advance_automobile_responsive_slider',false);
	if($advance_automobile_slider == true && get_theme_mod( 'advance_automobile_slider_hide', false) == false){
    	$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($advance_automobile_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_automobile_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$advance_automobile_slider = get_theme_mod( 'advance_automobile_responsive_scroll',true);
	if($advance_automobile_slider == true && get_theme_mod( 'advance_automobile_enable_disable_scroll', true) == false){
    	$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} ';
	}
    if($advance_automobile_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:block !important;';
		$custom_css .='} }';
	}else if($advance_automobile_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} }';
	}

	$advance_automobile_sidebar = get_theme_mod( 'advance_automobile_responsive_sidebar',true);
    if($advance_automobile_sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_automobile_sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_automobile_theme_lay = get_theme_mod( 'advance_automobile_background_skin_mode','Transparent Background');
    if($advance_automobile_theme_lay == 'With Background'){
		$custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$custom_css .='background-color: #fff;';
		$custom_css .='}';
	}else if($advance_automobile_theme_lay == 'Transparent Background'){
		$custom_css .='.page-box-single{';
			$custom_css .='background-color: transparent;';
		$custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/

	$advance_automobile_top_bottom_product_button_padding = get_theme_mod('advance_automobile_top_bottom_product_button_padding', 10);
	if($advance_automobile_top_bottom_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-top: '.esc_html($advance_automobile_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_automobile_top_bottom_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_automobile_left_right_product_button_padding = get_theme_mod('advance_automobile_left_right_product_button_padding', 16);
	if($advance_automobile_left_right_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-left: '.esc_html($advance_automobile_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_automobile_left_right_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_automobile_product_button_border_radius = get_theme_mod('advance_automobile_product_button_border_radius', 0);
	if($advance_automobile_product_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($advance_automobile_product_button_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_automobile_show_related_products = get_theme_mod('advance_automobile_show_related_products',true);
	if($advance_automobile_show_related_products == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$advance_automobile_show_wooproducts_border = get_theme_mod('advance_automobile_show_wooproducts_border', false);
	if($advance_automobile_show_wooproducts_border == true){
		$custom_css .='.products li{';
			$custom_css .='border: 1px solid #767676;';
		$custom_css .='}';
	}

	$advance_automobile_top_bottom_wooproducts_padding = get_theme_mod('advance_automobile_top_bottom_wooproducts_padding',0);
	if($advance_automobile_top_bottom_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($advance_automobile_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_automobile_top_bottom_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_automobile_left_right_wooproducts_padding = get_theme_mod('advance_automobile_left_right_wooproducts_padding',0);
	if($advance_automobile_left_right_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($advance_automobile_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_automobile_left_right_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_automobile_wooproducts_border_radius = get_theme_mod('advance_automobile_wooproducts_border_radius',0);
	if($advance_automobile_wooproducts_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($advance_automobile_wooproducts_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_automobile_wooproducts_box_shadow = get_theme_mod('advance_automobile_wooproducts_box_shadow',0);
	if($advance_automobile_wooproducts_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($advance_automobile_wooproducts_box_shadow).'px '.esc_html($advance_automobile_wooproducts_box_shadow).'px '.esc_html($advance_automobile_wooproducts_box_shadow).'px #e4e4e4;';
		$custom_css .='}';
	}