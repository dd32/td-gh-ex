<?php
/**
 * Page layout without sidebars and borders.
 *
 * @package BA Tours
 */



$data = array();



//////////////////////////////////////////////////
/**
 * Layout meta data.
 */
$data['meta']  = array(
	'name' => __( 'No sidebars (wide)', 'ba-tours-light' ),
	'desc' => __( 'Layout without sidebars and borders.', 'ba-tours-light' ),
);



//////////////////////////////////////////////////
/**
 * Panels enabling and disabling for this layout.
 *
 * You can use an array of panels names or words 'default',
 * 'all' and 'none' in appropriate cases.
 * The 'added' and 'disabled' lists will be applied after the 'enabled' list.
 */
$data['panels_enabled']  = 'default';

$data['panels_added']    = 'none';

$data['panels_disabled'] = array(
	'sidebar-right',
	'sidebar-left',
);



//////////////////////////////////////////////////
/**
 * Panels grid altering for this layout.
 */
$data['grid'] = array(
);



//////////////////////////////////////////////////
/**
 * Preferrable page components for this layout.
 *
 * For the default header and footer will be used files from theme root.
 * Alternative parts will be searched in '/template-parts/{$components_name}s/{$components_name}-'.
 */
$data['components'] = array(
     'container' => 'frontpage',
);



//////////////////////////////////////////////////
/**
 * Page components styles.
 */
$data['styles'] = array(
	'content' => 'container-fluid site-content no-sidebars-wide',
);



//////////////////////////////////////////////////
/**
 * Announce layout altering.
 */
do_action( 'bathemos_collect_data', $data, 'layout' );

$data = null;