<?php

	$automotive_centre_first_color = get_theme_mod('automotive_centre_first_color');

	/*------------------------------ Global First Color -----------*/

	$automotive_centre_custom_css = " ";

	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,#sidebar h3,#comments input[type="submit"],#footer-2,input[type="submit"],#sidebar .custom-social-icons i, #footer .custom-social-icons i,.search-box i,.top-btn a:hover,.slider-btn a:before,.more-btn a,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#footer .tagcloud a:hover,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .scrollup i , .toggle-nav i, #comments a.comment-reply-link, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more{';
			$automotive_centre_custom_css .='background-color: '.esc_html($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#sidebar ul li a:hover,.info-box i,a,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-main-box:hover h2,#footer h3,.serv-box a,#footer li a:hover,a.scrollup, #footer .custom-social-icons i:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer a.custom_read_more:hover{';
			$automotive_centre_custom_css .='color: '.esc_html($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='.top-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$automotive_centre_custom_css .='border-color: '.esc_html($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#about-section hr, .main-navigation ul ul{';
			$automotive_centre_custom_css .='border-top-color: '.esc_html($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$automotive_centre_custom_css .='#header .main-navigation ul li a:hover,#footer h3:after, .header-fixed, .main-navigation ul ul{';
			$automotive_centre_custom_css .='border-bottom-color: '.esc_html($automotive_centre_first_color).';';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_width_option','Full Width');
    if($automotive_centre_theme_lay == 'Boxed'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.page-template-custom-home-page .home-page-header{';
			$automotive_centre_custom_css .='width: 97%;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Wide Width'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Full Width'){
		$automotive_centre_custom_css .='body{';
			$automotive_centre_custom_css .='max-width: 100%;';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_slider_opacity_color','0.5');
	if($automotive_centre_theme_lay == '0'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.1'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.1';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.2'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.2';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.3'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.3';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.4'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.4';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.5'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.5';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.6'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.6';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.7'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.7';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.8'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.8';
		$automotive_centre_custom_css .='}';
		}else if($automotive_centre_theme_lay == '0.9'){
		$automotive_centre_custom_css .='#slider img{';
			$automotive_centre_custom_css .='opacity:0.9';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_slider_content_option','Left');
    if($automotive_centre_theme_lay == 'Left'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:left; left:7%; right:50%;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Center'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:center; left:20%; right:20%;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Right'){
		$automotive_centre_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$automotive_centre_custom_css .='text-align:right; left:50%; right:7%;';
		$automotive_centre_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$automotive_centre_slider = get_theme_mod('automotive_centre_slider_hide_show');
	if($automotive_centre_slider == false){
		$automotive_centre_custom_css .='.page-template-custom-home-page .home-page-header{';
			$automotive_centre_custom_css .='position: static; background: #010203;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.page-template-custom-home-page #about-section{';
			$automotive_centre_custom_css .='padding: 1% 0;';
		$automotive_centre_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$automotive_centre_theme_lay = get_theme_mod( 'automotive_centre_blog_layout_option','Default');
    if($automotive_centre_theme_lay == 'Default'){
		$automotive_centre_custom_css .='.post-main-box{';
			$automotive_centre_custom_css .='';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Center'){
		$automotive_centre_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn{';
			$automotive_centre_custom_css .='text-align:center;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info{';
			$automotive_centre_custom_css .='margin-top:10px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info hr{';
			$automotive_centre_custom_css .='margin:10px auto;';
		$automotive_centre_custom_css .='}';
	}else if($automotive_centre_theme_lay == 'Left'){
		$automotive_centre_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .post-main-box .more-btn, #our-services p{';
			$automotive_centre_custom_css .='text-align:Left;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-info hr{';
			$automotive_centre_custom_css .='margin-bottom:10px;';
		$automotive_centre_custom_css .='}';
		$automotive_centre_custom_css .='.post-main-box h2{';
			$automotive_centre_custom_css .='margin-top:10px;';
		$automotive_centre_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$automotive_centre_resp_stickyheader = get_theme_mod( 'automotive_centre_stickyheader_hide_show',false);
    if($automotive_centre_resp_stickyheader == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_stickyheader == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.header-fixed{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_slider = get_theme_mod( 'automotive_centre_resp_slider_hide_show',false);
    if($automotive_centre_resp_slider == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_slider == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#slider{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_metabox = get_theme_mod( 'automotive_centre_metabox_hide_show',true);
    if($automotive_centre_resp_metabox == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.post-info{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_metabox == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='.post-info{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	$automotive_centre_resp_sidebar = get_theme_mod( 'automotive_centre_sidebar_hide_show',true);
    if($automotive_centre_resp_sidebar == true){
    	$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#sidebar{';
			$automotive_centre_custom_css .='display:block;';
		$automotive_centre_custom_css .='} }';
	}else if($automotive_centre_resp_sidebar == false){
		$automotive_centre_custom_css .='@media screen and (max-width:575px) {';
		$automotive_centre_custom_css .='#sidebar{';
			$automotive_centre_custom_css .='display:none;';
		$automotive_centre_custom_css .='} }';
	}

	/*------------------ Search Settings -----------------*/
	
	$automotive_centre_search_padding_top_bottom = get_theme_mod('automotive_centre_search_padding_top_bottom');
	$automotive_centre_search_padding_left_right = get_theme_mod('automotive_centre_search_padding_left_right');
	$automotive_centre_search_font_size = get_theme_mod('automotive_centre_search_font_size');
	$automotive_centre_search_border_radius = get_theme_mod('automotive_centre_search_border_radius');
	if($automotive_centre_search_padding_top_bottom != false || $automotive_centre_search_padding_left_right != false || $automotive_centre_search_font_size != false || $automotive_centre_search_border_radius != false){
		$automotive_centre_custom_css .='.search-box i{';
			$automotive_centre_custom_css .='padding-top: '.esc_html($automotive_centre_search_padding_top_bottom).'; padding-bottom: '.esc_html($automotive_centre_search_padding_top_bottom).';padding-left: '.esc_html($automotive_centre_search_padding_left_right).';padding-right: '.esc_html($automotive_centre_search_padding_left_right).';font-size: '.esc_html($automotive_centre_search_font_size).';border-radius: '.esc_html($automotive_centre_search_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$automotive_centre_button_padding_top_bottom = get_theme_mod('automotive_centre_button_padding_top_bottom');
	$automotive_centre_button_padding_left_right = get_theme_mod('automotive_centre_button_padding_left_right');
	if($automotive_centre_button_padding_top_bottom != false || $automotive_centre_button_padding_left_right != false){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='padding-top: '.esc_html($automotive_centre_button_padding_top_bottom).'; padding-bottom: '.esc_html($automotive_centre_button_padding_top_bottom).';padding-left: '.esc_html($automotive_centre_button_padding_left_right).';padding-right: '.esc_html($automotive_centre_button_padding_left_right).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_button_border_radius = get_theme_mod('automotive_centre_button_border_radius');
	if($automotive_centre_button_border_radius != false){
		$automotive_centre_custom_css .='.post-main-box .more-btn a{';
			$automotive_centre_custom_css .='border-radius: '.esc_html($automotive_centre_button_border_radius).'px;';
		$automotive_centre_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$automotive_centre_copyright_alingment = get_theme_mod('automotive_centre_copyright_alingment');
	if($automotive_centre_copyright_alingment != false){
		$automotive_centre_custom_css .='.copyright p{';
			$automotive_centre_custom_css .='text-align: '.esc_html($automotive_centre_copyright_alingment).';';
		$automotive_centre_custom_css .='}';
	}

	$automotive_centre_copyright_padding_top_bottom = get_theme_mod('automotive_centre_copyright_padding_top_bottom');
	if($automotive_centre_copyright_padding_top_bottom != false){
		$automotive_centre_custom_css .='#footer-2{';
			$automotive_centre_custom_css .='padding-top: '.esc_html($automotive_centre_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($automotive_centre_copyright_padding_top_bottom).';';
		$automotive_centre_custom_css .='}';
	}

