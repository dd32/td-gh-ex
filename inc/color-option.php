<?php
	
	$advance_education_theme_color = get_theme_mod('advance_education_theme_color');

	$custom_css = '';

	if($advance_education_theme_color != false){
		$custom_css .=' input[type="submit"], .read-moresec a:hover, .top-header .account-btn a:hover, .time, #slider i, #slider .inner_carousel .readbtn a, .read-more-btn a, span.meta-nav, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover,.woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, #header .nav ul li:hover > ul, #header .nav ul li a:hover,#header .nav ul li.current-menu-item a{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='h1,h2,h3,h4,h5,h6, input[type="search"], .read-moresec a, .logo a, .top-header .account-btn a, .mail i,.phone i, .search-box i, #slider .inner_carousel .readbtn a:hover, #courses h3 i, .cat-posts a, .page-box h4, .read-more-btn a:hover, .page-box .metabox,.page-box-single .metabox, section h4, #footer h3, #comments a.comment-reply-link, #comments a time, .woocommerce-message::before, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce .quantity .qty, #sidebar caption, #sidebar h3, h1.entry-title,h1.page-title, .pagination span,.pagination a, .pagination .current, h3.widget-title a,.metabox a, .new-text a, #footer li a:hover, p.logged-in-as a{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.main-menu{';
			$custom_css .='border-bottom-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.cat_body, h3.title-btn{';
			$custom_css .='border-right-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.top-header .account-btn a, .serach_inner form.search-form, #slider .inner_carousel .readbtn a, #slider .inner_carousel .readbtn a:hover, .cat-posts a, .read-more-btn a, .read-more-btn a:hover, #footer input[type="search"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, .pagination a:hover, .pagination .current{';
			$custom_css .='border-color: '.esc_html($advance_education_theme_color).';';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, #sidebar ul li a:hover:before{';
			$custom_css .='background-color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}
	if($advance_education_theme_color != false){
		$custom_css .='.logo p,.page-box-single h3, #sidebar ul li a:hover, #sidebar ul li a:active, #sidebar ul li a:focus{';
			$custom_css .='color: '.esc_html($advance_education_theme_color).'!important;';
		$custom_css .='}';
	}

	if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
		box-shadow: -12px 12px 0 0 '.esc_html($advance_education_theme_color).';
		}';
		}
		if($advance_education_theme_color != false){
		$custom_css .='#sidebar aside{
		box-shadow: 0 3px 3px '.esc_html($advance_education_theme_color).';
		}';
		}