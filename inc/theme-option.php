<?php
if(is_admin()){
add_action( 'admin_menu', 'jatheme_theme_menu_page' );
function jatheme_theme_menu_page(){
    add_theme_page( 'Theme Option', 'Theme Option', 'manage_options', 'themeoption', 'theme_option_menu_page', 58 ); 
}

function theme_option_menu_page(){
    /*require_once( get_template_directory() . '/inc/theme-options.php' );*/
	get_template_part( '/inc/theme', 'options' );
}

}
?>