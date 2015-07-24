<?php
/**
 * @package BBird Under
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php  if ( has_post_thumbnail() ) {
     the_post_thumbnail('page-featured-image');
}
; ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php bbird_under_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bbird-under' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bbird_under_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
