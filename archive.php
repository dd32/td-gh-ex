<?php get_header(); ?>


<?php if ( have_posts() ) : ?>

	<header>
		<?php the_archive_title( '<h2 class="title">', '</h2>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>

	<?php
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
