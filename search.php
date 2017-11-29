<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$current_post_type = isset( $_GET['post_type'] ) && post_type_exists( $_GET['post_type'] ) ? $_GET['post_type'] : 'post';
AttireFramework::DynamicSidebars( 'left' );

get_template_part( 'templates/search/' . $current_post_type );


get_footer();