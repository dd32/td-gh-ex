<?php
// Arrows in menu
function be_arrows_in_menus( $item_output, $item, $depth, $args ) {
	
if( in_array( 'menu-item-has-children', $item->classes ) ) {
$arrow = 0 == $depth ? '</a><input type="checkbox" id="'.$item->ID.'"><label class="arrow" for="'.$item->ID.'"></label>' : '</a><input type="checkbox" id="'.$item->ID.'"><label class="arrow" for="'.$item->ID.'"></label>';
$item_output = str_replace( '</a>', $arrow . '', $item_output );
}
	
return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );


