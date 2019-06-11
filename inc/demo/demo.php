<?php
/**
 * Demo configuration
 *
 * @package Lifestyle Blog
 */

$config = array(
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'lifestyle-blog' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/content.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'lifestyle-blog' ),
      		'preview_url'					=> esc_url( 'https://thebootstrapthemes.com/demo/lifestyle-blog/' ),
      		'import_preview_image_url'		=> esc_url( 'https://thebootstrapthemes.com/wp-content/uploads/edd/lifestyle-blog.jpg' )
		),		
		
	),
);

Lifestyle_Blog_Demo::init( apply_filters( 'lifestyle_blog_demo_filter', $config ) );