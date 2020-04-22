<?php
	
	$advance_education_theme_color = get_theme_mod('advance_education_theme_color');

	$custom_css = '';

	if($advance_education_theme_color != false){
		$custom_css .=' input[type="submit"], .read-moresec a:hover, .top-header .account-btn a:hover, .time, #slider i, #slider .inner_carousel .readbtn a, .read-more-btn a,  #footer input[type="submit"], .copyright, #footer .tagcloud a:hover,.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover,#footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, #sidebar ul li:hover:before, #menu-sidebar input[type="submit"], #footer .woocommerce a.button:hover, #footer .woocommerce button.button:hover, .tags p a:hover, .meta-nav:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='a,h1,h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .logo a, .top-header .account-btn a, .mail i,.phone i, .search-box i, #slider .inner_carousel .readbtn a:hover, #courses h3 i, .cat-posts a, .page-box h4, .read-more-btn a:hover, .page-box .metabox,.page-box-single .metabox, section h4, #comments a time, .woocommerce-message::before, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, h1.entry-title,h1.page-title, .pagination span,.pagination a, .pagination .current, #sidebar h3.widget-title a,.metabox a, .new-text a, #footer li a:hover, p.logged-in-as a, single.page-box-single h3 a, .entry-content p a, div#div-comment-1 a, .nav-next a, #courses h2 i, .comment-meta a, h2.entry-title, h2.page-title, nav-links span,.page-template-custom-front-page .search-box i, tr.woocommerce-cart-form__cart-item.cart_item a, span.tagged_as a, a.shipping-calculator-button, #sidebar ul li a:hover,#sidebar ul li:hover, #sidebar ul li:active, #sidebar ul li:focus, #sidebar ul li:hover a,#contact-info .account-btn a, .page-box-single h1, .tags i, .tags p a, .meta-nav{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.cat_body, h3.title-btn{';
			$custom_css .='border-right-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.top-header .account-btn a, .serach_inner form.search-form, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover, .cat-posts a, .read-more-btn a, .read-more-btn a:hover, #footer input[type="search"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, .pagination a:hover, .pagination .current,#footer form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button,#contact-info .account-btn a, .tags p a{';
			$custom_css .='border-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.logo p,page-box-single h1, #sidebar ul li a:active, #sidebar ul li a:focus, .read-more-btn a:hover{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
			box-shadow: -12px 12px 0 0 '.esc_html($advance_education_theme_color).';
		}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
			box-shadow: 0 3px 3px '.esc_html($advance_education_theme_color).';
		}';
	}

	// media
	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_education_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul, .primary-navigation ul ul a:focus, .primary-navigation li a:focus{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_education_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_theme_options','Default');
    if($advance_education_theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($advance_education_theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($advance_education_theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .top-header{';
			$custom_css .='margin: 0 10px;';
		$custom_css .='}';
	}

	// css
	$advance_education_show_slider = get_theme_mod( 'advance_education_slider_hide', false);
	if($advance_education_show_slider == false){
		$custom_css .='.page-template-custom-front-page #header-top{';
			$custom_css .='position:static; margin:0; width: 100%; background: #f5f5f5;';
		$custom_css .='}';
	} 
	if($advance_education_show_slider == false){
		$custom_css .='.page-template-custom-front-page .top-header{';
			$custom_css .='background: #f5f5f5;';
		$custom_css .='}';
	}
	if($advance_education_show_slider == false){
		$custom_css .='.page-template-custom-front-page .logo{';
			$custom_css .='position: static; box-shadow: none;';
		$custom_css .='}';
	}
	if($advance_education_show_slider == false){
		$custom_css .='.page-template-custom-front-page .main-menu{';
			$custom_css .='border-bottom: 1px solid #cc3333; box-shadow: 0px 2px 10px -2px #bbb;';
		$custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_slider_content_alignment','Left');
    if($advance_education_theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($advance_education_theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($advance_education_theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*---------- Slider Opacity -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_slider_image_opacity','0.5');
	if($advance_education_theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($advance_education_theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*------------------------------ Button Settings option-----------------------*/
	$advance_education_button_padding_top_bottom = get_theme_mod('advance_education_button_padding_top_bottom');
	$advance_education_button_padding_left_right = get_theme_mod('advance_education_button_padding_left_right');
	if($advance_education_button_padding_top_bottom != false || $advance_education_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"], .cat-posts a{';
			$custom_css .='padding-top: '.esc_html($advance_education_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_education_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_education_button_padding_left_right).'px; padding-right: '.esc_html($advance_education_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_education_button_border_radius = get_theme_mod('advance_education_button_border_radius');
	if($advance_education_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a,#slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"], .cat-posts a{';
			$custom_css .='border-radius: '.esc_html($advance_education_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*--------------Responsive Setting --------------------*/
	$advance_education_stickyheader = get_theme_mod( 'advance_education_responsive_sticky_header', false);
	if($advance_education_stickyheader == true && get_theme_mod( 'advance_education_sticky_header', false) == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($advance_education_stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($advance_education_stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$advance_education_slider = get_theme_mod( 'advance_education_responsive_slider',false);
	if($advance_education_slider == true && get_theme_mod( 'advance_education_slider_hide', false) == false){
    	$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($advance_education_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_education_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$advance_education_slider = get_theme_mod( 'advance_education_responsive_scroll', true);
	if($advance_education_slider == true && get_theme_mod( 'advance_education_enable_disable_scroll', true) == false){
    	$custom_css .='#scroll-top{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($advance_education_slider == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_education_slider == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#scroll-top{';
			$custom_css .='display:none !important;';
		$custom_css .='} }';
	}

	$advance_education_sidebar = get_theme_mod( 'advance_education_responsive_sidebar',true);
    if($advance_education_sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($advance_education_sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$advance_education_theme_lay = get_theme_mod( 'advance_education_background_skin_mode','Transpert Background');
    if($advance_education_theme_lay == 'With Background'){
		$custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$custom_css .='background-color: #fff;';
		$custom_css .='}';
	}else if($advance_education_theme_lay == 'Transpert Background'){
		$custom_css .='.page-box-single, #sidebar aside{';
			$custom_css .='background-color: transparent;';
		$custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$advance_education_top_bottom_product_button_padding = get_theme_mod('advance_education_top_bottom_product_button_padding', 10);
	if($advance_education_top_bottom_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-top: '.esc_html($advance_education_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($advance_education_top_bottom_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_education_left_right_product_button_padding = get_theme_mod('advance_education_left_right_product_button_padding', 16);
	if($advance_education_left_right_product_button_padding != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-left: '.esc_html($advance_education_left_right_product_button_padding).'px; padding-right: '.esc_html($advance_education_left_right_product_button_padding).'px;';
		$custom_css .='}';
	}

	$advance_education_product_button_border_radius = get_theme_mod('advance_education_product_button_border_radius', 0);
	if($advance_education_product_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($advance_education_product_button_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_education_show_related_products = get_theme_mod('advance_education_show_related_products',true);
	if($advance_education_show_related_products == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$advance_education_show_wooproducts_border = get_theme_mod('advance_education_show_wooproducts_border', false);
	if($advance_education_show_wooproducts_border == true){
		$custom_css .='.products li{';
			$custom_css .='border: 1px solid #d4d2d2;';
		$custom_css .='}';
	}

	$advance_education_top_bottom_wooproducts_padding = get_theme_mod('advance_education_top_bottom_wooproducts_padding',0);
	if($advance_education_top_bottom_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($advance_education_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($advance_education_top_bottom_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_education_left_right_wooproducts_padding = get_theme_mod('advance_education_left_right_wooproducts_padding',0);
	if($advance_education_left_right_wooproducts_padding != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($advance_education_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($advance_education_left_right_wooproducts_padding).'px !important;';
		$custom_css .='}';
	}

	$advance_education_wooproducts_border_radius = get_theme_mod('advance_education_wooproducts_border_radius',0);
	if($advance_education_wooproducts_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($advance_education_wooproducts_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_education_wooproducts_box_shadow = get_theme_mod('advance_education_wooproducts_box_shadow',0);
	if($advance_education_wooproducts_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($advance_education_wooproducts_box_shadow).'px '.esc_html($advance_education_wooproducts_box_shadow).'px '.esc_html($advance_education_wooproducts_box_shadow).'px #eee;';
		$custom_css .='}';
	}


