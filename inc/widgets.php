<?php

//Load the widgets




add_action('admin_enqueue_scripts', 'advance_widget_scripts');

function advance_widget_scripts() {    

	if( function_exists( 'wp_enqueue_media' ) ) {

	wp_enqueue_media();
	}
    wp_enqueue_script('advance_widget_scripts', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
	
}


/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'advancetheme_register_widgets');

function advancetheme_register_widgets() {    

		register_widget('advance_aboutus');
	
	$advance_sidebars = array ( 'sidebar-frontpage' => 'sidebar-frontpage');
	
	/* Register sidebars */
	foreach ( $advance_sidebars as $advance_sidebar ):
	
		
			
			if( $advance_sidebar == 'sidebar-frontpage' ):
		
			$advance_name = __('Frontpage widget area', 'advance');
			
            endif;
		endforeach;
		}?>