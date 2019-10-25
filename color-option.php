<?php
	
	$aagaz_startup_theme_color = get_theme_mod('aagaz_startup_theme_color');

	$custom_css = '';

	if($aagaz_startup_theme_color != false){
		$custom_css .='.topbar, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, .readbutton a, .aboutbtn a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, nav.woocommerce-MyAccount-navigation ul li, .post-link a, .post-info, #sidebox h2, button.search-submit:hover, .search-form button.search-submit, .copyright, .widget .tagcloud a:hover,.widget .tagcloud a:focus,.widget.widget_tag_cloud a:hover,.widget.widget_tag_cloud a:focus,.wp_widget_tag_cloud a:hover,.wp_widget_tag_cloud a:focus, button,input[type="button"],input[type="submit"], .prev.page-numbers:focus,.next.page-numbers:focus,.tags p a,.comment-reply-link,.post-navigation .nav-next a, .post-navigation .nav-previous a,.scrollup i,.page-numbers{';
			$custom_css .='background-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.woocommerce-message::before,#sidebox ul li a:hover,.woocommerce .tagged_as a:hover{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.main-navigation ul ul, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, span.carousel-control-prev-icon i:hover,span.carousel-control-next-icon i:hover, #about .abt-image,.scrollup i,.page-numbers{';
			$custom_css .='border-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='#about .about-text hr, .woocommerce-message{';
			$custom_css .='border-top-color: '.esc_html($aagaz_startup_theme_color).';';
		$custom_css .='}';
	}
	if($aagaz_startup_theme_color != false){
		$custom_css .='.site-footer ul li a:hover{';
			$custom_css .='color: '.esc_html($aagaz_startup_theme_color).'!important;';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'aagaz_startup_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.3%';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Layout'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-home-page .middle-header{';
			$custom_css .='width: 97.7%';
		$custom_css .='}';
	}else if($theme_lay == 'Box Layout'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}

