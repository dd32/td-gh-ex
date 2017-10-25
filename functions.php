<?php
/*-----------------------------------------------------------------------------------*/
/* Include Theme Functions */
/*-----------------------------------------------------------------------------------*/
require get_template_directory().'/includes/enqueue.php'; // Scripts and stylesheets
require get_template_directory().'/includes/theme_setup.php'; // Theme Setup functions
require get_template_directory().'/includes/custom_function.php'; // Custom functions
require get_template_directory().'/includes/customizer.php'; // Custom css
require get_template_directory().'/includes/custom-css.php'; // Custom css
require get_template_directory().'/includes/widgets.php'; // Sidebars and widgets
require get_template_directory().'/includes/admin/tgmpa/class-tgm-plugin-activation.php'; // Plugin Activation
require get_template_directory().'/includes/admin/tgmpa/abaya-activate.php'; // Plugin Activation
require get_template_directory() . '/includes/abayapro/class-customize.php';
?>