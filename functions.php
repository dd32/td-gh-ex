<?php
if ( !isset($champ_option) && file_exists( get_template_directory() . '/includes/admin/ReduxCore/options.php' ) ) {
    require_once( get_template_directory() . '/includes/admin/ReduxCore/options.php' );
}
require get_template_directory().'/includes/enqueue.php';
require get_template_directory().'/includes/theme_setup.php';
require get_template_directory().'/includes/custom_function.php';
require get_template_directory().'/includes/widgets.php';
require get_template_directory().'/includes/aq_resizer.php';
require get_template_directory().'/includes/abaya_breadcrumbs.php';
require_once locate_template('/includes/admin/tgmpa/class-tgm-plugin-activation.php');
require_once locate_template('/includes/admin/tgmpa/abaya-activate.php');
?>