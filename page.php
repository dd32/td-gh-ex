<?php
get_header();


if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content-page' );

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; else :
		get_template_part( 'template-parts/content-none' );

endif;


get_sidebar();
get_footer();
