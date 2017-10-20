<?php
/**
 * Add sections
 */


/* adding Header Options section*/
Kirki::add_section( 'bestblog_topheader_settings', array(
    'title'          =>esc_attr__( 'Top Header Settings', 'best-blog' ),
     'panel'          => 'header_options', // Not typically needed.
    'priority'       => 1,


) );
