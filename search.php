<?php get_header(); ?>


<h2 class="title"><?php esc_html_e( 'Search:', 'arix' ); ?> <?php echo esc_attr( get_search_query() ); ?></h2>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content-search' );

	endwhile;

	get_template_part( 'template-parts/pagination' );

	else :
		get_template_part( 'template-parts/content-none' );

endif;


get_sidebar();
get_footer();
