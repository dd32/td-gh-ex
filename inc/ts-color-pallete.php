<?php
	
	$advance_business_theme_color = get_theme_mod('advance_business_theme_color');

	$advance_business_custom_css = '';

	if($advance_business_theme_color != false){
		$advance_business_custom_css .='.search-box i, #slider .carousel-control-next-icon i:hover,#slider .carousel-control-prev-icon i:hover, #slider .inner_carousel .know-btn a:hover, hr.project-hr, .second-border a:hover,  #footer input[type="submit"], .copyright,#footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], a.button,.meta-nav:hover, #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button,#menu-sidebar input[type="submit"], .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .read-moresec a.button, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current{';
			$advance_business_custom_css .='background-color: '.esc_html($advance_business_theme_color).';';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='input[type="submit"],.contact i,.woocommerce-message::before, #footer h3.widget-title a, #footer li a:hover,.primary-navigation a:hover, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul a, .sf-arrows ul .sf-with-ul:after, .primary-navigation ul ul li:hover > a, .primary-navigation a:focus,#sidebar ul li a:hover, .page-box h2 a:hover, .metabox a:hover{';
			$advance_business_custom_css .='color: '.esc_html($advance_business_theme_color).';';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='.page-box{';
			$advance_business_custom_css .='border-bottom-color: '.esc_html($advance_business_theme_color).';';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='.woocommerce-message,.primary-navigation ul ul li:first-child{';
			$advance_business_custom_css .='border-top-color: '.esc_html($advance_business_theme_color).';';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='#footer input[type="search"], #footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, .second-border a:hover{';
			$advance_business_custom_css .='border-color: '.esc_html($advance_business_theme_color).';';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='.main-menu-navigation .primary-navigation ul li a:hover{';
			$advance_business_custom_css .='color: '.esc_html($advance_business_theme_color).'!important;';
		$advance_business_custom_css .='}';
	}
	if($advance_business_theme_color != false){
		$advance_business_custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$advance_business_custom_css .='background-color: '.esc_html($advance_business_theme_color).'!important;';
		$advance_business_custom_css .='}';
	}

	// media
	$advance_business_custom_css .='@media screen and (max-width:1000px) {';
	if($advance_business_theme_color){
	$advance_business_custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul, #contact-info{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_business_theme_color).' 120%);
		}';
	}
	$advance_business_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_business_theme_lay = get_theme_mod( 'advance_business_theme_options','Default');
    if($advance_business_theme_lay == 'Default'){
		$advance_business_custom_css .='body{';
			$advance_business_custom_css .='max-width: 100%;';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_business_custom_css .='width: 97.3%';
		$advance_business_custom_css .='}';
	}else if($advance_business_theme_lay == 'Container'){
		$advance_business_custom_css .='body{';
			$advance_business_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.page-template-custom-home-page .middle-header{';
			$advance_business_custom_css .='width: 97.7%';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.serach_outer{';
			$advance_business_custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$advance_business_custom_css .='}';
	}else if($advance_business_theme_lay == 'Box Container'){
		$advance_business_custom_css .='body{';
			$advance_business_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.serach_outer{';
			$advance_business_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.page-template-custom-front-page .main-header{';
			$advance_business_custom_css .='margin:0 10px;';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.page-template-custom-front-page #header{';
			$advance_business_custom_css .='right:0;';
		$advance_business_custom_css .='}';
	}

	//css
	$advance_business_show_header = get_theme_mod( 'advance_business_slider_hide', false);
	if($advance_business_show_header == false){
		$advance_business_custom_css .='.contact-box{';
			$advance_business_custom_css .='margin-top: 0; position: static;';
		$advance_business_custom_css .='}';
		$advance_business_custom_css .='.page-template-custom-front-page #header{';
			$advance_business_custom_css .='position: static;border-bottom: 1px solid #000;';
		$advance_business_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_business_theme_lay = get_theme_mod( 'advance_business_slider_content_alignment','Left');
    if($advance_business_theme_lay == 'Left'){
		$advance_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_business_custom_css .='text-align:left; left:13%; right:40%;';
		$advance_business_custom_css .='}';
	}else if($advance_business_theme_lay == 'Center'){
		$advance_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_business_custom_css .='text-align:center; left:20%; right:20%;';
		$advance_business_custom_css .='}';
	}else if($advance_business_theme_lay == 'Right'){
		$advance_business_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$advance_business_custom_css .='text-align:right; left:40%; right:13%;';
		$advance_business_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$advance_business_theme_lay = get_theme_mod( 'advance_business_slider_image_opacity','0.3');
	if($advance_business_theme_lay == '0'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.1'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.1';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.2'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.2';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.3'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.3';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.4'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.4';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.5'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.5';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.6'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.6';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.7'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.7';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.8'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.8';
		$advance_business_custom_css .='}';
		}else if($advance_business_theme_lay == '0.9'){
		$advance_business_custom_css .='#slider img{';
			$advance_business_custom_css .='opacity:0.9';
		$advance_business_custom_css .='}';
		}

	/*------------ Button Settings option ------------------*/
	$advance_business_button_padding_top_bottom = get_theme_mod('advance_business_button_padding_top_bottom');
	$advance_business_button_padding_left_right = get_theme_mod('advance_business_button_padding_left_right');
	if($advance_business_button_padding_top_bottom != false || $advance_business_button_padding_left_right != false){
		$advance_business_custom_css .='.new-text .second-border a, #slider .inner_carousel .know-btn a, #comments .form-submit input[type="submit"]{';
			$advance_business_custom_css .='padding-top: '.esc_html($advance_business_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_business_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_business_button_padding_left_right).'px; padding-right: '.esc_html($advance_business_button_padding_left_right).'px; display:inline-block;';
		$advance_business_custom_css .='}';
	}

	$advance_business_button_border_radius = get_theme_mod('advance_business_button_border_radius');
	if($advance_business_button_border_radius != false){
		$advance_business_custom_css .='.new-text .second-border a,#slider .inner_carousel .know-btn a, #comments .form-submit input[type="submit"]{';
			$advance_business_custom_css .='border-radius: '.esc_html($advance_business_button_border_radius).'px;';
		$advance_business_custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/
	$advance_business_stickyheader = get_theme_mod( 'advance_business_responsive_sticky_header',false);
	if($advance_business_stickyheader == true && get_theme_mod( 'advance_business_sticky_header') == false){
    	$advance_business_custom_css .='.fixed-header{';
			$advance_business_custom_css .='position:static;';
		$advance_business_custom_css .='} ';
	}
    if($advance_business_stickyheader == true){
    	$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='.fixed-header{';
			$advance_business_custom_css .='position:fixed;';
		$advance_business_custom_css .='} }';
	}else if($advance_business_stickyheader == false){
		$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='.fixed-header{';
			$advance_business_custom_css .='position:static;';
		$advance_business_custom_css .='} }';
	}

	$advance_business_slider = get_theme_mod( 'advance_business_responsive_slider',false);
	if($advance_business_slider == true && get_theme_mod( 'advance_business_slider_hide', false) == false){
    	$advance_business_custom_css .='#slider{';
			$advance_business_custom_css .='display:none;';
		$advance_business_custom_css .='} ';
	}
    if($advance_business_slider == true){
    	$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#slider{';
			$advance_business_custom_css .='display:block;';
		$advance_business_custom_css .='} }';
	}else if($advance_business_slider == false){
		$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#slider{';
			$advance_business_custom_css .='display:none;';
		$advance_business_custom_css .='} }';
	}

	$advance_business_slider = get_theme_mod( 'advance_business_responsive_scroll',true);
	if($advance_business_slider == true && get_theme_mod( 'advance_business_enable_disable_scroll', true) == false){
    	$advance_business_custom_css .='#scroll-top{';
			$advance_business_custom_css .='display:none !important;';
		$advance_business_custom_css .='} ';
	}
    if($advance_business_slider == true){
    	$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#scroll-top{';
			$advance_business_custom_css .='display:block;';
		$advance_business_custom_css .='} }';
	}else if($advance_business_slider == false){
		$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#scroll-top{';
			$advance_business_custom_css .='display:none !important;';
		$advance_business_custom_css .='} }';
	}

	$advance_business_sidebar = get_theme_mod( 'advance_business_responsive_sidebar',true);
    if($advance_business_sidebar == true){
    	$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#sidebar{';
			$advance_business_custom_css .='display:block;';
		$advance_business_custom_css .='} }';
	}else if($advance_business_sidebar == false){
		$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#sidebar{';
			$advance_business_custom_css .='display:none;';
		$advance_business_custom_css .='} }';
	}

	$advance_business_loader = get_theme_mod( 'advance_business_responsive_preloader', true);
	if($advance_business_loader == true && get_theme_mod( 'advance_business_preloader_option', true) == false){
    	$advance_business_custom_css .='#loader-wrapper{';
			$advance_business_custom_css .='display:none;';
		$advance_business_custom_css .='} ';
	}
    if($advance_business_loader == true){
    	$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#loader-wrapper{';
			$advance_business_custom_css .='display:block;';
		$advance_business_custom_css .='} }';
	}else if($advance_business_loader == false){
		$advance_business_custom_css .='@media screen and (max-width:575px) {';
		$advance_business_custom_css .='#loader-wrapper{';
			$advance_business_custom_css .='display:none;';
		$advance_business_custom_css .='} }';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_business_top_bottom_product_button_padding = get_theme_mod('advance_business_top_bottom_product_button_padding', 10);
	if($advance_business_top_bottom_product_button_padding != false){
		$advance_business_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
			$advance_business_custom_css .='padding-top: '.esc_html($advance_business_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_business_top_bottom_product_button_padding).'px;';
		$advance_business_custom_css .='}';
	}

	$advance_business_left_right_product_button_padding = get_theme_mod('advance_business_left_right_product_button_padding', 16);
	if($advance_business_left_right_product_button_padding != false){
		$advance_business_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce div.product form.cart .button{';
			$advance_business_custom_css .='padding-left: '.esc_html($advance_business_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_business_left_right_product_button_padding).'px;';
		$advance_business_custom_css .='}';
	}

	$advance_business_product_button_border_radius = get_theme_mod('advance_business_product_button_border_radius', 0);
	if($advance_business_product_button_border_radius != false){
		$advance_business_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$advance_business_custom_css .='border-radius: '.esc_html($advance_business_product_button_border_radius).'px;';
		$advance_business_custom_css .='}';
	}

	$advance_business_show_related_products = get_theme_mod('advance_business_show_related_products',true);
	if($advance_business_show_related_products == false){
		$advance_business_custom_css .='.related.products{';
			$advance_business_custom_css .='display: none;';
		$advance_business_custom_css .='}';
	}

	$advance_business_show_wooproducts_border = get_theme_mod('advance_business_show_wooproducts_border', false);
	if($advance_business_show_wooproducts_border == true){
		$advance_business_custom_css .='.products li{';
			$advance_business_custom_css .='border: 1px solid #cccccc;';
		$advance_business_custom_css .='}';
	}

	$advance_business_top_bottom_wooproducts_padding = get_theme_mod('advance_business_top_bottom_wooproducts_padding',0);
	if($advance_business_top_bottom_wooproducts_padding != false){
		$advance_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_business_custom_css .='padding-top: '.esc_html($advance_business_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_business_top_bottom_wooproducts_padding).'px !important;';
		$advance_business_custom_css .='}';
	}

	$advance_business_left_right_wooproducts_padding = get_theme_mod('advance_business_left_right_wooproducts_padding',0);
	if($advance_business_left_right_wooproducts_padding != false){
		$advance_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_business_custom_css .='padding-left: '.esc_html($advance_business_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_business_left_right_wooproducts_padding).'px !important;';
		$advance_business_custom_css .='}';
	}

	$advance_business_wooproducts_border_radius = get_theme_mod('advance_business_wooproducts_border_radius',0);
	if($advance_business_wooproducts_border_radius != false){
		$advance_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_business_custom_css .='border-radius: '.esc_html($advance_business_wooproducts_border_radius).'px;';
		$advance_business_custom_css .='}';
	}

	$advance_business_wooproducts_box_shadow = get_theme_mod('advance_business_wooproducts_box_shadow',0);
	if($advance_business_wooproducts_box_shadow != false){
		$advance_business_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_business_custom_css .='box-shadow: '.esc_html($advance_business_wooproducts_box_shadow).'px '.esc_html($advance_business_wooproducts_box_shadow).'px '.esc_html($advance_business_wooproducts_box_shadow).'px #eee;';
		$advance_business_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_business_theme_lay = get_theme_mod( 'advance_business_background_skin_mode','Transparent Background');
    if($advance_business_theme_lay == 'With Background'){
		$advance_business_custom_css .='.page-box, #sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$advance_business_custom_css .='background-color: #fff;';
		$advance_business_custom_css .='}';
	}else if($advance_business_theme_lay == 'Transparent Background'){
		$advance_business_custom_css .='.page-box-single, #sidebar aside,.project_content{';
			$advance_business_custom_css .='background-color: transparent;';
		$advance_business_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$advance_business_copyright_content_align = get_theme_mod('advance_business_copyright_content_align');
	if($advance_business_copyright_content_align != false){
		$advance_business_custom_css .='.copyright{';
			$advance_business_custom_css .='text-align: '.esc_html($advance_business_copyright_content_align).';';
		$advance_business_custom_css .='}';
	}

	$advance_business_footer_content_font_size = get_theme_mod('advance_business_footer_content_font_size', 16);
	if($advance_business_footer_content_font_size != false){
		$advance_business_custom_css .='.copyright p{';
			$advance_business_custom_css .='font-size: '.esc_html($advance_business_footer_content_font_size).'px !important;';
		$advance_business_custom_css .='}';
	}

	$advance_business_footer_widget_bg_color = get_theme_mod('advance_business_footer_widget_bg_color');
	if($advance_business_footer_widget_bg_color != false){
		$advance_business_custom_css .='#footer{';
			$advance_business_custom_css .='background-color: '.esc_html($advance_business_footer_widget_bg_color).';';
		$advance_business_custom_css .='}';
	}

	$advance_business_footer_widget_bg_image = get_theme_mod('advance_business_footer_widget_bg_image');
	if($advance_business_footer_widget_bg_image != false){
		$advance_business_custom_css .='#footer{';
			$advance_business_custom_css .='background: url('.esc_html($advance_business_footer_widget_bg_image).');';
		$advance_business_custom_css .='}';
	}

	// scroll to top
	$advance_business_scroll_font_size_icon = get_theme_mod('advance_business_scroll_font_size_icon', 22);
	if($advance_business_scroll_font_size_icon != false){
		$advance_business_custom_css .='#scroll-top .fas{';
			$advance_business_custom_css .='font-size: '.esc_html($advance_business_scroll_font_size_icon).'px;';
		$advance_business_custom_css .='}';
	}



