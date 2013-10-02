<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Styles,scripts and fonts */
/*-----------------------------------------------------------------------------------*/ 

function wip_header_function() {
	
	echo "<link href='//fonts.googleapis.com/css?family=Maven+Pro|Abel|Oxygen|Kristi|Handlee' rel='stylesheet' type='text/css'>";
	
	wip_enqueue_style('/css');
	wip_enqueue_script('/js');

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_head(); 

}

add_action( 'wip_head', 'wip_header_function', 10, 2 );

?>