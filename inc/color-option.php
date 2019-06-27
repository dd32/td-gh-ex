<?php
	
	/*---------------------------Theme color option-------------------*/
	
	$advance_pet_care_theme_color_first = get_theme_mod('advance_pet_care_theme_color_first');

	$custom_css = '';

	if($advance_pet_care_theme_color_first != false){
		$custom_css .='input[type="submit"], .cart_icon i, #slider .inner_carousel .get-apt-btn a:hover,#welcome .discover-btn a:hover, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #header .nav ul li a:hover,#header .current-menu-item{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='h1,h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .page-box .metabox,.page-box-single .metabox, section h4, section .innerlightbox, #footer h3, #comments a.comment-reply-link, #comments a time, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, #content-ts h2, #content-ts h3, .pagination span,.pagination a, .pagination a:hover, .pagination .current, #header #header-inner .nav ul li ul li a, .metabox a, .new-text p a, .middle-align a, h3.widget-title a, .product_meta a{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='.logo p, .pet-top i{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_first).'!important;';
		$custom_css .='}';
	}
	
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='.read-moresec a, .serach_inner form.search-form, #footer input[type="search"], .woocommerce .quantity .qty{';
			$custom_css .='border-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}

	/*---------------------------Theme color option-------------------*/

	$advance_pet_care_theme_color_second = get_theme_mod('advance_pet_care_theme_color_second');

	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, #header .main-menu, #slider i, #slider .inner_carousel .get-apt-btn a, #welcome .discover-btn a, .read-more-btn a, span.meta-nav, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #header .nav ul li:hover > ul{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.logo a, .pet-top p.color, .page-box h4, a.showcoupon,.woocommerce-message::before, h1.entry-title,h1.page-title{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='{';
			$custom_css .='border-bottom-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.read-more-btn a{';
			$custom_css .='border-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='.page-box-single h3, #sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_second).'!important;';
		$custom_css .='}';
	}