<?php
/**
* The template for displaying the header widgets
*
* @package ariel
*/
if ( is_active_sidebar( 'header-top-right' ) ) : ?>
	<div class="header-top-right"><?php dynamic_sidebar( 'header-top-right' ); ?></div>
<?php
elseif ( ariel_get_option( 'ariel_example_content' ) == 1 ) : ?>
	<div class="header-top-right"><?php ariel_example_sidebar_header(); ?></div>
<?php endif;