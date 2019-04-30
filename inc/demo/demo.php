<?php
/**
 * Demo configuration
 *
 * @package Best_Charity
 */

$config = array(
	'static_page'    => 'home',
	'menu_locations' => array(
		'primary' 	=> 'primary'
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Best Charity Demo', 'best-charity' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'best-charity' ),
      		'preview_url'                  => 'https://786themes.com/demo/bestcharity/',
		),
		
	),
);

Best_Charity_Demo::init( apply_filters( 'best_charity_demo_filter', $config ) );