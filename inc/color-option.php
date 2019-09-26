<?php
	
	/*---------------------------Theme color option-------------------*/
	
	$advance_pet_care_theme_color_first = get_theme_mod('advance_pet_care_theme_color_first');

	$custom_css = '';

	if($advance_pet_care_theme_color_first != false){
		$custom_css .='input[type="submit"], .cart_icon i, #slider .inner_carousel .get-apt-btn a:hover,#welcome .discover-btn a:hover, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #header .nav ul li a:hover,#header .current-menu-item, .primary-navigation ul ul a:hover, .primary-navigation li a:active, .primary-navigation li a:hover, .primary-navigation li a:focus, .primary-navigation li a:focus{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='h4,h5,h6, input[type="search"], .read-moresec a,section h4, section .innerlightbox, #footer h3, #comments a.comment-reply-link, #comments a time,.woocommerce div.product span.price, .woocommerce .quantity .qty, #sidebar caption,#header #header-inner .nav ul li ul li a, h3.widget-title a, #footer li a:hover, .new-text h3 a, .primary-navigation ul ul a, .pet-top i, .entry-content a, .comment-meta.commentmetadata a, a.added_to_cart.wc-forward, span.tagged_as a{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_first).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($advance_pet_care_theme_color_first).'!important;';
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
		$custom_css .='.read-moresec a:hover, #header .main-menu, #slider i, #slider .inner_carousel .get-apt-btn a, #welcome .discover-btn a, .read-more-btn a, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,#header .nav ul li:hover > ul, .pagination .current, .pagination a:hover, span.meta-nav{';
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
		$custom_css .='.read-more-btn a{';
			$custom_css .='border-color: '.esc_html($advance_pet_care_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_pet_care_theme_color_second != false){
		$custom_css .='#sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_pet_care_theme_color_second).'!important;';
		$custom_css .='}';
	}