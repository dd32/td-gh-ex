<?php

/**
 * The front-page template file.
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 * @since AcmeBlog 1.1.0
 */
get_header(); ?>
<?php
/**
 * acmeblog_action_front_page hook
 * @since acmeblog 1.1.0
 *
 * @hooked acmeblog_front_page -  10
 */
do_action( 'acmeblog_action_front_page' );
?>
<?php get_sidebar( 'left' ); ?>
<?php get_sidebar( ); ?>
<?php get_footer();