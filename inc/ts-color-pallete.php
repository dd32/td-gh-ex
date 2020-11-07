<?php
	
	$bb_wedding_bliss_theme_color_first = get_theme_mod('bb_wedding_bliss_theme_color_first');

	$bb_wedding_bliss_custom_css = '';

	$bb_wedding_bliss_custom_css .='.pagination a:hover, .pagination .current, #footer input[type="submit"], .blogbutton-small:hover, .blogbutton-small, .meta-nav:hover,.tags p a:hover ,#comments a.comment-reply-link,#comments input[type="submit"].submit, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button,#sidebar .tagcloud a:hover, #footer .tagcloud a:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce a.button, #footer .woocommerce a.button:hover, #footer .woocommerce button.button {';
		$bb_wedding_bliss_custom_css .='background-color: '.esc_attr($bb_wedding_bliss_theme_color_first).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_custom_css .='.social-media i:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li a, #slider .inner_carousel h2 a, #sidebar h3, #sidebar input[type="submit"], span.tagged_as a, #footer li a:hover, #love-Story h3, .heading-line h3, input[type="submit"], .our-services .page-box h4 a:hover,.primary-navigation ul ul a,.tags i,.metabox a:hover,#sidebar ul li a:hover, #slider .inner_carousel h1 a{';
		$bb_wedding_bliss_custom_css .='color: '.esc_attr($bb_wedding_bliss_theme_color_first).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_custom_css .='.primary-navigation ul ul, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
		$bb_wedding_bliss_custom_css .='border-color: '.esc_attr($bb_wedding_bliss_theme_color_first).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_custom_css .='.primary-navigation ul ul{';
		$bb_wedding_bliss_custom_css .='border-top-color: '.esc_attr($bb_wedding_bliss_theme_color_first).'!important;';
	$bb_wedding_bliss_custom_css .='}';
	
	// second theme color
	$bb_wedding_bliss_theme_color_second = get_theme_mod('bb_wedding_bliss_theme_color_second');
	$bb_wedding_bliss_custom_css .='.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .abovecopyright, #sidebar h3, #sidebar input[type="submit"], .pagination a, .pagination span, input[type="submit"], .hvr-sweep-to-right:before{';
		$bb_wedding_bliss_custom_css .='background-color: '.esc_attr($bb_wedding_bliss_theme_color_second).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_custom_css .='.blogbutton-small, input.search-field,.tags p a {';
		$bb_wedding_bliss_custom_css .='border-color: '.esc_attr($bb_wedding_bliss_theme_color_second).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_custom_css .='.pagination .current, .blogbutton-small, .our-services .page-box h4 a,.meta-nav,.tags p a {';
		$bb_wedding_bliss_custom_css .='color: '.esc_attr($bb_wedding_bliss_theme_color_second).';';
	$bb_wedding_bliss_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$bb_wedding_bliss_theme_lay = get_theme_mod( 'bb_wedding_bliss_theme_options','Default');
    if($bb_wedding_bliss_theme_lay == 'Default'){
		$bb_wedding_bliss_custom_css .='body{';
			$bb_wedding_bliss_custom_css .='max-width: 100%;';
		$bb_wedding_bliss_custom_css .='}';
	}else if($bb_wedding_bliss_theme_lay == 'Container'){
		$bb_wedding_bliss_custom_css .='body{';
			$bb_wedding_bliss_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='.page-template-custom-front-page #header{';
			$bb_wedding_bliss_custom_css .='width:97.7%;';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='.serach_outer{';
			$bb_wedding_bliss_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$bb_wedding_bliss_custom_css .='width:97.1%;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_theme_lay == 'Box Container'){
		$bb_wedding_bliss_custom_css .='body{';
			$bb_wedding_bliss_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='.serach_outer{';
			$bb_wedding_bliss_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='.page-template-custom-front-page #header{';
			$bb_wedding_bliss_custom_css .='width: 86.4%;';
		$bb_wedding_bliss_custom_css .='}';
		$bb_wedding_bliss_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$bb_wedding_bliss_custom_css .='width:97.1%;';
		$bb_wedding_bliss_custom_css .='} }';
	}

	//css
	$bb_wedding_bliss_show_slider = get_theme_mod( 'bb_wedding_bliss_slider_arrows', false);
	if($bb_wedding_bliss_show_slider == false){
		$bb_wedding_bliss_custom_css .='.page-template-custom-front-page #header{';
			$bb_wedding_bliss_custom_css .='background-color:#151c27; position:static;';
		$bb_wedding_bliss_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$bb_wedding_bliss_theme_lay = get_theme_mod( 'bb_wedding_bliss_slider_content_alignment','Center');
    if($bb_wedding_bliss_theme_lay == 'Left'){
		$bb_wedding_bliss_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$bb_wedding_bliss_custom_css .='text-align:left; left:15%; right:45%;';
		$bb_wedding_bliss_custom_css .='}';
	}else if($bb_wedding_bliss_theme_lay == 'Center'){
		$bb_wedding_bliss_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$bb_wedding_bliss_custom_css .='text-align:center; left:30%; right:30%;';
		$bb_wedding_bliss_custom_css .='}';
	}else if($bb_wedding_bliss_theme_lay == 'Right'){
		$bb_wedding_bliss_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$bb_wedding_bliss_custom_css .='text-align:right; left:45%; right:15%;';
		$bb_wedding_bliss_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$bb_wedding_bliss_theme_lay = get_theme_mod( 'bb_wedding_bliss_slider_image_opacity','0.6');
	if($bb_wedding_bliss_theme_lay == '0'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.1'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.1';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.2'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.2';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.3'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.3';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.4'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.4';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.5'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.5';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.6'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.6';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.7'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.7';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.8'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.8';
		$bb_wedding_bliss_custom_css .='}';
		}else if($bb_wedding_bliss_theme_lay == '0.9'){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:0.9';
		$bb_wedding_bliss_custom_css .='}';
		}

	/*------------------------------ Button Settings option-----------------------*/
	$bb_wedding_bliss_button_padding_top_bottom = get_theme_mod('bb_wedding_bliss_button_padding_top_bottom');
	$bb_wedding_bliss_button_padding_left_right = get_theme_mod('bb_wedding_bliss_button_padding_left_right');
	$bb_wedding_bliss_custom_css .='.blogbutton-small, #comments .form-submit input[type="submit"]{';
		$bb_wedding_bliss_custom_css .='padding-top: '.esc_attr($bb_wedding_bliss_button_padding_top_bottom).'px; padding-bottom: '.esc_attr($bb_wedding_bliss_button_padding_top_bottom).'px; padding-left: '.esc_attr($bb_wedding_bliss_button_padding_left_right).'px; padding-right: '.esc_attr($bb_wedding_bliss_button_padding_left_right).'px; display:inline-block;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_button_border_radius = get_theme_mod('bb_wedding_bliss_button_border_radius');
	$bb_wedding_bliss_custom_css .='.blogbutton-small, #comments .form-submit input[type="submit"], .hvr-sweep-to-right:before, .hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active{';
		$bb_wedding_bliss_custom_css .='border-radius: '.esc_attr($bb_wedding_bliss_button_border_radius).'px;';
	$bb_wedding_bliss_custom_css .='}';

	/*-----------------------------Responsive Setting --------------------*/
	$bb_wedding_bliss_stickyheader = get_theme_mod( 'bb_wedding_bliss_responsive_sticky_header',false);
	if($bb_wedding_bliss_stickyheader == true && get_theme_mod( 'bb_wedding_bliss_sticky_header') == false){
    	$bb_wedding_bliss_custom_css .='.fixed-header{';
			$bb_wedding_bliss_custom_css .='position:static;';
		$bb_wedding_bliss_custom_css .='} ';
	}
    if($bb_wedding_bliss_stickyheader == true){
    	$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='.fixed-header{';
			$bb_wedding_bliss_custom_css .='position:fixed;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_stickyheader == false){
		$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='.fixed-header{';
			$bb_wedding_bliss_custom_css .='position:static;';
		$bb_wedding_bliss_custom_css .='} }';
	}

	$bb_wedding_bliss_slider = get_theme_mod( 'bb_wedding_bliss_responsive_slider',false);
	if($bb_wedding_bliss_slider == true && get_theme_mod( 'bb_wedding_bliss_slider_arrows', false) == false){
    	$bb_wedding_bliss_custom_css .='#slider{';
			$bb_wedding_bliss_custom_css .='display:none;';
		$bb_wedding_bliss_custom_css .='} ';
	}
    if($bb_wedding_bliss_slider == true){
    	$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#slider{';
			$bb_wedding_bliss_custom_css .='display:block;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_slider == false){
		$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#slider{';
			$bb_wedding_bliss_custom_css .='display:none;';
		$bb_wedding_bliss_custom_css .='} }';
	}

	$bb_wedding_bliss_slider = get_theme_mod( 'bb_wedding_bliss_responsive_scroll',true);
	if($bb_wedding_bliss_slider == true && get_theme_mod( 'bb_wedding_bliss_enable_disable_scroll', true) == false){
    	$bb_wedding_bliss_custom_css .='#scroll-top{';
			$bb_wedding_bliss_custom_css .='display:none !important;';
		$bb_wedding_bliss_custom_css .='} ';
	}
    if($bb_wedding_bliss_slider == true){
    	$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#scroll-top{';
			$bb_wedding_bliss_custom_css .='display:block !important;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_slider == false){
		$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#scroll-top{';
			$bb_wedding_bliss_custom_css .='display:none !important;';
		$bb_wedding_bliss_custom_css .='} }';
	}

	$bb_wedding_bliss_sidebar = get_theme_mod( 'bb_wedding_bliss_responsive_sidebar',true);
    if($bb_wedding_bliss_sidebar == true){
    	$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#sidebar{';
			$bb_wedding_bliss_custom_css .='display:block;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_sidebar == false){
		$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#sidebar{';
			$bb_wedding_bliss_custom_css .='display:none;';
		$bb_wedding_bliss_custom_css .='} }';
	}

	$bb_wedding_bliss_loader = get_theme_mod( 'bb_wedding_bliss_responsive_preloader', true);
	if($bb_wedding_bliss_loader == true && get_theme_mod( 'bb_wedding_bliss_preloader_option', true) == false){
    	$bb_wedding_bliss_custom_css .='#loader-wrapper{';
			$bb_wedding_bliss_custom_css .='display:none;';
		$bb_wedding_bliss_custom_css .='} ';
	}
    if($bb_wedding_bliss_loader == true){
    	$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#loader-wrapper{';
			$bb_wedding_bliss_custom_css .='display:block;';
		$bb_wedding_bliss_custom_css .='} }';
	}else if($bb_wedding_bliss_loader == false){
		$bb_wedding_bliss_custom_css .='@media screen and (max-width:575px) {';
		$bb_wedding_bliss_custom_css .='#loader-wrapper{';
			$bb_wedding_bliss_custom_css .='display:none;';
		$bb_wedding_bliss_custom_css .='} }';
	}
	
	/*------------------ Skin Option  -------------------*/
	$bb_wedding_bliss_theme_lay = get_theme_mod( 'bb_wedding_bliss_background_skin_mode','Transparent Background');
    if($bb_wedding_bliss_theme_lay == 'With Background'){
		$bb_wedding_bliss_custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,#love-Story, #moreevent,.front-page-content,.background-img-skin{';
			$bb_wedding_bliss_custom_css .='background-color: #fff;';
		$bb_wedding_bliss_custom_css .='}';
	}else if($bb_wedding_bliss_theme_lay == 'Transparent Background'){
		$bb_wedding_bliss_custom_css .='.our-services .page-box, .page-box-single{';
			$bb_wedding_bliss_custom_css .='background-color: transparent;';
		$bb_wedding_bliss_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$bb_wedding_bliss_top_bottom_product_button_padding = get_theme_mod('bb_wedding_bliss_top_bottom_product_button_padding', 14);
	$bb_wedding_bliss_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_wedding_bliss_custom_css .='padding-top: '.esc_attr($bb_wedding_bliss_top_bottom_product_button_padding).'px; padding-bottom: '.esc_attr($bb_wedding_bliss_top_bottom_product_button_padding).'px;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_left_right_product_button_padding = get_theme_mod('bb_wedding_bliss_left_right_product_button_padding', 26);
	$bb_wedding_bliss_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_wedding_bliss_custom_css .='padding-left: '.esc_attr($bb_wedding_bliss_left_right_product_button_padding).'px; padding-right: '.esc_attr($bb_wedding_bliss_left_right_product_button_padding).'px;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_product_button_border_radius = get_theme_mod('bb_wedding_bliss_product_button_border_radius', 0);
	$bb_wedding_bliss_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$bb_wedding_bliss_custom_css .='border-radius: '.esc_attr($bb_wedding_bliss_product_button_border_radius).'px;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_show_related_products = get_theme_mod('bb_wedding_bliss_show_related_products',true);
	if($bb_wedding_bliss_show_related_products == false){
		$bb_wedding_bliss_custom_css .='.related.products{';
			$bb_wedding_bliss_custom_css .='display: none;';
		$bb_wedding_bliss_custom_css .='}';
	}

	$bb_wedding_bliss_show_wooproducts_border = get_theme_mod('bb_wedding_bliss_show_wooproducts_border', true);
	if($bb_wedding_bliss_show_wooproducts_border == false){
		$bb_wedding_bliss_custom_css .='.products li{';
			$bb_wedding_bliss_custom_css .='border: none;';
		$bb_wedding_bliss_custom_css .='}';
	}

	$bb_wedding_bliss_top_bottom_wooproducts_padding = get_theme_mod('bb_wedding_bliss_top_bottom_wooproducts_padding',10);
	$bb_wedding_bliss_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_wedding_bliss_custom_css .='padding-top: '.esc_attr($bb_wedding_bliss_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_attr($bb_wedding_bliss_top_bottom_wooproducts_padding).'px !important;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_left_right_wooproducts_padding = get_theme_mod('bb_wedding_bliss_left_right_wooproducts_padding',10);
	$bb_wedding_bliss_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_wedding_bliss_custom_css .='padding-left: '.esc_attr($bb_wedding_bliss_left_right_wooproducts_padding).'px !important; padding-right: '.esc_attr($bb_wedding_bliss_left_right_wooproducts_padding).'px !important;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_wooproducts_border_radius = get_theme_mod('bb_wedding_bliss_wooproducts_border_radius',0);
	$bb_wedding_bliss_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_wedding_bliss_custom_css .='border-radius: '.esc_attr($bb_wedding_bliss_wooproducts_border_radius).'px;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_wooproducts_box_shadow = get_theme_mod('bb_wedding_bliss_wooproducts_box_shadow',0);
	$bb_wedding_bliss_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$bb_wedding_bliss_custom_css .='box-shadow: '.esc_attr($bb_wedding_bliss_wooproducts_box_shadow).'px '.esc_attr($bb_wedding_bliss_wooproducts_box_shadow).'px '.esc_attr($bb_wedding_bliss_wooproducts_box_shadow).'px #eee;';
	$bb_wedding_bliss_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$bb_wedding_bliss_copyright_content_align = get_theme_mod('bb_wedding_bliss_copyright_content_align');
	if($bb_wedding_bliss_copyright_content_align != false){
		$bb_wedding_bliss_custom_css .='.copyright{';
			$bb_wedding_bliss_custom_css .='text-align: '.esc_attr($bb_wedding_bliss_copyright_content_align).';';
		$bb_wedding_bliss_custom_css .='}';
	}

	$bb_wedding_bliss_footer_content_font_size = get_theme_mod('bb_wedding_bliss_footer_content_font_size', 16);
	$bb_wedding_bliss_custom_css .='.copyright p{';
		$bb_wedding_bliss_custom_css .='font-size: '.esc_attr($bb_wedding_bliss_footer_content_font_size).'px !important;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_copyright_padding = get_theme_mod('bb_wedding_bliss_copyright_padding', 15);
	$bb_wedding_bliss_custom_css .='.abovecopyright{';
		$bb_wedding_bliss_custom_css .='padding-top: '.esc_attr($bb_wedding_bliss_copyright_padding).'px; padding-bottom: '.esc_attr($bb_wedding_bliss_copyright_padding).'px;';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_footer_widget_bg_color = get_theme_mod('bb_wedding_bliss_footer_widget_bg_color');
	$bb_wedding_bliss_custom_css .='#footer{';
		$bb_wedding_bliss_custom_css .='background-color: '.esc_attr($bb_wedding_bliss_footer_widget_bg_color).';';
	$bb_wedding_bliss_custom_css .='}';

	$bb_wedding_bliss_footer_widget_bg_image = get_theme_mod('bb_wedding_bliss_footer_widget_bg_image');
	if($bb_wedding_bliss_footer_widget_bg_image != false){
		$bb_wedding_bliss_custom_css .='#footer{';
			$bb_wedding_bliss_custom_css .='background: url('.esc_attr($bb_wedding_bliss_footer_widget_bg_image).');';
		$bb_wedding_bliss_custom_css .='}';
	}

	// scroll to top
	$bb_wedding_bliss_scroll_font_size_icon = get_theme_mod('bb_wedding_bliss_scroll_font_size_icon', 22);
	$bb_wedding_bliss_custom_css .='#scroll-top .fas{';
		$bb_wedding_bliss_custom_css .='font-size: '.esc_attr($bb_wedding_bliss_scroll_font_size_icon).'px;';
	$bb_wedding_bliss_custom_css .='}';

	// Slider Height 
	$bb_wedding_bliss_slider_image_height = get_theme_mod('bb_wedding_bliss_slider_image_height');
	$bb_wedding_bliss_custom_css .='#slider img{';
		$bb_wedding_bliss_custom_css .='height: '.esc_attr($bb_wedding_bliss_slider_image_height).'px;';
	$bb_wedding_bliss_custom_css .='}';

	// Display Blog Post 
	$bb_wedding_bliss_display_blog_page_post = get_theme_mod( 'bb_wedding_bliss_display_blog_page_post','In Box');
    if($bb_wedding_bliss_display_blog_page_post == 'Without Box'){
		$bb_wedding_bliss_custom_css .='.our-services .page-box{';
			$bb_wedding_bliss_custom_css .='background:none;';
		$bb_wedding_bliss_custom_css .='}';
	}else if($bb_wedding_bliss_display_blog_page_post == 'In Box'){
		$bb_wedding_bliss_custom_css .='.our-services .page-box{';
			$bb_wedding_bliss_custom_css .='background:#f5f5f5;';
		$bb_wedding_bliss_custom_css .='}';
	}

	// slider overlay
	$bb_wedding_bliss_slider_overlay = get_theme_mod('bb_wedding_bliss_slider_overlay', true);
	if($bb_wedding_bliss_slider_overlay == false){
		$bb_wedding_bliss_custom_css .='#slider img{';
			$bb_wedding_bliss_custom_css .='opacity:1;';
		$bb_wedding_bliss_custom_css .='}';
	} 
	$bb_wedding_bliss_slider_image_overlay_color = get_theme_mod('bb_wedding_bliss_slider_image_overlay_color', true);
	if($bb_wedding_bliss_slider_overlay != false){
		$bb_wedding_bliss_custom_css .='#slider{';
			$bb_wedding_bliss_custom_css .='background-color: '.esc_attr($bb_wedding_bliss_slider_image_overlay_color).';';
		$bb_wedding_bliss_custom_css .='}';
	}

