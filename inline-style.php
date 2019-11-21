<?php

	$automotive_centre_first_color = get_theme_mod('automotive_centre_first_color');

	/*------------------------------ Global First Color -----------*/

	$custom_css = " ";

	if($automotive_centre_first_color != false){
		$custom_css .='#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,#sidebar h3,#comments input[type="submit"],#footer-2,input[type="submit"],#sidebar .custom-social-icons i, #footer .custom-social-icons i,.search-box i,.top-btn a:hover,.slider-btn a:before,.more-btn a,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#footer .tagcloud a:hover,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .scrollup i , .toggle-nav i, #comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='#sidebar ul li a:hover,.info-box i,a,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-main-box:hover h2,#footer h3,.serv-box a,#footer li a:hover,a.scrollup, #footer .custom-social-icons i:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='.top-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$custom_css .='border-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='#about-section hr, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='#header .main-navigation ul li a:hover,#footer h3:after, .header-fixed, .main-navigation ul ul{';
			$custom_css .='border-bottom-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'automotive_centre_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .home-page-header{';
			$custom_css .='width: 97%;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'automotive_centre_slider_opacity_color','0.5');
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

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'automotive_centre_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:7%; right:50%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:50%; right:7%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'automotive_centre_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info, .content-bttn{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin:10px auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
		$custom_css .='.content-bttn{';
			$custom_css .='margin:20px 0;';
		$custom_css .='}';
		$custom_css .='.post-info hr{';
			$custom_css .='margin-bottom:10px;';
		$custom_css .='}';
		$custom_css .='.post-main-box h2{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
	}
