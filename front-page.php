<?php
$becorp_option=becorp_theme_default_data(); 
$front_page_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_option );
if ($front_page_options['front_page_enabled']=="1" && is_front_page()) {

get_header();

get_template_part('home','service');

/* Home Gallery */
get_template_part('home','blog');

get_footer();
} else {
		if(is_page())
		{ get_template_part('page'); } 
		else { get_template_part('index'); } }
?>