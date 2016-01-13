<?php
/**
 *
 * Wortex Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Template Name: Full-width Page Template, No Sidebar
 *
 */

get_header();

if(have_posts()) :
while(have_posts()) : the_post();

?><div id="page-title"><div class="container"><h2><?php the_title(); ?></h2></div></div><?php

?><div id="main-content" class="container"><?php

?><div id="page-container" <?php post_class(); ?>><?php

	if ( '' != get_the_post_thumbnail() ) : // As recommended by the WP codex, has_post_thumbnail() is not reliable
	?><div class="thumbnail"><?php
		the_post_thumbnail('large', array('class' => 'scale-with-grid'));
	?></div><?php
	endif;

	the_content();

		$wortex_link_pages_args = array(
			'before'           => '<br class="clear" /><div class="paged_nav">' . __('Pages:', 'wortex-lite'),
			'after'            => '</div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'next_or_number'   => 'number',
			'nextpagelink'     => __('Next page', 'wortex-lite'),
			'previouspagelink' => __('Previous page', 'wortex-lite'),
			'pagelink'         => '%',
			'echo'             => 1
		);
		wp_link_pages( $wortex_link_pages_args );
	?><br class="clear" /><?php
		edit_post_link( '<i class="fa fa-pencil"></i>' . __('Edit', 'wortex-lite'), '<div class="navbutton editlink">', '</div><br class="clear" />');

	// Display comments section only if comments are open or if there are comments already.
	if ( comments_open() || get_comments_number()!=0 ):
		?><hr /><div class="comments"><?php
		comments_template( '', true );
		next_comments_link(); previous_comments_link();
		?></div><?php
	endif;

endwhile;

else: // Empty loop (this should never happen!)

	?><h2><?php _e('Not Found', 'wortex-lite'); ?></h2>
	<p><?php _e('What you are looking for isn\'t here...', 'wortex-lite'); ?></p><?php

endif;

?></div><?php // End page container

?></div><?php

get_footer(); ?>