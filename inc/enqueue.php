<?php
function best_charity_scripts() {
	// Google font
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i', array(), '' );

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '4.1.1' );

	// fontawesome Css
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.7.0' );

	// Slick CSS
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css', array(), '1.9.0' );

	// Slick theme CSS
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/assets/css/slick-theme.css', array(), '1.9.0' );

	// Lightbox CSS
	wp_enqueue_style( 'lightbox', get_template_directory_uri() .'/assets/css/lightbox.css', array(), '' );

	//Magnific Popup
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '1.9.0' );

	wp_enqueue_style( 'best-charity-style', get_stylesheet_uri() );
	
	// Poper JS
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '3.3.1', true ); 

	//Lightbox 
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), '2.10.0', true );

	// bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

	// Slick Nav JS
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.9.0', true );

	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );

	// myjquery JS
	wp_enqueue_script( 'best-charity-main', get_template_directory_uri() . '/assets/js/myjquery.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'best-charity-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'best-charity-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'best_charity_scripts' );