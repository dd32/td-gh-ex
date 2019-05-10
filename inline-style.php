<?php

	$automotive_centre_first_color = get_theme_mod('automotive_centre_first_color');

	/*------------------------------ Global First Color -----------*/

	$custom_css = " ";

	if($automotive_centre_first_color != false){
		$custom_css .='#sidebar .tagcloud a:hover,.pagination a:hover,.pagination .current,#sidebar h3,#comments input[type="submit"],#footer-2,input[type="submit"],#sidebar .custom-social-icons i, #footer .custom-social-icons i,.search-box i,.top-btn a:hover,.slider-btn a:before,.more-btn a,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,#header .nav ul.sub-menu li a:hover,#footer .tagcloud a:hover,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {';
			$custom_css .='background-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='.scrollup i,.top-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
			$custom_css .='border-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='#sidebar ul li a:hover,.scrollup i,.info-box i,a,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,#header .nav ul li a:hover,.post-main-box:hover h3,#footer h3,.serv-box a,#footer li a:hover,a.scrollup{';
			$custom_css .='color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}
	if($automotive_centre_first_color != false){
		$custom_css .='#header .nav ul li a:hover,#footer h3:after{';
			$custom_css .='border-bottom-color: '.esc_html($automotive_centre_first_color).';';
		$custom_css .='}';
	}