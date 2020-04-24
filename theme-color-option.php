<?php

	$automobile_car_dealer_first_color = get_theme_mod('automobile_car_dealer_first_color');

	$custom_css ='';
	/*----------- Global First Color -----------*/

	if($automobile_car_dealer_first_color != false){
		$custom_css .='input[type="submit"]:hover, #sidebar button, .slide-button i, .appointbtn, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .postbtn i, .blog-section .section-title a:after, .page-content .read-moresec a.button:hover, #comments input[type="submit"].submit:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, #sidebar .tagcloud a, .widget_calendar tbody a, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"], .footer-wp .tagcloud a:hover , .pagination a:hover, .pagination .current, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #navbar-header .socialbox, #navbar-header .socialbox, #scrollbutton i, #sidebar button, .footer-wp button{';
				$custom_css .='background-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='a, #header .socialbox i:hover, .metabox a:hover, .postbtn a, .nav-previous a ,.nav-next a, p.logged-in-as a, nav.navigation.post-navigation a:hover , .tags a, #sidebar ul li a:hover, .footer-wp li a:hover, h2.entry-title, h2.page-title, #project i, .woocommerce-message::before, .woocommerce-info a, td.product-name a, a.shipping-calculator-button, span.posted_in a, code, .primary-navigation a:hover{';
				$custom_css .='color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='#blog_sec .sticky, .page-content .read-moresec a.button:hover, #scrollbutton i{';
				$custom_css .='border-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}
	if($automobile_car_dealer_first_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($automobile_car_dealer_first_color).';';
		$custom_css .='}';
	}

	if($automobile_car_dealer_first_color != false){
		$custom_css .='#scrollbutton i{';
			$custom_css .='box-shadow: inset 0px 0px 0px '.esc_html($automobile_car_dealer_first_color).', 0px 5px 0px 0px #871c1c, 0px 5px 4px #000;';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$automobile_car_dealer_theme_lay = get_theme_mod( 'automobile_car_dealer_width_layout_options','Default');
    if($automobile_car_dealer_theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($automobile_car_dealer_theme_lay == 'Container Layout'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page header{';
			$custom_css .='position: relative;';
		$custom_css .='}';
	}else if($automobile_car_dealer_theme_lay == 'Box Layout'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page header{';
			$custom_css .='position: relative;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page #header{';
			$custom_css .='left: 15px; width: 97.3%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width:768px){
			.page-template-custom-home-page #header{';
				$custom_css .=' width: 100%;';
		$custom_css .='} }';
	}

	/*----------Slider Content Layout --------------*/

	$automobile_car_dealer_theme_lay = get_theme_mod( 'automobile_car_dealer_slider_content_layout','Center');
    if($automobile_car_dealer_theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .slide-button {';
			$custom_css .='text-align:left; ';
		$custom_css .='}';
	}else if($automobile_car_dealer_theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .slide-button {';
			$custom_css .='text-align:center; ';
		$custom_css .='}';
	}else if($automobile_car_dealer_theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .slide-button {';
			$custom_css .='text-align:right; ';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$automobile_car_dealer_theme_lay = get_theme_mod( 'automobile_car_dealer_slider_opacity','0.7');
	if($automobile_car_dealer_theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($automobile_car_dealer_theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

		/*-------------- Woocommerce Button  -------------------*/

		$automobile_car_dealer_woocommerce_button_padding_top = get_theme_mod('automobile_car_dealer_woocommerce_button_padding_top');
		if($automobile_car_dealer_woocommerce_button_padding_top != false){
			$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
				$custom_css .='padding-top: '.esc_html($automobile_car_dealer_woocommerce_button_padding_top).'px; padding-bottom: '.esc_html($automobile_car_dealer_woocommerce_button_padding_top).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_button_padding_right = get_theme_mod('automobile_car_dealer_woocommerce_button_padding_right');
		if($automobile_car_dealer_woocommerce_button_padding_right != false){
			$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
				$custom_css .='padding-left: '.esc_html($automobile_car_dealer_woocommerce_button_padding_right).'px; padding-right: '.esc_html($automobile_car_dealer_woocommerce_button_padding_right).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_button_border_radius = get_theme_mod('automobile_car_dealer_woocommerce_button_border_radius');
		if($automobile_car_dealer_woocommerce_button_border_radius != false){
			$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
				$custom_css .='border-radius: '.esc_html($automobile_car_dealer_woocommerce_button_border_radius).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_related_product_enable = get_theme_mod('automobile_car_dealer_related_product_enable',true);

		if($automobile_car_dealer_related_product_enable == false){
			$custom_css .='.related.products{';
				$custom_css .='display: none;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_product_border_enable = get_theme_mod('automobile_car_dealer_woocommerce_product_border_enable',true);

		if($automobile_car_dealer_woocommerce_product_border_enable == false){
			$custom_css .='.products li{';
				$custom_css .='border: none;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_product_padding_top = get_theme_mod('automobile_car_dealer_woocommerce_product_padding_top',10);
		if($automobile_car_dealer_woocommerce_product_padding_top != false){
			$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$custom_css .='padding-top: '.esc_html($automobile_car_dealer_woocommerce_product_padding_top).'px; padding-bottom: '.esc_html($automobile_car_dealer_woocommerce_product_padding_top).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_product_padding_right = get_theme_mod('automobile_car_dealer_woocommerce_product_padding_right',10);
		if($automobile_car_dealer_woocommerce_product_padding_right != false){
			$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$custom_css .='padding-left: '.esc_html($automobile_car_dealer_woocommerce_product_padding_right).'px; padding-right: '.esc_html($automobile_car_dealer_woocommerce_product_padding_right).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_product_border_radius = get_theme_mod('automobile_car_dealer_woocommerce_product_border_radius');
		if($automobile_car_dealer_woocommerce_product_border_radius != false){
			$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$custom_css .='border-radius: '.esc_html($automobile_car_dealer_woocommerce_product_border_radius).'px;';
			$custom_css .='}';
		}

		$automobile_car_dealer_woocommerce_product_box_shadow = get_theme_mod('automobile_car_dealer_woocommerce_product_box_shadow');
		if($automobile_car_dealer_woocommerce_product_box_shadow != false){
			$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$custom_css .='box-shadow: '.esc_html($automobile_car_dealer_woocommerce_product_box_shadow).'px '.esc_html($automobile_car_dealer_woocommerce_product_box_shadow).'px '.esc_html($automobile_car_dealer_woocommerce_product_box_shadow).'px #eee;';
			$custom_css .='}';
		}

	// footer setting
	$automobile_car_dealer_footer_bg_color = get_theme_mod('automobile_car_dealer_footer_bg_color');
	if($automobile_car_dealer_footer_bg_color != false){
		$custom_css .='.footer-wp{';
			$custom_css .='background-color: '.esc_html($automobile_car_dealer_footer_bg_color).';';
		$custom_css .='}';
	}

	$automobile_car_dealer_footer_bg_image = get_theme_mod('automobile_car_dealer_footer_bg_image');
	if($automobile_car_dealer_footer_bg_image != false){
		$custom_css .='.footer-wp{';
			$custom_css .='background: url('.esc_html($automobile_car_dealer_footer_bg_image).');';
		$custom_css .='}';
	}

	/*------------- Back to Top  -------------------*/

	$automobile_car_dealer_back_to_top_border_radius = get_theme_mod('automobile_car_dealer_back_to_top_border_radius');
	if($automobile_car_dealer_back_to_top_border_radius == true){
		$custom_css .='#scrollbutton i{';
			$custom_css .='border-radius: '.esc_html($automobile_car_dealer_back_to_top_border_radius).'px;';
		$custom_css .='}';
	}

	$automobile_car_dealer_scroll_icon_font_size = get_theme_mod('automobile_car_dealer_scroll_icon_font_size', 22);
	if($automobile_car_dealer_scroll_icon_font_size != false){
		$custom_css .='#scrollbutton i{';
			$custom_css .='font-size: '.esc_html($automobile_car_dealer_scroll_icon_font_size).'px;';
		$custom_css .='}';
	}

	$automobile_car_dealer_top_bottom_scroll_padding = get_theme_mod('automobile_car_dealer_top_bottom_scroll_padding', 12);
	if($automobile_car_dealer_top_bottom_scroll_padding != false){
		$custom_css .='#scrollbutton i{';
			$custom_css .='padding-top: '.esc_html($automobile_car_dealer_top_bottom_scroll_padding).'px; padding-bottom: '.esc_html($automobile_car_dealer_top_bottom_scroll_padding).'px;';
		$custom_css .='}';
	}

	$automobile_car_dealer_left_right_scroll_padding = get_theme_mod('automobile_car_dealer_left_right_scroll_padding', 17);
	if($automobile_car_dealer_left_right_scroll_padding != false){
		$custom_css .='#scrollbutton i{';
			$custom_css .='padding-left: '.esc_html($automobile_car_dealer_left_right_scroll_padding).'px; padding-right: '.esc_html($automobile_car_dealer_left_right_scroll_padding).'px;';
		$custom_css .='}';
	}