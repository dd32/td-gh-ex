<?php
	
/*---------------------------Theme color option-------------------*/
	$advance_startup_theme_color_first = get_theme_mod('advance_startup_theme_color_first');

	$custom_css = '';

	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .inner_carousel .readbtn a, #we_provide h3:before, #we_provide .theme_button a:hover ,.read-more-btn a:hover, .copyright, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar input[type="submit"]:hover, .primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_first).' !important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i, .primary-navigation ul ul a, .primary-navigation a:hover{';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_first).' !important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_first != false){
		$custom_css .='#slider .inner_carousel .readbtn a{';
			$custom_css .='border-color: '.esc_html($advance_startup_theme_color_first).';';
		$custom_css .='}';
	}
	/*------------------Theme color option-------------------*/
	$advance_startup_theme_color_second = get_theme_mod('advance_startup_theme_color_second');

	if($advance_startup_theme_color_second != false){
		$custom_css .='.read-moresec a:hover, .read-moresec a:hover, .talk-btn a:hover,  #footer input[type="submit"], #footer .tagcloud a:hover, .woocommerce span.onsale, #sidebar .tagcloud a:hover,.page-template-custom-front-page .main-menu .menu-color, #header .nav ul li:hover > ul, input[type="submit"], .primary-navigation ul ul a{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_startup_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='h4,h5,h6, input[type="search"],.read-moresec a,.social-icons i:hover, .mail i,.phone i,.time i, .search-box i, .metabox i, section h4, #footer h3, #comments a.comment-reply-link, #comments a time,.woocommerce-message::before,.woocommerce .quantity .qty, #sidebar caption, h1.entry-title,.new-text p a, h3.widget-title a, table#wp-calendar td a, #footer li a:hover, .new-text h3 a, article.page-box-single h3 a, div#comments a, a.added_to_cart.wc-forward{';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='.talk-btn a:hover, .serach_inner form.search-form, #footer input[type="search"], .woocommerce .quantity .qty, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$custom_css .='border-color: '.esc_html($advance_startup_theme_color_second).';';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false){
		$custom_css .='#sidebar ul li a:hover,#sidebar ul li:active, #sidebar ul li:focus {';
			$custom_css .='color: '.esc_html($advance_startup_theme_color_second).'!important;';
		$custom_css .='}';
	}
	if($advance_startup_theme_color_second != false || $advance_startup_theme_color_first != false){
		$custom_css .='#we_provide h3:before{
		background: linear-gradient(130deg, '.esc_html($advance_startup_theme_color_second).' 40%, '.esc_html($advance_startup_theme_color_first).' 77%)!important;
		}';
	}
	if($advance_startup_theme_color_second != false || $advance_startup_theme_color_first != false){
		$custom_css .='.page-template-custom-front-page .main-menu .menu-color{
		background: linear-gradient(90deg, #fff 94%, '.esc_html($advance_startup_theme_color_first).' 19%);
		}';
	}
	if($advance_startup_theme_color_second != false || $advance_startup_theme_color_first != false){
		$custom_css .='#we_provide .theme_button a:hover, .read-more-btn a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar input[type="submit"]:hover, .copyright, #slider{
		background-image: linear-gradient(130deg, '.esc_html($advance_startup_theme_color_second).' 40%, '.esc_html($advance_startup_theme_color_first).' 77%);
		}';
	}
	