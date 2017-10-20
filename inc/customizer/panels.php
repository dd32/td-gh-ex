<?php

/**
 * Add panels
 */


/* adding labestblogt panel */



Kirki::add_panel( 'bglayout_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'General settings', 'best-blog' ),
    'description' => esc_attr__( 'This panel will provide all Site layout and Background color typography options of the Theme.', 'best-blog' ),
) );
