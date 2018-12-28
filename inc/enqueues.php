<?php function best_classifieds_enqueues(){

	wp_enqueue_style( 'best-classifieds-google-fonts-api', '//fonts.googleapis.com/css?family=Montserrat', array(), '1.0.0' );
	/* CSS Files */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array());
	wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array());
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css',array());
	wp_enqueue_style('best-classifieds-default',get_template_directory_uri().'/assets/css/default.css', array(), false, null );

	/* JS Files */	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/assets/js/bootstrap.js', array( 'jquery' ));
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.js', array( 'jquery' ));
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_script('best-classifieds-custom',get_template_directory_uri().'/assets/js/custom.js', array('jquery'), null, true);

	wp_enqueue_style('best-classifieds-style', get_stylesheet_uri(), array());
	best_classifieds_custom_css();
}
add_action('wp_enqueue_scripts','best_classifieds_enqueues');
