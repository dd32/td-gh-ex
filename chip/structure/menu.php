<?php
/** This theme uses wp_nav_menu() in two locations.*/
register_nav_menus(
	array(
		'primary-menu' => 'Primary Menu',
		'secondary-menu' => 'Secondary Menu',
	)
);

/**
 * Primary Menu
 */

/** Primary Menu Callback */
function chip_life_primary_menu_cb() {
	wp_page_menu ();		 
}

/** Build Primary Menu */
function chip_life_primary_menu() {
	
	echo '<div class="menu1">
			<div class="menu1-data">';
	
	if ( has_nav_menu( 'primary-menu' ) ):
	
		$args = array(
			
		'container' => 'div', 
		'container_class' => 'primary-container', 
		'theme_location' => 'primary-menu',
		'menu_class' => 'sf-menu1',
		'depth' => 0,
		'fallback_cb' => 'chip_life_primary_menu_cb'
						
		);
		
		wp_nav_menu( $args );
	
	else:
	
		chip_life_primary_menu_cb();
	
	endif;
	
	echo '<br class="clear" />
			</div> <!-- end .menu1-data -->
		  </div> <!-- end .menu1 -->';
	
}

/** Primary Menu Init */
function chip_life_primary_menu_init() {
	
	$chip_life_options = get_option( 'chip_life_options' );
	if( $chip_life_options['chip_life_primary_menu'] == 1 ):
	chip_life_primary_menu();
	endif;
	
}

/**
 * Secondary Menu
 */

/** Secondary Menu Callback */
function chip_life_secondary_menu_cb() {
	return false;	 
}

/** Build Secondary Menu */
function chip_life_secondary_menu() {
	
	echo '<div class="menu2">
			<div class="menu2-data">';
	
	$args = array(
			
	'container' => 'div', 
	'container_class' => 'secondary-container', 
	'theme_location' => 'secondary-menu',
	'menu_class' => 'sf-menu2',
	'depth' => 0,
	'fallback_cb' => 'chip_life_secondary_menu_cb'
					
	);
	
	wp_nav_menu( $args );
	
	echo '<br class="clear" />
			</div> <!-- end .menu2-data -->
		  </div> <!-- end .menu2 -->';
	
}

/** Secondary Menu Init */
function chip_life_secondary_menu_init() {
	
	if ( has_nav_menu( 'secondary-menu' ) ):
	chip_life_secondary_menu();
	endif;
	
}
?>