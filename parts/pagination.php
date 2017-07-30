<?php
/**
 * Pagination
 *
 * Template part for displaying previous and next posts page link on archives.
 *
 * @package ariel
 */

if ( get_next_posts_link() || get_previous_posts_link() ) :

	if ( get_next_posts_link() ) : ?>
		<div class="previous_posts">
			<?php next_posts_link( esc_html__( 'Previous Posts', 'ariel' ) ); ?>
		</div><?php
	endif; // get_next_posts_link()

	if ( get_previous_posts_link() ) : ?>
		<div class="next_posts">
			<?php previous_posts_link( esc_html__( 'Next Posts', 'ariel' ) ); ?>
		</div><?php
	endif; // get_previous_posts_link()

endif; // get_next_posts_link() || get_previous_posts_link()