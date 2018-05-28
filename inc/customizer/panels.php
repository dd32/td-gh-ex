<?php

/**
 * Add panels
 */


/* adding layout panel */
/* adding labestblogt panel */
Kirki::add_panel( 'upgradepro_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'About Theme', 'advance' ),
    'description' => esc_attr__( 'This panel will provide all Site layout and Background color typography options of the Theme.', 'advance' ),
    'icon' => 'dashicons-warning'
) );

Kirki::add_panel( 'theme_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Theme Options', 'advance' ),
    'description' => esc_attr__( 'This panel will provide all the options of the Theme.', 'advance' ),
) );

?>
