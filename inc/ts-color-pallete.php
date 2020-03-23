<?php
	
	$advance_coaching_theme_color = get_theme_mod('advance_coaching_theme_color');

	$custom_css = '';

	if($advance_coaching_theme_color != false){
		$custom_css .='.read-moresec a:hover, .logo, .top-header .time, .request-btn a i, #slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i, #slider .inner_carousel .read-btn a i, #coaching .read-more a i, .read-more-btn a i, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], #comments a.comment-reply-link, .tags p a:hover,.meta-nav:hover,#menu-sidebar input[type="submit"], .toggle-menu i, input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message::before, h1.entry-title,h1.page-title, h2.woocommerce-loop-product__title,.metabox a, .metabox i, .metabox .entry-comments, .tags i, .tags p a, .contact_data .mail i,#sidebar ul li a:hover,.meta-nav, .page-template-custom-front-page .search-box i, .page-box .metabox a, .entry-content a, .comment-body p a, .entry-content code{';
			$custom_css .='color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message, .primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#footer input[type="search"],.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).'!important;';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_coaching_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_coaching_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_coaching_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%; padding-right: 15px !important; padding-left: 15px !important; margin-right: auto !important; margin-left: auto !important;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='right: 0';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0;';
		$custom_css .='}';
		$custom_css .='.request-btn a{';
			$custom_css .='padding:14px 10px';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='right: 0; left:0;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .menu-bar{';
			$custom_css .='padding-left:15px;';
		$custom_css .='}';
	}

	$show_header = get_theme_mod( 'advance_coaching_display_topbar', true);
	if($show_header == false){
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='margin-top: 0;';
		$custom_css .='}';
	}

	$show_slider = get_theme_mod( 'advance_coaching_slider_hide', true);
	if($show_slider == false){
		$custom_css .='.page-template-custom-front-page .contact-content{';
			$custom_css .='background-color:#051f31; position: static;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .menu-bar{';
			$custom_css .='background-color:transparent;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page .primary-navigation a, .page-template-custom-front-page .sf-arrows .sf-with-ul:after, .page-template-custom-front-page .contact_data .mail p{';
			$custom_css .='color:#fff;';
		$custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_coaching_slider_content_alignment','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'advance_coaching_slider_image_opacity','0.7');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*-------------------------- Button Settings option------------------*/

	$advance_coaching_button_padding_top_bottom = get_theme_mod('advance_coaching_button_padding_top_bottom');
	$advance_coaching_button_padding_left_right = get_theme_mod('advance_coaching_button_padding_left_right');
	if($advance_coaching_button_padding_top_bottom != false || $advance_coaching_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .read-btn a, #comments .form-submit input[type="submit"],#coaching .read-more a{';
			$custom_css .='padding-top: '.esc_html($advance_coaching_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_coaching_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_coaching_button_padding_left_right).'px; padding-right: '.esc_html($advance_coaching_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_coaching_button_border_radius = get_theme_mod('advance_coaching_button_border_radius');
	if($advance_coaching_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .read-btn a, #comments .form-submit input[type="submit"], #coaching .read-more a{';
			$custom_css .='border-radius: '.esc_html($advance_coaching_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'advance_coaching_responsive_sticky_header',true);
	if($stickyheader == true && get_theme_mod( 'advance_coaching_sticky_header') == false){
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

	$stickyheader = get_theme_mod( 'advance_coaching_responsive_slider',true);
    if($stickyheader == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($stickyheader == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#slider{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$metabox = get_theme_mod( 'advance_coaching_responsive_metabox',true);
    if($metabox == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.metabox{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($metabox == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='.metabox{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	$sidebar = get_theme_mod( 'advance_coaching_responsive_sidebar',true);
    if($sidebar == true){
    	$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:block;';
		$custom_css .='} }';
	}else if($sidebar == false){
		$custom_css .='@media screen and (max-width:575px) {';
		$custom_css .='#sidebar{';
			$custom_css .='display:none;';
		$custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/

		$theme_lay = get_theme_mod( 'advance_coaching_background_skin_mode','Transparent Background');
	    if($theme_lay == 'With Background'){
			$custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
				$custom_css .='background-color: #fff;';
			$custom_css .='}';
		}else if($theme_lay == 'Transparent Background'){
			$custom_css .='#sidebar aside, .page-box-single{';
				$custom_css .='background-color: transparent;';
			$custom_css .='}';
		}




		
