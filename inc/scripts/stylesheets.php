<?php
	//Bootstrap =======================================================
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.css', array(), '4.1.1', 'all' );
	//=================================================================

	//Photoswipe ======================================================
	wp_register_style( 'photoswipe', get_template_directory_uri() . '/css/photoswipe.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'photoswipe' );
	//=================================================================

	//Photoswipe Skin ======================================================
	wp_register_style( 'photoswipe-skin', get_template_directory_uri() . '/css/default-skin/default-skin.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'photoswipe-skin' );
	//=================================================================
	
	//Flickity ======================================================
	wp_register_style( 'flickity', get_template_directory_uri() . '/css/flickity.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'flickity' );
	//=================================================================

	wp_enqueue_style( 'absolutte_style', get_stylesheet_uri() );
