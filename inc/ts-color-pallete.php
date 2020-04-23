<?php
	
	$bb_mobile_application_theme_color = get_theme_mod('bb_mobile_application_theme_color');

	$custom_css = '';

	if($bb_mobile_application_theme_color != false){
		$custom_css .='#header, .search-form input.search-submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #slider .know-btn a,.read-more-box, .inner, #footer input[type="submit"], #footer .tagcloud a:hover, #sidebar input[type="submit"], #sidebar h3,.pagination span, .pagination .current, .pagination a:hover,#comments input[type="submit"].submit,.meta-nav:hover,.tags p a:hover,#sidebar .tagcloud a:hover,#comments a.comment-reply-link, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, .page-template-custom-front-page #header, #menu-sidebar input[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce a.button:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, a.button{';
			$custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).';';
		$custom_css .='}';
	}
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.woocommerce-message::before, #footer h3, td#prev a, .copyright-wrapper li a:hover, .nav-previous a, .tags i,.metabox a:hover, .woocommerce a.woocommerce-review-link{';
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
		$custom_css .='#footer .tagcloud a,.primary-navigation ul ul,.tags p a:hover, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
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
	if($bb_mobile_application_theme_color != false){
		$custom_css .='.page-template-custom-front-page .fixed-header #header{';
			$custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).'!important;';
		$custom_css .='}';
	}
	
	// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($bb_mobile_application_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul, #contact-info{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($bb_mobile_application_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_width_theme_options','Default');
    if($bb_mobile_application_theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Container'){
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
	}else if($bb_mobile_application_theme_lay == 'Box Container'){
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

	// css
	$bb_mobile_application_show_header = get_theme_mod( 'bb_mobile_application_slider_hide_show', false);
		if($bb_mobile_application_show_header == false){
			$custom_css .='.page-template-custom-front-page #header{';
				$custom_css .='position: static;width: 100%;
    background: #3ae0bf;';
			$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_slider_content_alignment','Center');
    if($bb_mobile_application_theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_slider_image_opacity','0.3');
	if($bb_mobile_application_theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*-------------------------- Button Settings option------------------*/
	$bb_mobile_application_button_padding_top_bottom = get_theme_mod('bb_mobile_application_button_padding_top_bottom');
	$bb_mobile_application_button_padding_left_right = get_theme_mod('bb_mobile_application_button_padding_left_right');
	if($bb_mobile_application_button_padding_top_bottom != false || $bb_mobile_application_button_padding_left_right != false){
		$custom_css .='.read-more-box,#slider .know-btn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='padding-top: '.esc_html($bb_mobile_application_button_padding_top_bottom).'px; padding-bottom: '.esc_html($bb_mobile_application_button_padding_top_bottom).'px; padding-left: '.esc_html($bb_mobile_application_button_padding_left_right).'px; padding-right: '.esc_html($bb_mobile_application_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$bb_mobile_application_button_border_radius = get_theme_mod('bb_mobile_application_button_border_radius');
	if($bb_mobile_application_button_border_radius != false){
		$custom_css .='.read-more-box, #slider .know-btn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='border-radius: '.esc_html($bb_mobile_application_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/
	$bb_mobile_application_stickyheader = get_theme_mod( 'bb_mobile_application_responsive_sticky_header', false);
	if($bb_mobile_application_stickyheader == true && get_theme_mod( 'bb_mobile_application_sticky_header', false) == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($bb_mobile_application_stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($bb_mobile_application_stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$bb_mobile_application_slider = get_theme_mod( 'bb_mobile_application_responsive_slider',false);
	if($bb_mobile_application_slider == true && get_theme_mod( 'bb_mobile_application_slider_hide_show', false) == false){
    	$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($bb_mobile_application_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($bb_mobile_application_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$bb_mobile_application_slider = get_theme_mod( 'bb_mobile_application_responsive_scroll',true);
	if($bb_mobile_application_slider == true && get_theme_mod( 'bb_mobile_application_enable_disable_scroll', true) == false){
    	$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} ';
	}
    if($bb_mobile_application_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:block !important;';
		$custom_css .='} }';
	}else if($bb_mobile_application_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} }';
	}

	$bb_mobile_application_sidebar = get_theme_mod( 'bb_mobile_application_responsive_sidebar',true);
    if($bb_mobile_application_sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($bb_mobile_application_sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_background_skin_mode','Transparent Background');
    if($bb_mobile_application_theme_lay == 'With Background'){
		$custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin,#about{';
			$custom_css .='background-color: #fff;';
		$custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Transparent Background'){
		$custom_css .='.page-box-single,#sidebar aside,.our-services .page-box{';
			$custom_css .='background-color: transparent;';
		$custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$bb_mobile_application_top_bottom_product_button_padding = get_theme_mod('bb_mobile_application_top_bottom_product_button_padding', 12);
	if($bb_mobile_application_top_bottom_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-top: '.esc_html($bb_mobile_application_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($bb_mobile_application_top_bottom_product_button_padding).'px;';
		$custom_css .='}';
	}

	$bb_mobile_application_left_right_product_button_padding = get_theme_mod('bb_mobile_application_left_right_product_button_padding', 12);
	if($bb_mobile_application_left_right_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-left: '.esc_html($bb_mobile_application_left_right_product_button_padding).'px; padding-right: '.esc_html($bb_mobile_application_left_right_product_button_padding).'px;';
		$custom_css .='}';
	}

	$bb_mobile_application_product_button_border_radius = get_theme_mod('bb_mobile_application_product_button_border_radius', 0);
	if($bb_mobile_application_product_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($bb_mobile_application_product_button_border_radius).'px;';
		$custom_css .='}';
	}

	$bb_mobile_application_show_related_products = get_theme_mod('bb_mobile_application_show_related_products',true);
	if($bb_mobile_application_show_related_products == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$bb_mobile_application_show_wooproducts_border = get_theme_mod('bb_mobile_application_show_wooproducts_border', true);
	if($bb_mobile_application_show_wooproducts_border == false){
		$custom_css .='.products li{';
			$custom_css .='border: none;';
		$custom_css .='}';
	}

	$bb_mobile_application_top_bottom_wooproducts_padding = get_theme_mod('bb_mobile_application_top_bottom_wooproducts_padding',10);
	if($bb_mobile_application_top_bottom_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($bb_mobile_application_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($bb_mobile_application_top_bottom_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$bb_mobile_application_left_right_wooproducts_padding = get_theme_mod('bb_mobile_application_left_right_wooproducts_padding',10);
	if($bb_mobile_application_left_right_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($bb_mobile_application_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($bb_mobile_application_left_right_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$bb_mobile_application_wooproducts_border_radius = get_theme_mod('bb_mobile_application_wooproducts_border_radius',0);
	if($bb_mobile_application_wooproducts_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($bb_mobile_application_wooproducts_border_radius).'px;';
		$custom_css .='}';
	}

	$bb_mobile_application_wooproducts_box_shadow = get_theme_mod('bb_mobile_application_wooproducts_box_shadow',0);
	if($bb_mobile_application_wooproducts_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px #eee;';
		$custom_css .='}';
	}

