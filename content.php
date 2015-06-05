<?php
/**
 * @package aaron
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a><i aria-hidden="true"></i></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aaron_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( has_post_thumbnail()){
					the_post_thumbnail();
			}
			
			/* translators: %s: Name of current post */
			the_content( sprintf( __( 'Continue reading %s', 'aaron' ), get_the_title() ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'aaron' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php aaron_entry_footer(); ?>

</article><!-- #post-## -->