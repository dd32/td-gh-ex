<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

	<header>
		<?php the_archive_title( '<h2 class="title">', '</h2>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/content' ); ?>


	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content-none' ); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
