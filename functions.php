<?php

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneaklite_scripts_styles')) {

	function sneaklite_scripts_styles() {

		wp_deregister_style ( 'suevafree_style' );

		wp_enqueue_style( 'sneaklite-style', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_style( 'sneaklite-woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css' ); 

		if ( get_theme_mod('suevafree_skin') )
			wp_enqueue_style( 'sneaklite-' . get_theme_mod('suevafree_skin') , get_stylesheet_directory_uri() . '/assets/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		wp_deregister_style ( 'suevafree-google-fonts' );
		
		wp_enqueue_style( 'sneaklite-google-fonts', '//fonts.googleapis.com/css?family=Abel|Allura|Roboto+Slab|Fjalla+One&subset=latin,latin-ext' );

	}
	
	add_action( 'wp_enqueue_scripts', 'sneaklite_scripts_styles', 99 );

}

?>