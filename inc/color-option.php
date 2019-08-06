<?php
	
	/*---------------------------Theme color option-------------------*/
	$advance_automobile_theme_color_first = get_theme_mod('advance_automobile_theme_color_first');

	$custom_css = '';

	if($advance_automobile_theme_color_first != false){
		$custom_css .='input[type="submit"], .top-header, #slider i, #slider .inner_carousel .read-btn a, .address, .owl-carousel .owl-nav .owl-prev i, .owl-carousel .owl-nav .owl-next i, #category .explore-btn a, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.copyright, #footer input[type="submit"], #header .nav ul li:hover > ul, .read-more-btn a:hover{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='h1,
		h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .address i,.time i, .owl-carousel .owl-nav .owl-prev i:hover, .owl-carousel .owl-nav .owl-next i:hover,  section h4, section .innerlightbox, #footer h3, .copyright, #comments a.comment-reply-link, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, #content-ts h2, #content-ts h3,.pagination span, #header .nav ul li a:hover, #header .current-menu-item,.copyright, h3.widget-title a, .nav-previous a, p.logged-in-as a, .nav-next a, .new-text p a, h2.woocommerce-loop-product__title, .content-ts h3, .content-ts h2,#footer li a:hover{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_first != false){
		$custom_css .='.read-moresec a, .serach_inner form.search-form, #footer input[type="search"], .woocommerce .quantity .qty{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_first).';';
		$custom_css .='}';
	}

	/*---------------------------Theme color option-------------------*/
	$advance_automobile_theme_color_second = get_theme_mod('advance_automobile_theme_color_second');

	if($advance_automobile_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, #slider .inner_carousel .read-btn a:hover, .time, #category .explore-btn a:hover,span.meta-nav, #footer, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], #header .nav ul li:hover > ul:hover,  .read-more-btn a {';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .toggle a, .book-btn a{';
			$custom_css .='background-color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='input[type="submit"], .logo a,.social-icons i:hover, #header .nav ul li a, .search-box i, #slider .inner_carousel h2 , #slider .inner_carousel,#category h3, .page-box .metabox,.page-box-single .metabox,.metabox a, .woocommerce-message::before, h1.entry-title,h1.page-title,  .page-box h4, .new-text h4 a{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='#header .main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.page-box, #sidebar aside{';
			$custom_css .='border-color: '.esc_html($advance_automobile_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_automobile_theme_color_second != false){
		$custom_css .='.logo p, .page-box-single h3, #sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_automobile_theme_color_second).'!important;';
		$custom_css .='}';
	}