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
				</span>
					<span class="entry-meta">
				<?php
				$categories_list = get_the_category_list( __( ', ', 'star' ) );
				if ( $categories_list && star_categorized_blog() ) {
					echo $categories_list;
				}
				?>
			</span><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( has_post_thumbnail()){
					the_post_thumbnail();
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