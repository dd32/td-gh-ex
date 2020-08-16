<?php
	
	$bb_mobile_application_theme_color = get_theme_mod('bb_mobile_application_theme_color');

	$bb_mobile_application_custom_css = '';

	$bb_mobile_application_custom_css .='#header, .search-form input.search-submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #slider .know-btn a,.read-more-box, .inner, #footer input[type="submit"], #footer .tagcloud a:hover, #sidebar input[type="submit"], #sidebar h3,.pagination span, .pagination .current, .pagination a:hover,#comments input[type="submit"].submit,.meta-nav:hover,.tags p a:hover,#sidebar .tagcloud a:hover,#comments a.comment-reply-link, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, .page-template-custom-front-page #header, #menu-sidebar input[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce a.button:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, a.button{';
		$bb_mobile_application_custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.woocommerce-message::before, #footer h3, td#prev a, .copyright-wrapper li a:hover, .nav-previous a, .tags i,.metabox a:hover, .woocommerce a.woocommerce-review-link{';
		$bb_mobile_application_custom_css .='color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.primary-navigation ul ul a{';
		$bb_mobile_application_custom_css .='color: '.esc_html($bb_mobile_application_theme_color).'!important;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.new-text{';
		$bb_mobile_application_custom_css .='border-left-color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='#footer .tagcloud a,.primary-navigation ul ul,.tags p a:hover, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
		$bb_mobile_application_custom_css .='border-color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='#footer h3{';
		$bb_mobile_application_custom_css .='border-bottom-color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.woocommerce-message{';
		$bb_mobile_application_custom_css .='border-top-color: '.esc_html($bb_mobile_application_theme_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.page-template-custom-front-page .primary-navigation ul ul{';
		$bb_mobile_application_custom_css .='border-top-color: '.esc_html($bb_mobile_application_theme_color).'!important;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_custom_css .='.page-template-custom-front-page .fixed-header #header{';
		$bb_mobile_application_custom_css .='background-color: '.esc_html($bb_mobile_application_theme_color).'!important;';
	$bb_mobile_application_custom_css .='}';
	
	// media
	$bb_mobile_application_custom_css .='@media screen and (max-width:1000px) {';
	if($bb_mobile_application_theme_color){
	$bb_mobile_application_custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul, #contact-info{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($bb_mobile_application_theme_color).' 120%);
		}';
	}
	$bb_mobile_application_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_width_theme_options','Default');
    if($bb_mobile_application_theme_lay == 'Default'){
		$bb_mobile_application_custom_css .='body{';
			$bb_mobile_application_custom_css .='max-width: 100%;';
		$bb_mobile_application_custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Container'){
		$bb_mobile_application_custom_css .='body{';
			$bb_mobile_application_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$bb_mobile_application_custom_css .='}';
		$bb_mobile_application_custom_css .='.page-template-custom-front-page #header{';
			$bb_mobile_application_custom_css .='width: 97.7%';
		$bb_mobile_application_custom_css .='}';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:95.8%;';
		$bb_mobile_application_custom_css .='} }';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:100%;';
		$bb_mobile_application_custom_css .='} }';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:97%;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_theme_lay == 'Box Container'){
		$bb_mobile_application_custom_css .='body{';
			$bb_mobile_application_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$bb_mobile_application_custom_css .='}';
		$bb_mobile_application_custom_css .='.page-template-custom-front-page #header{';
			$bb_mobile_application_custom_css .='width:86.4%;';
		$bb_mobile_application_custom_css .='}';
		$bb_mobile_application_custom_css .='#header{';
			$bb_mobile_application_custom_css .='padding-left:20px;';
		$bb_mobile_application_custom_css .='}';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:95.8%;';
		$bb_mobile_application_custom_css .='} }';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:97%;';
		$bb_mobile_application_custom_css .='} }';
		$bb_mobile_application_custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$bb_mobile_application_custom_css .='width:100%;';
		$bb_mobile_application_custom_css .='} }';
	}

	// css
	$bb_mobile_application_show_header = get_theme_mod( 'bb_mobile_application_slider_hide_show', false);
		if($bb_mobile_application_show_header == false){
			$bb_mobile_application_custom_css .='.page-template-custom-front-page #header{';
				$bb_mobile_application_custom_css .='position: static;width: 100%;
    background: #3ae0bf;';
			$bb_mobile_application_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_slider_content_alignment','Center');
    if($bb_mobile_application_theme_lay == 'Left'){
		$bb_mobile_application_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_mobile_application_custom_css .='text-align:left; left:15%; right:45%;';
		$bb_mobile_application_custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Center'){
		$bb_mobile_application_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_mobile_application_custom_css .='text-align:center; left:20%; right:20%;';
		$bb_mobile_application_custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Right'){
		$bb_mobile_application_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_mobile_application_custom_css .='text-align:right; left:45%; right:15%;';
		$bb_mobile_application_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_slider_image_opacity','0.3');
	if($bb_mobile_application_theme_lay == '0'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.1'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.1';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.2'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.2';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.3'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.3';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.4'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.4';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.5'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.5';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.6'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.6';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.7'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.7';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.8'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.8';
		$bb_mobile_application_custom_css .='}';
		}else if($bb_mobile_application_theme_lay == '0.9'){
		$bb_mobile_application_custom_css .='#slider img{';
			$bb_mobile_application_custom_css .='opacity:0.9';
		$bb_mobile_application_custom_css .='}';
		}

	/*-------------------------- Button Settings option------------------*/
	$bb_mobile_application_button_padding_top_bottom = get_theme_mod('bb_mobile_application_button_padding_top_bottom');
	$bb_mobile_application_button_padding_left_right = get_theme_mod('bb_mobile_application_button_padding_left_right');
	$bb_mobile_application_custom_css .='.read-more-box,#slider .know-btn a, #comments .form-submit input[type="submit"]{';
		$bb_mobile_application_custom_css .='padding-top: '.esc_html($bb_mobile_application_button_padding_top_bottom).'px; padding-bottom: '.esc_html($bb_mobile_application_button_padding_top_bottom).'px; padding-left: '.esc_html($bb_mobile_application_button_padding_left_right).'px; padding-right: '.esc_html($bb_mobile_application_button_padding_left_right).'px; display:inline-block;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_button_border_radius = get_theme_mod('bb_mobile_application_button_border_radius');
	$bb_mobile_application_custom_css .='.read-more-box, #slider .know-btn a, #comments .form-submit input[type="submit"]{';
		$bb_mobile_application_custom_css .='border-radius: '.esc_html($bb_mobile_application_button_border_radius).'px;';
	$bb_mobile_application_custom_css .='}';

	/*-----------------------------Responsive Setting --------------------*/
	$bb_mobile_application_stickyheader = get_theme_mod( 'bb_mobile_application_responsive_sticky_header', false);
	if($bb_mobile_application_stickyheader == true && get_theme_mod( 'bb_mobile_application_sticky_header', false) == false){
    	$bb_mobile_application_custom_css .='.fixed-header{';
			$bb_mobile_application_custom_css .='position:static;';
		$bb_mobile_application_custom_css .='} ';
	}
    if($bb_mobile_application_stickyheader == true){
    	$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='.fixed-header{';
			$bb_mobile_application_custom_css .='position:fixed;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_stickyheader == false){
		$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='.fixed-header{';
			$bb_mobile_application_custom_css .='position:static;';
		$bb_mobile_application_custom_css .='} }';
	}

	$bb_mobile_application_slider = get_theme_mod( 'bb_mobile_application_responsive_slider',false);
	if($bb_mobile_application_slider == true && get_theme_mod( 'bb_mobile_application_slider_hide_show', false) == false){
    	$bb_mobile_application_custom_css .='#slider{';
			$bb_mobile_application_custom_css .='display:none;';
		$bb_mobile_application_custom_css .='} ';
	}
    if($bb_mobile_application_slider == true){
    	$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#slider{';
			$bb_mobile_application_custom_css .='display:block;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_slider == false){
		$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#slider{';
			$bb_mobile_application_custom_css .='display:none;';
		$bb_mobile_application_custom_css .='} }';
	}

	$bb_mobile_application_slider = get_theme_mod( 'bb_mobile_application_responsive_scroll',true);
	if($bb_mobile_application_slider == true && get_theme_mod( 'bb_mobile_application_enable_disable_scroll', true) == false){
    	$bb_mobile_application_custom_css .='#scroll-top{';
			$bb_mobile_application_custom_css .='display:none !important;';
		$bb_mobile_application_custom_css .='} ';
	}
    if($bb_mobile_application_slider == true){
    	$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#scroll-top{';
			$bb_mobile_application_custom_css .='display:block !important;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_slider == false){
		$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#scroll-top{';
			$bb_mobile_application_custom_css .='display:none !important;';
		$bb_mobile_application_custom_css .='} }';
	}

	$bb_mobile_application_sidebar = get_theme_mod( 'bb_mobile_application_responsive_sidebar',true);
    if($bb_mobile_application_sidebar == true){
    	$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#sidebar{';
			$bb_mobile_application_custom_css .='display:block;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_sidebar == false){
		$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#sidebar{';
			$bb_mobile_application_custom_css .='display:none;';
		$bb_mobile_application_custom_css .='} }';
	}

	$bb_mobile_application_loader = get_theme_mod( 'bb_mobile_application_responsive_preloader', true);
	if($bb_mobile_application_loader == true && get_theme_mod( 'bb_mobile_application_preloader_option', true) == false){
    	$bb_mobile_application_custom_css .='#loader-wrapper{';
			$bb_mobile_application_custom_css .='display:none;';
		$bb_mobile_application_custom_css .='} ';
	}
    if($bb_mobile_application_loader == true){
    	$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#loader-wrapper{';
			$bb_mobile_application_custom_css .='display:block;';
		$bb_mobile_application_custom_css .='} }';
	}else if($bb_mobile_application_loader == false){
		$bb_mobile_application_custom_css .='@media screen and (max-width:575px) {';
		$bb_mobile_application_custom_css .='#loader-wrapper{';
			$bb_mobile_application_custom_css .='display:none;';
		$bb_mobile_application_custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$bb_mobile_application_theme_lay = get_theme_mod( 'bb_mobile_application_background_skin_mode','Transparent Background');
    if($bb_mobile_application_theme_lay == 'With Background'){
		$bb_mobile_application_custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin,#about{';
			$bb_mobile_application_custom_css .='background-color: #fff;';
		$bb_mobile_application_custom_css .='}';
	}else if($bb_mobile_application_theme_lay == 'Transparent Background'){
		$bb_mobile_application_custom_css .='.page-box-single,#sidebar aside,.our-services .page-box{';
			$bb_mobile_application_custom_css .='background-color: transparent;';
		$bb_mobile_application_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$bb_mobile_application_top_bottom_product_button_padding = get_theme_mod('bb_mobile_application_top_bottom_product_button_padding', 12);
	$bb_mobile_application_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_mobile_application_custom_css .='padding-top: '.esc_html($bb_mobile_application_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($bb_mobile_application_top_bottom_product_button_padding).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_left_right_product_button_padding = get_theme_mod('bb_mobile_application_left_right_product_button_padding', 12);
	$bb_mobile_application_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_mobile_application_custom_css .='padding-left: '.esc_html($bb_mobile_application_left_right_product_button_padding).'px; padding-right: '.esc_html($bb_mobile_application_left_right_product_button_padding).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_product_button_border_radius = get_theme_mod('bb_mobile_application_product_button_border_radius', 0);
	$bb_mobile_application_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_mobile_application_custom_css .='border-radius: '.esc_html($bb_mobile_application_product_button_border_radius).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_show_related_products = get_theme_mod('bb_mobile_application_show_related_products',true);
	if($bb_mobile_application_show_related_products == false){
		$bb_mobile_application_custom_css .='.related.products{';
			$bb_mobile_application_custom_css .='display: none;';
		$bb_mobile_application_custom_css .='}';
	}

	$bb_mobile_application_show_wooproducts_border = get_theme_mod('bb_mobile_application_show_wooproducts_border', true);
	if($bb_mobile_application_show_wooproducts_border == false){
		$bb_mobile_application_custom_css .='.products li{';
			$bb_mobile_application_custom_css .='border: none;';
		$bb_mobile_application_custom_css .='}';
	}

	$bb_mobile_application_top_bottom_wooproducts_padding = get_theme_mod('bb_mobile_application_top_bottom_wooproducts_padding',10);
	$bb_mobile_application_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_mobile_application_custom_css .='padding-top: '.esc_html($bb_mobile_application_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($bb_mobile_application_top_bottom_wooproducts_padding).'px !important;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_left_right_wooproducts_padding = get_theme_mod('bb_mobile_application_left_right_wooproducts_padding',10);
	$bb_mobile_application_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_mobile_application_custom_css .='padding-left: '.esc_html($bb_mobile_application_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($bb_mobile_application_left_right_wooproducts_padding).'px !important;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_wooproducts_border_radius = get_theme_mod('bb_mobile_application_wooproducts_border_radius',0);
	$bb_mobile_application_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_mobile_application_custom_css .='border-radius: '.esc_html($bb_mobile_application_wooproducts_border_radius).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_wooproducts_box_shadow = get_theme_mod('bb_mobile_application_wooproducts_box_shadow',0);
	$bb_mobile_application_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_mobile_application_custom_css .='box-shadow: '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px '.esc_html($bb_mobile_application_wooproducts_box_shadow).'px #eee;';
	$bb_mobile_application_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$bb_mobile_application_copyright_content_align = get_theme_mod('bb_mobile_application_copyright_content_align');
	if($bb_mobile_application_copyright_content_align != false){
		$bb_mobile_application_custom_css .='#footer .copyright p{';
			$bb_mobile_application_custom_css .='text-align: '.esc_html($bb_mobile_application_copyright_content_align).';';
		$bb_mobile_application_custom_css .='}';
	}

	$bb_mobile_application_footer_content_font_size = get_theme_mod('bb_mobile_application_footer_content_font_size', 16);
	$bb_mobile_application_custom_css .='#footer .copyright p{';
		$bb_mobile_application_custom_css .='font-size: '.esc_html($bb_mobile_application_footer_content_font_size).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_copyright_padding = get_theme_mod('bb_mobile_application_copyright_padding', 15);
	$bb_mobile_application_custom_css .='#footer .copyright{';
		$bb_mobile_application_custom_css .='padding-top: '.esc_html($bb_mobile_application_copyright_padding).'px; padding-bottom: '.esc_html($bb_mobile_application_copyright_padding).'px;';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_footer_widget_bg_color = get_theme_mod('bb_mobile_application_footer_widget_bg_color');
	$bb_mobile_application_custom_css .='#footer{';
		$bb_mobile_application_custom_css .='background-color: '.esc_html($bb_mobile_application_footer_widget_bg_color).';';
	$bb_mobile_application_custom_css .='}';

	$bb_mobile_application_footer_widget_bg_image = get_theme_mod('bb_mobile_application_footer_widget_bg_image');
	if($bb_mobile_application_footer_widget_bg_image != false){
		$bb_mobile_application_custom_css .='#footer{';
			$bb_mobile_application_custom_css .='background: url('.esc_html($bb_mobile_application_footer_widget_bg_image).');';
		$bb_mobile_application_custom_css .='}';
	}

	// scroll to top
	$bb_mobile_application_scroll_font_size_icon = get_theme_mod('bb_mobile_application_scroll_font_size_icon', 22);
	$bb_mobile_application_custom_css .='#scroll-top .fas{';
		$bb_mobile_application_custom_css .='font-size: '.esc_html($bb_mobile_application_scroll_font_size_icon).'px;';
	$bb_mobile_application_custom_css .='}';

	// Slider Height 
	$bb_mobile_application_slider_image_height = get_theme_mod('bb_mobile_application_slider_image_height');
	$bb_mobile_application_custom_css .='#slider img{';
		$bb_mobile_application_custom_css .='height: '.esc_html($bb_mobile_application_slider_image_height).'px;';
	$bb_mobile_application_custom_css .='}';


