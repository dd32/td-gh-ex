<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Styles,scripts and fonts */
/*-----------------------------------------------------------------------------------*/ 

function alhenalite_header_function() {
	
	echo "<link href='//fonts.googleapis.com/css?family=Maven+Pro|Abel|Oxygen|Kristi|Handlee' rel='stylesheet' type='text/css'>";

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );


}

add_action( 'alhenalite_head', 'alhenalite_header_function', 10, 2 );

?>