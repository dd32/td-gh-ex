<?php
get_header();


if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content' );

	endwhile;

	get_template_part( 'template-parts/pagination' );

	else :
		get_template_part( 'template-parts/content-none' );

endif;


get_sidebar();
get_footer();
