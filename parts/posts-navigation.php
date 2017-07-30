<?php
/**
 * Posts navigation
 *
 * Template part for displaying previous and next post link on single.
 *
 * @package ariel
 */
if ( is_single() ) :
	$previous = sprintf( esc_html__( '%s Previous Post', 'ariel' ), ariel_fontawesome_icon( 'long-arrow-left', false ) );
	$next     = sprintf( esc_html__( 'Next Post %s', 'ariel' ), ariel_fontawesome_icon( 'long-arrow-right', false ) ); ?>

	<div class="pagination-blog-feed-single">
		<div class="row">
			<div class="col-sm-6 previous_posts"><?php previous_post_link( '%link', $previous . '<span>%title</span>', true ); ?></div>
			<div class="separator"></div>
			<div class="col-sm-6 next_posts"><?php next_post_link( '%link', $next . '<span>%title</span>', true ); ?></div>
		</div><!-- row -->
	</div><!-- pagination-blog-feed-single -->
<?php endif;