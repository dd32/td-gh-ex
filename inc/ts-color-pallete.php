<?php
	
	$bb_wedding_bliss_theme_color_first = get_theme_mod('bb_wedding_bliss_theme_color_first');

	$custom_css = '';

	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.pagination a:hover, .pagination .current, #footer input[type="submit"], .blogbutton-small:hover, .blogbutton-small, .meta-nav:hover,.tags p a:hover ,#comments a.comment-reply-link,#comments input[type="submit"].submit {';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.social-media i:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li a, #slider .inner_carousel h2 a, #sidebar h3, #sidebar input[type="submit"], span.tagged_as a, #footer li a:hover, #love-Story h3, .heading-line h3, input[type="submit"], .our-services .page-box h4 a:hover,.primary-navigation ul ul a,.tags i,.metabox a:hover,#sidebar ul li a:hover{';
			$custom_css .='color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}
	
	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($bb_wedding_bliss_theme_color_first).';';
		$custom_css .='}';
	}

	if($bb_wedding_bliss_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($bb_wedding_bliss_theme_color_first).'!important;';
		$custom_css .='}';
	}

	$bb_wedding_bliss_theme_color_second = get_theme_mod('bb_wedding_bliss_theme_color_second');

	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .abovecopyright, #sidebar h3, #sidebar input[type="submit"], .pagination a, .pagination span, input[type="submit"], .hvr-sweep-to-right:before{';
			$custom_css .='background-color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.blogbutton-small, input.search-field,.tags p a {';
			$custom_css .='border-color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}
	if($bb_wedding_bliss_theme_color_second != false){
		$custom_css .='.pagination .current, .blogbutton-small, .our-services .page-box h4 a,.meta-nav,.tags p a {';
			$custom_css .='color: '.esc_html($bb_wedding_bliss_theme_color_second).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'bb_wedding_bliss_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width:97.7%;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97.1%;';
		$custom_css .='} }';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width: 86.4%;';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97.1%;';
		$custom_css .='} }';
	}

	//css
 
	$show_header = get_theme_mod( 'bb_wedding_bliss_slider_arrows', true);
		if($show_header == false){
			$custom_css .='.page-template-custom-front-page #header{';
				$custom_css .='background-color:#151c27; position:static;';
			$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'bb_wedding_bliss_slider_content_alignment','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:center; left:30%; right:30%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'bb_wedding_bliss_slider_image_opacity','0.6');
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

	$bb_wedding_bliss_button_padding_top_bottom = get_theme_mod('bb_wedding_bliss_button_padding_top_bottom');
	$bb_wedding_bliss_button_padding_left_right = get_theme_mod('bb_wedding_bliss_button_padding_left_right');
	if($bb_wedding_bliss_button_padding_top_bottom != false || $bb_wedding_bliss_button_padding_left_right != false){
		$custom_css .='.blogbutton-small, #comments .form-submit input[type="submit"]{';
			$custom_css .='padding-top: '.esc_html($bb_wedding_bliss_button_padding_top_bottom).'px; padding-bottom: '.esc_html($bb_wedding_bliss_button_padding_top_bottom).'px; padding-left: '.esc_html($bb_wedding_bliss_button_padding_left_right).'px; padding-right: '.esc_html($bb_wedding_bliss_button_padding_left_right).'px; display:inline-block;';
		$custom_css .='}';
	}

	$bb_wedding_bliss_button_border_radius = get_theme_mod('bb_wedding_bliss_button_border_radius');
	if($bb_wedding_bliss_button_border_radius != false){
		$custom_css .='.blogbutton-small, #comments .form-submit input[type="submit"], .hvr-sweep-to-right:before, .hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active{';
			$custom_css .='border-radius: '.esc_html($bb_wedding_bliss_button_border_radius).'px;';
		$custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/

	$stickyheader = get_theme_mod( 'bb_wedding_bliss_responsive_sticky_header',true);
	if($stickyheader == true && get_theme_mod( 'bb_wedding_bliss_sticky_header') == false){
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

	$stickyheader = get_theme_mod( 'bb_wedding_bliss_responsive_slider',true);
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

	$metabox = get_theme_mod( 'bb_wedding_bliss_responsive_metabox',true);
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

	$sidebar = get_theme_mod( 'bb_wedding_bliss_responsive_sidebar',true);
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

		$theme_lay = get_theme_mod( 'bb_wedding_bliss_background_skin_mode','Transparent Background');
	    if($theme_lay == 'With Background'){
			$custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,#love-Story, #moreevent,.front-page-content,.background-img-skin{';
				$custom_css .='background-color: #fff;';
			$custom_css .='}';
		}else if($theme_lay == 'Transparent Background'){
			$custom_css .='.our-services .page-box, .page-box-single{';
				$custom_css .='background-color: transparent;';
			$custom_css .='}';
		}