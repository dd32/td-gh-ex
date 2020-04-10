<?php
	
	/*---------------------------Theme color option-------------------*/
	
	$advance_pet_care_theme_color_first = get_theme_mod('advance_pet_care_theme_color_first');

	$custom_css = '';

	if($advance_pet_care_theme_color_first != false){
		$custom_css .='input[type="submit"], .cart_icon i, #slider .inner_carousel .get-apt-btn a:hover,#welcome .discover-btn a:hover, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #comments a.comment-reply-link, .meta-nav:hover,.primary-navigation li a:hover, .read-more-btn a:hover, .tags p a:hover{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='h4,h5,h6, .read-moresec a,section h4, section .innerlightbox, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, h3.widget-title a, #footer li a:hover, .new-text h1 a,.new-text h2 a, .pet-top i, .comment-meta.commentmetadata a, a.added_to_cart.wc-forward, span.tagged_as a, #comments p a,  .primary-navigation ul ul a, .primary-navigation ul ul a:hover, .tags i, .metabox a:hover, .primary-navigation a:focus,.new-text p a,.entry-content a , #comments p a{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='.read-moresec a, #footer input[type="search"], .woocommerce .quantity .qty, .primary-navigation ul ul, .read-more-btn a:hover, .tags p a:hover,.tags p a{';
			$custom_css .='border-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}

	/*---------------------------Theme color option-------------------*/

	$advance_pet_care_theme_color_second = get_theme_mod('advance_pet_care_theme_color_second');

	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, #header .main-menu, #slider i, #slider .inner_carousel .get-apt-btn a, #welcome .discover-btn a, .read-more-btn a, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,.pagination .current, .pagination a:hover, #menu-sidebar input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before, #comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.woocommerce-message::before, .logo a, .pet-top p.color{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.read-more-btn a, .read-moresec a:hover{';
			$custom_css .='border-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='#sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_second).'!important;';
		$custom_css .='}';
	}


// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_pet_care_theme_color_first != false || $advance_pet_care_theme_color_second != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($advance_pet_care_theme_color_first).' 0%, '.esc_html($advance_pet_care_theme_color_second).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'advance_pet_care_theme_options','Default');
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


	/*--------------------------- Slider Opacity -------------------*/

	$slider_lay = get_theme_mod( 'advance_pet_care_slider_image_opacity','0.6');
	if($slider_lay == '0'){
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

	/*----------Slider Content Alignment ------------*/

	$slider_lay = get_theme_mod( 'advance_pet_care_slider_content_alignment','Left');
    if($slider_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$custom_css .='text-align:left; left:10%; right:50%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 720px){
		#slider .carousel-caption{';
		$custom_css .='left: 15%; right: 40%;';
		$custom_css .='} }';

	}else if($slider_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$custom_css .='text-align:center; left:15%; right:15%;';
		$custom_css .='}';

	}else if($slider_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel,#slider .inner_carousel h1{';
			$custom_css .='text-align:right; right:10%; left:50%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 720px){
		#slider .carousel-caption{';
		$custom_css .='left: 40%; right: 15%;';
		$custom_css .='} }';
	}

	/*------------------------------ Button Settings option-----------------------*/

	$advance_pet_care_button_padding_top_bottom = get_theme_mod('advance_pet_care_button_padding_top_bottom');
	$advance_pet_care_button_padding_left_right = get_theme_mod('advance_pet_care_button_padding_left_right');
	if($advance_pet_care_button_padding_top_bottom != false || $advance_pet_care_button_padding_left_right != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .get-apt-btn a, #comments .form-submit input[type="submit"], #welcome .discover-btn a{';
			$custom_css .='padding-top: '.esc_html($advance_pet_care_button_padding_top_bottom).'px; padding-bottom: '.esc_html($advance_pet_care_button_padding_top_bottom).'px; padding-left: '.esc_html($advance_pet_care_button_padding_left_right).'px; padding-right: '.esc_html($advance_pet_care_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$advance_pet_care_button_border_radius = get_theme_mod('advance_pet_care_button_border_radius');
	if($advance_pet_care_button_border_radius != false){
		$custom_css .='.new-text .read-more-btn a, #slider .inner_carousel .get-apt-btn a, #comments .form-submit input[type="submit"], #welcome .discover-btn a{';
			$custom_css .='border-radius: '.esc_html($advance_pet_care_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'advance_pet_care_responsive_sticky_header',true);
	if($stickyheader == true && get_theme_mod( 'advance_pet_care_sticky_header') == false){
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

	$stickyheader = get_theme_mod( 'advance_pet_care_responsive_slider',true);
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

	$metabox = get_theme_mod( 'advance_pet_care_responsive_metabox',true);
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

	$sidebar = get_theme_mod( 'advance_pet_care_responsive_sidebar',true);
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

		$theme_lay = get_theme_mod( 'advance_pet_care_background_skin_mode','Transpert Background');
	    if($theme_lay == 'With Background'){
			$custom_css .='#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.content-sec,.front-page-content,.background-img-skin{';
				$custom_css .='background-color: #fff; ';
			$custom_css .='}';
			$custom_css .='.background-img-skin{';
				$custom_css .='margin: 2% 0; ';
			$custom_css .='}';
		}else if($theme_lay == 'Transpert Background'){
			$custom_css .='#sidebar aside,.page-box .new-text, .page-box-single .new-text,.page-box-single{';
				$custom_css .='background-color: transparent;';
			$custom_css .='}';
		}

