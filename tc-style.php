<?php 
	$custom_css ='';

	/*---------------------------Width Layout -------------------*/
	$theme_lay = get_theme_mod( 'advance_blogging_width_options','Full Layout');
    if($theme_lay == 'Full Layout'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($theme_lay == 'Contained Layout'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Boxed Layout'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}

	/*-------------Slider Content Layout ------------*/

	$slider_layout = get_theme_mod( 'advance_blogging_slider_content_option','Left');
    if($slider_layout == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$custom_css .='text-align:left;';
		$custom_css .='}';
	}else if($slider_layout == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='#slider .inner_carousel{';
			$custom_css .='padding-left:0; border-left:0;';
		$custom_css .='}';
	}else if($slider_layout == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$custom_css .='text-align:right;';
		$custom_css .='}';
		$custom_css .='#slider .inner_carousel{';
			$custom_css .='padding-left:0; border-left:0; padding-right:15px; border-right: solid 3px #db0607;';
		$custom_css .='}';
	}

	/* Slider content spacing */
	$top_spacing = get_theme_mod('advance_blogging_slider_top_spacing');
	$bottom_spacing = get_theme_mod('advance_blogging_slider_bottom_spacing');
	$left_spacing = get_theme_mod('advance_blogging_slider_left_spacing');
	$right_spacing = get_theme_mod('advance_blogging_slider_right_spacing');
	if($top_spacing != false || $bottom_spacing != false || $left_spacing != false || $right_spacing != false){
		$custom_css .='#slider .inner_carousel{';
			$custom_css .='margin-top: '.esc_html($top_spacing).'px; margin-bottom: '.esc_html($bottom_spacing).'px; margin-left: '.esc_html($left_spacing).'px; margin-right: '.esc_html($right_spacing).'px;';
		$custom_css .='}';
	}

	/*------ Button Style -------*/
	$top_buttom_padding = get_theme_mod('advance_blogging_top_button_padding');
	$left_right_padding = get_theme_mod('advance_blogging_left_button_padding');
	if($top_buttom_padding != false || $left_right_padding != false ){
		$custom_css .='.blogbutton-mdall, .button-post a, #comments input[type="submit"].submit{';
			$custom_css .='padding-top: '.esc_html($top_buttom_padding).'px; padding-bottom: '.esc_html($top_buttom_padding).'px; padding-left: '.esc_html($left_right_padding).'px; padding-right: '.esc_html($left_right_padding).'px;';
		$custom_css .='}';
	}

	$button_border_radius = get_theme_mod('advance_blogging_button_border_radius');
	$custom_css .='.blogbutton-mdall, .button-post a, #comments input[type="submit"].submit{';
		$custom_css .='border-radius: '.esc_html($button_border_radius).'px;';
	$custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$advance_blogging_woocommerce_button_padding_top = get_theme_mod('advance_blogging_woocommerce_button_padding_top');
	if($advance_blogging_woocommerce_button_padding_top != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-top: '.esc_html($advance_blogging_woocommerce_button_padding_top).'px; padding-bottom: '.esc_html($advance_blogging_woocommerce_button_padding_top).'px;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_button_padding_right = get_theme_mod('advance_blogging_woocommerce_button_padding_right');
	if($advance_blogging_woocommerce_button_padding_right != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='padding-left: '.esc_html($advance_blogging_woocommerce_button_padding_right).'px; padding-right: '.esc_html($advance_blogging_woocommerce_button_padding_right).'px;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_button_border_radius = get_theme_mod('advance_blogging_woocommerce_button_border_radius');
	if($advance_blogging_woocommerce_button_border_radius != false){
		$custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$custom_css .='border-radius: '.esc_html($advance_blogging_woocommerce_button_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_blogging_related_product = get_theme_mod('advance_blogging_related_product',true);

	if($advance_blogging_related_product == false){
		$custom_css .='.related.products{';
			$custom_css .='display: none;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_product_border = get_theme_mod('advance_blogging_woocommerce_product_border',true);

	if($advance_blogging_woocommerce_product_border == false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border: none;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_product_padding_top = get_theme_mod('advance_blogging_woocommerce_product_padding_top',10);
	if($advance_blogging_woocommerce_product_padding_top != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-top: '.esc_html($advance_blogging_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_html($advance_blogging_woocommerce_product_padding_top).'px !important;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_product_padding_right = get_theme_mod('advance_blogging_woocommerce_product_padding_right',10);
	if($advance_blogging_woocommerce_product_padding_right != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='padding-left: '.esc_html($advance_blogging_woocommerce_product_padding_right).'px !important; padding-right: '.esc_html($advance_blogging_woocommerce_product_padding_right).'px !important;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_product_border_radius = get_theme_mod('advance_blogging_woocommerce_product_border_radius');
	if($advance_blogging_woocommerce_product_border_radius != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='border-radius: '.esc_html($advance_blogging_woocommerce_product_border_radius).'px;';
		$custom_css .='}';
	}

	$advance_blogging_woocommerce_product_box_shadow = get_theme_mod('advance_blogging_woocommerce_product_box_shadow');
	if($advance_blogging_woocommerce_product_box_shadow != false){
		$custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_css .='box-shadow: '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px #aaa;';
		$custom_css .='}';
	}