<?php
	
	$bb_ecommerce_store_theme_color = get_theme_mod('bb_ecommerce_store_theme_color');

	$custom_css = '';

	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='#slider .more-btn a, .topbar, form.woocommerce-product-search button[type="submit"],button.search-submit, #our-service,#comments a.comment-reply-link, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,.copyright-wrapper .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination a:hover, .pagination .current, .copyright, .toggle a,  input.search-submit, #our-products a.button, a.blogbutton-small:hover, .top-header,#menu-sidebar input[type="submit"],.tags p a:hover,.meta-nav:hover{';
			$custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).'!important;';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='a,.woocommerce-message::before, .post-password-form input[type=password],.cart_icon i, .copyright-wrapper li a:hover, .primary-navigation ul ul a,.tags i,#sidebar ul li a:hover,.metabox a:hover{';
			$custom_css .='color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='.inner-service, .woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($bb_ecommerce_store_theme_color){
	$custom_css .='#contact-info, #menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($bb_ecommerce_store_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	

	