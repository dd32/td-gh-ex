<?php
/**
 * @package star
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
				<span class="entry-meta">
				<?php
				star_posted_on();
				?>
				</span><!-- .entry-meta -->
				<?php
				wp_list_categories( array( 'title_li' => '' ) );
				?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) {
			echo  '<a href="' . esc_url( get_permalink() ) . '" >' . get_the_post_thumbnail() . '</a>';
		}
		/* translators: %s: Name of current post */
		the_content( sprintf( __( 'Continue reading %s', 'star' ), get_the_title() ) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'star' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php star_entry_footer(); ?>

</article><!-- #post-## -->
