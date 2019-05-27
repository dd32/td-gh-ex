<?php
/**
 * Demo Data support.
 *
 * @package Better Health
 */

/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */

function better_health_import_files() {
    return array(
    array(
        'import_file_name'=> __('Main Demo','better-health'),
        'categories'      =>  array( 'Main Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/better-health.xml',
        'local_import_widget_file'     =>  trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/better-health.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/better-health.dat',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately if its not setup properly. Go to Appearance > Customize > Home page setting > Slider Section and select the category Slider.', 'better-health' ),
    ),

);

}
add_filter( 'pt-ocdi/import_files', 'better_health_import_files' );


/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function better_health_after_import_setup() {
    // Assign front page and posts page (blog page).

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
        'social-link' => $social_menu->term_id,
    )
);


    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );



}
add_action( 'pt-ocdi/after_import', 'better_health_after_import_setup' );