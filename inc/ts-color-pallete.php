<?php
	
	$advance_portfolio_theme_color_first = get_theme_mod('advance_portfolio_theme_color_first');

	$advance_portfolio_custom_css = '';

	if($advance_portfolio_theme_color_first != false){
		$advance_portfolio_custom_css .='.read-moresec a.button, .second-border a:hover, #footer input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale,  #comments input[type="submit"].submit, #footer .tagcloud a:hover,.meta-nav:hover,#comments a.comment-reply-link,.tags p a:hover,#menu-sidebar input[type="submit"], #footer .woocommerce a.button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
			$advance_portfolio_custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$advance_portfolio_custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$advance_portfolio_custom_css .=' nav.woocommerce-MyAccount-navigation ul li, #banner .social-media i:hover{';
			$advance_portfolio_custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_first).'!important;';
		$advance_portfolio_custom_css .='}';
	}

	if($advance_portfolio_theme_color_first != false){
		$advance_portfolio_custom_css .='.social-media i:hover,#footer h3,.woocommerce-message::before, h1.entry-title,#footer h3.widget-title a, #footer li a:hover, .primary-navigation li a:hover,.metabox a:hover,#sidebar ul li a:hover,.sf-arrows ul li > .sf-with-ul:focus:after,.sf-arrows ul li:hover > .sf-with-ul:after,.sf-arrows .sfHover > .sf-with-ul:after,.sf-arrows ul .sf-with-ul:after,.tags i,.primary-navigation ul ul, .primary-navigation li a:hover, .primary-navigation li:hover a{';
			$advance_portfolio_custom_css .='color: '.esc_html($advance_portfolio_theme_color_first).';';
		$advance_portfolio_custom_css .='}';
	}
	
	if($advance_portfolio_theme_color_first != false){
		$advance_portfolio_custom_css .='#footer input[type="search"], #footer input[type="submit"], #footer .tagcloud a:hover,.second-border a:hover,.primary-navigation ul ul, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
			$advance_portfolio_custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_first).';';
		$advance_portfolio_custom_css .='}';
	}
	if($advance_portfolio_theme_color_first != false){
		$advance_portfolio_custom_css .='.primary-navigation ul ul{';
			$advance_portfolio_custom_css .='border-top-color: '.esc_html($advance_portfolio_theme_color_first).' !important;';
		$advance_portfolio_custom_css .='}';
	}

	/*---------------------------Theme color option-------------------*/
	$advance_portfolio_theme_color_second = get_theme_mod('advance_portfolio_theme_color_second');

	if($advance_portfolio_theme_color_second != false){
		$advance_portfolio_custom_css .='#header .horizontal, #header, #header .horizontal, #header, #banner .social-media i:hover, #header .horizontal, #header, .page-template-custom-front-page .fixed-header #header{';
			$advance_portfolio_custom_css .='background-color: '.esc_html($advance_portfolio_theme_color_second).';';
		$advance_portfolio_custom_css .='}';
	}
	if($advance_portfolio_theme_color_second != false){
		$advance_portfolio_custom_css .='#banner .social-media i:hover, #banner .social-media i:hover{';
			$advance_portfolio_custom_css .='color: '.esc_html($advance_portfolio_theme_color_second).';';
		$advance_portfolio_custom_css .='}';
	}
	if($advance_portfolio_theme_color_second != false){
		$advance_portfolio_custom_css .='.page-box, .page-box, .page-box{';
			$advance_portfolio_custom_css .='border-color: '.esc_html($advance_portfolio_theme_color_second).';';
		$advance_portfolio_custom_css .='}';
	}

	// media
	$advance_portfolio_custom_css .='@media screen and (max-width:1000px) {';
	if($advance_portfolio_theme_color_second != false || $advance_portfolio_theme_color_first != false){
	$advance_portfolio_custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_portfolio_theme_color_second).' 0%, '.esc_html($advance_portfolio_theme_color_first).' 120%);
		} ';
	}
	$advance_portfolio_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_portfolio_theme_lay = get_theme_mod( 'advance_portfolio_theme_options','Default');
    if($advance_portfolio_theme_lay == 'Default'){
		$advance_portfolio_custom_css .='body{';
			$advance_portfolio_custom_css .='max-width: 100%;';
		$advance_portfolio_custom_css .='}';
		$advance_portfolio_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_portfolio_custom_css .='width: 97.3%';
		$advance_portfolio_custom_css .='}';
	}else if($advance_portfolio_theme_lay == 'Container'){
		$advance_portfolio_custom_css .='body{';
			$advance_portfolio_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_portfolio_custom_css .='}';
		$advance_portfolio_custom_css .='.page-template-custom-front-page #header{';
			$advance_portfolio_custom_css .='right:0;';
		$advance_portfolio_custom_css .='}';
		$advance_portfolio_custom_css .='.serach_outer{';
			$advance_portfolio_custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$advance_portfolio_custom_css .='}';
	}else if($advance_portfolio_theme_lay == 'Box Container'){
		$advance_portfolio_custom_css .='body{';
			$advance_portfolio_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_portfolio_custom_css .='}';
		$advance_portfolio_custom_css .='.page-template-custom-front-page #header{';
			$advance_portfolio_custom_css .='right:0;';
		$advance_portfolio_custom_css .='}';
		$advance_portfolio_custom_css .='.serach_outer{';
			$advance_portfolio_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$advance_portfolio_custom_css .='}';
	}

	// css
	$advance_portfolio_show_banner = get_theme_mod( 'advance_portfolio_page_settings', false);
	if($advance_portfolio_show_banner == false){
		$advance_portfolio_custom_css .='.page-template-custom-front-page #header{';
			$advance_portfolio_custom_css .='position:static; background-color: #ffdd65;';
		$advance_portfolio_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_portfolio_theme_lay = get_theme_mod( 'advance_portfolio_banner_content_alignment','Left');
    if($advance_portfolio_theme_lay == 'Left'){
		$advance_portfolio_custom_css .='.box-content,.box-content h1{';
			$advance_portfolio_custom_css .='text-align:left; left:9%; right:50%;';
		$advance_portfolio_custom_css .='}';
	}else if($advance_portfolio_theme_lay == 'Center'){
		$advance_portfolio_custom_css .='.box-content,.box-content h1{';
			$advance_portfolio_custom_css .='text-align:center; left:20%; right:20%;';
		$advance_portfolio_custom_css .='}';
	}else if($advance_portfolio_theme_lay == 'Right'){
		$advance_portfolio_custom_css .='.box-content,.box-content h1{';
			$advance_portfolio_custom_css .='text-align:right; left:50%; right:9%;';
		$advance_portfolio_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_portfolio_theme_lay = get_theme_mod( 'advance_portfolio_banner_image_opacity','0.6');
	if($advance_portfolio_theme_lay == '0'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.1'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.1';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.2'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.2';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.3'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.3';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.4'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.4';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.5'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.5';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.6'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.6';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.7'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.7';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.8'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.8';
		$advance_portfolio_custom_css .='}';
		}else if($advance_portfolio_theme_lay == '0.9'){
		$advance_portfolio_custom_css .='#banner img{';
			$advance_portfolio_custom_css .='opacity:0.9';
		$advance_portfolio_custom_css .='}';
		}

	/*-------------------------- Button Settings option------------------*/
	$advance_portfolio_button_padding_top_bottom = get_theme_mod('advance_portfolio_button_padding_top_bottom');
	$advance_portfolio_button_padding_left_right = get_theme_mod('advance_portfolio_button_padding_left_right');
	if($advance_portfolio_button_padding_top_bottom != false || $advance_portfolio_button_padding_left_right != false){
		$advance_portfolio_custom_css .=' #comments .form-submit input[type="submit"],.second-border a{';
			$advance_portfolio_custom_css .='padding-top: '.esc_html($advance_portfolio_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_portfolio_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_portfolio_button_padding_left_right).'px; padding-right: '.esc_html($advance_portfolio_button_padding_left_right).'px; display:inline-block;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_button_border_radius = get_theme_mod('advance_portfolio_button_border_radius');
	if($advance_portfolio_button_border_radius != false){
		$advance_portfolio_custom_css .='#comments .form-submit input[type="submit"], .second-border a{';
			$advance_portfolio_custom_css .='border-radius: '.esc_html($advance_portfolio_button_border_radius).'px;';
		$advance_portfolio_custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/
	$advance_portfolio_stickyheader = get_theme_mod( 'advance_portfolio_responsive_sticky_header',false);
	if($advance_portfolio_stickyheader == true && get_theme_mod( 'advance_portfolio_sticky_header') == false){
    	$advance_portfolio_custom_css .='.fixed-header{';
			$advance_portfolio_custom_css .='position:static;';
		$advance_portfolio_custom_css .='} ';
	}
    if($advance_portfolio_stickyheader == true){
    	$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='.fixed-header{';
			$advance_portfolio_custom_css .='position:fixed;';
		$advance_portfolio_custom_css .='} }';
	}else if($advance_portfolio_stickyheader == false){
		$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='.fixed-header{';
			$advance_portfolio_custom_css .='position:static;';
		$advance_portfolio_custom_css .='} }';
	}

	$advance_portfolio_slider = get_theme_mod( 'advance_portfolio_responsive_scroll',true);
	if($advance_portfolio_slider == true && get_theme_mod( 'advance_portfolio_enable_disable_scroll', true) == false){
    	$advance_portfolio_custom_css .='#scroll-top{';
			$advance_portfolio_custom_css .='display:none !important;';
		$advance_portfolio_custom_css .='} ';
	}
    if($advance_portfolio_slider == true){
    	$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#scroll-top{';
			$advance_portfolio_custom_css .='display:block !important;';
		$advance_portfolio_custom_css .='} }';
	}else if($advance_portfolio_slider == false){
		$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#scroll-top{';
			$advance_portfolio_custom_css .='display:none !important;';
		$advance_portfolio_custom_css .='} }';
	}

	$advance_portfolio_sidebar = get_theme_mod( 'advance_portfolio_responsive_sidebar',true);
    if($advance_portfolio_sidebar == true){
    	$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#sidebar{';
			$advance_portfolio_custom_css .='display:block;';
		$advance_portfolio_custom_css .='} }';
	}else if($advance_portfolio_sidebar == false){
		$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#sidebar{';
			$advance_portfolio_custom_css .='display:none;';
		$advance_portfolio_custom_css .='} }';
	}

	$advance_portfolio_loader = get_theme_mod( 'advance_portfolio_responsive_preloader', true);
	if($advance_portfolio_loader == true && get_theme_mod( 'advance_portfolio_preloader_option', true) == false){
    	$advance_portfolio_custom_css .='#loader-wrapper{';
			$advance_portfolio_custom_css .='display:none;';
		$advance_portfolio_custom_css .='} ';
	}
    if($advance_portfolio_loader == true){
    	$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#loader-wrapper{';
			$advance_portfolio_custom_css .='display:block;';
		$advance_portfolio_custom_css .='} }';
	}else if($advance_portfolio_loader == false){
		$advance_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$advance_portfolio_custom_css .='#loader-wrapper{';
			$advance_portfolio_custom_css .='display:none;';
		$advance_portfolio_custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_portfolio_theme_lay = get_theme_mod( 'advance_portfolio_background_skin_mode','Transparent Background');
    if($advance_portfolio_theme_lay == 'With Background'){
		$advance_portfolio_custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin,#Portfolio-Section .box-image{';
			$advance_portfolio_custom_css .='background-color: #fff;';
		$advance_portfolio_custom_css .='}';
	}else if($advance_portfolio_theme_lay == 'Transparent Background'){
		$advance_portfolio_custom_css .='.page-box-single{';
			$advance_portfolio_custom_css .='background-color: transparent;';
		$advance_portfolio_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_portfolio_top_bottom_product_button_padding = get_theme_mod('advance_portfolio_top_bottom_product_button_padding', 10);
	if($advance_portfolio_top_bottom_product_button_padding != false){
		$advance_portfolio_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button{';
			$advance_portfolio_custom_css .='padding-top: '.esc_html($advance_portfolio_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_portfolio_top_bottom_product_button_padding).'px;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_left_right_product_button_padding = get_theme_mod('advance_portfolio_left_right_product_button_padding', 16);
	if($advance_portfolio_left_right_product_button_padding != false){
		$advance_portfolio_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button{';
			$advance_portfolio_custom_css .='padding-left: '.esc_html($advance_portfolio_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_portfolio_left_right_product_button_padding).'px;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_product_button_border_radius = get_theme_mod('advance_portfolio_product_button_border_radius', 0);
	if($advance_portfolio_product_button_border_radius != false){
		$advance_portfolio_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button{';
			$advance_portfolio_custom_css .='border-radius: '.esc_html($advance_portfolio_product_button_border_radius).'px;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_show_related_products = get_theme_mod('advance_portfolio_show_related_products',true);
	if($advance_portfolio_show_related_products == false){
		$advance_portfolio_custom_css .='.related.products{';
			$advance_portfolio_custom_css .='display: none;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_show_wooproducts_border = get_theme_mod('advance_portfolio_show_wooproducts_border', true);
	if($advance_portfolio_show_wooproducts_border == false){
		$advance_portfolio_custom_css .='.products li{';
			$advance_portfolio_custom_css .='border: none;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_top_bottom_wooproducts_padding = get_theme_mod('advance_portfolio_top_bottom_wooproducts_padding',10);
	if($advance_portfolio_top_bottom_wooproducts_padding != false){
		$advance_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_portfolio_custom_css .='padding-top: '.esc_html($advance_portfolio_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_portfolio_top_bottom_wooproducts_padding).'px !important;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_left_right_wooproducts_padding = get_theme_mod('advance_portfolio_left_right_wooproducts_padding',10);
	if($advance_portfolio_left_right_wooproducts_padding != false){
		$advance_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_portfolio_custom_css .='padding-left: '.esc_html($advance_portfolio_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_portfolio_left_right_wooproducts_padding).'px !important;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_wooproducts_border_radius = get_theme_mod('advance_portfolio_wooproducts_border_radius',0);
	if($advance_portfolio_wooproducts_border_radius != false){
		$advance_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_portfolio_custom_css .='border-radius: '.esc_html($advance_portfolio_wooproducts_border_radius).'px;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_wooproducts_box_shadow = get_theme_mod('advance_portfolio_wooproducts_box_shadow',0);
	if($advance_portfolio_wooproducts_box_shadow != false){
		$advance_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_portfolio_custom_css .='box-shadow: '.esc_html($advance_portfolio_wooproducts_box_shadow).'px '.esc_html($advance_portfolio_wooproducts_box_shadow).'px '.esc_html($advance_portfolio_wooproducts_box_shadow).'px #eee;';
		$advance_portfolio_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$advance_portfolio_copyright_content_align = get_theme_mod('advance_portfolio_copyright_content_align');
	if($advance_portfolio_copyright_content_align != false){
		$advance_portfolio_custom_css .='.copyright{';
			$advance_portfolio_custom_css .='text-align: '.esc_html($advance_portfolio_copyright_content_align).';';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_footer_content_font_size = get_theme_mod('advance_portfolio_footer_content_font_size', 16);
	if($advance_portfolio_footer_content_font_size != false){
		$advance_portfolio_custom_css .='.copyright p{';
			$advance_portfolio_custom_css .='font-size: '.esc_html($advance_portfolio_footer_content_font_size).'px !important;';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_copyright_padding = get_theme_mod('advance_portfolio_copyright_padding', 15);
	$advance_portfolio_custom_css .='.copyright{';
		$advance_portfolio_custom_css .='padding-top: '.esc_html($advance_portfolio_copyright_padding).'px; padding-bottom: '.esc_html($advance_portfolio_copyright_padding).'px;';
	$advance_portfolio_custom_css .='}';

	$advance_portfolio_footer_widget_bg_color = get_theme_mod('advance_portfolio_footer_widget_bg_color');
	if($advance_portfolio_footer_widget_bg_color != false){
		$advance_portfolio_custom_css .='#footer{';
			$advance_portfolio_custom_css .='background-color: '.esc_html($advance_portfolio_footer_widget_bg_color).';';
		$advance_portfolio_custom_css .='}';
	}

	$advance_portfolio_footer_widget_bg_image = get_theme_mod('advance_portfolio_footer_widget_bg_image');
	if($advance_portfolio_footer_widget_bg_image != false){
		$advance_portfolio_custom_css .='#footer{';
			$advance_portfolio_custom_css .='background: url('.esc_html($advance_portfolio_footer_widget_bg_image).');';
		$advance_portfolio_custom_css .='}';
	}

	// scroll to top
	$advance_portfolio_scroll_font_size_icon = get_theme_mod('advance_portfolio_scroll_font_size_icon', 22);
	if($advance_portfolio_scroll_font_size_icon != false){
		$advance_portfolio_custom_css .='#scroll-top .fas{';
			$advance_portfolio_custom_css .='font-size: '.esc_html($advance_portfolio_scroll_font_size_icon).'px;';
		$advance_portfolio_custom_css .='}';
	}



		


	