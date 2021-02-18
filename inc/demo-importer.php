<?php

function nnfy_import_files() {

  return array(

    array(
      'import_file_name'           => 'Standard Demo',
      'local_import_file'            => get_stylesheet_directory() . '/inc/demo-content/99fy.xml',
      'local_import_widget_file'     => get_stylesheet_directory() . '/inc/demo-content/99fy.wie',
      'local_import_customizer_file' => get_stylesheet_directory() . '/inc/demo-content/99fy.dat',
      'import_preview_image_url'     => get_stylesheet_directory_uri().'/screenshot.png',
    ),

    array(
      'import_file_name'           => 'Coming Soon',
      'local_import_file'            => get_stylesheet_directory() . '/inc/demo-content/99fy.xml',
      'local_import_widget_file'     => get_stylesheet_directory() . '/inc/demo-content/99fy.wie',
      'local_import_customizer_file' => get_stylesheet_directory() . '/inc/demo-content/99fy.dat',
      'import_preview_image_url'     => get_stylesheet_directory_uri().'/screenshot.png',
    )

  );

}

add_filter( 'pt-ocdi/import_files', 'nnfy_import_files' );
function nnfy_after_import_setup() {

    // Assign menus to their locations.
    $header_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations' , array( 
				'primary' => $header_menu->term_id,
             )
        );

    // Assign front page and posts page (blog page).

    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    flush_rewrite_rules();
}

add_action( 'pt-ocdi/after_import', 'nnfy_after_import_setup' );