<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Academic_Hub
 * @since 1.0.0
 */
function academic_hub_import_files() {
    return array(
      array(
        'import_file_name'           => 'Education',
        'categories'                 => array( 'Education'),
        'import_file_url'            =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-2//content.xml',
        'import_widget_file_url'     =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-2//widgets.wie',
        'import_customizer_file_url' =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-2//customizer.dat',
        'import_preview_image_url'   =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-2/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'academic-hub' ),
        'preview_url'                => 'https://academic-hub.podamibenepal.com/',
      ),
      array(
        'import_file_name'           => 'Education Old',
        'categories'                 => array( 'Education'),
        'import_file_url'            =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-1//content.xml',
        'import_widget_file_url'     =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-1//widgets.wie',
        'import_customizer_file_url' =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-1//customizer.dat',
        'import_preview_image_url'   =>  get_template_directory_uri() . '/academic-hub/demo-import/demo-1/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'academic-hub' ),
        'preview_url'                => 'https://academic-hub.podamibenepal.com/',
      ),
      
    );
  }
  add_filter( 'pt-ocdi/import_files', 'academic_hub_import_files' );


  
/*****************************************************************
*         After demo import options
*************************************************************/
function academic_hub_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
  
  set_theme_mod( 'nav_menu_locations', array(
    'menu-1' => $main_menu->term_id,
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'home' );
  $blog_page_id  = get_page_by_title( 'News' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'academic_hub_after_import_setup' );