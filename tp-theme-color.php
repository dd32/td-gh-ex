<?php

	$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option');
	$adventure_travelling_tp_color_option_link = get_theme_mod('adventure_travelling_tp_color_option_link');

	$tp_theme_css = '';

	if($adventure_travelling_tp_color_option != false){
		$tp_theme_css .='.top-header,.search-box i,.more-btn a,.blog-info,#theme-sidebar button[type="submit"], #footer button[type="submit"],.prev.page-numbers, .next.page-numbers,.page-numbers,#comments input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,span.meta-nav{';
			$tp_theme_css .='background-color: '.esc_html($adventure_travelling_tp_color_option).';';
		$tp_theme_css .='}';
	}
	if($adventure_travelling_tp_color_option != false){
		$tp_theme_css .='.call i, .email i,p.infotext,a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.main-navigation a:hover,#theme-sidebar h3{';
			$tp_theme_css .='color: '.esc_html($adventure_travelling_tp_color_option).';';
		$tp_theme_css .='}';
	}
	if($adventure_travelling_tp_color_option != false){
		$tp_theme_css .='#slider .inner_carousel h2,#static-blog h3,.serach_inner form.search-form{';
			$tp_theme_css .='border-color: '.esc_html($adventure_travelling_tp_color_option).';';
		$tp_theme_css .='}';
	}
	if($adventure_travelling_tp_color_option_link != false){
		$tp_theme_css .='a:hover,#theme-sidebar a:hover{';
			$tp_theme_css .='color: '.esc_html($adventure_travelling_tp_color_option_link).';';
		$tp_theme_css .='}';
	}