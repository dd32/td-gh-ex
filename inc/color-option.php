<?php
	
	$bb_ecommerce_store_theme_color = get_theme_mod('bb_ecommerce_store_theme_color');

	$custom_css = '';

	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='#slider .more-btn a, .header .primary-navigation ul li a:hover, .topbar, form.woocommerce-product-search button[type="submit"],button.search-submit, #our-service,#comments a.comment-reply-link:hover, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,.copyright-wrapper .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination a:hover, .pagination .current, .copyright, .toggle a, .header .primary-navigation ul.sub-menu li a:hover, input.search-submit, .primary-navigation ul ul, #our-products a.button, a.blogbutton-small:hover, .top-header{';
			$custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, .primary-navigation ul ul a:hover{';
			$custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).'!important;';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='a,.woocommerce-message::before, .copyright-wrapper h3, input.search-field,.post-password-form input[type=password],.cart_icon i, h3.widget-title a, td#prev a,.copyright-wrapper li a:hover, h3.ecomercepost-title a, a.blogbutton-small, div#comments a, .primary-navigation ul ul a,.entry-content p a{';
			$custom_css .='color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='.blogbutton-small{';
			$custom_css .='border-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$custom_css .='.inner-service, .woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$custom_css .='}';
	}

	