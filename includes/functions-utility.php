<?php


if ( ! function_exists( 'themeora_add_first_and_last' ) ) :
    /**
    *  Add a first and a last class to the menu 
    */
    function themeora_add_first_and_last( $output ) {
        $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
        $output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
        return $output;
    }
    
endif;
add_filter('wp_nav_menu', 'themeora_add_first_and_last');


/**
 * Extend the walker to add our own class so we can use bootstrap dropdowns
 */
class Themeora_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu dropdown-menu\">\n";
    }
}


?>
