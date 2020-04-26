<?php
	
	$advance_fitness_gym_theme_color = get_theme_mod('advance_fitness_gym_theme_color');

	$custom_css = '';

	if($advance_fitness_gym_theme_color != false){
		$custom_css .='a.button, .account a i, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #fitness-togym .wlcm-hr, .second-border a:hover,#footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"],#menu-sidebar input[type="submit"],.meta-nav:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover,input[type="submit"],#comments a.comment-reply-link, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, #footer .woocommerce a.button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .read-moresec a.button{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .=' #footer h3, .woocommerce-message::before, h1.entry-title,h1.page-title, #slider .inner_carousel h1,#header .top-contact i, #footer h3.widget-title a, #footer li a:hover, .primary-navigation a:hover, .primary-navigation ul ul a, h2.entry-title, h2.page-title, .primary-navigation ul ul li:hover > a, .primary-navigation ul li a:hover,.metabox a:hover, #sidebar ul li a:hover,.tags i{';
			$custom_css .='color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.page-box{';
			$custom_css .='border-bottom-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='.woocommerce-message, .primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#footer input[type="search"], .second-border a:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
			$custom_css .='border-color: '.esc_html($advance_fitness_gym_theme_color).';';
		$custom_css .='}';
	}
	if($advance_fitness_gym_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).'!important;';
		$custom_css .='}';
	}

	// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_fitness_gym_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info {
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_fitness_gym_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_theme_options','Default');
    if($advance_fitness_gym_theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}

	// css
	$advance_fitness_gym_show_header = get_theme_mod( 'advance_fitness_gym_slider_hide', false);
	if($advance_fitness_gym_show_header == false){
		$custom_css .='.fitnes-post{';
			$custom_css .='margin-top: 0%; padding:0;';
		$custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_slider_content_alignment','Center');
    if($advance_fitness_gym_theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:25%; right:25%;';
		$custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_slider_image_opacity','0.7');
	if($advance_fitness_gym_theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*------------------------------ Button Settings option-----------------------*/
	$advance_fitness_gym_button_padding_top_bottom = get_theme_mod('advance_fitness_gym_button_padding_top_bottom');
	$advance_fitness_gym_button_padding_left_right = get_theme_mod('advance_fitness_gym_button_padding_left_right');
	if($advance_fitness_gym_button_padding_top_bottom != false || $advance_fitness_gym_button_padding_left_right != false){
		$custom_css .='.new-text .second-border a, #comments .form-submit input[type="submit"], #fitness-togym .know-btn a.blogbutton-small{';
			$custom_css .='padding-top: '.esc_html($advance_fitness_gym_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_fitness_gym_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_fitness_gym_button_padding_left_right).'px; padding-right: '.esc_html($advance_fitness_gym_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_fitness_gym_button_border_radius = get_theme_mod('advance_fitness_gym_button_border_radius');
	if($advance_fitness_gym_button_border_radius != false){
		$custom_css .='.new-text .second-border a, #comments .form-submit input[type="submit"], #fitness-togym .know-btn a.blogbutton-small{';
			$custom_css .='border-radius: '.esc_html($advance_fitness_gym_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/
	$advance_fitness_gym_stickyheader = get_theme_mod( 'advance_fitness_gym_responsive_sticky_header', false);
	if($advance_fitness_gym_stickyheader == true && get_theme_mod( 'advance_fitness_gym_sticky_header', false) == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($advance_fitness_gym_stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($advance_fitness_gym_stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$advance_fitness_gym_slider = get_theme_mod( 'advance_fitness_gym_responsive_slider',false);
	if($advance_fitness_gym_slider == true && get_theme_mod( 'advance_fitness_gym_slider_hide', false) == false){
    	$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($advance_fitness_gym_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_fitness_gym_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$advance_fitness_gym_scroll = get_theme_mod( 'advance_fitness_gym_responsive_scroll',true);
	if($advance_fitness_gym_scroll == true && get_theme_mod( 'advance_fitness_gym_enable_disable_scroll', true) == false){
    	$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} ';
	}
    if($advance_fitness_gym_scroll == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:block !important;';
		$custom_css .='} }';
	}else if($advance_fitness_gym_scroll == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} }';
	}

	$advance_fitness_gym_sidebar = get_theme_mod( 'advance_fitness_gym_responsive_sidebar',true);
    if($advance_fitness_gym_sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_fitness_gym_sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_background_skin_mode','Transpert Background');
    if($advance_fitness_gym_theme_lay == 'With Background'){
		$custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin,.fitness-single-post{';
			$custom_css .='background-color: #fff;';
		$custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Transpert Background'){
		$custom_css .='#sidebar aside,.page-box-single{';
			$custom_css .='background-color: transparent;';
		$custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_fitness_gym_top_bottom_product_button_padding = get_theme_mod('advance_fitness_gym_top_bottom_product_button_padding', 10);
	if($advance_fitness_gym_top_bottom_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
			$custom_css .='padding-top: '.esc_html($advance_fitness_gym_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_fitness_gym_top_bottom_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_fitness_gym_left_right_product_button_padding = get_theme_mod('advance_fitness_gym_left_right_product_button_padding', 16);
	if($advance_fitness_gym_left_right_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
			$custom_css .='padding-left: '.esc_html($advance_fitness_gym_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_fitness_gym_left_right_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_fitness_gym_product_button_border_radius = get_theme_mod('advance_fitness_gym_product_button_border_radius', 0);
	if($advance_fitness_gym_product_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($advance_fitness_gym_product_button_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_fitness_gym_show_related_products = get_theme_mod('advance_fitness_gym_show_related_products',true);
	if($advance_fitness_gym_show_related_products == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$advance_fitness_gym_show_wooproducts_border = get_theme_mod('advance_fitness_gym_show_wooproducts_border', false);
	if($advance_fitness_gym_show_wooproducts_border == true){
		$custom_css .='.products li{';
			$custom_css .='border: 1px solid #cccccc;';
		$custom_css .='}';
	}

	$advance_fitness_gym_top_bottom_wooproducts_padding = get_theme_mod('advance_fitness_gym_top_bottom_wooproducts_padding',0);
	if($advance_fitness_gym_top_bottom_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($advance_fitness_gym_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_fitness_gym_top_bottom_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_fitness_gym_left_right_wooproducts_padding = get_theme_mod('advance_fitness_gym_left_right_wooproducts_padding',0);
	if($advance_fitness_gym_left_right_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($advance_fitness_gym_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_fitness_gym_left_right_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_fitness_gym_wooproducts_border_radius = get_theme_mod('advance_fitness_gym_wooproducts_border_radius',0);
	if($advance_fitness_gym_wooproducts_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($advance_fitness_gym_wooproducts_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_fitness_gym_wooproducts_box_shadow = get_theme_mod('advance_fitness_gym_wooproducts_box_shadow',0);
	if($advance_fitness_gym_wooproducts_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px #eee;';
		$custom_css .='}';
	}



