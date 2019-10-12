<?php
	
	$advance_coaching_theme_color = get_theme_mod('advance_coaching_theme_color');

	$custom_css = '';

	if($advance_coaching_theme_color != false){
		$custom_css .='.read-moresec a:hover, .logo, .top-header .time, .request-btn a i, #slider .carousel-control-next-icon i,#slider .carousel-control-prev-icon i, #slider .inner_carousel .read-btn a i, #coaching .read-more a i, .read-more-btn a i, #footer input[type="submit"], .copyright, #footer .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,#sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #footer input[type="submit"], #comments a.comment-reply-link, .tags p a:hover,.meta-nav:hover,#menu-sidebar input[type="submit"], .toggle-menu i, input[type="submit"]{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message::before, h1.entry-title,h1.page-title, h2.woocommerce-loop-product__title,.metabox a, .metabox i, .metabox .entry-comments, .tags i, .tags p a, .contact_data .mail i,#sidebar ul li a:hover,.meta-nav, .page-template-custom-front-page .search-box i, .page-box .metabox a, .entry-content a, .comment-body p a, .entry-content code{';
			$custom_css .='color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='.woocommerce-message, .primary-navigation ul ul li:first-child{';
			$custom_css .='border-top-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#footer input[type="search"],.primary-navigation ul ul{';
			$custom_css .='border-color: '.esc_html($advance_coaching_theme_color).';';
		$custom_css .='}';
	}
	if($advance_coaching_theme_color != false){
		$custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($advance_coaching_theme_color).'!important;';
		$custom_css .='}';
	}

// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($advance_coaching_theme_color){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($advance_coaching_theme_color).' 120%);
		}';
	}
	$custom_css .='}';