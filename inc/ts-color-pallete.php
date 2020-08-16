<?php
	
	$advance_fitness_gym_theme_color = get_theme_mod('advance_fitness_gym_theme_color');

	$advance_fitness_gym_custom_css = '';

	$advance_fitness_gym_custom_css .='a.button, .account a i, .categry-title, .product-category::-webkit-scrollbar-thumb:hover, #fitness-togym .wlcm-hr, .second-border a:hover,#footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"],#menu-sidebar input[type="submit"],.meta-nav:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover,input[type="submit"],#comments a.comment-reply-link, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, #footer .woocommerce a.button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .read-moresec a.button{';
		$advance_fitness_gym_custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_custom_css .=' #footer h3, .woocommerce-message::before, h1.entry-title,h1.page-title, #slider .inner_carousel h1,#header .top-contact i, #footer h3.widget-title a, #footer li a:hover, .primary-navigation a:hover, .primary-navigation ul ul a, h2.entry-title, h2.page-title, .primary-navigation ul ul li:hover > a, .primary-navigation ul li a:hover,.metabox a:hover, #sidebar ul li a:hover,.tags i{';
		$advance_fitness_gym_custom_css .='color: '.esc_html($advance_fitness_gym_theme_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_custom_css .='.page-box{';
		$advance_fitness_gym_custom_css .='border-bottom-color: '.esc_html($advance_fitness_gym_theme_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_custom_css .='.woocommerce-message, .primary-navigation ul ul{';
		$advance_fitness_gym_custom_css .='border-top-color: '.esc_html($advance_fitness_gym_theme_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_custom_css .='#footer input[type="search"], .second-border a:hover,.tags p a:hover,#fitness-togym .know-btn a.blogbutton-small:hover, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
		$advance_fitness_gym_custom_css .='border-color: '.esc_html($advance_fitness_gym_theme_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
		$advance_fitness_gym_custom_css .='background-color: '.esc_html($advance_fitness_gym_theme_color).'!important;';
	$advance_fitness_gym_custom_css .='}';
	
	// media
	$advance_fitness_gym_custom_css .='@media screen and (max-width:1000px) {';
	if($advance_fitness_gym_theme_color){
	$advance_fitness_gym_custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info {
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_fitness_gym_theme_color).' 120%);
		}';
	}
	$advance_fitness_gym_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_theme_options','Default');
    if($advance_fitness_gym_theme_lay == 'Default'){
		$advance_fitness_gym_custom_css .='body{';
			$advance_fitness_gym_custom_css .='max-width: 100%;';
		$advance_fitness_gym_custom_css .='}';
		$advance_fitness_gym_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_fitness_gym_custom_css .='width: 97.3%';
		$advance_fitness_gym_custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Container'){
		$advance_fitness_gym_custom_css .='body{';
			$advance_fitness_gym_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_fitness_gym_custom_css .='}';
		$advance_fitness_gym_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_fitness_gym_custom_css .='width: 97.7%';
		$advance_fitness_gym_custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Box Container'){
		$advance_fitness_gym_custom_css .='body{';
			$advance_fitness_gym_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_fitness_gym_custom_css .='}';
	}

	// css
	$advance_fitness_gym_show_header = get_theme_mod( 'advance_fitness_gym_slider_hide', false);
	if($advance_fitness_gym_show_header == false){
		$advance_fitness_gym_custom_css .='.fitnes-post{';
			$advance_fitness_gym_custom_css .='margin-top: 0%; padding:0;';
		$advance_fitness_gym_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_slider_content_alignment','Center');
    if($advance_fitness_gym_theme_lay == 'Left'){
		$advance_fitness_gym_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_fitness_gym_custom_css .='text-align:left; left:15%; right:45%;';
		$advance_fitness_gym_custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Center'){
		$advance_fitness_gym_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_fitness_gym_custom_css .='text-align:center; left:25%; right:25%;';
		$advance_fitness_gym_custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Right'){
		$advance_fitness_gym_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_fitness_gym_custom_css .='text-align:right; left:45%; right:15%;';
		$advance_fitness_gym_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_slider_image_opacity','0.7');
	if($advance_fitness_gym_theme_lay == '0'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.1'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.1';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.2'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.2';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.3'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.3';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.4'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.4';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.5'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.5';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.6'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.6';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.7'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.7';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.8'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.8';
		$advance_fitness_gym_custom_css .='}';
		}else if($advance_fitness_gym_theme_lay == '0.9'){
		$advance_fitness_gym_custom_css .='#slider img{';
			$advance_fitness_gym_custom_css .='opacity:0.9';
		$advance_fitness_gym_custom_css .='}';
		}

	/*------------------------------ Button Settings option-----------------------*/
	$advance_fitness_gym_button_padding_top_bottom = get_theme_mod('advance_fitness_gym_button_padding_top_bottom');
	$advance_fitness_gym_button_padding_left_right = get_theme_mod('advance_fitness_gym_button_padding_left_right');
	$advance_fitness_gym_custom_css .='.new-text .second-border a, #comments .form-submit input[type="submit"], #fitness-togym .know-btn a.blogbutton-small{';
		$advance_fitness_gym_custom_css .='padding-top: '.esc_html($advance_fitness_gym_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_fitness_gym_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_fitness_gym_button_padding_left_right).'px; padding-right: '.esc_html($advance_fitness_gym_button_padding_left_right).'px; display:inline-block;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_button_border_radius = get_theme_mod('advance_fitness_gym_button_border_radius');
	$advance_fitness_gym_custom_css .='.new-text .second-border a, #comments .form-submit input[type="submit"], #fitness-togym .know-btn a.blogbutton-small{';
		$advance_fitness_gym_custom_css .='border-radius: '.esc_html($advance_fitness_gym_button_border_radius).'px;';
	$advance_fitness_gym_custom_css .='}';

	/*-----------------------------Responsive Setting --------------------*/
	$advance_fitness_gym_stickyheader = get_theme_mod( 'advance_fitness_gym_responsive_sticky_header', false);
	if($advance_fitness_gym_stickyheader == true && get_theme_mod( 'advance_fitness_gym_sticky_header', false) == false){
    	$advance_fitness_gym_custom_css .='.fixed-header{';
			$advance_fitness_gym_custom_css .='position:static;';
		$advance_fitness_gym_custom_css .='} ';
	}
    if($advance_fitness_gym_stickyheader == true){
    	$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='.fixed-header{';
			$advance_fitness_gym_custom_css .='position:fixed;';
		$advance_fitness_gym_custom_css .='} }';
	}else if($advance_fitness_gym_stickyheader == false){
		$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='.fixed-header{';
			$advance_fitness_gym_custom_css .='position:static;';
		$advance_fitness_gym_custom_css .='} }';
	}

	$advance_fitness_gym_slider = get_theme_mod( 'advance_fitness_gym_responsive_slider',false);
	if($advance_fitness_gym_slider == true && get_theme_mod( 'advance_fitness_gym_slider_hide', false) == false){
    	$advance_fitness_gym_custom_css .='#slider{';
			$advance_fitness_gym_custom_css .='display:none;';
		$advance_fitness_gym_custom_css .='} ';
	}
    if($advance_fitness_gym_slider == true){
    	$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#slider{';
			$advance_fitness_gym_custom_css .='display:block;';
		$advance_fitness_gym_custom_css .='} }';
	}else if($advance_fitness_gym_slider == false){
		$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#slider{';
			$advance_fitness_gym_custom_css .='display:none;';
		$advance_fitness_gym_custom_css .='} }';
	}

	$advance_fitness_gym_scroll = get_theme_mod( 'advance_fitness_gym_responsive_scroll',true);
	if($advance_fitness_gym_scroll == true && get_theme_mod( 'advance_fitness_gym_enable_disable_scroll', true) == false){
    	$advance_fitness_gym_custom_css .='#scroll-top{';
			$advance_fitness_gym_custom_css .='display:none !important;';
		$advance_fitness_gym_custom_css .='} ';
	}
    if($advance_fitness_gym_scroll == true){
    	$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#scroll-top{';
			$advance_fitness_gym_custom_css .='display:block !important;';
		$advance_fitness_gym_custom_css .='} }';
	}else if($advance_fitness_gym_scroll == false){
		$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#scroll-top{';
			$advance_fitness_gym_custom_css .='display:none !important;';
		$advance_fitness_gym_custom_css .='} }';
	}

	$advance_fitness_gym_sidebar = get_theme_mod( 'advance_fitness_gym_responsive_sidebar',true);
    if($advance_fitness_gym_sidebar == true){
    	$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#sidebar{';
			$advance_fitness_gym_custom_css .='display:block;';
		$advance_fitness_gym_custom_css .='} }';
	}else if($advance_fitness_gym_sidebar == false){
		$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#sidebar{';
			$advance_fitness_gym_custom_css .='display:none;';
		$advance_fitness_gym_custom_css .='} }';
	}

	$advance_fitness_gym_loader = get_theme_mod( 'advance_fitness_gym_responsive_preloader', true);
	if($advance_fitness_gym_loader == true && get_theme_mod( 'advance_fitness_gym_preloader_option', true) == false){
    	$advance_fitness_gym_custom_css .='#loader-wrapper{';
			$advance_fitness_gym_custom_css .='display:none;';
		$advance_fitness_gym_custom_css .='} ';
	}
    if($advance_fitness_gym_loader == true){
    	$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#loader-wrapper{';
			$advance_fitness_gym_custom_css .='display:block;';
		$advance_fitness_gym_custom_css .='} }';
	}else if($advance_fitness_gym_loader == false){
		$advance_fitness_gym_custom_css .='@media screen and (max-width:575px) {';
		$advance_fitness_gym_custom_css .='#loader-wrapper{';
			$advance_fitness_gym_custom_css .='display:none;';
		$advance_fitness_gym_custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_fitness_gym_theme_lay = get_theme_mod( 'advance_fitness_gym_background_skin_mode','Transpert Background');
    if($advance_fitness_gym_theme_lay == 'With Background'){
		$advance_fitness_gym_custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin,.fitness-single-post{';
			$advance_fitness_gym_custom_css .='background-color: #fff;';
		$advance_fitness_gym_custom_css .='}';
	}else if($advance_fitness_gym_theme_lay == 'Transpert Background'){
		$advance_fitness_gym_custom_css .='#sidebar aside,.page-box-single{';
			$advance_fitness_gym_custom_css .='background-color: transparent;';
		$advance_fitness_gym_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_fitness_gym_top_bottom_product_button_padding = get_theme_mod('advance_fitness_gym_top_bottom_product_button_padding', 10);
	$advance_fitness_gym_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
		$advance_fitness_gym_custom_css .='padding-top: '.esc_html($advance_fitness_gym_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_fitness_gym_top_bottom_product_button_padding).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_left_right_product_button_padding = get_theme_mod('advance_fitness_gym_left_right_product_button_padding', 16);
	$advance_fitness_gym_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
		$advance_fitness_gym_custom_css .='padding-left: '.esc_html($advance_fitness_gym_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_fitness_gym_left_right_product_button_padding).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_product_button_border_radius = get_theme_mod('advance_fitness_gym_product_button_border_radius', 0);
	$advance_fitness_gym_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
		$advance_fitness_gym_custom_css .='border-radius: '.esc_html($advance_fitness_gym_product_button_border_radius).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_show_related_products = get_theme_mod('advance_fitness_gym_show_related_products',true);
	if($advance_fitness_gym_show_related_products == false){
		$advance_fitness_gym_custom_css .='.related.products{';
			$advance_fitness_gym_custom_css .='display: none;';
		$advance_fitness_gym_custom_css .='}';
	}

	$advance_fitness_gym_show_wooproducts_border = get_theme_mod('advance_fitness_gym_show_wooproducts_border', false);
	if($advance_fitness_gym_show_wooproducts_border == true){
		$advance_fitness_gym_custom_css .='.products li{';
			$advance_fitness_gym_custom_css .='border: 1px solid #cccccc;';
		$advance_fitness_gym_custom_css .='}';
	}

	$advance_fitness_gym_top_bottom_wooproducts_padding = get_theme_mod('advance_fitness_gym_top_bottom_wooproducts_padding',0);
	$advance_fitness_gym_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_fitness_gym_custom_css .='padding-top: '.esc_html($advance_fitness_gym_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_fitness_gym_top_bottom_wooproducts_padding).'px !important;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_left_right_wooproducts_padding = get_theme_mod('advance_fitness_gym_left_right_wooproducts_padding',0);
	$advance_fitness_gym_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_fitness_gym_custom_css .='padding-left: '.esc_html($advance_fitness_gym_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_fitness_gym_left_right_wooproducts_padding).'px !important;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_wooproducts_border_radius = get_theme_mod('advance_fitness_gym_wooproducts_border_radius',0);
	$advance_fitness_gym_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_fitness_gym_custom_css .='border-radius: '.esc_html($advance_fitness_gym_wooproducts_border_radius).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_wooproducts_box_shadow = get_theme_mod('advance_fitness_gym_wooproducts_box_shadow',0);
	$advance_fitness_gym_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$advance_fitness_gym_custom_css .='box-shadow: '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px '.esc_html($advance_fitness_gym_wooproducts_box_shadow).'px #eee;';
	$advance_fitness_gym_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$advance_fitness_gym_copyright_content_align = get_theme_mod('advance_fitness_gym_copyright_content_align');
	if($advance_fitness_gym_copyright_content_align != false){
		$advance_fitness_gym_custom_css .='.copyright{';
			$advance_fitness_gym_custom_css .='text-align: '.esc_html($advance_fitness_gym_copyright_content_align).';';
		$advance_fitness_gym_custom_css .='}';
	}

	$advance_fitness_gym_footer_content_font_size = get_theme_mod('advance_fitness_gym_footer_content_font_size', 15);
	$advance_fitness_gym_custom_css .='.copyright p{';
		$advance_fitness_gym_custom_css .='font-size: '.esc_html($advance_fitness_gym_footer_content_font_size).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_copyright_padding = get_theme_mod('advance_fitness_gym_copyright_padding', 15);
	$advance_fitness_gym_custom_css .='.copyright{';
		$advance_fitness_gym_custom_css .='padding-top: '.esc_html($advance_fitness_gym_copyright_padding).'px; padding-bottom: '.esc_html($advance_fitness_gym_copyright_padding).'px;';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_footer_widget_bg_color = get_theme_mod('advance_fitness_gym_footer_widget_bg_color');
	$advance_fitness_gym_custom_css .='#footer{';
		$advance_fitness_gym_custom_css .='background-color: '.esc_html($advance_fitness_gym_footer_widget_bg_color).';';
	$advance_fitness_gym_custom_css .='}';

	$advance_fitness_gym_footer_widget_bg_image = get_theme_mod('advance_fitness_gym_footer_widget_bg_image');
	if($advance_fitness_gym_footer_widget_bg_image != false){
		$advance_fitness_gym_custom_css .='#footer{';
			$advance_fitness_gym_custom_css .='background: url('.esc_html($advance_fitness_gym_footer_widget_bg_image).');';
		$advance_fitness_gym_custom_css .='}';
	}

	// scroll to top
	$advance_fitness_gym_scroll_font_size_icon = get_theme_mod('advance_fitness_gym_scroll_font_size_icon', 22);
	$advance_fitness_gym_custom_css .='#scroll-top .fas{';
		$advance_fitness_gym_custom_css .='font-size: '.esc_html($advance_fitness_gym_scroll_font_size_icon).'px;';
	$advance_fitness_gym_custom_css .='}';

	// Slider Height 
	$advance_fitness_gym_slider_image_height = get_theme_mod('advance_fitness_gym_slider_image_height');
	$advance_fitness_gym_custom_css .='#slider img{';
		$advance_fitness_gym_custom_css .='height: '.esc_html($advance_fitness_gym_slider_image_height).'px;';
	$advance_fitness_gym_custom_css .='}';





