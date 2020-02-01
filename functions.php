<?php
    require_once( get_template_directory() . '/inc/theme-setup.php' );
    require_once( get_template_directory() . '/inc/enqueue.php' );
    require_once( get_template_directory() . '/inc/enqueue-inline.php' );
    require_once( get_template_directory() . '/inc/custom-functions.php' );
    require_once( get_template_directory() . '/inc/custom-widgets.php' );
    require_once( get_template_directory() . '/inc/customizer.php' );
    require_once( get_template_directory() . '/inc/transparent-header.php' );
    require_once( get_template_directory() . '/inc/welcome-page.php' );

    if ( CT_THEME_STATE == 'free' ) {
        require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-pro/class-customize.php' );
    }
