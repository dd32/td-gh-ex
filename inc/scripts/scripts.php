<?php

	//Modernizr Plugin ================================================
	wp_enqueue_script( 'absolutte_modernizr', get_template_directory_uri() . '/js/modernizr.min.js', '2.8.3', true );
	//=================================================================

	//Pace  ===========================================================
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array(), '1.0.2', true );
	//=================================================================

	//Appear  ===========================================================
	wp_enqueue_script( 'appear', get_template_directory_uri() . '/js/appear.min.js', array(), '1.0.3', true );
	//=================================================================

	//photoswipe-and-ui  ===========================================================
	wp_enqueue_script( 'photoswipe-and-ui', get_template_directory_uri() . '/js/photoswipe-and-ui.min.js', array(), '1.0.2', true );
	//=================================================================

	//Flickity  ===========================================================
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array(), '2.0.5', true );
	//=================================================================
	
	//Bootstrap JS ========================================
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.1', true );
	//=================================================================

	//Comment Reply ===================================================
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//=================================================================

	//Navigation Menu ===================================================
	wp_enqueue_script( 'absolutte-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0', true );
	$absolutte_l10n = array(
		'quote'          => absolutte_get_svg( array( 'icon' => 'quote-right' ) ),
	);
	$absolutte_l10n['expand']         = __( 'Expand child menu', 'absolutte' );
	$absolutte_l10n['collapse']       = __( 'Collapse child menu', 'absolutte' );
	$absolutte_l10n['icon']           = absolutte_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	wp_localize_script( 'absolutte-navigation', 'absolutte_ScreenReaderText', $absolutte_l10n );
	//=================================================================


	//Customs Scripts =================================================
	wp_enqueue_script( 'absolutte_theme-custom', get_template_directory_uri() . '/js/script.js', array( 'jquery', 'bootstrap' ), '1.0.1', true );
	$absolutte_custom_js = array(
		'admin_ajax' => admin_url( 'admin-ajax.php' ),
		'token' => wp_create_nonce( 'quemalabs-secret' )
	);
	wp_localize_script( 'absolutte_theme-custom', 'absolutte', $absolutte_custom_js );
	//=================================================================



	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || ( function_exists( 'is_plugin_active_for_network' ) && is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) ) {
		if ( is_shop() ) {
			wp_enqueue_script( 'wc-single-product' );
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			wp_enqueue_script( 'wc-add-to-cart' );
		}
	}
