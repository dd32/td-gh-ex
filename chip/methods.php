<?php
/**
* Primary Menu Callback
*/

function primary_menu() {
	 
	 wp_page_menu( array(                 
            'menu_class'	=> 'primary-container',                
     	)
     );

}

/**
* Secondary Menu Callback
*/

function secondary_menu() {	
	return false;		
}

/**
* Avoid "Undefined Index"
* Must be passed by reference
*/

function undefined_index_fix( &$var ) {

	if ( isset( $var ) ) {
		return $var;
	}
	
	return '';
}

?>