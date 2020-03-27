<?php

	$advance_it_company_theme_color_first = get_theme_mod('advance_it_company_theme_color_first');

	$custom_css = '';

	if($advance_it_company_theme_color_first != false){
		$custom_css .='input[type="submit"], .social-icons i:hover, #slider .inner_carousel .readbtn a:hover, #slider .inner_carousel .readbtn a i, #work_cat h5, .cat-posts:hover, .read-more-btn a:hover, .read-more-btn a i, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar h3, #sidebar .tagcloud a:hover, #sidebar input[type="submit"],#sidebar input[type="submit"],#comments a.comment-reply-link, #menu-sidebar input[type="submit"], .pagination a:hover, .meta-nav:hover{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_first).'!important;';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='h4,h5,h6,  #slider .carousel-control-next-icon i, section h4, #footer h3, #comments a time, .woocommerce-message::before,.metabox i, #footer li a:hover,.primary-navigation ul ul a:focus,  .primary-navigation ul ul a:hover, .metabox a:hover, .mail i,.phone i,.address i{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='.serach_inner form.search-form, #footer input[type="search"], .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .pagination a:hover{';
			$custom_css .='border-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_first != false){
		$custom_css .='.woocommerce-message ,.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($advance_it_company_theme_color_first).';';
		$custom_css .='}';
	}
	/*---------------------------Theme color option-------------------*/
	$advance_it_company_theme_color_second = get_theme_mod('advance_it_company_theme_color_second');

	if($advance_it_company_theme_color_second != false){
		$custom_css .='.search-box i, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover i, .read-more-btn a, .read-more-btn a:hover i, .read-moresec a:hover,.tags p a:hover, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_it_company_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .='.woocommerce .quantity .qty, .read-moresec a{';
			$custom_css .='border-color: '.esc_html($advance_it_company_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .='.woocommerce .quantity .qty, #work_cat h2, .new-text h2 a,.content-ts h1, .content-ts h3,.cart_totals h2, .read-moresec a, .tags i{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_it_company_theme_color_second != false){
		$custom_css .=' #sidebar ul li a:hover,#sidebar ul li:active, #sidebar ul li:focus{';
			$custom_css .='color: '.esc_html($advance_it_company_theme_color_second).'!important;';
		$custom_css .='}';
	}
	
// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_it_company_theme_color_second != false || $advance_it_company_theme_color_first != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .primary-navigation li a:focus, .primary-navigation li:hover a,#contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_it_company_theme_color_second).' 0%, '.esc_html($advance_it_company_theme_color_first).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_it_company_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 97.7%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
	}

// css
	$show_header = get_theme_mod( 'advance_it_company_display_topbar', true);
	if($show_header == false){
		$custom_css .='.main-menu{';
			$custom_css .='margin: 10px 0;';
		$custom_css .='}';
		$custom_css .='.logo{';
			$custom_css .='padding: 10px 0;';
		$custom_css .='}';
	}

	$show_slider = get_theme_mod( 'advance_it_company_slider_hide', true);
	if($show_slider == false){
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='border-bottom: 1px solid #272b46;';
		$custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_it_company_slider_content_alignment','Left');
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

	$theme_lay = get_theme_mod( 'advance_it_company_slider_image_opacity','0.5');
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

	/*------------------------------ Button Settings option-----------------------*/

	$advance_it_company_button_padding_top_bottom = get_theme_mod('advance_it_company_button_padding_top_bottom');
	$advance_it_company_button_padding_left_right = get_theme_mod('advance_it_company_button_padding_left_right');
	if($advance_it_company_button_padding_top_bottom != false || $advance_it_company_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='padding-top: '.esc_html($advance_it_company_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_it_company_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_it_company_button_padding_left_right).'px; padding-right: '.esc_html($advance_it_company_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_it_company_button_border_radius = get_theme_mod('advance_it_company_button_border_radius');
	if($advance_it_company_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .readbtn a, #comments .form-submit input[type="submit"]{';
			$custom_css .='border-radius: '.esc_html($advance_it_company_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'advance_it_company_responsive_slider',true);
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

	$metabox = get_theme_mod( 'advance_it_company_responsive_metabox',true);
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

	$sidebar = get_theme_mod( 'advance_it_company_responsive_sidebar',true);
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

		$theme_lay = get_theme_mod( 'advance_it_company_background_skin_mode','Transpert Background');
	    if($theme_lay == 'With Background'){
			$custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.post-sec,.front-page-content,.background-img-skin{';
				$custom_css .='background-color: #fff;';
			$custom_css .='}';
		}else if($theme_lay == 'Transpert Background'){
			$custom_css .='.page-box-single{';
				$custom_css .='background-color: transparent;';
			$custom_css .='}';
		}






		
