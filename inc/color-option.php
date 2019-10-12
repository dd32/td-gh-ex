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