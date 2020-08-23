<?php 
	$advance_blogging_custom_css ='';

	/*---------------------------Width Layout -------------------*/
	$advance_blogging_theme_lay = get_theme_mod( 'advance_blogging_width_options','Full Layout');
    if($advance_blogging_theme_lay == 'Full Layout'){
		$advance_blogging_custom_css .='body{';
			$advance_blogging_custom_css .='max-width: 100%;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_theme_lay == 'Contained Layout'){
		$advance_blogging_custom_css .='body{';
			$advance_blogging_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_theme_lay == 'Boxed Layout'){
		$advance_blogging_custom_css .='body{';
			$advance_blogging_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$advance_blogging_custom_css .='}';
	}

	/*-------------Slider Content Layout ------------*/
	$advance_blogging_slider_layout = get_theme_mod( 'advance_blogging_slider_content_option','Left');
    if($advance_blogging_slider_layout == 'Left'){
		$advance_blogging_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$advance_blogging_custom_css .='text-align:left;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_slider_layout == 'Center'){
		$advance_blogging_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$advance_blogging_custom_css .='text-align:center;';
		$advance_blogging_custom_css .='}';
		$advance_blogging_custom_css .='#slider .inner_carousel{';
			$advance_blogging_custom_css .='padding-left:0; border-left:0;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_slider_layout == 'Right'){
		$advance_blogging_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .read-btn{';
			$advance_blogging_custom_css .='text-align:right;';
		$advance_blogging_custom_css .='}';
		$advance_blogging_custom_css .='#slider .inner_carousel{';
			$advance_blogging_custom_css .='padding-left:0; border-left:0; padding-right:15px; border-right: solid 3px #db0607;';
		$advance_blogging_custom_css .='}';
	}

	/* Slider content spacing */
	$advance_blogging_top_spacing = get_theme_mod('advance_blogging_slider_top_spacing');
	$advance_blogging_bottom_spacing = get_theme_mod('advance_blogging_slider_bottom_spacing');
	$advance_blogging_left_spacing = get_theme_mod('advance_blogging_slider_left_spacing');
	$advance_blogging_right_spacing = get_theme_mod('advance_blogging_slider_right_spacing');
	if($advance_blogging_top_spacing != false || $advance_blogging_bottom_spacing != false || $advance_blogging_left_spacing != false || $advance_blogging_right_spacing != false){
		$advance_blogging_custom_css .='#slider .inner_carousel{';
			$advance_blogging_custom_css .='margin-top: '.esc_html($advance_blogging_top_spacing).'px; margin-bottom: '.esc_html($advance_blogging_bottom_spacing).'px; margin-left: '.esc_html($advance_blogging_left_spacing).'px; margin-right: '.esc_html($advance_blogging_right_spacing).'px;';
		$advance_blogging_custom_css .='}';
	}

	/*------ Button Style -------*/
	$advance_blogging_top_buttom_padding = get_theme_mod('advance_blogging_top_button_padding');
	$advance_blogging_left_right_padding = get_theme_mod('advance_blogging_left_button_padding');
	if($advance_blogging_top_buttom_padding != false || $advance_blogging_left_right_padding != false ){
		$advance_blogging_custom_css .='.blogbutton-mdall, .button-post a, #comments input[type="submit"].submit{';
			$advance_blogging_custom_css .='padding-top: '.esc_html($advance_blogging_top_buttom_padding).'px; padding-bottom: '.esc_html($advance_blogging_top_buttom_padding).'px; padding-left: '.esc_html($advance_blogging_left_right_padding).'px; padding-right: '.esc_html($advance_blogging_left_right_padding).'px;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_button_border_radius = get_theme_mod('advance_blogging_button_border_radius');
	$advance_blogging_custom_css .='.blogbutton-mdall, .button-post a, #comments input[type="submit"].submit{';
		$advance_blogging_custom_css .='border-radius: '.esc_html($advance_blogging_button_border_radius).'px;';
	$advance_blogging_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$advance_blogging_woocommerce_button_padding_top = get_theme_mod('advance_blogging_woocommerce_button_padding_top');
	if($advance_blogging_woocommerce_button_padding_top != false){
		$advance_blogging_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$advance_blogging_custom_css .='padding-top: '.esc_html($advance_blogging_woocommerce_button_padding_top).'px; padding-bottom: '.esc_html($advance_blogging_woocommerce_button_padding_top).'px;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_button_padding_right = get_theme_mod('advance_blogging_woocommerce_button_padding_right');
	if($advance_blogging_woocommerce_button_padding_right != false){
		$advance_blogging_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$advance_blogging_custom_css .='padding-left: '.esc_html($advance_blogging_woocommerce_button_padding_right).'px; padding-right: '.esc_html($advance_blogging_woocommerce_button_padding_right).'px;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_button_border_radius = get_theme_mod('advance_blogging_woocommerce_button_border_radius');
	if($advance_blogging_woocommerce_button_border_radius != false){
		$advance_blogging_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce button.button:disabled[disabled]{';
			$advance_blogging_custom_css .='border-radius: '.esc_html($advance_blogging_woocommerce_button_border_radius).'px;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_related_product = get_theme_mod('advance_blogging_related_product',true);

	if($advance_blogging_related_product == false){
		$advance_blogging_custom_css .='.related.products{';
			$advance_blogging_custom_css .='display: none;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_product_border = get_theme_mod('advance_blogging_woocommerce_product_border',true);

	if($advance_blogging_woocommerce_product_border == false){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_blogging_custom_css .='border: none;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_product_padding_top = get_theme_mod('advance_blogging_woocommerce_product_padding_top',10);
	if($advance_blogging_woocommerce_product_padding_top != false){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_blogging_custom_css .='padding-top: '.esc_html($advance_blogging_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_html($advance_blogging_woocommerce_product_padding_top).'px !important;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_product_padding_right = get_theme_mod('advance_blogging_woocommerce_product_padding_right',10);
	if($advance_blogging_woocommerce_product_padding_right != false){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_blogging_custom_css .='padding-left: '.esc_html($advance_blogging_woocommerce_product_padding_right).'px !important; padding-right: '.esc_html($advance_blogging_woocommerce_product_padding_right).'px !important;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_product_border_radius = get_theme_mod('advance_blogging_woocommerce_product_border_radius');
	if($advance_blogging_woocommerce_product_border_radius != false){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_blogging_custom_css .='border-radius: '.esc_html($advance_blogging_woocommerce_product_border_radius).'px;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_woocommerce_product_box_shadow = get_theme_mod('advance_blogging_woocommerce_product_box_shadow');
	if($advance_blogging_woocommerce_product_box_shadow != false){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$advance_blogging_custom_css .='box-shadow: '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px '.esc_html($advance_blogging_woocommerce_product_box_shadow).'px #aaa;';
		$advance_blogging_custom_css .='}';
	}

	/*---- Preloader Color ----*/
	$advance_blogging_preloader_color = get_theme_mod('advance_blogging_preloader_color');
	$advance_blogging_preloader_bg_color = get_theme_mod('advance_blogging_preloader_bg_color');

	if($advance_blogging_preloader_color != false){
		$advance_blogging_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$advance_blogging_custom_css .='background-color: '.esc_html($advance_blogging_preloader_color).';';
		$advance_blogging_custom_css .='}';
	}
	if($advance_blogging_preloader_bg_color != false){
		$advance_blogging_custom_css .='.preloader{';
			$advance_blogging_custom_css .='background-color: '.esc_html($advance_blogging_preloader_bg_color).';';
		$advance_blogging_custom_css .='}';
	}

	/*---- Copyright css ----*/
	$advance_blogging_copyright_fontsize = get_theme_mod('advance_blogging_copyright_fontsize',16);
	if($advance_blogging_copyright_fontsize != false){
		$advance_blogging_custom_css .='#footer p{';
			$advance_blogging_custom_css .='font-size: '.esc_html($advance_blogging_copyright_fontsize).'px; ';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_copyright_top_bottom_padding = get_theme_mod('advance_blogging_copyright_top_bottom_padding',15);
	if($advance_blogging_copyright_top_bottom_padding != false){
		$advance_blogging_custom_css .='#footer {';
			$advance_blogging_custom_css .='padding-top:'.esc_html($advance_blogging_copyright_top_bottom_padding).'px; padding-bottom: '.esc_html($advance_blogging_copyright_top_bottom_padding).'px; ';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_copyright_alignment = get_theme_mod( 'advance_blogging_copyright_alignment','Center');
    if($advance_blogging_copyright_alignment == 'Left'){
		$advance_blogging_custom_css .='#footer p{';
			$advance_blogging_custom_css .='text-align:left;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_copyright_alignment == 'Center'){
		$advance_blogging_custom_css .='#footer p{';
			$advance_blogging_custom_css .='text-align:center;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_copyright_alignment == 'Right'){
		$advance_blogging_custom_css .='#footer p{';
			$advance_blogging_custom_css .='text-align:right;';
		$advance_blogging_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$advance_blogging_woocommerce_sale_top_padding = get_theme_mod('advance_blogging_woocommerce_sale_top_padding');
	$advance_blogging_woocommerce_sale_left_padding = get_theme_mod('advance_blogging_woocommerce_sale_left_padding');
	$advance_blogging_custom_css .=' .woocommerce span.onsale{';
		$advance_blogging_custom_css .='padding-top: '.esc_html($advance_blogging_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_html($advance_blogging_woocommerce_sale_top_padding).'px; padding-left: '.esc_html($advance_blogging_woocommerce_sale_left_padding).'px; padding-right: '.esc_html($advance_blogging_woocommerce_sale_left_padding).'px;';
	$advance_blogging_custom_css .='}';

	$advance_blogging_woocommerce_sale_border_radius = get_theme_mod('advance_blogging_woocommerce_sale_border_radius', 50);
	$advance_blogging_custom_css .='.woocommerce span.onsale{';
		$advance_blogging_custom_css .='border-radius: '.esc_html($advance_blogging_woocommerce_sale_border_radius).'px;';
	$advance_blogging_custom_css .='}';

	$advance_blogging_sale_position = get_theme_mod( 'advance_blogging_sale_position','right');
    if($advance_blogging_sale_position == 'left'){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_blogging_custom_css .='left: -10px; right: auto;';
		$advance_blogging_custom_css .='}';
	}else if($advance_blogging_sale_position == 'right'){
		$advance_blogging_custom_css .='.woocommerce ul.products li.product .onsale{';
			$advance_blogging_custom_css .='left: auto; right: 0;';
		$advance_blogging_custom_css .='}';
	}

	// footer background css
	$advance_blogging_footer_background_color = get_theme_mod('advance_blogging_footer_background_color');
	$advance_blogging_custom_css .='.footertown{';
		$advance_blogging_custom_css .='background-color: '.esc_html($advance_blogging_footer_background_color).';';
	$advance_blogging_custom_css .='}';

	$advance_blogging_footer_background_img = get_theme_mod('advance_blogging_footer_background_img');
	if($advance_blogging_footer_background_img != false){
		$advance_blogging_custom_css .='.footertown{';
			$advance_blogging_custom_css .='background: url('.esc_html($advance_blogging_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$advance_blogging_custom_css .='}';
	}

	/*---- Comment form ----*/
	$advance_blogging_comment_width = get_theme_mod('advance_blogging_comment_width', '100');
	$advance_blogging_custom_css .='#comments textarea{';
		$advance_blogging_custom_css .=' width:'.esc_html($advance_blogging_comment_width).'%;';
	$advance_blogging_custom_css .='}';

	$advance_blogging_comment_submit_text = get_theme_mod('advance_blogging_comment_submit_text', 'Post Comment');
	if($advance_blogging_comment_submit_text == ''){
		$advance_blogging_custom_css .='#comments p.form-submit {';
			$advance_blogging_custom_css .='display: none;';
		$advance_blogging_custom_css .='}';
	}

	$advance_blogging_comment_title = get_theme_mod('advance_blogging_comment_title', 'Leave a Reply');
	if($advance_blogging_comment_title == ''){
		$advance_blogging_custom_css .='#comments h2#reply-title {';
			$advance_blogging_custom_css .='display: none;';
		$advance_blogging_custom_css .='}';
	}

	// Topbar padding
	$advance_blogging_topbar_top_bottom = get_theme_mod('advance_blogging_topbar_top_bottom', 10);
	$advance_blogging_custom_css .='.topbar{';
		$advance_blogging_custom_css .=' padding-top:'.esc_html($advance_blogging_topbar_top_bottom).'px; padding-bottom:'.esc_html($advance_blogging_topbar_top_bottom).'px;';
	$advance_blogging_custom_css .='}';

	// Sticky Header padding
	$advance_blogging_sticky_header_padding = get_theme_mod('advance_blogging_sticky_header_padding');
	$advance_blogging_custom_css .='.fixed-header{';
		$advance_blogging_custom_css .=' padding-top:'.esc_html($advance_blogging_sticky_header_padding).'px; padding-bottom:'.esc_html($advance_blogging_sticky_header_padding).'px;';
	$advance_blogging_custom_css .='}';