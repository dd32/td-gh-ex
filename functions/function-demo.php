<?php
/**
 * bestblog demos
 *
 * @package imonthemes
 * @subpackage Best Blog
 * @since Best BlogPro 1.0.0
 */

 function bestblog_import_files() {
   $bestdemo1='bestdemo1';
	return array(
		array(
			'import_file_name'             => 'Demo1',
			'categories'                   => array( 'Free' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/demo1/bestdemo1.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/demo1/bestdemo1.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/demo1/bestdemo1.dat',
			'import_preview_image_url'     => 'https://bytebucket.org/Imonthemes/best-blogpro-demo/raw/b8e2da725212dc573b803bd05dedcab74d0285c9/demo1/Demo1min.png',
			'preview_url'                  => 'http://imonthemes.com/bestblog-demo/demo1/',
		),
		array(
			'import_file_name'             => 'Demo 2',
			'categories'                   => array( 'Free'),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/demo2/'.$bestdemo1.'.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/demo2/'.$bestdemo1.'.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/demo2/'.$bestdemo1.'.dat',
			'import_preview_image_url'     => 'https://bytebucket.org/Imonthemes/best-blogpro-demo/raw/ddb87184c19c5a27d5ebc3b87a6ee2a628b6a636/demo2/Demo2min.png',
			'preview_url'                  => 'http://imonthemes.com/bestblog-demo/demopro1/',
		),

	);
}
add_filter( 'pt-ocdi/import_files', 'bestblog_import_files' );

add_action( 'pt-ocdi/enable_wp_customize_save_hooks', '__return_true' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

if ( ! function_exists( 'bestblog_after_import' ) ) :
function bestblog_after_import( ) {

        //Set Menu
        $top_menu = get_term_by('name', 'custom', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
              'primary' => $top_menu->term_id,
             )
        );
        //Set Front page
    $page = get_page_by_title( 'Home');
    if ( isset( $page->ID ) ) {
     update_option( 'page_on_front', $page->ID );
     update_option( 'show_on_front', 'page' );
    }

}
add_action( 'pt-ocdi/after_import', 'bestblog_after_import' );
endif;
