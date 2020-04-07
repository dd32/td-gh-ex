<?php
	
	$aagaz_startup_theme_color = get_theme_mod('aagaz_startup_theme_color');

	$custom_css = '';

	if($aagaz_startup_theme_color != false){
		$custom_css .='.topbar, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, .readbutton a, .aboutbtn a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .post-link a, .post-info, #sidebox h2, button.search-submit:hover, .search-form button.search-submit, .copyright, .widget .tagcloud a:hover,.widget .tagcloud a:focus,.widget.widget_tag_cloud a:hover,.widget.widget_tag_cloud a:focus,.wp_widget_tag_cloud a:hover,.wp_widget_tag_cloud a:focus, button,input[type="button"],input[type="submit"], .prev.page-numbers:focus,.next.page-numbers:focus,.tags p a,.comment-reply-link,.post-navigation .nav-next a, .post-navigation .nav-previous a,.scrollup i,.page-numbers{';
			$custom_css .='background-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.woocommerce-message::before,#sidebox ul li a:hover,.woocommerce .tagged_as a:hover{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.main-navigation ul ul, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, #about .abt-image,.scrollup i,.page-numbers{';
			$custom_css .='border-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='#about .about-text hr, .woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.site-footer ul li a:hover{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).'!important;';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'aagaz_startup_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Layout'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
	}else if($theme_lay == 'Box Layout'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$slider_layout = get_theme_mod( 'aagaz_startup_slider_opacity_color','0.6');
	if($slider_layout == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($slider_layout == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($slider_layout == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($slider_layout == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($slider_layout == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($slider_layout == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($slider_layout == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($slider_layout == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($slider_layout == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($slider_layout == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*----------------- Slider Content Layout ---------------*/

	$slider_layout = get_theme_mod( 'aagaz_startup_slider_content_option','Left');
    if($slider_layout == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$custom_css .='top:32%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$custom_css .='font-size:27px;';
		$custom_css .='} }';
	}else if($slider_layout == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$custom_css .='top:40%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$custom_css .='font-size:30px;';
		$custom_css .='} }';
	}else if($slider_layout == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 768px){
		#slider .carousel-caption{';
		$custom_css .='top:32%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 990px) and (min-width: 768px){
		#slider .inner_carousel h1{';
		$custom_css .='font-size:30px;';
		$custom_css .='} }';
	}

	// topbar
	$show_header = get_theme_mod( 'aagaz_startup_show_hide_topbar', true);
	if($show_header == true){
		$custom_css .='.logo{';
			$custom_css .=';';
		$custom_css .='}';
	}else if($show_header == false){
		$custom_css .='.logo{';
			$custom_css .='top: 0;';
		$custom_css .='}';
	}

	/*--------------- Button Settings option----------------*/

	$aagaz_startup_top_bottom_padding = get_theme_mod('aagaz_startup_top_bottom_padding');
	$aagaz_startup_left_right_padding = get_theme_mod('aagaz_startup_left_right_padding');
	if($aagaz_startup_top_bottom_padding != false || $aagaz_startup_left_right_padding != false){
		$custom_css .='.post-link a, #slider .readbutton a, .form-submit input[type="submit"], #about .aboutbtn a{';
			$custom_css .='padding-top: '.esc_html($aagaz_startup_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_top_bottom_padding).'px; padding-left: '.esc_html($aagaz_startup_left_right_padding).'px; padding-right: '.esc_html($aagaz_startup_left_right_padding).'px; display:inline-block;';
		$custom_css .='}';
	}

	$aagaz_startup_border_radius = get_theme_mod('aagaz_startup_border_radius');
	if($aagaz_startup_border_radius != false){
		$custom_css .='.post-link a,#slider .readbutton a, .form-submit input[type="submit"], #about .aboutbtn a{';
			$custom_css .='border-radius: '.esc_html($aagaz_startup_border_radius).'px;';
		$custom_css .='}';
	}

	/*--------------------Blog Layout -----------------*/

	$theme_lay = get_theme_mod( 'aagaz_startup_blog_post_layout','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.blogger{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.blogger, .blogger h2, .post-info, .text p, .blogger .post-link{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.blogger .post-link{';
			$custom_css .='margin-top:25px;';
		$custom_css .='}';
	}else if($theme_lay == 'Image and Content'){
		$custom_css .='.blogger, .blogger h2, .post-info, .text p, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
		$custom_css .='.blogger .post-link{';
			$custom_css .='text-align:right;';
		$custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$aagaz_startup_loader_color_setting = get_theme_mod('aagaz_startup_loader_color_setting');

	if($aagaz_startup_loader_color_setting != false){
		$custom_css .=' .circle .inner{';
			$custom_css .='border-color: '.esc_html($aagaz_startup_loader_color_setting).';';
		$custom_css .='} ';
	}

	$aagaz_startup_loader_background_color = get_theme_mod('aagaz_startup_loader_background_color');

	if($aagaz_startup_loader_background_color != false){
		$custom_css .=' #pre-loader{';
			$custom_css .='background-color: '.esc_html($aagaz_startup_loader_background_color).';';
		$custom_css .='} ';
	}

	$theme_lay = get_theme_mod( 'aagaz_startup_preloader_types','Default');
    if($theme_lay == 'Default'){
		$custom_css .='{';
			$custom_css .='';
		$custom_css .='}';
	}elseif($theme_lay == 'Circle'){
		$custom_css .='.circle .inner{';
			$custom_css .='width:unset;';
		$custom_css .='}';
	}elseif($theme_lay == 'Two Circle'){
		$custom_css .='.circle .inner{';
			$custom_css .='width:80%;
    border-right: 5px;';
		$custom_css .='}';
	}

	// Responsive Media
	$sidebar = get_theme_mod( 'aagaz_startup_enable_disable_sidebar',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebox{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebox{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'aagaz_startup_enable_disable_topbar',true);
	if($stickyheader == true && get_theme_mod( 'aagaz_startup_show_hide_topbar') == false){
    	$custom_css .='.topbar{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.topbar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.topbar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$stickyheader = get_theme_mod( 'aagaz_startup_enable_disable_fixed_header',true);
	if($stickyheader == true && get_theme_mod( 'aagaz_startup_fixed_header') == false){
    	$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} ';
	}
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:fixed;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.fixed-header{';
			$custom_css .='position:static;';
		$custom_css .='} }';
	}

	$sliderbutton = get_theme_mod( 'aagaz_startup_enable_disable_slider',true);
	if($sliderbutton == true && get_theme_mod( 'aagaz_startup_slider_arrows') == false){
    	$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($sliderbutton == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sliderbutton == false){
		$custom_css .='@media screen and (max-width:575px){';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sliderbutton = get_theme_mod( 'aagaz_startup_show_hide_slider_button',true);
	if($sliderbutton == true && get_theme_mod( 'aagaz_startup_slider_button',true) != true){
    	$custom_css .='#slider .readbutton{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($sliderbutton == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider .readbutton{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sliderbutton == false){
		$custom_css .='@media screen and (max-width:575px){';
		$custom_css .='#slider .readbutton{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sliderbutton = get_theme_mod( 'aagaz_startup_enable_disable_scrolltop',true);
	if($sliderbutton == true && get_theme_mod( 'aagaz_startup_hide_show_scroll',true) != true){
    	$custom_css .='.scrollup i{';
			$custom_css .='display:none;';
		$custom_css .='} ';
	}
    if($sliderbutton == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.scrollup i{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sliderbutton == false){
		$custom_css .='@media screen and (max-width:575px){';
		$custom_css .='.scrollup i{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	// Slider Height 
	$aagaz_startup_slider_height_option = get_theme_mod('aagaz_startup_slider_height_option');
	if($aagaz_startup_slider_height_option != false){
		$custom_css .='#slider img{';
			$custom_css .='height: '.esc_html($aagaz_startup_slider_height_option).'px;';
		$custom_css .='}';
	}

	// scroll to top setting
	$aagaz_startup_scroll_border_radius = get_theme_mod('aagaz_startup_scroll_border_radius');
	if($aagaz_startup_scroll_border_radius != false){
		$custom_css .='.scrollup i{';
			$custom_css .='border-radius: '.esc_html($aagaz_startup_scroll_border_radius).'px;';
		$custom_css .='}';
	}

	$aagaz_startup_scroll_top_fontsize = get_theme_mod('aagaz_startup_scroll_top_fontsize');
	if($aagaz_startup_scroll_top_fontsize != false){
		$custom_css .='.scrollup i{';
			$custom_css .='font-size: '.esc_html($aagaz_startup_scroll_top_fontsize).'px;';
		$custom_css .='}';
	}

	$aagaz_startup_scroll_top_bottom_padding = get_theme_mod('aagaz_startup_scroll_top_bottom_padding');
	$aagaz_startup_scroll_left_right_padding = get_theme_mod('aagaz_startup_scroll_left_right_padding');
	if($aagaz_startup_scroll_top_bottom_padding != false || $aagaz_startup_scroll_left_right_padding != false){
		$custom_css .='.scrollup i{';
			$custom_css .='padding-top: '.esc_html($aagaz_startup_scroll_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_scroll_top_bottom_padding).'px; padding-left: '.esc_html($aagaz_startup_scroll_left_right_padding).'px; padding-right: '.esc_html($aagaz_startup_scroll_left_right_padding).'px;';
		$custom_css .='}';
	}

	// Copyright top-bottom padding setting 
	$aagaz_startup_copyright_top_bottom_padding = get_theme_mod('aagaz_startup_copyright_top_bottom_padding');
	if($aagaz_startup_copyright_top_bottom_padding != false){
		$custom_css .='.copyright{';
			$custom_css .='padding-top: '.esc_html($aagaz_startup_copyright_top_bottom_padding).'px; padding-bottom: '.esc_html($aagaz_startup_copyright_top_bottom_padding).'px;';
		$custom_css .='}';
	}

