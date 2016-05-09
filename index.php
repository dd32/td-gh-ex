<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="article-header">
			<h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<p class="post-info">
				<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<span class="post-author"><?php the_author_link(); ?></span>
				<span class="post-categories"><?php the_category( ', ' ); ?></span>
				<?php comments_popup_link( 'Comment', '1&nbsp;Comment', '%&nbsp;Comments', 'post-comments', '' ); ?>
				<?php edit_post_link( __( 'Edit', 'arix' ) ); ?>
			</p>
		</header>

		<div class="post-content">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			the_content( 'Continue&nbsp;Reading', 'arix' ); ?>
		</div>
	</article>

	<?php endwhile; ?>

	<?php arix_page_nav(); ?>

	<?php else : ?>

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