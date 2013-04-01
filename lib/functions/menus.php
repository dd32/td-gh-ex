<?php
/** Register nav menus. */
add_action( 'init', 'chiplife_register_menus' );

/** Registers the the core menus */
function chiplife_register_menus() {

	/* Register the 'primary' menu. */
	register_nav_menu( 'chiplife-primary-menu', __( 'Chiplife Primary Menu', 'chiplife' ) );
	
}
?>