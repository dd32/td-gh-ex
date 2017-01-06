<?php
/*-----------------------------------------------------------------------------------*/
/* Include Theme Functions */
/*-----------------------------------------------------------------------------------*/

if ( !isset($abaya_option) && file_exists( get_template_directory() . '/includes/admin/ReduxCore/options.php' ) ) {
    require_once( get_template_directory() . '/includes/admin/ReduxCore/options.php' ); // Options framework
}
require get_template_directory().'/includes/enqueue.php'; // Scripts and stylesheets
require get_template_directory().'/includes/theme_setup.php'; // Theme Setup functions
require get_template_directory().'/includes/custom_function.php'; // Custom functions
require get_template_directory().'/includes/custom-css.php'; // Custom css
require get_template_directory().'/includes/widgets.php'; // Sidebars and widgets
require get_template_directory().'/includes/abaya_breadcrumbs.php'; // Theme Breadcrumbs
require get_template_directory().'/includes/admin/tgmpa/class-tgm-plugin-activation.php'; // Plugin Activation
require get_template_directory().'/includes/admin/tgmpa/abaya-activate.php'; // Plugin Activation
?>