<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="article-header">
			<h2 class="title"><?php the_title(); ?></h2>
		</header>

		<div class="post-content">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			the_content(); ?>
		</div>

		<?php wp_link_pages(); ?>

		<?php edit_post_link( __( 'Edit This Page', 'arix' ) ); ?>
	</article>

	<?php comments_template(); ?>


	<?php endwhile; else : ?>

	<article id="post-not-found" class="page">
		<header>
			<h2 class="title"><?php _e( 'Page Was Not Found', 'arix' ); ?></h2>
		</header>

		<p><?php _e( 'Unfortunately, the page you were looking for could not be found. Try searching!', 'arix' ); ?></p>

		<?php get_search_form(); ?>
	</article>

	<?php endif; ?>



<?php get_sidebar(); ?>

<?php get_footer(); ?>