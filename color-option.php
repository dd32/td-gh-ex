<?php
	
	$aagaz_startup_theme_color = get_theme_mod('aagaz_startup_theme_color');

	$aagaz_startup_custom_css = '';

	$aagaz_startup_custom_css .='.topbar, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, .readbutton a, .aboutbtn a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .post-link a, .post-info, #sidebox h2, button.search-submit:hover, .search-form button.search-submit, .copyright, .widget .tagcloud a:hover,.widget .tagcloud a:focus,.widget.widget_tag_cloud a:hover,.widget.widget_tag_cloud a:focus,.wp_widget_tag_cloud a:hover,.wp_widget_tag_cloud a:focus, button,input[type="button"],input[type="submit"], .prev.page-numbers:focus,.next.page-numbers:focus,.tags p a,.comment-reply-link,.post-navigation .nav-next a, .post-navigation .nav-previous a,.scrollup i,.page-numbers, #sidebox h3, #sidebox .widget_price_filter .ui-slider-horizontal .ui-slider-range, #sidebox .widget_price_filter .ui-slider .ui-slider-handle, .site-footer .widget_price_filter .ui-slider-horizontal .ui-slider-range, .site-footer .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover{';
		$aagaz_startup_custom_css .='background-color: '.esc_html($aagaz_startup_theme_color).';';
	$aagaz_startup_custom_css .='}';


	$aagaz_startup_custom_css .='.woocommerce-message::before,#sidebox ul li a:hover,.woocommerce .tagged_as a:hover{';
		$aagaz_startup_custom_css .='color: '.esc_html($aagaz_startup_theme_color).';';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_custom_css .='.main-navigation ul ul, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, #about .abt-image,.scrollup i,.page-numbers{';
		$aagaz_startup_custom_css .='border-color: '.esc_html($aagaz_startup_theme_color).';';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_custom_css .='#about .about-text hr, .woocommerce-message{';
		$aagaz_startup_custom_css .='border-top-color: '.esc_html($aagaz_startup_theme_color).';';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_custom_css .='.site-footer ul li a:hover{';
		$aagaz_startup_custom_css .='color: '.esc_html($aagaz_startup_theme_color).'!important;';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_custom_css .='.post-link a{';
		$aagaz_startup_custom_css .='border-color: '.esc_html($aagaz_startup_theme_color).'!important;';
	$aagaz_startup_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$aagaz_startup_theme_lay = get_theme_mod( 'aagaz_startup_theme_options','Default');
    if($aagaz_startup_theme_lay == 'Default'){
		$aagaz_startup_custom_css .='body{';
			$aagaz_startup_custom_css .='max-width: 100%;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='.page-template-custom-home-page .middle-header{';
			$aagaz_startup_custom_css .='width: 97.3%';
		$aagaz_startup_custom_css .='}';
	}else if($aagaz_startup_theme_lay == 'Wide Layout'){
		$aagaz_startup_custom_css .='body{';
			$aagaz_startup_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='.page-template-custom-home-page .middle-header{';
			$aagaz_startup_custom_css .='width: 97.7%';
		$aagaz_startup_custom_css .='}';
	}else if($aagaz_startup_theme_lay == 'Box Layout'){
		$aagaz_startup_custom_css .='body{';
			$aagaz_startup_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$aagaz_startup_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$aagaz_startup_slider_layout = get_theme_mod( 'aagaz_startup_slider_opacity_color','0.6');
	if($aagaz_startup_slider_layout == '0'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.1'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.1';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.2'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.2';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.3'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.3';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.4'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.4';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.5'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.5';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.6'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.6';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.7'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.7';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.8'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.8';
		$aagaz_startup_custom_css .='}';
		}else if($aagaz_startup_slider_layout == '0.9'){
		$aagaz_startup_custom_css .='#slider img{';
			$aagaz_startup_custom_css .='opacity:0.9';
		$aagaz_startup_custom_css .='}';
		}

	/*----------------- Slider Content Layout ---------------*/
	$aagaz_startup_slider_layout = get_theme_mod( 'aagaz_startup_slider_content_option','Left');
    if($aagaz_startup_slider_layout == 'Left'){
		$aagaz_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$aagaz_startup_custom_css .='text-align:left; left:15%; right:45%;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$aagaz_startup_custom_css .='top:32%;';
		$aagaz_startup_custom_css .='} }';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$aagaz_startup_custom_css .='font-size:27px;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_slider_layout == 'Center'){
		$aagaz_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$aagaz_startup_custom_css .='text-align:center; left:20%; right:20%;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$aagaz_startup_custom_css .='top:40%;';
		$aagaz_startup_custom_css .='} }';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$aagaz_startup_custom_css .='font-size:30px;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_slider_layout == 'Right'){
		$aagaz_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$aagaz_startup_custom_css .='text-align:right; left:45%; right:15%;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$aagaz_startup_custom_css .='top:32%;';
		$aagaz_startup_custom_css .='} }';
		$aagaz_startup_custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$aagaz_startup_custom_css .='font-size:30px;';
		$aagaz_startup_custom_css .='} }';
	}

	// topbar
	$aagaz_startup_show_header = get_theme_mod( 'aagaz_startup_show_hide_topbar');
	if($aagaz_startup_show_header == false){
		$aagaz_startup_custom_css .='.logo{';
			$aagaz_startup_custom_css .='top: 0;';
		$aagaz_startup_custom_css .='}';
	}

	/*--------------- Button Settings option----------------*/
	$aagaz_startup_top_bottom_padding = get_theme_mod('aagaz_startup_top_bottom_padding');
	$aagaz_startup_left_right_padding = get_theme_mod('aagaz_startup_left_right_padding');
	$aagaz_startup_custom_css .='.post-link a, #slider .readbutton a, .form-submit input[type="submit"], #about .aboutbtn a{';
		$aagaz_startup_custom_css .='padding-top: '.esc_html($aagaz_startup_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_top_bottom_padding).'px; padding-left: '.esc_html($aagaz_startup_left_right_padding).'px; padding-right: '.esc_html($aagaz_startup_left_right_padding).'px; display:inline-block;';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_border_radius = get_theme_mod('aagaz_startup_border_radius');
	$aagaz_startup_custom_css .='.post-link a,#slider .readbutton a, .form-submit input[type="submit"], #about .aboutbtn a{';
		$aagaz_startup_custom_css .='border-radius: '.esc_html($aagaz_startup_border_radius).'px;';
	$aagaz_startup_custom_css .='}';

	/*--------------------Blog Layout -----------------*/
	$aagaz_startup_theme_lay = get_theme_mod( 'aagaz_startup_blog_post_layout','Default');
    if($aagaz_startup_theme_lay == 'Default'){
		$aagaz_startup_custom_css .='.blogger{';
			$aagaz_startup_custom_css .='';
		$aagaz_startup_custom_css .='}';
	}else if($aagaz_startup_theme_lay == 'Center'){
		$aagaz_startup_custom_css .='.blogger, .blogger h2, .post-info, .text p, .blogger .post-link{';
			$aagaz_startup_custom_css .='text-align:center;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='.post-info{';
			$aagaz_startup_custom_css .='margin-top:10px;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='.blogger .post-link{';
			$aagaz_startup_custom_css .='margin-top:25px;';
		$aagaz_startup_custom_css .='}';
	}else if($aagaz_startup_theme_lay == 'Image and Content'){
		$aagaz_startup_custom_css .='.blogger, .blogger h2, .post-info, .text p, #our-services p{';
			$aagaz_startup_custom_css .='text-align:Left;';
		$aagaz_startup_custom_css .='}';
		$aagaz_startup_custom_css .='.blogger .post-link{';
			$aagaz_startup_custom_css .='text-align:right;';
		$aagaz_startup_custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$aagaz_startup_loader_color_setting = get_theme_mod('aagaz_startup_loader_color_setting');
	$aagaz_startup_custom_css .=' .circle .inner{';
		$aagaz_startup_custom_css .='border-color: '.esc_html($aagaz_startup_loader_color_setting).';';
	$aagaz_startup_custom_css .='} ';

	$aagaz_startup_loader_background_color = get_theme_mod('aagaz_startup_loader_background_color');
	$aagaz_startup_custom_css .=' #pre-loader{';
		$aagaz_startup_custom_css .='background-color: '.esc_html($aagaz_startup_loader_background_color).';';
	$aagaz_startup_custom_css .='} ';

	$aagaz_startup_theme_lay = get_theme_mod( 'aagaz_startup_preloader_types','Default');
    if($aagaz_startup_theme_lay == 'Default'){
		$aagaz_startup_custom_css .='{';
			$aagaz_startup_custom_css .='';
		$aagaz_startup_custom_css .='}';
	}elseif($aagaz_startup_theme_lay == 'Circle'){
		$aagaz_startup_custom_css .='.circle .inner{';
			$aagaz_startup_custom_css .='width:unset;';
		$aagaz_startup_custom_css .='}';
	}elseif($aagaz_startup_theme_lay == 'Two Circle'){
		$aagaz_startup_custom_css .='.circle .inner{';
			$aagaz_startup_custom_css .='width:80%;
    border-right: 5px;';
		$aagaz_startup_custom_css .='}';
	}

	// Responsive Media
	$aagaz_startup_sidebar = get_theme_mod( 'aagaz_startup_enable_disable_sidebar',true);
    if($aagaz_startup_sidebar == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='#sidebox{';
			$aagaz_startup_custom_css .='display:block;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_sidebar == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='#sidebox{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} }';
	}

	$aagaz_startup_stickyheader = get_theme_mod( 'aagaz_startup_enable_disable_topbar',true);
	if($aagaz_startup_stickyheader == true && get_theme_mod( 'aagaz_startup_show_hide_topbar', true) == false){
    	$aagaz_startup_custom_css .='.topbar{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} ';
	}
    if($aagaz_startup_stickyheader == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='.topbar{';
			$aagaz_startup_custom_css .='display:block;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_stickyheader == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='.topbar{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} }';
	}

	$aagaz_startup_stickyheader = get_theme_mod( 'aagaz_startup_enable_disable_fixed_header', false);
	if($aagaz_startup_stickyheader == true && get_theme_mod( 'aagaz_startup_fixed_header', false) == false){
    	$aagaz_startup_custom_css .='.fixed-header{';
			$aagaz_startup_custom_css .='position:static;';
		$aagaz_startup_custom_css .='} ';
	}
    if($aagaz_startup_stickyheader == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='.fixed-header{';
			$aagaz_startup_custom_css .='position:fixed;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_stickyheader == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='.fixed-header{';
			$aagaz_startup_custom_css .='position:static;';
		$aagaz_startup_custom_css .='} }';
	}

	$aagaz_startup_sliderbutton = get_theme_mod( 'aagaz_startup_enable_disable_slider', false);
	if($aagaz_startup_sliderbutton == true && get_theme_mod( 'aagaz_startup_slider_arrows', false) == false){
    	$aagaz_startup_custom_css .='#slider{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} ';
	}
    if($aagaz_startup_sliderbutton == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='#slider{';
			$aagaz_startup_custom_css .='display:block;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_sliderbutton == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px){';
		$aagaz_startup_custom_css .='#slider{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} }';
	}

	$aagaz_startup_sliderbutton = get_theme_mod( 'aagaz_startup_show_hide_slider_button',true);
	if($aagaz_startup_sliderbutton == true && get_theme_mod( 'aagaz_startup_slider_button',true) != true){
    	$aagaz_startup_custom_css .='#slider .readbutton{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} ';
	}
    if($aagaz_startup_sliderbutton == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='#slider .readbutton{';
			$aagaz_startup_custom_css .='display:block;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_sliderbutton == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px){';
		$aagaz_startup_custom_css .='#slider .readbutton{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} }';
	}

	$aagaz_startup_sliderbutton = get_theme_mod( 'aagaz_startup_enable_disable_scrolltop',true);
	if($aagaz_startup_sliderbutton == true && get_theme_mod( 'aagaz_startup_hide_show_scroll',true) != true){
    	$aagaz_startup_custom_css .='.scrollup i{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} ';
	}
    if($aagaz_startup_sliderbutton == true){
    	$aagaz_startup_custom_css .='@media screen and (max-width:575px) {';
		$aagaz_startup_custom_css .='.scrollup i{';
			$aagaz_startup_custom_css .='display:block;';
		$aagaz_startup_custom_css .='} }';
	}else if($aagaz_startup_sliderbutton == false){
		$aagaz_startup_custom_css .='@media screen and (max-width:575px){';
		$aagaz_startup_custom_css .='.scrollup i{';
			$aagaz_startup_custom_css .='display:none;';
		$aagaz_startup_custom_css .='} }';
	}

	// Slider Height 
	$aagaz_startup_slider_height_option = get_theme_mod('aagaz_startup_slider_height_option');
	$aagaz_startup_custom_css .='#slider img{';
		$aagaz_startup_custom_css .='height: '.esc_html($aagaz_startup_slider_height_option).'px;';
	$aagaz_startup_custom_css .='}';

	// scroll to top setting
	$aagaz_startup_scroll_border_radius = get_theme_mod('aagaz_startup_scroll_border_radius');
	$aagaz_startup_custom_css .='.scrollup i{';
		$aagaz_startup_custom_css .='border-radius: '.esc_html($aagaz_startup_scroll_border_radius).'px;';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_scroll_top_fontsize = get_theme_mod('aagaz_startup_scroll_top_fontsize');
	$aagaz_startup_custom_css .='.scrollup i{';
		$aagaz_startup_custom_css .='font-size: '.esc_html($aagaz_startup_scroll_top_fontsize).'px;';
	$aagaz_startup_custom_css .='}';

	$aagaz_startup_scroll_top_bottom_padding = get_theme_mod('aagaz_startup_scroll_top_bottom_padding');
	$aagaz_startup_scroll_left_right_padding = get_theme_mod('aagaz_startup_scroll_left_right_padding');
	$aagaz_startup_custom_css .='.scrollup i{';
		$aagaz_startup_custom_css .='padding-top: '.esc_html($aagaz_startup_scroll_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_scroll_top_bottom_padding).'px; padding-left: '.esc_html($aagaz_startup_scroll_left_right_padding).'px; padding-right: '.esc_html($aagaz_startup_scroll_left_right_padding).'px;';
	$aagaz_startup_custom_css .='}';

	// Copyright top-bottom padding setting 
	$aagaz_startup_copyright_top_bottom_padding = get_theme_mod('aagaz_startup_copyright_top_bottom_padding');
	$aagaz_startup_custom_css .='.copyright{';
		$aagaz_startup_custom_css .='padding-top: '.esc_html($aagaz_startup_copyright_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_copyright_top_bottom_padding).'px;';
	$aagaz_startup_custom_css .='}';

	// comment settings
	$aagaz_startup_comment_button_text = get_theme_mod('aagaz_startup_comment_button_text', 'Post Comment');
	if($aagaz_startup_comment_button_text == ''){
		$aagaz_startup_custom_css .='#comments p.form-submit {';
			$aagaz_startup_custom_css .='display: none;';
		$aagaz_startup_custom_css .='}';
	}

	$aagaz_startup_comment_form_heading = get_theme_mod('aagaz_startup_comment_form_heading', 'Leave a Reply');
	if($aagaz_startup_comment_form_heading == ''){
		$aagaz_startup_custom_css .='#comments h2#reply-title {';
			$aagaz_startup_custom_css .='display: none;';
		$aagaz_startup_custom_css .='}';
	}

	$aagaz_startup_comment_form_size = get_theme_mod( 'aagaz_startup_comment_form_size',100);
	$aagaz_startup_custom_css .='#comments textarea{';
		$aagaz_startup_custom_css .='width: '.esc_html($aagaz_startup_comment_form_size).'%;';
	$aagaz_startup_custom_css .='}';


