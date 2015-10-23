<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bhost
 */
?>

<article id="post-<?php the_ID(); ?>" class="single-post">
	<header class="entry-header">
		<div class="post-thumb-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php if ( the_post_thumbnail('post-thumb') ) { has_post_thumbnail();} ?></a>
		</div><!-- .post-thumb-image -->
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bhost' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bhost' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bhost_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->